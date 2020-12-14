<?php
include "../init.php";
header("Content-Type: application/json");
$errs = array();



$rules = array(
	"firstname" => array(
		"required" => true,
		"type" => "alnum",
	),
	"lastname" => array(
		"required" => true,
		"type" => "alnum",
	),
	"gender" => array(
		"required" => true,
		"type" => "alnum",
	),
	"textYes" => array(
		"required" => true,
		"type" => "bool",
	),
	"phone" => array(
		"required" => true,
		"type" => "phone",
		"mobile" => false
	),
	"emailYes" => array(
		"required" => true,
		"type" => "bool",
	),
	"email" => array(
		"required" => false,
		"type" => "email",
	),
	"email2" => array(
		"required" => false,
		"required_if" => "email",
		"type" => "email",
		"match" => "email",
	),
	"yearselect" => array(
		"required" => true,
		"type" => "int",
	),
	"monthselect" => array(
		"required" => true,
		"type" => "alnum",
	),
	"dayselect" => array(
		"required" => true,
		"type" => "alnum",
	),
	"zip" => array(
		"required" => true,
		"type" => "int",
		"maxlength" => 5,
		"minlength" => 5,
	),
	"location_id" => array(
		"required" => true,
		"type" => "int",
	),
	"dateselect" => array(
		"required" => true,
		"type" => "date",
		"date_format" => "Y/m/d",
	),


);

$result = Validator::check($_POST, $rules);

if($result->success) {
	$results = $result->data->results;
	//print_r($results);
	foreach($results["firstname"] as $key => $firstname) {
		$birthday = $results["yearselect"][$key]["value"] . "-" . $results["monthselect"][$key]["value"] . "-" . $results["dayselect"][$key]["value"];


		$waiver = Waiver::create($results["firstname"][$key]["value"], $results["lastname"][$key]["value"], $results["gender"][$key]["value"], $results["phone"][$key]["value"], $results["zip"][$key]["value"], $birthday, $results["email"][$key]["value"], $results["emailYes"][$key]["value"], $results["textYes"][$key]["value"], $results["phone"][$key]["twilio"],$results["location_id"][$key]["value"]);
		if(!$waiver->success) {
			echo json_encode($waiver);
			//print_r($waiver);
			die(); //Stop processing, one of the waivers is bad.
		}
		//print_r($waiver);
	}
	$return = new Reck();
	$return->success(true);
	if(count($results["firstname"]) > 1) {
		$return->message("Waivers saved successfully.");
	} else {
		$return->message("Waiver saved successfully.");
	}
	echo json_encode($return->get());

} else {
	//We couldn't validate inputs successfully.
	echo json_encode($result);
}
?>
<?php
$https = true;
require_once 'includes/init.php';
$pageTitle = "Waiver";
$pageJS = "waiver";


//Check to see if the location is currently set in the session or cookie
locationRequired();

//TODO: Update add location_name to db, this was a quick add to get the new location running.
$location_Name = NULL;
if($_SESSION["location_id"] == 1){
	$location_Name = "Team Combat, Inc.";
} else if($_SESSION["location_id"] == 2){
	$location_Name = "Team Combat HH, LLC.";
}

include 'includes/header.php';

?>
  <section class="content-header tc-white">
    <div class="container">
      <div class="row">
        <div class="col-md-8 m-auto text-center">
          <h1>Waiver</h1>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">

	      <div class="col-sm-12 thankYou" style="text-align: center;"></div>

        <div class="col-sm-12 wholeForm">
          <h2>YOU ARE SIGNING A LEGAL DOCUMENT</h2>
          <p>HOLD HARMLESS, WAIVER & RELEASE.
            <br>
            <strong>DO NOT PRINT THIS FORM. THIS FORM MUST BE COMPLETED/SUBMITTED ONLINE.</strong>
            <br> EACH INDIVIDUAL MUST READ, COMPLETE AND SUBMIT THIS FORM PRIOR TO PARTICIPATION IN <?=$location_Name?> EVENTS.
            <br> This form will be valid for <?=$location_Name?> activities for 6 months from date of completion.</p>
        </div>
        <div class="col-sm-12 wholeForm">
          <h4>Minor Participation</h4>
          <p>
            <strong>ALL PARTICIPANTS UNDER THE AGE OF 18 AT THE TIME OF PARTICIPATION MUST HAVE A PARENT OR GUARDIAN COMPLETE THIS
              FORM.
            </strong>
          </p>
          <p>In order to participate in these activities, I the undersigned, agree and acknowledge that: As in any physical
            activity, there is risk of injury, both significant and insignificant, from participation in these activities,
            from the equipment used, fixture items or from other participants. Furthermore, <?=$location_Name?> assumes no
            liability for the presence of risks of participation or other natural risks. I freely assume all such risks both
            known and unknown and assume full responsibility for my participation. I agree to fully comply with all rules,
            regulations and policies during my participation and understand <?=$location_Name?> reserves the right to remove
            me from participation for failing to follow these rules, without refund. I hereby grant <?=$location_Name?> reproduction
            rights to use my name and likeness in all media, including the internet, for any purpose without further compensation
            to me. I understand I will begin receiving text and email News and Offers from <?=$location_Name?> and that I can
            unsubscribe at any time. I, for myself, and on behalf of my heirs, assigns, personal representatives and next
            of kin hereby release and hold harmless <?=$location_Name?>, it’s owners, employees, or the property owners from
            any and all liability for injury or disability, loss or damage to personal property. I acknowledge, understand
            and agree that I have read this release of liability and assume all risk associated with participating and that
			I sign this release of liability voluntarily and without inducement.</p>
			<div class="participant firstParticipant">
          <h4>Participant #<span class="participantNum">1</span></h4><span style="font-size:12px">Unique Email and/or Mobile # per participant required to get Birthday Gift</span>
            <div class="form-row">
              <div class="form-group has-feedback col-md-3">
                <label class="control-label">First Name</label>
                <input type="text" class="form-control" required="required" name="firstname[]" placeholder="First Name">
                <span class="form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback col-md-3">
                <label class="control-label">Last Name</label>
                <input type="text" class="form-control" required="required" name="lastname[]" placeholder="Last Name">
                <span class="form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback col-md-2">
                <label class="control-label">Gender</label>
                <select name="gender[]" class="form-control gender">
                  <option selected>Male</option>
                  <option>Female</option>
                </select>
                <span class="form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback col-md-2">
                <label class="control-label">Phone</label>
                <input type="tel" class="form-control phone" required="required" name="phone[]" placeholder="Phone">
                <span class="form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback col-md-2">
                <label class="control-label">Zip Code</label>
                <input type="text" class="form-control" pattern="[0-9]{5}" required="required" name="zip[]" placeholder="Zip Code">
                <span class="form-control-feedback"></span>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group has-feedback col-md-3">
                <label class="control-label">Email</label>
                <input type="text" class="form-control" required="required" name="email[]" id="email" placeholder="Email">
                <span class="form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback col-md-3">
                <label class="control-label">Verify Email</label>
                <input type="text" class="form-control" required="required" name="email2[]" id="email2" placeholder="Verify Email">
                <span class="form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback col-md-2">
                <label class="control-label" for="birthday">Birth Year</label>
                <select name="yearselect[]" class="form-control yearselect">
                  <option disabled selected>Year</option>
                </select>
                <span class="form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback col-md-2">
                <label class="control-label" for="birthday">Birth Month</label>
                <select name="monthselect[]" class="form-control monthselect">
                  <option disabled selected>Month</option>
                  <option value="01">January</option>
                  <option value="02">February</option>
                  <option value="03">March</option>
                  <option value="04">April</option>
                  <option value="05">May</option>
                  <option value="06">June</option>
                  <option value="07">July</option>
                  <option value="08">August</option>
                  <option value="09">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
                <span class="form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback col-md-2">
                <label class="control-label" for="birthday">Birth Day</label>
                <select name="dayselect[]" class="form-control dayselect">
                  <option disabled selected>Day</option>
                </select>
                <span class="form-control-feedback"></span>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <h5>I WOULD LIKE TO RECEIVE A BIRTHDAY GIFT, SPECIAL OFFERS, EXCITING NEWS AND MONTHLY PROMOTIONS VIA:</h5>
                <input type="checkbox" name="textYes[]" checked=""> Text <span style="font-size: 8px"> I agree to the <a href="http://terms.smsinfo.io/tc.php?id=962048" target="_blank" style="color: blue;"><u>Terms of Service & Privacy Policy</u></a>. 4 Msgs/Month. Reply STOP to cancel, HELP for help. Msg&data rates may apply.</span>
                <br>
                <input type="checkbox" name="emailYes[]" class="emailYes" disabled=""> Email
                <br>
                <input type="hidden" name="location_id[]" id="location" value="<?=$_SESSION["location_id"]?>">
                <span class="glyphicon form-control-feedback"></span>
              </div>
			</div>
</div>
			<div class="addMore"></div>
            <button type="submit" class="btn btn-primary btn-small float-left mr-3 mt-3 addParticipant">
              <i class="fas fa-plus"></i> Add Participant</button>
            <button type="submit" class="btn btn-primary btn-small float-sm-right mt-3 submitWaivers" data-loading-text="Processing
            <span class='glyphicon glyphicon-refresh gly-spin'>">Submit</button>
        </div>
      </div>
    </div>
  </section>


<?php include 'includes/footer.php'; ?>

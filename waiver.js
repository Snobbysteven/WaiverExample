$(document).ready(function() {

	$(".phone").mask('000000000000000');
	$("[name='zip[]']").mask('00000');
	$(".emailYes").prop("disabled", true);

	maxBirthYear = new Date();
	maxBirthYear.setDate(maxBirthYear.getDate() - (365 * 5));

	//Populate year drop down with 100 years from current date
	for(i = 0; i < 100; i++) {
		year = maxBirthYear.getFullYear() - i;
		$(".yearselect").append("<option value='" + year + "'>" + year + "</option>");
	}

	//Populate Day drop down with 31 days (Max days in a month)
	for(i = 0; i < 31; i++){
		day = i + 1;
		if(day < 10) {
			$(".dayselect").append("<option value='" + 0+(i+1) + "'>" + 0+(i+1) + "</option>");
		} else {
			$(".dayselect").append("<option value='" + (i+1) + "'>" + (i+1) + "</option>");
			}
	}

	$(".addParticipant").on("click", function() {

		var copy = $(".firstParticipant").clone();
		copy.removeClass("firstParticipant");
		copy.appendTo(".addMore");
		copy.find(".participantNum").after('<button class="btn btn-sm btn-danger removeParticipant">Remove</button>');

		$.each(copy.find('.form-control:lt(7)'), function() {
			$(this).val("");
			removeFeedback($(this));
		});
		$.each(copy.find("select"), function() {
			removeFeedback($(this));
		});
		copy.find(".issueText").remove();
		copy.find("[name='emailYes[]']").prop("disabled", true).prop("checked", false);
		copy.find("[name='textYes[]']").prop("checked", true);
		$(".participant").each(function(key, val) {
			$(this).find(".participantNum").html(key + 1);
			if(key > 0) {
				$(this).find(".participantNum").append(" - ");
			}
		});

	});

	$(document).on("click", ".removeParticipant", function() {
		$(this).parent().parent().remove();
		$(".participant").each(function(key, val) {
			$(this).find(".participantNum").html(key + 1);
			if(key > 0) {
				$(this).find(".participantNum").append(" - ");
			}
		});
	});

	$(document).on("keyup", "[name='email[]']", function(){

		var len = $(this).val().length;
		var inpt = $(this).parent().parent().parent().parent().find("[name='emailYes[]']");
		inpt.prop("disabled", len >= 2 ? false : true);

		if(len == 2) {
			inpt.prop("checked", true);
		} else if (inpt.prop("disabled")) {
			inpt.prop("checked", false);
		}
	});

	$(".submitWaivers").on("click", function() {
		var btn = $(this);
		btn.button("loading");
		var data = {
			firstname: [],
			lastname: [],
			gender: [],
			textYes: [],
			phone: [],
			emailYes: [],
			email: [],
			email2: [],
			dateselect: [],
			yearselect: [],
			monthselect: [],
			dayselect: [],
			zip: [],
			location_id: [],

		};


		$(".participant").each(function(key) {
			data.firstname.push($($("[name='firstname[]']")[key]).val());
			data.lastname.push($($("[name='lastname[]']")[key]).val());
			data.gender.push($($("[name='gender[]']")[key]).val());
			data.textYes.push($($("[name='textYes[]']")[key]).prop("checked"));
			data.phone.push($($("[name='phone[]']")[key]).val());
			data.emailYes.push($($("[name='emailYes[]']")[key]).prop("checked"));
			data.email.push($($("[name='email[]']")[key]).val());
			data.email2.push($($("[name='email2[]']")[key]).val());
			var date = $($("[name='yearselect[]']")[key]).val() + "/" + $($("[name='monthselect[]']")[key]).val() + "/" + $($("[name='dayselect[]']")[key]).val();
			data.dateselect.push(date);
			data.yearselect.push($($("[name='yearselect[]']")[key]).val());
			data.monthselect.push($($("[name='monthselect[]']")[key]).val());
			data.dayselect.push($($("[name='dayselect[]']")[key]).val());
			data.zip.push($($("[name='zip[]']")[key]).val());
			data.location_id.push($($("[name='location_id[]']")[key]).val());
		});

		$.ajax({
			type: "POST",
			url: "includes/post/waiver_submit",
			data: data
		})
		.fail(function(data) {
			console.log(data.responseText);
		})
		.done(function(data) {
			console.log(data);
			if(!data.success) {
				btn.button("reset");
				$(".thankYou").html("<h3 style='color: red;'>" + data.message + "</h3>");
				inputResults(data);
			} else {
				btn.button("reset");
				$(".wholeForm").hide();
				$(".participant").hide();
				$(".submitWaivers").hide();
				$(".addParticipant").hide();
				$(".thankYou").html("<h3>" + data.message + "</h3>");
				setTimeout(function() {
					location.reload();
				}, 4000);
			}
		});
	});
});

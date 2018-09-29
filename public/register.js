$(document).ready(function() {
	$.validator.setDefaults({
		errorPlacement: function(error, element) {}
	});

	setLastDate();

	getProvince();

	$('input[type="date"]').on("keyup keypress", function() {
		var inputedDate = new Date($(this).val());
		var date = new Date();
		if (date.getYear() < inputedDate.getYear()) {
			$("");
		}
	});

	$("#inputRegion").on("change", function() {
		var regionId = $(this)
			.find("option:selected")
			.val();
		getProvince(regionId);
	});

	$("#inputProvince").on("change", function() {
		getCity(
			$(this)
				.find("option:selected")
				.val()
		);
	});

	$("#inputCity").on("change", function() {
		getBarangay(
			$(this)
				.find("option:selected")
				.val()
		);
	});

	$("div.registrationtab").each(function(key, value) {
		if ($(value).data("active") === true) {
			$(value).show();
		}
	});

	$(document).keypress(function(event) {
		var keycode = event.keyCode ? event.keyCode : event.which;

		if (keycode == "13") {
			if ($("form#register").valid()) {
				$("#alert").hide();
				var id = $('div.registrationtab[data-active="true"]').attr("id");

				if ($("#" + $("#" + id).data("next")).data("next") === "") {
					showUserDetails();
					$("button.next").hide();
					$("button.register").show();
				}

				if ($("#" + id).data("next") == "insurancetab") {
					$("button.next").text("Submit");
				} else {
					$("button.next").text("Next");
				}

				if ($("#" + id).data("next") == "addresstab") {
					$.ajax({
						url: "register/checkUserIfExist",
						type: "POST",
						data: {
							first_name: $('input[name="first_name"]').val(),
							last_name: $('input[name="last_name"]').val(),
							birth_day: $('input[name="birth_day"]').val()
						},
						success: function(data) {
							if (data == "false") {
								nextTab(id);
								$("#alert-exist").hide();
							} else {
								$("#alert-exist").show();
							}
						}
					});
				} else {
					nextTab(id);
				}
			} else {
				$("#alert").show();
			}
		}
	});

	$("button.next").on("click", function(e) {
		if ($("form#register").valid()) {
			$("#alert").hide();
			var id = $('div.registrationtab[data-active="true"]').attr("id");

			if ($("#" + $("#" + id).data("next")).data("next") === "") {
				showUserDetails();
				$("button.next").hide();
				$("button.register").show();
			}

			if ($("#" + id).data("next") == "insurancetab") {
				$("button.next").text("Submit");
			} else {
				$("button.next").text("Next");
			}

			if ($("#" + id).data("next") == "addresstab") {
				$.ajax({
					url: "register/checkUserIfExist",
					type: "POST",
					data: {
						first_name: $('input[name="first_name"]').val(),
						last_name: $('input[name="last_name"]').val(),
						birth_day: $('input[name="birth_day"]').val()
					},
					success: function(data) {
						if (data == "false") {
							nextTab(id);
							$("#alert-exist").hide();
						} else {
							$("#alert-exist").show();
						}
					}
				});
			} else {
				nextTab(id);
			}
		} else {
			$("#alert").show();
		}
	});

	$("button.prev").on("click", function(e) {
		if ($("form#register").valid()) {
			var id = $('div.registrationtab[data-active="true"]').attr("id");

			$("button.next").show();
			$("button.register").hide();

			if ($("#" + id).data("prev") == "insurancetab") {
				$("button.next").text("Submit");
			} else {
				$("button.next").text("Next");
			}

			if ($("#" + id).data("prev") == "personaltab") {
				$(".prev").hide();
			}
			prevTab(id);
		} else {
			$("#alert").show();
		}
	});

	$('input[name="senior"]').on("click", function() {
		if ($(this).val() === "1") {
			$("#seniorId").attr("style", "display: block !important;");
		} else {
			$("#seniorId").attr("style", "display: none !important;");
		}
	});

	$('input[name="ctc"]').on("change", function() {
		if ($(this).is(":checked")) {
			$(".ctcinput").removeAttr("disabled");
		} else {
			$(".ctcinput").attr("disabled", "disabled");
		}
	});

	$('input[name="sss"]').on("change", function() {
		if ($(this).is(":checked")) {
			$(".sssinput").removeAttr("disabled");
		} else {
			$(".sssinput").attr("disabled", "disabled");
		}
	});

	$('input[name="tin"]').on("change", function() {
		if ($(this).is(":checked")) {
			$(".tininput").removeAttr("disabled");
		} else {
			$(".tininput").attr("disabled", "disabled");
		}
	});

	$('input[name="cedula"]').on("change", function() {
		if ($(this).is(":checked")) {
			$(".brgyinput").removeAttr("disabled");
		} else {
			$(".brgyinput").attr("disabled", "disabled");
		}
	});

	$('input[name="philhealth"]').on("change", function() {
		if ($(this).is(":checked")) {
			$(".phinput").removeAttr("disabled");
		} else {
			$(".phinput").attr("disabled", "disabled");
		}
	});

	$('input[name="nso"]').on("change", function() {
		if ($(this).is(":checked")) {
			$(".nsoinput").removeAttr("disabled");
		} else {
			$(".nsoinput").attr("disabled", "disabled");
		}
	});

	$('input[name="voters"]').on("change", function() {
		if ($(this).is(":checked")) {
			$(".votersinput").removeAttr("disabled");
		} else {
			$(".votersinput").attr("disabled", "disabled");
		}
	});

	$('input[name="passport"]').on("change", function() {
		if ($(this).is(":checked")) {
			$(".passportinput").removeAttr("disabled");
		} else {
			$(".passportinput").attr("disabled", "disabled");
		}
	});

	$('input[name="nbi"]').on("change", function() {
		if ($(this).is(":checked")) {
			$(".nbiinput").removeAttr("disabled");
		} else {
			$(".nbiinput").attr("disabled", "disabled");
		}
	});

	$('input[name="brgyCert"]').on("change", function() {
		if ($(this).is(":checked")) {
			$("#proof1").removeAttr("disabled");
			$("#proof2").removeAttr("disabled");
		} else {
			$("#proof1").attr("disabled", "disabled");
			$("#proof2").attr("disabled", "disabled");
		}
	});
});

function getBarangay(cityId = null) {
	var city =
		cityId === null
			? $("#inputCity")
					.find("option:selected")
					.val()
			: cityId;

	$.ajax({
		url: "api/getBarangay?city_id=" + city,
		type: "GET",
		success: function(data) {
			var selection = "";
			$("#inputCompanyBarangay").empty();

			$.each($.parseJSON(data), function(key, value) {
				selection +=
					'<option value="' +
					value.strBrgyCode +
					'">' +
					value.strDescription +
					"</option>";
			});

			$("#inputCompanyBarangay").append(selection);
		}
	});
}

function getProvince(regionId = null) {
	var region =
		regionId === null
			? $("#inputRegion")
					.find("option:selected")
					.val()
			: regionId;

	$.ajax({
		url: "api/getProvinces?region_id=" + region,
		type: "GET",
		success: function(data) {
			var selection = "";
			$("#inputProvince").empty();

			$.each($.parseJSON(data), function(key, value) {
				selection +=
					'<option value="' +
					value.strProvCode +
					'">' +
					value.strDescription +
					"</option>";
			});

			$("#inputProvince").append(selection);

			getCity();
		}
	});
}

function getCity(provinceId = null) {
	var province =
		provinceId === null
			? $("#inputProvince")
					.find("option:selected")
					.val()
			: provinceId;

	$.ajax({
		url: "api/getCity?province_id=" + province,
		type: "GET",
		success: function(data) {
			var selection = "";
			$("#inputCity").empty();

			$.each($.parseJSON(data), function(key, value) {
				selection +=
					'<option value="' +
					value.strCityMunCode +
					'">' +
					value.strDescription +
					"</option>";
			});

			$("#inputCity").append(selection);

			getBarangay();
		}
	});
}

function nextTab(id) {
	$(".prev").show();
	$("#" + id).hide();
	$("#" + id).attr("data-active", "false");
	$("#" + $("#" + id).data("next")).show();
	$("#" + $("#" + id).data("next")).attr("data-active", "true");
}

function prevTab(id) {
	$("#" + id).hide();
	$("#" + id).attr("data-active", "false");
	$("#" + $("#" + id).data("prev")).show();
	$("#" + $("#" + id).data("prev")).attr("data-active", "true");
}

function setLastDate() {
	var date = new Date();
	var year = date.getFullYear();
	var day = new Date(year, 12 + 1, 0).getDate();
	var lastDate = year + "-12-" + day;
	$('input[type="date"]').attr("max", lastDate);
}

function showUserDetails() {
	showPersonalDetails();
	showAddressDetails();
	showWorkDetails();
	showContactDetails();
	showFamilyDetails();
	showTaxDetails();
}

function showPersonalDetails() {
	$("#first_name_preview").text($('input[name="first_name"]').val());
	$("#last_name_preview").text($('input[name="last_name"]').val());
	$("#middle_name_preview").text($('input[name="middle_name"]').val());
	$("#suffix_name_preview").text($('input[name="suffix"]').val());
	$("#civil_status_preview").text(
		$("#inputCivil_status option:selected").text()
	);
	$("#birth_day_preview").text($('input[name="birth_day"]').val());
	$("#place_of_birth_preview").text($('input[name="place_of_birth"]').val());
	$("#citizenship_preview").text($("#inputCitizenship option:selected").text());
	$("#gender_preview").text($("#inputGender option:selected").text());
	$("#blood_type_preview").text($("#inputBloodType option:selected").text());
	$("#height_preview").text($('input[name="height"]').val());
	$("#weight_preview").text($('input[name="weight"]').val());
	$("#homeCountry_preview").text(
		$("#inputPersonalCountry option:selected").text()
	);
	$("#hairColor_preview").text($("#inputHairColor option:selected").text());
	$("#eyesColor_preview").text($("#inputEyesColor option:selected").text());
	$("#otherFeature_preview").text(
		$("#inputOtherFeature option:selected").text()
	);
	if ($('input[name="senior"]').val() == "0") {
		$("#senior_preview").text("No");
		$("#seniorCitizenNumber_preview").hide();
	} else {
		$("#senior_preview").text("Yes");
		$("#seniorCitizenNumber_preview").show();
		$("#seniorCitizenNumber_preview").text(
			$('input[name="seniorCitizenNumber"]').val()
		);
	}
}

function showAddressDetails() {
	$("#unitNo_preview").text($('input[name="unitNo"]').val());
	$("#numberStreet_preview").text($('input[name="numberStreet"]').val());
	$("#subdivision_preview").text($('input[name="subdivision"]').val());
	$("#barangay_preview").text(
		$("#inputCompanyBarangay option:selected").text()
	);
	$("#postal_code_preview").text($('input[name="postal_code"]').val());
}

function showWorkDetails() {
	$("#employementStatus_preview").text(
		$("#inputEmployement_status option:selected").text()
	);
	$("#companyName_preview").text($('input[name="companyName"]').val());
	$("#position_preview").text($('input[name="position"]').val());
	$("#country_preview").text($("#inputCountry option:selected").text());
	$("#region_preview").text($("#inputRegion option:selected").text());

	$("#province_preview").text($('input[name="province"]').val());
	$("#city_preview").text($('input[name="city"]').val());
	$("#companyBarangay_preview").text(
		$("#inputCompanyBarangay option:selected").text()
	);
	$("#companyUnit_preview").text($('input[name="companyUnit"]').val());
	$("#streetName_preview").text($('input[name="streetName"]').val());
	$("#companyPostalCode_preview").text(
		$('input[name="companyPostalCode"]').val()
	);
	$("#companyContact_preview").text($('input[name="companyContact"]').val());
}

function showContactDetails() {
	$("#homePhoneNumber_preview").text($('input[name="homePhoneNumber"]').val());
	$("#cellPhoneNumber_preview").text($('input[name="cellPhoneNumber"]').val());
	$("#emailAddress_preview").text($('input[name="emailAddress"]').val());
	$("#contactPerson_preview").text($('input[name="contactPerson"]').val());
	$("#contactPersonAddress_preview").text(
		$('input[name="contactPersonAddress"]').val()
	);
	$("#telephoneNumber_preview").text($('input[name="telephoneNumber"]').val());
}

function showFamilyDetails() {
	$("#spouseMaidenName_preview").text(
		$('input[name="spouseMaidenName"]').val()
	);
	$("#spouseBday_preview").text($('input[name="spouseBday"]').val());
	$("#fatherName_preview").text($('input[name="fatherName"]').val());
	$("#motherName_preview").text($('input[name="motherName"]').val());
	$("#child1_preview").text($('input[name="child1"]').val());
	$("#child2_preview").text($('input[name="child2"]').val());
	$("#child3_preview").text($('input[name="child3"]').val());
	$("#child4_preview").text($('input[name="child4"]').val());
	$("#child5_preview").text($('input[name="child5"]').val());
	$("#child6_preview").text($('input[name="child6"]').val());
	$("#child7_preview").text($('input[name="child7"]').val());
	$("#child8_preview").text($('input[name="child8"]').val());
	$("#child9_preview").text($('input[name="child9"]').val());
	$("#child10_preview").text($('input[name="child10"]').val());
}

function showTaxDetails() {
	if ($('input[name="ctc"]').val() == "0") {
		$("#stax_preview").hide();
	} else {
		$("#tax_preview").show();
		$("#ctcDateIssue_preview").text($('input[name="ctcDateIssue"]').val());
		$("#ctcNo_preview").text($('input[name="ctcNo"]').val());
		$("#placeIssue_preview").text($('input[name="placeIssue"]').val());
	}
}

$(document).ready(function() {
	$.validator.setDefaults({
		errorPlacement: function(error, element) {}
	});

	getProvince();

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

	$("button.next").on("click", function(e) {
		if ($("form#register").valid()) {
			$("#alert").hide();
			var id = $('div.registrationtab[data-active="true"]').attr("id");

			if ($("#" + $("#" + id).data("next")).data("next") === "") {
				$("button.next").hide();
				$("button.register").show();
			}

			$("#" + id).hide();
			$("#" + id).attr("data-active", "false");
			$("#" + $("#" + id).data("next")).show();
			$("#" + $("#" + id).data("next")).attr("data-active", "true");
		} else {
			$("#alert").show();
		}
	});

	$("button.prev").on("click", function(e) {
		var id = $('div.registrationtab[data-active="true"]').attr("id");

		if ($("#" + $("#" + id).data("prev")).data("prev") === "") {
			$("button.prev").attr("disabled", "disabled");
		}

		$("#" + id).hide();
		$("#" + id).attr("data-active", "false");
		$("#" + $("#" + id).data("prev")).show();
		$("#" + $("#" + id).data("prev")).attr("data-active", "true");
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
			$(".brgyCertinput").removeAttr("disabled");
		} else {
			$(".brgyCertinput").attr("disabled", "disabled");
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

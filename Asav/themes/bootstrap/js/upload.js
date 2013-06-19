/*
	Validates the form fields marked with the class 'validate'.
	This function performs a "is not empty" check.
 */
function Validate() {
	var isValid = true;
	// Enumerate all fields in the form
	var fields = $("#form .validate");
	for ( var i = 0; i < fields.length; i++) {
		if (fields.eq(i).val() == "") {
			isValid = false;
			fields.eq(i).addClass("error");
		} else {
			fields.eq(i).removeClass("error");
		}
	}

	return isValid;
};

/*
 * Executed when the page is fully loaded.
 */
$(function() {
	$(".row-upload").each(function() {
		var row = $(this);
		// Customize the file upload component
		with (row.find(".File")) {
			css('display', 'none');
			change(function() {
				row.find(".textFile").val($(this).val())
			});
		}
		with (row.find(".textFile")) {
			css('display', 'inline');
			keypress(function(e) {
				// Check if the pressed key is a \n or a \t
				var code = e.keyCode || e.which;
				if (code == 13 || code == 32) {
					e.preventDefault();
					row.find(".File").click();

				}
			});
			click(function() {
				row.find(".File").click();
			});
		}
	});
});
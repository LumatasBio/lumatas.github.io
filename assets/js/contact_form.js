
$(document).ready(function() {
//test
	$("#submit").click(function() {
	var name = $("#name").val();
	var email = $("#email").val();
	var message = $("#message").val();
	$("#returnmessage").empty(); // To empty previous error/success message.
	// Checking for blank fields.
	var varData = 'name=' + name + '&email=' + email + '&message=' + message;
	console.log(varData);
	if (name == '' || email == '') {
	alert("Please Fill Required Fields");
	} else {
	}
	// Returns successful data submission message when the entered information is stored in database.
	$.ajax({
		type: "POST",
		url: 'mail.php',
		data: varData,
		success: function() {
			alert("Success!")
		}
	})
	
	
	});
});
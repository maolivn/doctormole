$(document).ready(function()
{
	$("form").submit(function()
	{
		var form_name = $("#name").val();
		var form_email = $("#email").val();
		var form_message = $("#message").val();
		
		$("#response").load("contactform.php",{name:form_name, email:form_email, message:form_message});
		
		return false;
	});
});
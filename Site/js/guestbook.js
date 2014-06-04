// Content by Alexander Strobl
$(document).ready(function myFunction() {
	var url = "/scripts/ReadGuestbook.php";

	$.ajax(
	{
		type : 'post',
		url : url,
		dataType : 'json',
		success : function(data)
		{
			var SingleEntry = new Array(data.length);
			
			for(var i = 0; i < data.length; i++)
			{
				SingleEntry.push("<div class='basic-wrapper'><div class=' GBauthor'>" +  data[i]['benutzername'] + "</div><div class=' GBmessage'>" + data[i]['eintrag'] + "</div></div>");
			}
			
			var AllEntries = SingleEntry.join('');
			document.getElementById("data").innerHTML = AllEntries;
		}
	});	
});
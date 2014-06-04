// Content by Alexander Strobl
$(document).ready(function myFunction() {
	var url = "/scripts/ReadTopGuestbook.php";
	
	$.ajax(
	{
		type : 'post',
		url : url,
		dataType : 'json',
		success : function(data)
		{
			var SingleEntry = new Array(data.length);
			
			var Entries = data.length;
			if (Entries > 5)
			{
				Entries = 5;	
			}
			
			for(var i = 0; i < Entries; i++)
			{
				SingleEntry.push("<div class='GBTopEntry'><div class='GBTopauthor'>" +  data[i]['benutzername'] + "</div><div class='GBTopmessage'>" + data[i]['eintrag'] + "</div></div>");
			}
			
			var AllEntries = SingleEntry.join('');
			document.getElementById("databargb").innerHTML = AllEntries;
		}
	});
});

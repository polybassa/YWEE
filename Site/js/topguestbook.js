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
				SingleEntry.push("<div class='basic-wrapper-middle'><div class='GBauthor'>" +  data[i]['benutzername'] + "</div><div class='GBmessage'>" + data[i]['eintrag'] + "</div><hr class='lane'></div>");
			}
			
			var AllEntries = SingleEntry.join('');
			document.getElementById("databargb").innerHTML = AllEntries;
		}
	});
});

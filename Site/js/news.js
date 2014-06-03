
$(document).ready(function myFunction() {
	var url = "/scripts/ReadNews.php";
	
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
				SingleEntry.push("<div class='NewsEntry'><div class='Newsauthor'>" +  data[i]['benutzername'] + "</div><br><div class='Newsdate'>" + data[i]['zeit'] + "</div><br><div class='Newstopic'>" + data[i]['betreff'] +"</div><br><div class='Newsmessage'>" + data[i]['eintrag'] + "</div></div>");
			}
			
			var AllEntries = SingleEntry.join('');
			document.getElementById("data").innerHTML = AllEntries;
		}
	});
});
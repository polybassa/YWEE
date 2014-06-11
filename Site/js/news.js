
$(document).ready(function myFunction() {
    var url = "/scripts/ReadNews.php";

    $.ajax({
        type: 'post',
        url: url,
        dataType: 'json',
        cache:false,
        success: function(data)
        {
            var SingleEntry = new Array(data.length);
            for (var i = 0; i < data.length; i++)
            {
                SingleEntry.push("<div class='basic-wrapper'><div class='Newsauthor'>" + data[i]['benutzername'] + "</div><div class='Newsdate'>" + data[i]['zeit'] + "</div><div class='Newstopic'>" + data[i]['betreff'] + "</div><div class='Newsmessage'><div class='Newsinner' style='display: none;'>" + data[i]['nachricht'] + "</div><div class='Newsshow'>Nachricht zeigen</div></div></div>");
            }

            var AllEntries = SingleEntry.join('');
            document.getElementById("newsdata").innerHTML = AllEntries;

            $('.Newsshow').click(function() {
                $(this).prev().slideToggle();
                $(this).text($(this).text() === 'Nachricht zeigen' ? 'Nachricht verstecken' : 'Nachricht zeigen');
            });
        }
    });



});

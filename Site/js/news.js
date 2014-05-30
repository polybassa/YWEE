/*Ruft das WriteNews.php Script auf*/
{    $("#newsform").submit(function(e)
     {   e.preventDefault();
        $.post("/scripts/WriteNews.php", $("#newsform").serialize(),
		window.location.reload();
        });
    });
});

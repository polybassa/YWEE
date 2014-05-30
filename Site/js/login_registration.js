/* Autor: Daniel Tatzel */
/* Ruft das PHP Login SCript auf und übergibt den Benutzernamen und das Passwort via POST */
$(document).ready(function()
{    $("#loginform").submit(function(e)
     {   e.preventDefault();
        $.post("/scripts/login.php", $("#loginform").serialize(),
        function(msg) {
            /* msg ist leer, außer der Login ist fehlgeschlagen, dann wird der Fehler ausgegeben */
            if ( msg.length > 2 ) { alert(msg); }
            /* Nur bei erfolgreichem Login oder Logout wird die Seite neu geladen */
            if ( msg.length < 5 ) { window.location.reload(); }
        });
    });
});

/* Autor: Daniel Tatzel */
/* Ruft das PHP Register SCript auf und übergibt die Daten via POST */
$(document).ready(function()
{   $("#registerform").submit(function(e)
    {   e.preventDefault();
        $.post("/scripts/CreateUser.php", $("#registerform").serialize(),
        function(msg) {
            /* msg ist leer, außer der Login ist fehlgeschlagen, dann wird der Fehler ausgegeben */
            if ( msg.length > 2 ) { alert(msg); }
            /* Nur bei erfolgreichem Login oder Logout wird die Seite neu geladen */
            if ( msg.length < 5 ) {
                $.post( "/scripts/GetLang.php", function( lang ) {
                    if ( lang.length > 2 ) { alert("Registration was successful!"); location.replace('index.php'); }
                    else { alert("Registrierung war erfolgreich!"); location.replace('index.php'); }
                }); }
        });
    });
});

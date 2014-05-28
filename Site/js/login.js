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

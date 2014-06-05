/* Autor: Daniel Tatzel */
/* Ruft das PHP Register Script auf und übergibt die Daten via POST */
$(document).ready(function()
{
    $("#registerform").submit(function(e)
    {
        e.preventDefault();
        $('[name="Formular"]').validate({
            rules:{
                geschlecht:{
                    min: 0
                },
                jahr:{
                    min: 1
                }
                
            },
            messages: {
                jahr: {
                    min: jQuery.validator.format("Please enter a valid Year.")
                },
                geschlecht: {
                    min: jQuery.validator.format("Please select a gender.")
                }                
            },
            invalidHandler: function(event, validator) {
// 'this' refers to the form
                var errors = validator.numberOfInvalids();
                if (errors) {
                    var message = errors == 1
                            ? 'You missed 1 field. It has been highlighted'
                            : 'You missed ' + errors + ' fields. They have been highlighted';
                    $("div.error span").html(message);
                    $("div.error").show();
                } else {
                    $("div.error").hide();
                }
            },
            submitHandler: function(form) {
                $.post("/scripts/CreateUser.php", $("#registerform").serialize(),
                        function(msg) {
                            /* msg ist leer, außer der Login ist fehlgeschlagen, dann wird der Fehler ausgegeben */
                            if (msg.length > 2) {
                                alert(msg);
                            }
                            /* Nur bei erfolgreichem Login oder Logout wird die Seite neu geladen */
                            if (msg.length < 5) {
                                $.post("/scripts/GetLang.php", function(lang) {
                                    if (lang.length > 2) {
                                        alert("Registration was successful!");
                                        location.replace('index.php');
                                    }
                                    else {
                                        alert("Registrierung war erfolgreich!");
                                        location.replace('index.php');
                                    }
                                });
                            }
                        });
                form.submit();
            }
        });
    });
    
    jQuery.extend(jQuery.validator.messages, {
        required: "This field is required by us!.",
        remote: "Please fix this field.",
        email: "Please enter a valid email address.",
        url: "Please enter a valid URL.",
        date: "Please enter a valid date.",
        dateISO: "Please enter a valid date (ISO).",
        number: "Please enter a valid number.",
        digits: "Please enter only digits.",
        creditcard: "Please enter a valid credit card number.",
        equalTo: "Please enter the same value again.",
        tel: "Please enter a valid phone number",
        accept: "Please enter a value with a valid extension.",
        maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
        minlength: jQuery.validator.format("Please enter at least {0} characters."),
        rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
        range: jQuery.validator.format("Please enter a value between {0} and {1}."),
        max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
        min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
    });
});



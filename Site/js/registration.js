/* Autor: Daniel Tatzel */
/* Ruft das PHP Register Script auf und übergibt die Daten via POST */
$(document).ready(function()
{

    $.post("/scripts/GetLang.php", function(lang) {
        if (lang.length > 2) {

            $("#registerform").submit(function(e)
            {
                e.preventDefault();
                $('[name="Formular"]').validate({
                    rules: {
                        geschlecht: {
                            min: 0
                        },
                        tag: {
                            min: 1
                        },
                        jahr: {
                            min: 1
                        },
                        month: {
                            min: 1
                        },
                        telefon: {
                            phoneUS: true
                        }

                    },
                    messages: {
                        tag: {
                            min: jQuery.validator.format("Please enter a valid Date.")
                        },
                        month: {
                            min: jQuery.validator.format("Please enter a valid Date.")
                        },
                        telefon: {
                            phoneUS: "Please enter a valid phone number"
                        },
                        jahr: {
                            min: jQuery.validator.format("Please enter a valid Date.")
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

                                        alert("Registration was successful!");
                                        location.replace('index.php');


                                    }
                                });
                        //form.submit();
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
                accept: "Please enter a value with a valid extension.",
                maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
                minlength: jQuery.validator.format("Please enter at least {0} characters."),
                rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
                range: jQuery.validator.format("Please enter a value between {0} and {1}."),
                max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
                min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
            });

        }
        else {

            $("#registerform").submit(function(e)
            {
                e.preventDefault();
                $('[name="Formular"]').validate({
                    rules: {
                        geschlecht: {
                            min: 0
                        },
                        tag: {
                            min: 1
                        },
                        jahr: {
                            min: 1
                        },
                        month: {
                            min: 1
                        },
                        telefon: {
                            phoneUS: true
                        }

                    },
                    messages: {
                        tag: {
                            min: jQuery.validator.format("Bitte ein g&#252;ltiges Datum eingeben.")
                        },
                        month: {
                            min: jQuery.validator.format("Bitte ein g&#252;ltiges Datum eingeben.")
                        },
                        telefon: {
                            phoneUS: "Bitte eine Telefonnummer eingeben"
                        },
                        jahr: {
                            min: jQuery.validator.format("Bitte ein g&#252;ltiges Datum eingeben.")
                        },
                        geschlecht: {
                            min: jQuery.validator.format("Bitte ein Geschlecht w�hlen.")
                        }
                    },
                    invalidHandler: function(event, validator) {
// 'this' refers to the form
                        var errors = validator.numberOfInvalids();
                        if (errors) {
                            var message = errors == 1
                                    ? 'Du hast ein Feld vergessen es wurde hervorgehoben'
                                    : 'Du hast ' + errors + ' Felder vergessen. Diese wurden hervorgehoben';
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

                                        alert("Registrierung war Erfolgreich!");
                                        location.replace('index.php');


                                    }
                                });
                        //form.submit();
                    }
                });
            });

            jQuery.extend(jQuery.validator.messages, {
                required: "Wir ben&#246;tigen dieses Feld.",
                remote: "Bitte richtigen Wert eingeben.",
                email: "Bitte eine g&#252;ltige Email Addresse angeben.",
                url: "Bitte eine g&#252;tltige URL angeben.",
                date: "Bitte ein g&#252;ltiges Datum angeben.",
                dateISO: "Bitte ein g&#252;ltiges Datum angeben (ISO).",
                number: "Bitte eine g&#252;ltige Zahl eingeben.",
                digits: "Bitte nur Ziffern eingeben.",
                creditcard: "Bitte eine g&#252;ltige Kreditkartennummer eingeben.",
                equalTo: "Bitte das selbe nochmal eingeben.",
                accept: "Please enter a value with a valid extension.",
                maxlength: jQuery.validator.format("Bitte nicht mehr als {0} Zeichen."),
                minlength: jQuery.validator.format("Bitte nicht weniger als {0} Zeichen."),
                rangelength: jQuery.validator.format("Bitte zwischen {0} und {1} Zeichen."),
                range: jQuery.validator.format("Bitte einen Wert zwischen {0} und {1}."),
                max: jQuery.validator.format("Bitte weniger oder genau {0}."),
                min: jQuery.validator.format("Bitte mehr oder genau {0}.")
            });
        }
    });

});



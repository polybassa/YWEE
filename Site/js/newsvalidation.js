/* Autor: Daniel Tatzel */
/* Ruft das PHP Register Script auf und Ã¼bergibt die Daten via POST */
$(document).ready(function()/*Bei Aufruf der Seite ausfuehren*/
{


    $.post("/scripts/GetLang.php", function(lang) {/*Aufruf PHP Script um vom Nutzer gewaehlte Sprache zuerkennen*/
        if (lang.length > 2) {  /*Wenn Englisch wird dieser Teil genutzt*/
            $("#newsform").validate({/*Beginn der Validation */
                errorPlacement: function(error, element) {/*Manuelle Postionierung der Fehlermeldungen */
                    error.insertBefore(element);/*Position vor dem Fehlerhaften Element*/
                },
                rules: {/*Regeln fuer die Validation*/
                    betreff: {
                        requierd: true/*benöoetigt*/
                    },
                    nachrichtentext: {
                        requierd: true/*Benoetigt*/
                    }
                },
                invalidHandler: function(event, validator) {/*Ausgabe der Fehler*/
                    var errors = validator.numberOfInvalids();/*Anzahl der Fehler*/
                    if (errors) {
                        var message = (errors === 1) ? 'You missed 1 field. It has been highlighted' : 'You missed ' + errors + ' fields. They have been highlighted';
                        $("div.error span").html(message);
                        $("div.error").show();
                        alert(message.toString());/*Alert mit Anzahl der Fehler*/
                    } else {
                        $("div.error").hide();
                    }
                },
                submitHandler: function(form) {/*Wenn Fehlerfrei*/
                    $.post("/scripts/WriteNews.php", $("#newsform").serialize(),/*Daten an PHP Script uebergeben*/
                            function(msg) {
                                /* msg ist leer, ausser fehlgeschlag, dann wird der Fehler ausgegeben */
                                if (msg.length > 2) {
                                    alert(msg.toString());
                                }
                                /* Nur bei erfolgreicher Uebertragung wird die Seite neu geladen */
                                if (msg.length < 5) {
                                    alert("Your news were submitted.");
                                    location.replace('index.php');/*Weiterleitung auf der Seite*/
                                }
                            });
                }
            });
            jQuery.extend(jQuery.validator.messages, {/*Veraenderungen an den Standartfehlermeldungen Englisch*/
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
        else {/*ab hier der deutsche Teil*/

            $("#newsform").validate({
                errorPlacement: function(error, element) {/*Manuelle Postionierung der Fehlermeldungen */

                    error.insertBefore(element);/*Manuelle Postionierung der Fehlermeldungen */
                },
                rules: {/*Regeln fuer die Validation*/
                    betreff: {
                        requierd: true/*Benoetigt*/
                    },
                    nachrichtentext: {
                        requierd: true/*Benoetigt*/
                    }
                },
                invalidHandler: function(event, validator) {/*Ausgabe der Fehler*/
                    var errors = validator.numberOfInvalids();/*Anzahl der Fehler*/
                    if (errors) {/*Anzahl der Fehler*/
                        var message = (errors == 1) ? 'Du hast ein Feld vergessen es wurde hervorgehoben' : 'Du hast ' + errors + ' Felder vergessen. Diese wurden hervorgehoben';
                        alert(message.toString());
                        $("div.error span").html(message);
                        $("div.error").show();
                    } else {
                        $("div.error").hide();
                    }
                },
                submitHandler: function(form) {/*Wenn Fehlerfrei*/
                    $.post("/scripts/WriteNews.php", $("#newsform").serialize(),/*Daten an PHP Script uebergeben*/
                       /* msg ist leer, ausser der Login ist fehlgeschlagen, dann wird der Fehler ausgegeben */      
                        function(msg) {
                                /* Bei Fehler, Nachicht vom Server ausgeben */
                                if (msg.length < 5) {
                                    alert("Ihre Nachricht wurde versandt.");
                                    location.replace('index.php');
                                /* Nur bei erfolgreicher Uebertragung wird die Seite neu geladen */
                                
                                } else {
                                    alert(msg.toString());
                                }
                            });
                }
            });
            jQuery.extend(jQuery.validator.messages, {/*Veraenderungen an den Standartfehlermeldungen Deutsch*/
                required: "Wir ben&ouml;tigen dieses Feld.",
                remote: "Bitte richtigen Wert eingeben.",
                email: "Bitte eine g&uuml;ltige Email Addresse angeben.",
                url: "Bitte eine g&uuml;tltige URL angeben.",
                date: "Bitte ein g&uuml;ltiges Datum angeben.",
                dateISO: "Bitte ein g&uuml;ltiges Datum angeben (ISO).",
                number: "Bitte eine g&uuml;ltige Zahl eingeben.",
                digits: "Bitte nur Zahlen eingeben.",
                creditcard: "Bitte eine g&uuml;ltige Kreditkartennummer eingeben.",
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



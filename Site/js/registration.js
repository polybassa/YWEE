/* Autor: Daniel Tatzel */
/* Ruft das PHP Register Script auf und Ã¼bergibt die Daten via POST */
$(document).ready(function()
{


    $.post("/scripts/GetLang.php", function(lang) {/*Aufruf PHP Script um vom Nutzer gewaehlte Sprache zuerkennen*/
        if (lang.length > 2) {  /*Wenn Englisch wird dieser Teil genutzt*/
            $.validator.addMethod('phone', function(value) { /*Veränderung an der PhoneUS Methode für deutsche Nummern */
                var numbers = value.split(/\d/).length - 1;
                return (2 <= numbers && numbers <= 15 && value.match(/^(\+){0,1}(\d|\s|\(|\)){2,15}$/));/*minimal 2 und maximal 15 Ziffern erlaubt, nur Zahlen*/
            }, 'Please enter a valid phone number');/*Fehlermeldungstext*/

            $("#registerform").validate({
                errorPlacement: function(error, element) {/*Manuelle Postionierung der Fehlermeldungen */
                    if (element.attr("name") === "jahr") {/*Wenn Fehler bei Jahr Fehler im vorheriges Label schreiben*/
                        element.prev('label').replaceWith(error);
                    }
                    else if (element.attr("name") === "monat") {
                        element.prev('label').replaceWith(error);/*Wenn Fehler bei Monat Fehler im vorheriges Label schreiben*/
                    } else {
                        error.insertBefore(element);/*Fehlerlabel vor das Fehlerhafte Element schreiben*/
                    }
                },
                rules: {/*Regeln fuer die Validation*/
                    plz: {
                        number: true, /*Darf nur Zahlen enthalten*/
                        minlength: 5, /*Minimale Laenge 5*/
                        maxlength: 5/*Maximale Laenge 5*/
                    },
                    geschlecht: {
                        min: 0 /*Geschlechtüberprüfung Wenn nichts ausgewählt =-1, m/w > 0*/
                    },
                    tag: {
                        min: 1 /*Überprüfung des Datums - Tag wenn nichts gewählt -1, sonst >=1*/
                    },
                    jahr: {
                        min: 1/*Überprüfung des Datums - Jagr wenn nichts gewählt -1, sonst >=1*/
                    },
                    monat: {
                        min: 1/*Überprüfung des Datums - Monat wenn nichts gewählt -1, sonst >=1*/
                    },
                    telefon: {
                        phone: true/*Muss Telefonnummer sein*/
                    },
                    hausnummer: {
                        number: true/*Muss Zahl sein*/
                    }
                },
                messages: {/*Spezielle Texte fuer bestimmte Fehleingaben*/
                    plz: {
                        number: "A Postcode can only contain numbers",
                        minlength: jQuery.validator.format("A Postcode has only 5 digits."),
                        maxlength: jQuery.validator.format("A Postcode has only 5 digits.")
                    },
                    tag: {
                        min: jQuery.validator.format("Please enter a valid Date.")
                    },
                    monat: {
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
                invalidHandler: function(event, validator) {/*Ausgabe der Fehler*/
                    var errors = validator.numberOfInvalids();/*Anzahl der Fehler*/
                    if (errors) {/*Wenn Fehler vorhanden Alert mit Anzahl*/
                        var message = (errors === 1) ? 'You missed 1 field. It has been highlighted' : 'You missed ' + errors + ' fields. They have been highlighted';
                        $("div.error span").html(message);
                        $("div.error").show();
                        alert(message.toString());/*Alert mit Anzahl der Fehler*/
                    } else {
                        $("div.error").hide();
                    }
                },
                submitHandler: function(form) {/*Wenn Fehlerfrei*/
                    $.post("/scripts/CreateUser.php", $("#registerform").serialize(), /*Daten an PHP Script übergeben*/
                            function(msg) {
                                /* msg ist leer, auÃŸer fehlgeschlag, dann wird der Fehler ausgegeben */
                                if (msg.length > 2) {
                                    alert(msg.toString());
                                }
                                /* Nur bei erfolgreicher Registrierung wird die Seite neu geladen */
                                if (msg.length < 5) {
                                    alert("The registration was successful, please wait till you get unlocked.");/*Mitteilung über den Erfolg der Registrierung*/
                                    location.replace('index.php');/*Weiterleitung auf der Seite*/
                                }
                            });
                }
            });
            jQuery.extend(jQuery.validator.messages, {/*Veränderungen an den Standartfehlermeldungen Englisch*/
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
            $.validator.addMethod('phone', function(value) {/*Veränderung an der PhoneUS Methode für deutsche Nummern */
                var numbers = value.split(/\d/).length - 1;
                return (2 <= numbers && numbers <= 15 && value.match(/^(\+){0,1}(\d|\s|\(|\)){2,15}$/));
            }, 'Bitte eine g&uuml;ltige Telefonnummer angeben.');/*Fehlermeldungstext*/

            $("#registerform").validate({
                errorPlacement: function(error, element) {
                    if (element.attr("name") === "monat") {/*Wenn Fehler bei Monat Fehler im vorheriges Label schreiben*/
                        element.prev('label').replaceWith(error);
                    }
                    else if (element.attr("name") === "jahr") {/*Wenn Fehler bei Jahr Fehler im vorheriges Label schreiben*/
                        element.prev('label').replaceWith(error);
                    } else {
                        error.insertBefore(element);/*Fehlerlabel vor das Fehlerhafte Element schreiben*/
                    }
                },
                rules: {
                    plz: {
                        number: true, /*Darf nur Zahlen enthalten*/
                        minlength: 5, /*Minimale Laenge 5*/
                        maxlength: 5/*Maximale Laenge 5*/
                    },
                    geschlecht: {
                        min: 0/*Geschlechtüberprüfung Wenn nichts ausgewählt =-1, m/w > 0*/
                    },
                    tag: {
                        min: 1/*Überprüfung des Datums - Tag wenn nichts gewählt -1, sonst >=1*/
                    },
                    jahr: {
                        min: 1/*Überprüfung des Datums - Jagr wenn nichts gewählt -1, sonst >=1*/
                    },
                    monat: {
                        min: 1/*Überprüfung des Datums - Monat wenn nichts gewählt -1, sonst >=1*/
                    },
                    telefon: {
                        phone: true/*Muss Telefonnummer sein*/
                    },
                    hausnummer: {
                        number: true/*Muss Zahl sein*/
                    }
                },
                messages: {/*Spezielle Texte fuer bestimmte Fehleingaben*/
                    plz: {
                        number: "Eine Postleitzahl besteht nur aus Zahlen.",
                        minlength: jQuery.validator.format("Eine Postleitzahl hat nur 5 Stellen."),
                        maxlength: jQuery.validator.format("Eine Postleitzahl hat nur 5 Stellen.")
                    },
                    tag: {
                        min: jQuery.validator.format("Bitte ein g&uuml;ltiges Datum eingeben.")
                    },
                    monat: {
                        min: jQuery.validator.format("Bitte ein g&uuml;ltiges Datum eingeben.")
                    },
                    telefon: {
                        phoneUS: "Bitte eine Telefonnummer eingeben"
                    },
                    jahr: {
                        min: jQuery.validator.format("Bitte ein g&uuml;ltiges Datum eingeben.")
                    },
                    geschlecht: {
                        min: jQuery.validator.format("Bitte ein Geschlecht w&auml;hlen.")
                    }
                },
                invalidHandler: function(event, validator) {/*Ausgabe der Fehler*/
                    var errors = validator.numberOfInvalids();/*Anzahl der Fehler*/
                    if (errors) {/*Wenn Fehler vorhanden Alert mit Anzahl*/
                        var message = (errors == 1) ? 'Du hast ein Feld vergessen es wurde hervorgehoben' : 'Du hast ' + errors + ' Felder vergessen. Diese wurden hervorgehoben';
                        alert(message.toString());
                        $("div.error span").html(message);
                        $("div.error").show();
                    } else {
                        $("div.error").hide();
                    }
                },
                submitHandler: function(form) {/*Wenn Fehlerfrei*/
                    $.post("/scripts/CreateUser.php", $("#registerform").serialize(), /*Daten an PHP Script übergeben*/
                            function(msg) {
                                /* msg ist leer, auÃŸer fehlgeschlag, dann wird der Fehler ausgegeben */
                                if (msg.length > 2) {
                                    alert(msg.toString());
                                }
                                /* Nur bei erfolgreicher Registrierung wird die Seite neu geladen */
                                if (msg.length < 5) {
                                    alert("Die Registrierung war erfolgreich, haben Sie Geduld bis Sie freigeschaltet wurden");/*Mitteilung über den Erfolg der Registrierung*/
                                    location.replace('index.php');/*Weiterleitung auf der Seite*/
                                }
                            });
                }
            });
                /*Veränderungen an den Standartfehlermeldungen Deutsch*/
            jQuery.extend(jQuery.validator.messages, {
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



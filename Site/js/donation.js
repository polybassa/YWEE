/* Autor Maxi Schrï¿½ter */
/* Ruft das PHP Register Script auf und Ã¼bergibt die Daten via POST */
$(document).ready(function()
{

    $.post("/scripts/GetLang.php", function(lang) {/*Aufruf PHP Script um vom Nutzer gewaehlte Sprache zuerkennen*/
        if (lang.length > 2) {/*Wenn Englisch wird dieser Teil genutzt*/
            $.validator.addMethod('positiveNumber',/*Methode um Negative Zahlen zu verhindern*/
                    function(value) {
                        return Number(value) > 0;/*True wenn Wert > 0*/
                    }, 'Enter a positive value or more than 0.');/*Fehlermeldungstext*/
            $("#paymentform").validate({
                errorPlacement: function(error, element) {
                    if (element.attr("name") === "jahr") {/*Wenn Fehler bei Jahr Fehler im vorheriges Label schreiben*/
                        element.prev('label').replaceWith(error);
                    } else {
                        error.insertBefore(element);/*Fehlerlabel vor das Fehlerhafte Element schreiben*/
                    }
                },
                rules: {/*Regeln fuer die Validation*/
                    kreditkartennummer: {
                        creditcard: true/*Muss Kreditkarte sein*/
                    },
                    pruefziffer: {
                        maxlength: 4,/*Maximal 4 Ziffern*/
                        minlength: 3,/*minimal 3 Ziffern*/
                        number: true/*muss Zahl sein*/
                    },
                    betrag: {
                        number: true,/*Muss Zahl sein*/
                        
                        positiveNumber: true/*muss postiv sein*/
                    },
                    jahr: {
                        min: 1/*Überprüfung des Datums - Jahr wenn nichts gewählt -1, sonst >=1*/
                    },
                    monat: {
                        min: 1/*Überprüfung des Datums - Monat wenn nichts gewählt -1, sonst >=1*/
                    }
                },
                messages: {/*Spezielle Texte fuer bestimmte Fehleingaben*/
                    
                    monat: {
                        min: jQuery.validator.format("Please enter a valid Date.")
                    },
                    jahr: {
                        min: jQuery.validator.format("Please enter a valid Date.")
                    }
                },
                invalidHandler: function(event, validator) {/*Ausgabe der Fehler*/
                    // 'this' refers to the form
                    var errors = validator.numberOfInvalids();/*Anzahl der Fehler*/
                    if (errors) {/*Wenn Fehler vorhanden Alert mit Anzahl*/
                        var message = errors == 1
                                ? 'You missed 1 field. It has been highlighted'
                                : 'You missed ' + errors + ' fields. They have been highlighted';
                        $("div.error span").html(message);
                        $("div.error").show();
                        alert(message.toString());/*Alert mit Anzahl der Fehler*/
                    } else {
                        $("div.error").hide();
                    }
                },
                submitHandler: function(form) {/*Wenn Fehlerfrei*/
                    $.post("/scripts/CreditCardInfo.php", $("#paymentform").serialize(),/*Daten an PHP Script übergeben*/
                            function(msg) {
                                /* msg ist leer, ausser bei fehlgeschlag, dann wird der Fehler ausgegeben */
                                if (msg.length > 2) {
                                    alert(msg.toString());
                                }
                                /* Nur bei erfolgreichem Spenden wird die Seite neu geladen */
                                if (msg.length < 5) {
                                    alert("We thank you for your donation.");/*Mitteilung über Erfolg der Spende*/
                                    location.replace('index.php');/*Weiterleitung auf der Seite*/
                                }
                            });
                }
            });
            jQuery.extend(jQuery.validator.messages, {/*Ueberschreiben der Standartmeldungen Englisch*/
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
        else {/*Wenn Deutsch wird dieser Teil genutzt*/
            $.validator.addMethod('positiveNumber',/*Methode um Negative Zahlen zu verhindern*/
                    function(value) {
                        return Number(value) > 0;/*True wenn Wert > 0*/
                    }, 'Nur positive Betr&auml;ge oder mehr als Null.');/*Fehlermeldungstext*/
            $("#paymentform").validate({
                errorPlacement: function(error, element) {


                    if (element.attr("name") === "jahr") {
                        element.prev('label').replaceWith(error);/*Wenn Fehler bei Jahr Fehler im vorheriges Label schreiben*/
                    } else {
                        error.insertBefore(element);/*Fehlerlabel vor das Fehlerhafte Element schreiben*/
                    }
                },
                rules: {
                    kreditkartennummer: {
                        creditcard: true/*Muss Kreditkarte sein*/
                    },
                    pruefziffer: {
                        maxlength: 4,/*Maximal 4 Ziffern*/
                        minlength: 3,/*minimal 3 Ziffern*/
                        number: true/*muss Zahl sein*/
                    },
                    betrag: {
                        number: true,/*Muss Zahl sein*/
                        positiveNumber: true/*muss postiv sein*/
                    },
                    jahr: {
                        min: 1/*Überprüfung des Datums - Jahr wenn nichts gewählt -1, sonst >=1*/
                    },
                    monat: {
                        min: 1/*Überprüfung des Datums - Monat wenn nichts gewählt -1, sonst >=1*/
                    }
                },
                messages: {/*Spezielle Texte fuer bestimmte Fehleingaben*/
                    
                    monat: {
                        min: jQuery.validator.format("Bitte ein g&uuml;ltiges Datum eingeben.")
                    },
                    jahr: {
                        min: jQuery.validator.format("Bitte ein g&uuml;ltiges Datum eingeben.")
                    }
                },
                invalidHandler: function(event, validator) {/*Ausgabe der Fehler*/
// 'this' refers to the form
                    var errors = validator.numberOfInvalids();/*Anzahl der Fehler*/
                    if (errors) {/*Wenn Fehler vorhanden Alert mit Anzahl*/
                        var message = errors == 1
                                ? 'Du hast ein Feld vergessen es wurde hervorgehoben'
                                : 'Du hast ' + errors + ' Felder vergessen. Diese wurden hervorgehoben';
                        $("div.error span").html(message);
                        $("div.error").show();
                        alert(message.toString());/*Alert mit Anzahl der Fehler*/
                    } else {
                        $("div.error").hide();
                    }
                },
                submitHandler: function(form) {
                    $.post("/scripts/CreditCardInfo.php", $("#paymentform").serialize(),
                            function(msg) {
                                /* msg ist leer, ausser fehlgeschlag, dann wird der Fehler ausgegeben */
                                if (msg.length > 2) {
                                    alert(msg.toString());
                                }
                                /* Nur bei erfolgreichem Spenden wird die Seite neu geladen */
                                if (msg.length < 5) {
                                    alert("Wir bedanken uns fuer Ihre Spende");/*Mitteilung über Erfolg der Spende*/
                                    location.replace('index.php');/*Weiterleitung auf der Seite*/
                                }
                            });
                }
            });
            jQuery.extend(jQuery.validator.messages, {/*Überschreiben der Standartmeldungen Deutsch*/
                required: "Wir ben&ouml;tigen dieses Feld.",
                remote: "Bitte richtigen Wert eingeben.",
                email: "Bitte eine g&uuml;ltige Email Addresse angeben.",
                url: "Bitte eine g&uuml;tltige URL angeben.",
                date: "Bitte ein g&uuml;ltiges Datum angeben.",
                dateISO: "Bitte ein g&uuml;ltiges Datum angeben (ISO).",
                number: "Bitte eine g&uuml;ltige Zahl eingeben.",
                digits: "Bitte nur Ziffern eingeben.",
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



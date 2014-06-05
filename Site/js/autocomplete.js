
/*
 * author: Nils Weiss
 * script for autocompletion of searchfunction
 * 
 */

$.widget("custom.catcomplete", $.ui.autocomplete, {
    _renderMenu: function(ul, items) {
        var that = this,
                currentCategory = "";
        $.each(items, function(index, item) {

            if (item.typ != currentCategory) {
                var temptyp;
                if (item.typ === "user") {
                    temptyp = "Benutzer";
                } else if (item.typ === "location") {
                    temptyp = "Wohnort";
                } else {
                    temptyp = "Fach"
                }
                ul.append("<li class='ui-autocomplete-category'>" + temptyp + "</li>");
                currentCategory = item.typ;
            }
            that._renderItemData(ul, item);
        });
    }
});


$.ui.autocomplete.prototype._renderItem = function(ul, item) {
    var re = new RegExp(this.term, "i");
    var t = item.value.replace(re, "<span style='font-weight:bold;color:#3366cc;'>" + this.term + "</span>");
    return $("<li></li>")
            .data("item.autocomplete", item)
            .append("<a>" + t + "</a>")
            .appendTo(ul);
};

$(function() {
    $('[name="search"]').catcomplete({
        source: "/scripts/autocomplete.php",
        minLength: 2,
        open: function(event, ui) {
            $(".ui-autocomplete").mCustomScrollbar({
                scrollButtons: {
                    enable: true,
                    scrollInertia: 600,
                    autoDraggerLength: false
                }
            });
            $(".ui-autocomplete").autocomplete("enable");
        },
        select: function(event, ui) {
            var url = ui.item.id;
            var value = ui.item.value;
            var typ = ui.item.typ;
            if (url != '#') {
                //location.href = url;
                $('[name="search"]').val(value);
                $('[name="valueTyp"]').val(typ);
                $('#searchform').attr('action', url);
                $('#searchform').submit();
            }
        },
        html: true, // optional (jquery.ui.autocomplete.html.js required)
    });
});

$('[name="search"]').on('focus', function() {
    $('[name="search"]').catcomplete("search");
});



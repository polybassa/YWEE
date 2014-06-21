/*
 * author: Nils Weiss
 * script for autocompletion of searchfunction
 * 
 */

/* 
 * extend the ui.autocomplete function with a custom widget
 */
$.widget("custom.catcomplete", $.ui.autocomplete, {
    _renderMenu: function(ul, items) {
        var that = this,
                currentCategory = "";
        $.each(items, function(index, item) {
            /*
             * render custom menue to enable categorys
             */
            if (item.typ !== currentCategory) {
                var temptyp;
                if (item.typ === "user") {
                    temptyp = "Tutor";
                } else if (item.typ === "location") {
                    temptyp = "Wohnort";
                } else {
                    temptyp = "Fach";
                }
                ul.append("<li class='ui-autocomplete-category'>" + temptyp + "</li>");
                currentCategory = item.typ;
            }
            that._renderItemData(ul, item);
        });
    }
});

/*
 * render custom Item to enable highlighting of the searchterm
 */
$.ui.autocomplete.prototype._renderItem = function(ul, item) {
    var re = new RegExp(this.term, "i");
    var t = item.value.replace(re, "<span style='font-weight:bold;color:#3366cc;'>" + this.term + "</span>");
    return $("<li></li>")
            .data("item.autocomplete", item)
            .append("<a>" + t + "</a>")
            .appendTo(ul);
};

/*
 * Add autocomplete functionality to the search input field
 */
$(function() {
    $('[name="search"]').catcomplete({
        source: "/scripts/autocomplete.php",
        minLength: 2,
        select: function(event, ui) {
            var url = ui.item.id;
            var value = ui.item.value;
            var typ = ui.item.typ;
            if (url !== '#') {
                $('[name="search"]').val(value);
                $('[name="valueTyp"]').val(typ);
                $('#searchform').attr('action', url);
                $('#searchform').submit();
            }
        }
    });
});

$('[name="search"]').on('focus', function() {
    $('[name="search"]').catcomplete("search");
});



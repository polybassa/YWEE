$(function() {
 
    $('[name="search"]').autocomplete({
        source: "/scripts/autocomplete.php",
        minLength: 2,
        select: function(event, ui) {
            var url = ui.item.id;
            var value = ui.item.value;
            var typ = ui.item.typ;
            if(url != '#') {
                //location.href = url;
                $('[name="search"]').val(value);
                $('[name="valueTyp"]').val(typ);
                $('#searchform').attr('action', url);
                $('#searchform').submit();
            }
        },
 
        html: true, // optional (jquery.ui.autocomplete.html.js required)
 
      // optional (if other layers overlap autocomplete list)
        open: function(event, ui) {
            $(".ui-autocomplete").css("z-index", 1000);
        }
    });
 
});

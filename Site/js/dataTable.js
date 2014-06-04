/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {


    var mTable = $('#searchresultTable').dataTable({
        "oLanguage": {
            "sSearch": "Suchergebnisse filtern:",
            "oPaginate": {
                "sNext": "Nächste Seite",
                "sPrevious": "Vorherige Seite"
            },
            "sInfo": "Es wurden _TOTAL_ Suchergebnisse gefunden. Aktuelle Anzeige (_START_ bis _END_)",
            "sLengthMenu": "Zeige _MENU_ Suchergebnisse"
        }
    });
    mTable.fnClearTable();
    jQuery.each(searchresults, function() {
        mTable.fnAddData(['<a href="' + this.url + '" > ' + this.value + '</a>', this.typ]);
    });

});
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {


    var mTable = $('#filesTable').dataTable({
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
    jQuery.each(files, function() {
        mTable.fnAddData(['<a href="files/' + this.name + '" > ' + this.name + '</a>', this.size, '<form method="POST" action=""><input type="hidden" name="file" value="'+ this.name +'"><input type="submit" name="delete" value="L&ouml;schen"></form>']);
    });
    mTable.draw();

    /*
     $('#searchresultTable').dataTable( {
     "aaData": searchresults,
     "aoColumns" : [
     { "mDataProp": "value"} ,
     { "mDataProp": "typ"} ]
     });   */
  });

            



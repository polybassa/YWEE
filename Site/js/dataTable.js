/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {


    var mTable = $('#searchresultTable').dataTable();
    mTable.fnClearTable();
    jQuery.each(searchresults, function() {
        mTable.fnAddData(['<a href="' + this.url + '" > ' + this.value + '</a>', this.typ]);
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

$(document).ready(function myFunction() {
	var SingleEntry = ['hans', 'dampf'];
	
	$.post("/scripts/ReadGuestbook.php", function(Entries){
/*
        jQuery.each(Entries, function() {
			 SingleEntry.push(this.benutzername + '<br>' + this.eintrag + '<br><br>'); 
		});
*/
        document.getElementById("data").innerHTML = Entities;
	}

    )
	SingleEntry = SingleEntry.join('');
	
		
	
});


    // document.getElementById("data").innerHTML = Date();
		// document.getElementById("data").innerHTML += JSON.parse(Entries);
		// var mTable = $('#GuestBookEntries').dataTable();
		// mTable.fnClearTable();

			// mTable.fnAddData(['<a href="' + this. + '" > ' + this.value + '</a>', this.typ]);
			// mTable.fnAddData( );

// $("#loginform").submit(function(e)
     // {   e.preventDefault();
        // $.post("/scripts/login.php", $("#loginform").serialize(),
        // function(msg) {
            // /* msg ist leer, außer der Login ist fehlgeschlagen, dann wird der Fehler ausgegeben */
            // if ( msg.length > 2 ) { alert(msg); }
            // /* Nur bei erfolgreichem Login oder Logout wird die Seite neu geladen */
            // if ( msg.length < 5 ) { window.location.reload(); }
        // });
    // });

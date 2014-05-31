<?php
    // Anpassung und Aufteilung des Layouts: Daniel Tatzel
    // Muss in der Reihenfolge bleiben
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session

    $titel = "News"; // Name der Seite die im Browser angezeigt werden soll

    $_SESSION['sprache'] = "en";
    
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/header.php");   // Inkludiert den Header
    
    //print_r($_POST); // Debug Ausgabe fuer den Inhalt von $_POST
    //echo nl2br(print_r($_SESSION,true));  // Debug Ausgabe fuer Session
	if( $_SESSION['admin'] == true )
	{
?>
	<form name="News" method="post" action="/test_02/scripts/WriteNews.php" id="newsform">
		<div><label for ="betreff"></label><input type="text" size="44" maxlength = "60" placeholder = "Subject" name="subject" id="betreff"required></div>
		<div><label for ="nachrichtentext"></label>
		<p><textarea name="nachricht" cols="33" rows="5" maxlength="300" placeholder ="Write here your message" required></textarea>
		</p>
		</div>
		<div class="line submit"><input type="submit" value="Send"></div>
	</form>

<?php
	}
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/en/content/news.html");       // Inkludiert den Inhalt
        

    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php"); // Inkludiert den Footer
?>

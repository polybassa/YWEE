<?php
    // Anpassung und Aufteilung des Layouts: Daniel Tatzel
    // Muss in der Reihenfolge bleiben
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session

    $titel = "Guestbook"; // Name der Seite die im Browser angezeigt werden soll

    $_SESSION['sprache'] = "en";
    
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/header.php");   // Inkludiert den Header
    
    if( isset($_SESSION['logged-in']))
	{
?>
	<form name="addguestbookentry" method="post" action="/scripts/WriteGuestbook.php" id="gbform">
		<input type="hidden" name="sprache" value="<?php echo $_SESSION['sprache']; ?>">
		<input type="hidden" name="username" value="<?php echo $_SESSION['user']; ?>">
		<div>
			<label for ="nachrichtentext"></label>
			<p>
				<textarea name="eintrag" cols="33" rows="5" maxlength="300" id="nachrichtentext" placeholder ="Please write your guestbookentry here..." required></textarea>
			</p>
		</div>
		<div class="line submit">
			<input type="submit" value="send">
		</div>
	</form>

<?php	
	}
	else
	{
	?>
		Only logged-in users can add entries!
		<br>
	<?php	
	}

    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/en/content/guestbook.html");       // Inkludiert den Inhalt
        
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php"); // Inkludiert den Footer
?>

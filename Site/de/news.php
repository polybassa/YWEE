<?php
	include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session
	$lang = $_SESSION['sprache'];
	$titel = "News"; // Name der Seite die im Browser angezeigt werden soll
	
	 $_SESSION['sprache'] = "de";
	 
	include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/header.php");   // Inkludiert den Header
	if( $_SESSION['admin'] == true )
	{
?>
	<!--Includes for news -->
	<script src="/js/news.js>"></script>
	<form name="News" method="post" action="/test_02/scripts/WriteNews.php" id="newsform">
		<div><label for ="betreff"></label><input type="text" size="44" maxlength = "60" placeholder = "Betreff" name="subject" id="betreff"required></div>
		<div><label for ="nachrichtentext"></label>
		<p><textarea name="nachricht" cols="33" rows="5" maxlength="300" placeholder ="Schreiben Sie hier ihre Nachricht..." required></textarea>
		</p>
		</div>
		<div class="line submit"><input type="submit" value="Absenden"></div>
	</form>

<?php
	}
	include($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/content/news.html");
	include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php"); // Inkludiert den Footer
	header("Location: http://ebenezer-kunatse.net/$lang/news.php");
?>
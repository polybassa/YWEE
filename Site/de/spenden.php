<?php
	// Anpassung und Aufteilung des Layouts: Daniel Tatzel
    // Muss in der Reihenfolge bleiben
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session
	//$lang = $_SESSION['sprache'];
    $titel = "Spenden"; // Name der Seite die im Browser angezeigt werden soll

    $_SESSION['sprache'] = "de";
    
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/header.php");   // Inkludiert den Header
    
    //print_r($_POST); // Debug Ausgabe fuer den Inhalt von $_POST
    //echo nl2br(print_r($_SESSION,true));  // Debug Ausgabe fuer Session
	
	include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/de/content/bezahlung.html");
	
	if(isset($_SESSION['logged-in']))
	{
?>
<h1>Spende</h1>

<form name="Formular" method="post" action="/scripts/CreditCardInfo.php" id="paymentform">
	<input type="hidden" name="user" value="<?php echo $_SESSION['user']; ?>">
	<div><label class="zeile" for ="kreditkartennummer">Kreditkartennummer:</label><input pattern="[0-9]{16}" size="45" maxlength="16" class="eingabe" id="kreditkartennummer" name="kreditkartennummer" required></div>
	<div><label class="zeile" for ="month">Ablaufdatum:</label>
	<select name="monat" id="month">
	<option value="0">Monat</option>
	<?php
	$i = 0;
	while ( $i++ < 12)
	echo '<option value="'.$i.'">'.$i.'</option>';?>
	</select>
	<select name="jahr">
	<option value="0">Jahr</option>
	<?php
    $i = (date("Y")-1);
    while ( $i++ < (date("Y")+20))
    echo '<option value="'.$i.'">'.$i.'</option>';?>
	</select></div>
	<div><label class="zeile" for ="pruefziffer">Pr&#252;fziffer:</label><input type="text" size="45" maxlength ="4" class="eingabe" placeholder="0000" id="pruefziffer" name="pruefziffer" required></div>
	<div><label class="zeile" for ="betrag">Betrag:</label><input type="number" size="45" maxlength ="4" class="eingabe" id="betrag" name="betrag" required></div>
	<div class="line submit"><input type="submit" value="Best&#228;tigen"></div>
</form>
<?php
	}
	include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php"); // Inkludiert den Footer
?>
<?php
	//Autor: Tobias Schwindl
    include_once($_SERVER["DOCUMENT_ROOT"] . "/test_02/scripts/session.php");       // Inkludiert die Session
	//$lang = $_SESSION['sprache'];
    $titel = "Donate"; // Name der Seite die im Browser angezeigt werden soll

    $_SESSION['sprache'] = "en";
    
    include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/header.php");   // Inkludiert den Header
    
    //print_r($_POST); // Debug Ausgabe fuer den Inhalt von $_POST
    //echo nl2br(print_r($_SESSION,true));  // Debug Ausgabe fuer Session
	
	include($_SERVER["DOCUMENT_ROOT"] . "/test_02/en/content/payment.html");
	
	if(isset($_SESSION['logged-in']))
	{
?>
<h1>Donate</h1>
<script src="/js/donation.js" type="text/javascript"></script>
We only accept Visa Cards!<br>
<form name="Formular" method="post" action="/scripts/CreditCardInfo.php" id="paymentform">
	<input type="hidden" name="user" value="<?php echo $_SESSION['user']; ?>">
	<div><label class="zeile" for ="kreditkartennummer">Credit card number:</label><input pattern="[0-9]{16}" size="45" maxlength="16" class="eingabe" id="kreditkartennummer" name="kreditkartennummer" required></div>
	<div><label class="zeile" for ="month">Expire Date:</label><!--PHP Script mit Zaehler fuer Monat, zaehlt von 1 bis 12 und erstellt mit diesen Zahlen eine Option im select-->
	<select name="monat" id="monat">
	<option value="0">Month</option>
	<?php
	$i = 0;
	while ( $i++ < 12)
	echo '<option value="'.$i.'">'.$i.'</option>';?>
	</select>
	<select name="jahr" id="jahr"><!--PHP Script mit Zaehler fuer Jahr, zaehlt vom derzeitgem Jahr bis 20 Jahre in die Zukunft und erstellt mit diesen Zahlen eine Option im select-->
	<option value="0">Year</option>
	<?php
    $i = (date("Y")-1);
    while ( $i++ < (date("Y")+20))
    echo '<option value="'.$i.'">'.$i.'</option>';?>
	</select></div>
	<div><label class="zeile" for ="pruefziffer">Check Digits</label><input type="text" size="45" maxlength ="4" class="eingabe" placeholder="0000" id="pruefziffer" name="pruefziffer" required></div>
	<div><label class="zeile" for ="betrag">Amount:</label><input type="text" size="45" maxlength ="20" class="eingabe" id="betrag" name="betrag" required></div>
	<div class="line submit"><input type="submit" value="Submit"></div>
</form>
<?php
	}
	else
	{
		echo "Please log in to donate!";
	}
	include($_SERVER["DOCUMENT_ROOT"] . "/test_02/layout/footer.php"); // Inkludiert den Footer
?>

<html>
<head>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script type="text/javascript">
    function GetDir()
    {
    var http = null;
    if (window.XMLHttpRequest) {
       http = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
       http = new ActiveXObject("Microsoft.XMLHTTP");
    }
    if (http != null) {
       http.open("GET", "ListDirScript.php", true);
       http.onreadystatechange = ausgeben;
       http.send(null);
    }

    function ausgeben() {
       if (http.readyState == 4) {
          document.getElementById("Ausgabe").innerHTML =
             http.responseText;
       }
    }
    }
    </script>
</script>
</head>
<body>

<input type="button" value="Show" onclick="GetDir()">

	<div id="Ausgabe"></div>
	<!-- Our response will be placed into the div above,
		thanks to JavaScript's "innerHTML" property. -->

</body>
</html>

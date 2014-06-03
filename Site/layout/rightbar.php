<aside id="right">
    
	<?php
   //: von Matthias Birnthaler
   if ( !isset( $_SESSION['logged-in'] ) )
        {
            if ( $_SESSION['sprache'] == "en" )
            {
                echo '<div class="basic-wrapper-top">
						Sign in </div>';      
            }
            else
            {
                echo '<div class="basic-wrapper-top">
						Anmeldung</div>';
			}
        }
        else
        {
           if ( $_SESSION['sprache'] == "en" )
			{
			echo '<div class="basic-wrapper-top">
						Log out </div>'; 
			}
			else 
			{
			echo '<div class="basic-wrapper-top">
						Abmelden </div>';
			}
		}

	?>
	
	
	
	<div class="basic-wrapper-bottom">
	<?php
        // Autoren: Daniel Tatzel (PHP)
        // Gibt entsprechendes Formular aus, je nachdem, ob der Nutzer angemeldet ist oder nicht

        echo '<form method="POST" action="#" id="loginform">
            <input type="hidden" name="PHPSESSID" value="'.session_id().'">';

        if ( !isset( $_SESSION['logged-in'] ) )
        {
            if ( $_SESSION['sprache'] == "en" )
            {
                echo '<input type="text" name="username" placeholder="Username" class="login_field">
                    <input type="password" name="passwd" placeholder="Password" class="login_field">
                    <input type="submit" name="login" value="Login">';
                echo ' or <a href="/en/registration.php">register</a>';
            }
            else
            {
                echo '<input type="text" name="username" placeholder="Benutzername" class="login_field">
                    <input type="password" name="passwd" placeholder="Passwort" class="login_field">
                    <input type="submit" name="login" value="Anmelden">';
                echo ' oder <a href="/de/registrierung.php">Registrieren</a>';
            }
        }
        else
        {
            if ( $_SESSION['sprache'] == "en" )
            {
                echo '<input type="submit" name="logout" value="Logout">';
            }
            else
            {
                echo '<input type="submit" name="logout" value="Abmelden">';
            }
            
        }

        echo '</form>';


        // Debug Information
        //echo "Session: ".session_id()."<br>";
    ?>
	</div>
    
     <br>
	
    <!-- Suchformular --><!--Sprachabfrage nicht nötig, da Button-->
    <div class="basic-wrapper orange">
    <form method="POST" action="/de/search.php" id="searchform">

    <input type="hidden" name="PHPSESSID" value="'.session_id().'">
    <input type="hidden" name="valueTyp" value="#">
    <?php
            if ( $_SESSION['sprache'] == "en" )
            {
                echo '<input type="text" name="search" placeholder="Search" class="suchen_field">';
            }
            else
            {
                echo '<input type="text" name="search" placeholder="Suche" class="suchen_field">';
            }
    ?>
    <input type="image" src="/images/lupe.png" alt="Lupe">
    </form>
    </div>
	
	 <br>
	
	
	
	<!--Block for Map by Matthias Birnthaler-->
	<?php
	
	if ( $_SESSION['sprache'] == "en" )
            {
                echo '<div class="basic-wrapper-top">
						Map </div>';      
            }
            else
            {
                echo '<div class="basic-wrapper-top">
						Karte</div>';
			}
	?>
	 
	<style>
	#map {
			float: left;
			width: 200px;
			height: 300px;
			margin: 50px auto;
		}
	</style>
	 
	 
	<div class="basic-wrapper-bottom">
	<div id="map">
		

				<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
				<script>
				
				<!-- Karte vor Geolocation -->
				var gmegMap, gmegMarker, gmegInfoWindow, gmegLatLng;
				function gmegInitializeMap(){gmegLatLng = new google.maps.LatLng(49.004065,12.095247);
				gmegMap = new google.maps.Map(document.getElementById("map"),{zoom:14,center:gmegLatLng,mapTypeId:google.maps.MapTypeId.ROADMAP});
				gmegMarker = new google.maps.Marker({map:gmegMap,position:gmegLatLng});
				gmegInfoWindow = new google.maps.InfoWindow({content:'<b>Hochschule</b><br>Seybothstra0e<br>Regensburg'});
				gmegInfoWindow.open(gmegMap,gmegMarker);}google.maps.event.addDomListener(window,"load",gmegInitializeMap);
				
				
				<!-- Karte: Routenplaner -->
					(function () {
						var directionsService = new google.maps.DirectionsService(),
							directionsDisplay = new google.maps.DirectionsRenderer(),
							createMap = function (start) {
								var travel = {
										origin : (start.coords)? new google.maps.LatLng(start.lat, start.lng) : start.address,
										destination : "Technische Hochschule, Regensburg",
										travelMode : google.maps.DirectionsTravelMode.DRIVING
										
									},
									mapOptions = {
										zoom: 10,
										// Default view: downtown Stockholm
										center : new google.maps.LatLng(49.0145423, 12.100855899999942),
										mapTypeId: google.maps.MapTypeId.ROADMAP
									};

								map = new google.maps.Map(document.getElementById("map"), mapOptions);
								directionsDisplay.setMap(map);
								directionsService.route(travel, function(result, status) {
									if (status === google.maps.DirectionsStatus.OK) {
										directionsDisplay.setDirections(result);
									}
								});
							};

							// Check for geolocation support	
							if (navigator.geolocation) {
								navigator.geolocation.getCurrentPosition(function (position) {
										// Success!
										createMap({
											coords : true,
											lat : position.coords.latitude,
											lng : position.coords.longitude
										});
									}, 
									function () {
										// Fallback: Hochschule Amberg
										createMap({
											coords : false,
											address : "Hochschule, Amberg"
										});
									}
								);
							}
							else {
								// No geolocation fallback: Hochschule Weiden
								createMap({
									coords : false,
									address : "Hochschule, Weiden"
								});
							}
					})();
				</script>
	
	</div>
	</div>
	 <br>
	
	
	<!--Block for Film by Matthias Birnthaler-->
	<?php
	// von Matthias Birnthaler (Video zu Film übersetzen.... irgendwie witzlos)
	if ( $_SESSION['sprache'] == "en" )
            {
                echo '<div class="basic-wrapper-top">
						Video </div>';      
            }
            else
            {
                echo '<div class="basic-wrapper-top">
						Film</div>';
			}
	?>	
	
	<style type="text/css"> div#video_player_box{ width:200px; background:#000; margin:0px auto;} 
	div#video_controls_bar{ background: #FFFFFF; padding:10px; color:#000000; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;} 
	button#playpausebtn{ 
		background:url(/images/pause.png); 
		border:none; 
		width:25px; 
		height:25px; 
		cursor:pointer; 
		opacity:0.5; } 
	button#playpausebtn:hover{ opacity:1; } 
	input#seekslider{ width:70px; } 
	input#volumeslider{ width: 80px;} 
	input[type='range'] {
		-webkit-appearance: none !important; 
		background: #000; 
			border:#666 1px solid; 
		height:4px; } 
	input[type='range']::-webkit-slider-thumb { 
		-webkit-appearance: none !important; 
		background: #FFF; 
		height:15px; 
		width:15px; 
		border-radius:100%; 
		cursor:pointer; } 
	</style> 

	<div class="basic-wrapper-bottom">
	
	<script> var vid, playbtn, seekslider, curtimetext, durtimetext, mutebtn, volumeslider, fullscreenbtn; 
	function intializePlayer(){ // Set object references 
		vid = document.getElementById("my_video"); 
		playbtn = document.getElementById("playpausebtn"); 
		seekslider = document.getElementById("seekslider"); 
		curtimetext = document.getElementById("curtimetext"); 
		durtimetext = document.getElementById("durtimetext"); 
		mutebtn = document.getElementById("mutebtn"); 
		volumeslider = document.getElementById("volumeslider"); 
		fullscreenbtn = document.getElementById("fullscreenbtn"); 
		// Add event listeners 
		playbtn.addEventListener("click",playPause,false); 
		seekslider.addEventListener("change",vidSeek,false); 
		vid.addEventListener("timeupdate",seektimeupdate,false); 
		mutebtn.addEventListener("click",vidmute,false); 
		volumeslider.addEventListener("change",setvolume,false); 
		fullscreenbtn.addEventListener("click",toggleFullScreen,false); 
	} 
	window.onload = intializePlayer; 
	function playPause(){ 
		if(vid.paused){ 
			vid.play();
			playbtn.style.background = "url(/images/pause.png)"; 
		} else { 
			vid.pause(); 
			playbtn.style.background = "url(/images/play.png)"; 
		} 
	} 
	function vidSeek(){ 
		var seekto = vid.duration * (seekslider.value / 100); 
		vid.currentTime = seekto; 
	}	 
	function seektimeupdate(){ 
		var nt = vid.currentTime * (100 / vid.duration);
		seekslider.value = nt; 
		var curmins = Math.floor(vid.currentTime / 60); 
		var cursecs = Math.floor(vid.currentTime - curmins * 60); 
		var durmins = Math.floor(vid.duration / 60); 
		var dursecs = Math.floor(vid.duration - durmins * 60); 
		if(cursecs < 10){ cursecs = "0"+cursecs; } 
		if(dursecs < 10){ dursecs = "0"+dursecs; } 
		if(curmins < 10){ curmins = "0"+curmins; } 
		if(durmins < 10){ durmins = "0"+durmins; } 
		curtimetext.innerHTML = curmins+":"+cursecs; 
		durtimetext.innerHTML = durmins+":"+dursecs; 
	} 
	function vidmute(){ 
		if(vid.muted){ 
			vid.muted = false; 
			mutebtn.innerHTML = "Mute"; 
		} else { 
			vid.muted = true; 
			mutebtn.innerHTML = "Unmute"; 
		} 
	}	 
	function setvolume(){ 
		vid.volume = volumeslider.value / 100; 
	} function toggleFullScreen(){
		if(vid.requestFullScreen){ 
			vid.requestFullScreen(); 
		} else if(vid.webkitRequestFullScreen){ 
			vid.webkitRequestFullScreen(); 
		} else if(vid.mozRequestFullScreen){ 
			vid.mozRequestFullScreen(); 
		} 
	} </script> 
	
	<div id="video_player_box"> 
		<video id="my_video" width="200" height="100"> 
			<source src="/images/video.mp4" type="video/mp4"> 
			<source src="/images/video.OGG" type="video/ogg">
			Your browser does not support the video tag.
		</video> 
	
		<div id="video_controls_bar"> 
			<button id="playpausebtn"></button> 
			<input id="seekslider" type="range" min="0" max="100" value="0" step="1"> 
			<span id="curtimetext">00:00</span> / <span id="durtimetext">00:00</span> 
			<button id="mutebtn">Mute</button> 
			<input id="volumeslider" type="range" min="0" max="100" value="100" step="1"> 
			<button id="fullscreenbtn">[ &nbsp; ]</button> 
		</div> 
	</div> 
	
	</div>
	
	
	
	 <br>
	
	
</aside><!--right-->

<article id="content" class="basic-wrapper boxshadow">

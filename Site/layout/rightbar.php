<div id="right">
    
	<?php
       //: von Matthias Birnthaler
        if ( !isset( $_SESSION['logged-in'] ) )
        {
            if ( $_SESSION['sprache'] == "en" )
            {
                echo '<div class="basic-wrapper-top"> Sign in </div>';      
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
                echo '<div class="basic-wrapper-top"> Log out </div>'; 
            }
            else 
            {
                echo '<div class="basic-wrapper-top"> Abmelden </div>';
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
                echo 'Logged in as <b>'.$_SESSION['user'].'</b>.<br><br>';
                echo '<input type="submit" name="logout" value="Logout">';
            }
            else
            {
                echo 'Angemeldet als <b>'.$_SESSION['user'].'</b>.<br><br>';
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

    <input type="hidden" name="valueTyp" value="#">
    <?php
            echo '<input type="hidden" name="PHPSESSID" value="'.session_id().'">';
            
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
	 
	
	 
	<div class="basic-wrapper-bottom">
	<div id="map">
		

				<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
				<script type="text/javascript" src="/js/jquery.cookie.js"></script>
				<script>
				
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
							if (!$.cookie("posLat")) {
								navigator.geolocation.getCurrentPosition(function (position) {
										// Success!
										latitude = position.coords.latitude;
										longitude = position.coords.longitude;
										//write to cookie
										$.cookie("posLat", latitude);
										$.cookie("posLon", longitude);
										createMap({
											coords : true,
											lat : latitude,
											lng : longitude
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
								//coords aus Datei
								latitude = $.cookie("posLat");
								longitude = $.cookie("posLon");
								createMap({
									coords : true,
									lat : latitude,
									lng : longitude
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
	
	
</div><!--right-->

<article id="content" class="basic-wrapper boxshadow">

<?PHP
		$verbindung = mysqli_connect("localhost","Musik","root") or die("<p><p><font size=4>Leider funktioniert die Datenbankanbindung f&uuml;r das Programm momentan nicht.<p><p>Daher ist auch im Augenblick die Nutzung des Systems nicht moeglich.<p><p>Wir werden uns kurzfristig darum k&uuml;mmern! <br><br>Tobias Toennissen - Eurotest</font>\n");
		mysqli_select_db( $verbindung,"Musik") or die ("Die Datenbank Musik existiert nicht");
		mysqli_query($verbindung, "SET NAMES 'utf8'");
?>
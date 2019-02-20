<?PHP

	include("db.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Testseite</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
		<h1 class="display-1">Liederliste</h1>	
		
		<p>Hier ist die Liste der gesuchten Lieder</p>
		
		<table class="table table-hover">




		<table  class="table table-hover table-danger">
		<thead>
        <tr>
            <th scope="col">Titelname</th>
            <th scope="col">Interpretenname</th>
            <th scope="col">Genrename</th>
            <th scope="col">Albumname</th>
        </tr>
    </thead>
		<?PHP  
		
		#var_dump($_REQUEST);

		if (isset($_REQUEST["suche"])) { $suche = $_REQUEST["suche"]; } else { $suche = ""; }


		$sql = "select Titel.Name As Titelname, Interpret.Name As Interpretenname, Genre.Name As Genrename, Album.Name As Albumname from titel Inner join album on titel.Album_ID = Album.ID 
		Inner Join Genre On Titel.Genre_ID = Genre.ID
		Inner Join Interpret On Titel.Interpret_ID = Interpret.ID WHERE Titel.Name LIKE '%$suche%'|| Genre.Name LIKE '%$suche%' || Interpret.Name LIKE '%$suche%' || Album.Name LIKE '%$suche%' ORDER BY Titel.Song_ID;";

		$erg = mysqli_query($verbindung, $sql);

		while($dat = mysqli_fetch_object($erg)) {

			$zeile = "<tr><td>" . $dat->Titelname . "</td><td>" . $dat->Interpretenname . "</td><td>" . $dat->Genrename . "</td><td>" . $dat->Albumname . "</td></tr>";
			
			echo $zeile;

		}

		#while($dat = mysqli_fetch_row($erg)) {
		#	$zeile = "<tr><td>" . $dat[0] . "</td><td>" . $dat[1] . "</td><td>" . $dat[2] . "</td><td>" . $dat[3] . "</td></tr>";			
		#	echo $zeile;	
		#}
		#	echo  date("d.m.Y",time()) .  " ist ein toller Tag!";

		?>
		</table>
		<div class="shadow mt-5 border">

		<p>Der Suchtext war: <?PHP echo $suche; ?></p>
		Filter<form method="post">
			<input class="form-control" type="text" name="suche" value="<?PHP echo $suche;?>">
			<input class="form-control" type="submit" name="speichern">
		</form>
		</div>
		</div>
	</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</html>

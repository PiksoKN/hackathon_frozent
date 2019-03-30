<?php

	/*
	
	Sprawdzanie czy użytkownik odwiedzający stronę jest zalogowany.
	W momencie gdy nie jest zalogowany zostaje przeniesiony do "index.php"
	
	*/

	/*session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
		exit();
    }
    */
	
?>
<?php

	/*
	
	Połaczenie z bazą danych z pliku "connect.php"
	
	*/

    include('connect.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <script src="script.js"></script>
    <link href="css/dashboard.css" rel="stylesheet" type="text/css">
    <link href="css/notes.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="data\font-awesome\css\font-awesome.min.css">
</head>

<body>
    <!-- Logo -->
    <div class="logo-wrap">
        <img src="data/logo-small.png" class="logo">
    </div>
    
    <!-- Header -->
    <div class="header">
        <div class="header-search">
            <i class='fa fa-search header-search-icon' aria-hidden='true'></i>
            <input type="text" placeholder="Search..." class="header-search-input">
        </div>
        <div class="header-button-wrap">
            <div class="header-button"><i class="fa fa-files-o" aria-hidden="true"></i></div>
            <div class="header-splitter"></div>
            <div class="header-button-av"><i class="fa fa-cog" aria-hidden="true"></i></div>
            <a href="logout.php"><div class="header-button-av"><i class="fa fa-sign-out" aria-hidden="true"></i></div></a>
            <div class="header-avatar" style="background-image: url(http://res.frozent.pl/sdadsd.jpg)"></div>
        </div>
    </div>
    
    <!-- Left Header -->
    <div class="leader">
        <div class="leader-button-wrap">
            <a href="dashboard.php">
                <div class="leader-button leader-button-checked">
                    <div class="leader-label"><div class="leader-label-arrleft"></div><div class="leader-label-arrright"></div>DASHBOARD</div>
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                </div>
            </a>
            <a href="notes.php">
                <div class="leader-button">
                    <div class="leader-label"><div class="leader-label-arrleft"></div><div class="leader-label-arrright"></div>NOTES</div>
                    <i class="fa fa-files-o" aria-hidden="true"></i>
                </div>
            </a>
        </div>
    </div>
    
    <!-- Content -->
    <div class="content">

        <div class="notes">
        <div class="note-title">Notatka</div>
        <div class="note-date">23.08.19</div>
        </div>
        
<?php

    class notatka { 
     
	  // metoda select - wyświetlanie rekordów
      // argument: polecenie SQL wybierające rekordy z bazy danych
      // zwraca: obiekt - wybrane dane lub komunikat o błędzie
      function select($query)  { 
       try{
			  $pdo = new PDO('mysql:host=localhost;dbname=edu_db', 'root', '');
			  $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			  $stmt = $pdo -> query($query);
			  $dane = $stmt;
			  return $dane;
			  $stmt -> closeCursor();
		  }
       catch(PDOException $e){
          	  return 'Wystąpił błąd: '.$e->getMessage();
          }  
	  }
	}
    ?>
	<?php
	$bd = new notatka();
	$wyniki = $bd->select("SELECT title,date FROM note where user_user_id = 1");
	// IS_OBJECT Sprawdza, czy zmienna jest obiektem
	if (is_object($wyniki))
	{
	echo '<table>';
	// foreach przegląda kolejne elementy tablicy
	foreach($wyniki as $wynik) {
		
		$dane=1;
		
		echo '<tr>';
		
		for ($i=0;$i<=$dane;$i++) {
			echo '<td style="padding:10px">';
			echo $wynik[$i].' ';
			echo'</td>';
		}
		echo'</tr>';
		}
		echo '</table>';
		
		
	}
	else
	{
		echo $wyniki;
		}
    ?>
    
    <?php

    $ile_danych = $mysqli->query("SELECT title, date FROM note where user_user_id = 1");
    while( $notatka = mysqli_fetch_array($ile_danych)){
        echo '<p>' . $notatka['title'] . '</p>';
        echo '<p>' . $notatka['date'] . '</p>';
    }
    

	?>

    </div>
</body>
</html>
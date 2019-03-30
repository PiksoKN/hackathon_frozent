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
    <script src="js/dashboard.js"></script>
    <link href="css/notes.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="data\font-awesome\css\font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>

<body>
    <!-- Logo -->
    <div class="logo-wrap">
        <img src="data/logo-small.png" class="logo">
    </div>
    
    <!-- Header -->
    <div class="header">
        <div class="header-search">
            <div class="header-caption">All Notes</div>
            <div class="header-splitter"></div>
            <i class='fa fa-search header-search-icon' aria-hidden='true'></i>
            <input type="text" oninput="" placeholder="Search..." class="header-search-input" name="wyrazenie">
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
                <div class="leader-button">
                    <div class="leader-label"><div class="leader-label-arrleft"></div><div class="leader-label-arrright"></div>DASHBOARD</div>
                    <i class="fa fa-user-o" aria-hidden="true"></i>
                </div>
            </a>
            <a href="notes.php">
                <div class="leader-button leader-button-checked">
                    <div class="leader-label"><div class="leader-label-arrleft"></div><div class="leader-label-arrright"></div>NOTES</div>
                    <i class="fa fa-files-o" aria-hidden="true"></i>
                </div>
            </a>
            <a href="createnote.php">
                <div class="leader-button">
                    <div class="leader-label"><div class="leader-label-arrleft"></div><div class="leader-label-arrright"></div>CREATE NEW NOTE</div>
                    <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                </div>
            </a>
        </div>
    </div>
    
    <!-- Content -->
    <div class="content">
            <div class="content-notes">
                
            <?php


            $id=1;
            $ile_danych = $mysqli->query("SELECT title, time FROM note where user_user_id = " . mysqli_real_escape_string($mysqli,$id));
            while( $notatka = mysqli_fetch_array($ile_danych)){
                echo '<div class="notes">
                <div class="note-title">' . $notatka['title'] . '</div>';
                echo '<div class="note-date">' . date("Y-m-d H:i:s", strtotime($notatka['time'])) . '</div>
                </div>';
            }
            ?>
            
            </div>
       
    </div>
</body>
</html>
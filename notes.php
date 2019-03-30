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
    <title>All notes</title>
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
            <input type="text" oninput="search(this.value)" placeholder="Search..." class="header-search-input" name="wyrazenie">
        </div>
        <div class="header-button-wrap">
            <div class="header-button" onclick="trashIt()"><i class="fa fa-trash-o" id="trashko" aria-hidden="true"></i></div>
            <div class="header-splitter"></div>
            <div class="header-button-av"><i class="fa fa-cog" aria-hidden="true"></i></div>
            <a href="logout.php"><div class="header-button-av"><i class="fa fa-sign-out" aria-hidden="true"></i></div></a>
            <div class="header-avatar" style="background-image: url(data/user.png)"></div>
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
    
    <form action="deletThis.php" method="post" id="deleting" style="display: none">
        <input type="text" name="toDelete" id="deleteForma">
    </form>
    
    <!-- Content -->
    <div class="content">
            <div class="content-notes" id="empty">
                
            <?php
            $id=1;
            if(isset($_GET["date"])){
                $ile_danych = $mysqli->query("SELECT title, time, ref FROM note where user_user_id = " . mysqli_real_escape_string($mysqli,$id) . " and DATE(time) LIKE '".$_GET["date"]."';");
                $tabelka = Array();
                while( $notatka = mysqli_fetch_array($ile_danych)){
                    echo '<a href="readnote.php?id='.$notatka['ref'].'"><div class="notes">
                    <div class="note-title">' . $notatka['title'] . '</div>';
                    echo '<div class="note-date">' . date("Y-m-d H:i", strtotime($notatka['time'])) . '</div>
                    </div></a>';
                    $tabelka2 = Array();
                    array_push($tabelka2,$notatka['title'],date("Y-m-d H:i", strtotime($notatka['time'])),$notatka['ref']);
                    array_push($tabelka,$tabelka2);
                }
            } else {
                $ile_danych = $mysqli->query("SELECT title, time, ref FROM note where user_user_id = " . mysqli_real_escape_string($mysqli,$id));
                $tabelka = Array();
                while( $notatka = mysqli_fetch_array($ile_danych)){
                    echo '<a href="readnote.php?id='.$notatka['ref'].'"><div class="notes">
                    <div class="note-title">' . $notatka['title'] . '</div>';
                    echo '<div class="note-date">' . date("Y-m-d H:i", strtotime($notatka['time'])) . '</div>
                    </div></a>';
                    $tabelka2 = Array();
                    array_push($tabelka2,$notatka['title'],date("Y-m-d H:i", strtotime($notatka['time'])),$notatka['ref']);
                    array_push($tabelka,$tabelka2);
                }
            }
            
            
            ?>
            
            </div>
       
    </div>
</body>
    <script>
        table=<?php echo json_encode($tabelka);?>;
        original=document.getElementById("empty").innerHTML;
        function search(x){
            if(x!=""){
            document.getElementById("empty").innerHTML="";
            for(var i=0;i<table.length;i++){
                if(table[i][0].toLowerCase().indexOf(x.toLowerCase())!=-1 || table[i][1].indexOf(x)!=-1){
                    ser = document.createElement("a");
                    ser.href = "readnote.php?id=" + table[i][2]
                    ser.innerHTML = "<div class='notes'><div class='note-title'>" + table[i][0] + "</div><div class='note-date'>"+table[i][1]+"</div></div>"
                    document.getElementById("empty").appendChild(ser)
                }
            }
            }
            else{
                document.getElementById("empty").innerHTML=original;
            }
        }
        
        trashMode = false
        function trashIt(){
            trashMode = !trashMode;
            if(trashMode){
                document.getElementById("trashko").style.textShadow = "red 0px 0px 5px" 
                xd = []
                for(var i=0; i<document.getElementsByClassName("notes").length; i++){
                    xd.push("<div class='notes' onclick='deletIt("+i+")'>"+document.getElementsByClassName("notes")[i].innerHTML+"</div>")
                }
                document.getElementById("empty").innerHTML = xd.join("")
            } else {
                document.getElementById("trashko").style.textShadow = "none" 
            }
        }
        function deletIt(x){
            document.getElementById("deleteForma").value = table[x][2]
            document.getElementById("deleting").submit();
        }
    </script>

</html>
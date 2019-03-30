<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <script src="js/dashboard.js"></script>
    <link href="css/dashboard.css" rel="stylesheet" type="text/css">
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
            <div class="header-caption">Dashboard</div>
            <div class="header-splitter"></div>
        </div>
        <div class="header-button-wrap">
            <div class="header-splitter"></div>
            <div class="header-button-av"><i class="fa fa-cog" aria-hidden="true"></i></div>
            <a href="logout.php"><div class="header-button-av"><i class="fa fa-sign-out" aria-hidden="true"></i></div></a>
            <div class="header-avatar" style="background-image: url(../data/user.png)"></div>
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
        <div class="content-column">
            <div class="content-header">Recent Notes</div>
            <div class="content-notes">
                <?php
                    require("connect.php");
                    $quary = "SELECT * FROM note WHERE user_user_id = 1 ORDER BY time DESC LIMIT 6";
                    $result = mysqli_query($mysqli,$quary);
                    while($row = $result->fetch_assoc()){
                        echo '<div class="notes" onclick="window.location=\'readnote.php?id=' . $row["ref"] . '\'"><div class="note-title">' . $row["title"] . '</div><div class="note-date">' . date("Y-m-d H:i", strtotime($row["time"])) . '</div></div>';
                    }
                    $quary = "SELECT DISTINCT time FROM note WHERE user_user_id = 1";
                    $result = mysqli_query($mysqli,$quary);
                    $table = Array();
                    while($row = $result->fetch_assoc()){
                        array_push($table,date("Y-m-d", strtotime($row["time"])));
                    }
                ?>
            </div>
        </div>
        <div class="content-column">
            <div class="content-header">Calendar</div>
            <div class="content-wrap">
                <div class="content-miniheader" id="mandday"></div>
            </div>
            <div class="content-calendar" id="calendar">
                <div class="content-calendar-label">Monday</div><div class="content-calendar-label">Tuesday</div><div class="content-calendar-label">Wednesday</div><div class="content-calendar-label">Thursday</div><div class="content-calendar-label">Friday</div><div class="content-calendar-label">Saturday</div><div class="content-calendar-label">Sunday</div>
            </div>
        </div>
    </div>
        <?php 
        echo "<script>function checkNotes(){var dateNow = new Date(); yearNow = dateNow.getFullYear();monthNow = dateNow.getMonth();";
        echo "daty = " . json_encode($table) . ";"; 
        echo <<<EOT
        function dd(x){
            if(x<10){
                return "0" + x
            }
            return x
        }
        for(var i=0; i<daty.length; i++){
            aktual = daty[i].split("-")
            if(aktual[0] == yearNow && aktual[1] == dd(monthNow+1)){
                document.getElementById("box" + aktual[2]).className = "content-calendar-exist"
            }
        }
EOT;
        echo "}</script>";
        ?>
        
    </script>
</body>
</html>


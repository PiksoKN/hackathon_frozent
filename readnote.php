<?php
    require("connect.php");
    $opened = file_get_contents("notes/" . $_GET["id"] . ".txt");
    $query = 'SELECT title,time,tags FROM note WHERE ref="' . $_GET["id"] . '"';
    $result = mysqli_query($mysqli,$query);
    while($row = $result->fetch_assoc()){
        $title = $row["title"];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <script src="dashboard.js"></script>
    <link href="css/createnote.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="data\font-awesome\css\font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
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
            <div class="header-caption"><?php echo $title; ?></div>
            <div class="header-splitter"></div>
        </div>
        <div class="header-button-wrap">
            <div class="header-button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></div>
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
    <div class="content" style="height: calc(100% - 80px);top: 80px;">
        <div class="content-writepanel" style="height: calc(100vh - 100px);"><?php echo $opened; ?></div>
    </div>
</body>
</html>


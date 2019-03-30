<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <script src="dashboard.js"></script>
    <link href="css/dashboard.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="data\font-awesome\css\font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,900" rel="stylesheet"> 
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
        
    </div>
</body>
</html>


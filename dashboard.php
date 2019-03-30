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
        <div class="content-column">
            <div class="content-header">Recent Notes</div>
            <div class="content-notes">
                <div class="notes">
                    <div class="note-title">Notatka</div>
                    <div class="note-date">23.08.2019</div>
                </div>
                <div class="notes">
                    <div class="note-title">Notatka</div>
                    <div class="note-date">23.08.2019</div>
                </div>
                <div class="notes">
                    <div class="note-title">Notatka</div>
                    <div class="note-date">23.08.2019</div>
                </div>
            </div>
        </div>
        <div class="content-column">
            <div class="content-header">Calendar</div>
            <div class="content-miniheader" id="mandday"></div>
            <div class="content-calendar" id="calendar">
                <div class="content-calendar-label">Monday</div><div class="content-calendar-label">Tuesday</div><div class="content-calendar-label">Wednesday</div><div class="content-calendar-label">Thursday</div><div class="content-calendar-label">Friday</div><div class="content-calendar-label">Saturday</div><div class="content-calendar-label">Sunday</div>
            </div>
        </div>
    </div>
</body>
</html>


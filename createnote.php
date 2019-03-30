<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <script src="dashboard.js"></script>
    <script src="rangy/rangy-core.js"></script>
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
            <div class="header-caption" id="titleForma" onclick="this.style.color = '#595959';this.innerHTML = ''" onchange="if(this.value == ''){this.value = 'Click to edit title'}" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" contenteditable="true">Click to edit title</div>
            <div class="header-splitter"></div>
            <i class='fa fa-search header-search-icon' aria-hidden='true'></i>
            <input type="text" placeholder="Search..." class="header-search-input">
        </div>
        <div class="header-button-wrap">
            <div class="header-button" onclick="saveWork()"><i class="fa fa-floppy-o" aria-hidden="true"></i></div>
            <div class="header-splitter"></div>
            <div class="header-button-av"><i class="fa fa-cog" aria-hidden="true"></i></div>
            <a href="logout.php"><div class="header-button-av"><i class="fa fa-sign-out" aria-hidden="true"></i></div></a>
            <div class="header-avatar" style="background-image: url(http://res.frozent.pl/sdadsd.jpg)"></div>
        </div>
    </div>
    
    <!-- Tool Header -->
    <div class="tools">
        <div class="tools-label">Align</div>
        <div class="tools-button" onclick="surroundRange(0)"><i class="fa fa-align-left" aria-hidden="true"></i></div>
        <div class="tools-button" onclick="surroundRange(1)"><i class="fa fa-align-center" aria-hidden="true"></i></div>
        <div class="tools-button" onclick="surroundRange(2)"><i class="fa fa-align-right" aria-hidden="true"></i></div>
        <div class="tools-button" onclick="surroundRange(3)"><i class="fa fa-align-justify" aria-hidden="true"></i></div>
        <div class="tools-splitter"></div>
        <div class="tools-label">Color</div>
        <div class="tools-button" onclick="surroundRange(4)"><div class="color-box" style="background-color: red"></div></div>
        <div class="tools-button" onclick="surroundRange(5)"><div class="color-box" style="background-color: yellow"></div></div>
        <div class="tools-button" onclick="surroundRange(6)"><div class="color-box" style="background-color: green"></div></div>
        <div class="tools-button" onclick="surroundRange(7)"><div class="color-box" style="background-color: blue"></div></div>
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
                <div class="leader-button leader-button-checked">
                    <div class="leader-label"><div class="leader-label-arrleft"></div><div class="leader-label-arrright"></div>CREATE NEW NOTE</div>
                    <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                </div>
            </a>
        </div>
    </div>
    
    <!-- Content -->
    <div class="content">
        <pre class="content-writepanel" id="textForma" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" contenteditable="true">New Note</pre>
        <form action="publish.php" method="post" id="forma" style="display: none;">
            <input type="text" name="title" value="test">
            <input type="text" id="hiden2" name="noteTitle">
            <input type="text" id="hiden" name="noteText">
        </form>
    </div>
    
    <script>
        function getFirstRange() {
            var sel = rangy.getSelection();
            return sel.rangeCount ? sel.getRangeAt(0) : null;
        }
        function surroundRange(x) {
            var range = getFirstRange();
            if(range){
                switch(x){
                    case 0:
                        var el = document.createElement("span");
                        el.style.display = "block";
                        el.style.textAlign = "left";
                        if (range.canSurroundContents(el)) {
                            range.surroundContents(el);
                        } 
                        break;
                    case 1:
                        var el = document.createElement("span");
                        el.style.display = "block";
                        el.style.textAlign = "center";
                        if (range.canSurroundContents(el)) {
                            range.surroundContents(el);
                        } 
                        break;
                    case 2:
                        var el = document.createElement("span");
                        el.style.display = "block";
                        el.style.textAlign = "right";
                        if (range.canSurroundContents(el)) {
                            range.surroundContents(el);
                        } 
                        break;
                    case 3:
                        var el = document.createElement("span");
                        el.style.display = "block";
                        el.style.textAlign = "justify";
                        if (range.canSurroundContents(el)) {
                            range.surroundContents(el);
                        } 
                        break;
                    case 4:
                        var el = document.createElement("span");
                        el.style.color = "red";
                        if (range.canSurroundContents(el)) {
                            range.surroundContents(el);
                        } 
                        break;
                    case 5:
                        var el = document.createElement("span");
                        el.style.color = "yellow";
                        if (range.canSurroundContents(el)) {
                            range.surroundContents(el);
                        } 
                        break;
                    case 6:
                        var el = document.createElement("span");
                        el.style.color = "green";
                        if (range.canSurroundContents(el)) {
                            range.surroundContents(el);
                        } 
                        break;
                    case 7:
                        var el = document.createElement("span");
                        el.style.color = "blue";
                        if (range.canSurroundContents(el)) {
                            range.surroundContents(el);
                        } 
                        break;
                    default:
                        var el = document.createElement("span");
                        el.style.display = "block";
                        el.style.textAlign = "center";
                        if (range.canSurroundContents(el)) {
                            range.surroundContents(el);
                        } 
                        break;
                }
            }
        }
        function saveWork(){
            document.getElementById("hiden").value = document.getElementById("textForma").innerHTML;
            document.getElementById("hiden2").value = document.getElementById("titleForma").innerHTML;
            document.getElementById("forma").submit(); 
        }
    </script>
</body>
</html>


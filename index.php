<!DOCTYPE html>
<html>
<head>
    <title>Assignment 4: Team Project</title>
    <link href='//fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body onload="getRows();">
    <div class="top_section">

    </div>
    <div id="bottom_section" class="bottom_section">

    </div>
</body>
<script>
    function getRows() {
        if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest(); }
        else { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); }

        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("bottom_section").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "backend.php?instructions=getProjects", true);
        xmlhttp.send();
    }
</script>
</html>
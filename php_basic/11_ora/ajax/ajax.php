<?php




?>

<html>

<head></head>

<body>

    <button onclick="loadDoc()">Get content</button>

    <div id="content"></div>

    <script>
        function loadDoc() {

            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", "ajax_info.txt", true);
            xhttp.send();
            xhttp.onreadystatechange = function() { //akkor van végrehajtva ha megérkezik a válasz a rquestre//

                if (this.readyState == 4 && this.status == 200) {

                    document.getElementById("content").innerHTML = this.responseText;
                }
            }
        }
    </script>
</body>

</html>
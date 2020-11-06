<?php 
if (isset($_GET["etage"])) {
	$etage=$_GET["etage"];
	if ($etage==0) {
		echo "<div >";
            echo "<h2 id=\"text\">Rez-de-chaussée</h2>";
            echo "<canvas id=\"canevas0\" width=\"420\" height=\"340\"></canvas>";
       echo " </div>";
	}elseif ($etage==1) {
		echo "<div >";
            echo "<h2 id=\"text\">Premier étage</h2>";
            echo "<canvas id=\"canevas1\" width=\"420\" height=\"340\"></canvas>";
       echo " </div>";
	}elseif ($etage==2) {
		echo "<div >";
            echo "<h2 id=\"text\">Deuxième étage</h2>";
            echo "<canvas id=\"canevas2\" width=\"420\" height=\"340\"></canvas>";
       echo " </div>";
	}else{
		echo "erreur";
	}
}else{
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>

	<script type="text/javascript">

            // Tableau des coordonnées des canevas
            const coordsChambres = [
                [ // 1er étage
                    // Première ligne de chambres
                    { x:5, y:5, width:60, height:60, numero:1 },
                    { x:75, y:5, width:60, height:60, numero:3 },
                    { x:145, y:5, width:130, height:60, numero:5 },
                    { x:285, y:5, width:60, height:60, numero:9 },
                    // Deuxième ligne de chambres
                    { x:5, y:75, width:60, height:60, numero:2 },
                    { x:75, y:75, width:60, height:60, numero:4 },
                    { x:145, y:75, width:60, height:60, numero:6 },
                    { x:215, y:75, width:60, height:60, numero:7 },
                    { x:285, y:75, width:60, height:60, numero:8 },
                    // Troisième ligne de chambres
                    { x:285, y:145, width:60, height:130, numero:10 },
                    { x:355, y:145, width:60, height:60, numero:11 },
                    { x:355, y:215, width:60, height:60, numero:12 },
                    // Quatrième ligne de chambres
                    { x:285, y:285, width:130, height:60, numero:13 },
                    // Réception
                    { x:355, y:5, width:60, height:130, numero:"Réception" }

                ],
                [ // 2ème étage
                    // Première ligne de chambres
                    { x:5, y:5, width:60, height:60, numero:101 },
                    { x:75, y:5, width:60, height:60, numero:102 },
                    { x:145, y:5, width:60, height:60, numero:104 },
                    { x:215, y:5, width:60, height:60, numero:106 },
                    { x:285, y:5, width:60, height:60, numero:108 },
                    { x:355, y:5, width:60, height:130, numero:110 },
                    // Deuxième ligne de chambres
                    { x:5, y:75, width:130, height:60, numero:103 },
                    { x:145, y:75, width:60, height:60, numero:105 },
                    { x:215, y:75, width:60, height:60, numero:107 },
                    { x:285, y:75, width:60, height:60, numero:109 },
                    // Troisième ligne de chambres
                    { x:285, y:145, width:60, height:60, numero:111 },
                    { x:355, y:145, width:60, height:60, numero:112 },
                    // Quatrième ligne de chambres
                    { x:285, y:215, width:130, height:120, numero:113 }

                ],
                [ // 3ème étage
                    // Première ligne de chambres
                    { x:5, y:5, width:130, height:130, numero:201 },
                    { x:145, y:5, width:130, height:60, numero:202 },
                    { x:145, y:75, width:130, height:60, numero:203 },
                    // Deuxième ligne de chambres
                    { x:285, y:5, width:60, height:60, numero:204 },
                    { x:355, y:5, width:60, height:130, numero:206 },
                    { x:285, y:75, width:60, height:60, numero:205 },
                    // Troisième ligne de chambres
                    { x:285, y:145, width:60, height:60, numero:207 },
                    { x:355, y:145, width:60, height:60, numero:208 },
                    // Quatrième ligne de chambres
                    { x:285, y:215, width:130, height:120, numero:209 }
                ]
            ];

            // Génération des 3 canevas
            for (var i = 0; i < 3; i++) {

                var canevas = document.getElementById("canevas"+i);
                var contexte = canevas.getContext("2d");

                contexte.fillStyle = "rgb(230, 230, 230)";
                contexte.fillRect(0, 0, canevas.width, canevas.height);

                contexte.font = "30px";

                for (var j = 0; j < coordsChambres[i].length; j++) {
                    contexte.fillStyle = "green";
                    contexte.fillRect(coordsChambres[i][j].x, coordsChambres[i][j].y, coordsChambres[i][j].width, coordsChambres[i][j].height);
                    contexte.fillStyle = "white";
                    contexte.textAlign = "center";
                    contexte.fillText(coordsChambres[i][j].numero, coordsChambres[i][j].x + coordsChambres[i][j].width/2 + 2, coordsChambres[i][j].y + coordsChambres[i][j].height/2 + 6)
                }

            }

            // Evenement qui detecte le clique sur les 3 canevas
            document.getElementById("canevas0").addEventListener("mousedown", getPosition, false);
            document.getElementById("canevas1").addEventListener("mousedown", getPosition, false);
            document.getElementById("canevas2").addEventListener("mousedown", getPosition, false);

            function getPosition(e) {
                var coordonnees = getCoordonnees(this, e);

                // Récupération de l'id du canevas
                var index = coordonnees.element.substr(7)
                for (var j = 0; j < coordsChambres[index].length; j++) {
                    if(coordonnees.x < coordsChambres[index][j].x + coordsChambres[index][j].width &&
                       coordonnees.x > coordsChambres[index][j].x &&
                       coordonnees.y < coordsChambres[index][j].y + coordsChambres[index][j].height &&
                       coordonnees.y > coordsChambres[index][j].y)
                    {
                        alert(coordsChambres[index][j].numero);
                    }

                }
            }

            function getCoordonnees(el, event) {
                var id = el.attributes.id.value;
                var ox = -el.offsetLeft;
                var oy = -el.offsetTop;
                while(el = el.offsetParent) {
                    ox += el.scrollLeft - el.offsetLeft;
                    oy += el.scrollTop - el.offsetTop;
                }
                return {x:event.clientX + ox, y:event.clientY + oy, element:id};
            }

            function requeteXHR(replace, link) {
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState==4 && xhr.status==200) {
                        document.getElementById(replace).innerHTML = xhr.responseText;
                    }
                }
                xhr.open("GET", link);
                xhr.send();
            }

            requeteXHR("milieu", "date.php");
        </script>
</body>
</html>
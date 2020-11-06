<?php
$date = date('Y/m/d');

?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>Hôtel</title>
 </head>
    
 <body class="background" onload="choix()">
  <div class="container">
     
        <br>
        <center>
        <h1>Bienvenue chez Hôtel Roosvelt</h1>
            
            <script type="application/javascript">
            var date="2020/10/09";
            var chambre = 1;
            function verifvide(){
                document.getElementById("resultatVerification").innerHTML = "";

            }

            function verifchambre(pchambre,date){
                chambre = pchambre
                var xhr = new XMLHttpRequest(); // instanciation d'un objet XMLHttpRequest
                // gestion de la réponse du serveur
                xhr.onreadystatechange = function() {
                    if (xhr.readyState==4 && xhr.status==200) {
                        document.getElementById("resultatVerification").innerHTML = xhr.responseText; // modification du contenu de la page web
                    }
                }
               // alert(chambre);
                xhr.open("GET", "verifchambre.php?chambre="+chambre+"&date="+date, true); // préparation de la requête HTTP (ici la méthode GET, appel d'un script PHP avec un paramètre)
                xhr.send(); // envoi de la requête HTTP

        

            }
            function dessinerUnHotel() {
                //alert("test");
                var canevas1 = document.getElementById("canevas"); // toile sur laquelle on va dessiner
                var contexte = canevas.getContext("2d"); // 2d et non pas 2D !
                contexte.beginPath();
                contexte.fillStyle = "grey";  // couleur RGB qui sera utilisé dans les dessins suivants
                contexte.fillRect(50, 25, 1400, 75);
                contexte.fill();
                contexte.closePath();

                contexte.fillStyle = "black";  // couleur du texte
                contexte.font= "15pt tahoma";
                contexte.fillText("Rue", 700, 75);

                /*contexte.beginPath();
                contexte.fillStyle = "brown";  // couleur RGB qui sera utilisé dans les dessins suivants
                contexte.fillRect(60, 110, 75, 850);
                contexte.closePath()*/
                var l = 120;
                for (var i = 0; i <= 8; i++) {
                    contexte.beginPath();
                    contexte.fillStyle = "brown";  // couleur RGB qui sera utilisé dans les dessins suivants
                    contexte.arc(120, l, 15, 0, Math.PI*2, true);
                    contexte.fill();
                    contexte.closePath();
                    l= l+85;
                }
                contexte.fillStyle = "black";  // couleur du texte
                contexte.font= "15pt tahoma";
                contexte.fillText("châtaigner", 100, l);

                contexte.beginPath();
                contexte.fillStyle = "green";  // couleur RGB qui sera utilisé dans les dessins suivants
                contexte.fillRect(1000, 110, 400, 750);
                contexte.closePath();

                contexte.fillStyle = "black";  // couleur du texte
                contexte.font= "15pt tahoma";
                contexte.fillText("Parc", 1175, 500);

                contexte.beginPath();
                contexte.fillStyle = "white";

                contexte.moveTo(260, 110);
                contexte.lineTo(990, 110);
                contexte.lineTo(990, 700);
                contexte.lineTo(750, 700);
                contexte.lineTo(750, 350);
                contexte.lineTo(260, 350);
                contexte.lineTo(260, 110);
                contexte.fill();
                contexte.stroke();
                contexte.closePath();

                contexte.beginPath();
                contexte.fillStyle = "lightgrey";  // couleur RGB qui sera utilisé dans les dessins suivants
                contexte.fillRect(260, 375, 450, 90);
                contexte.closePath();

                contexte.fillStyle = "black";  // couleur du texte
                contexte.font= "15pt tahoma";
                contexte.fillText("Terrasse", 300, 425);

                contexte.beginPath();
                contexte.fillStyle = "lightblue";  // couleur RGB qui sera utilisé dans les dessins suivants
                contexte.fillRect(300, 515, 350, 190);
                contexte.closePath();

                contexte.fillStyle = "black";  // couleur du texte
                contexte.font= "15pt tahoma";
                contexte.fillText("Piscine", 400, 650)





            }
            
            function occupe(pNumeroDeChambre, pDate){

                chambre = pNumeroDeChambre;
                date = pDate;
                var xhr = new XMLHttpRequest(); // instanciation d'un objet XMLHttpRequest
                // gestion de la réponse du serveur
                 xhr.open("GET", "verifchambre2.php?chambre="+chambre+"&date="+date, true); // préparation de la requête HTTP (ici la méthode GET, appel d'un script PHP avec un paramètre)
                    xhr.send();

                xhr.onreadystatechange = function() {
                    if (xhr.readyState==4 && xhr.status==200) {
                        resultat = document.getElementById("occupe").value; // modification du contenu de la page web

                    }
                }
               // alert(chambre);
                // envoi de la requête HTTP
                var occupe = true;
                
                if (occupe = true) {
                    return false;
                }else{
                    return true;
                }
                

            }

            function couleurChambre(numeroDeChambre){
                date = document.getElementById("date").value;
                
                var xhr = new XMLHttpRequest(); // instanciation d'un objet XMLHttpRequest
              
                if (numeroDeChambre == "reception"){
                    var couleur="#6daabd";
                }else{


                    if (occupe(numeroDeChambre, date)== true) {
                            var couleur="#79cf24";
                    }else if(occupe(numeroDeChambre, date)== false){                       
                            var couleur="#f0290e";                   
                            
                    }else{
                        var couleur="#f0290e";

                    }
                    
                    

                }

                
                


                return couleur;
            }

            function dessinerUneChambre(type, a, b, couleur, contexte, nom=""){
                if (type == 1){
                    contexte.strokeStyle="rgb(0,0,0)";
                    contexte.lineWidth=3;
                    contexte.strokeRect(a,b,87,87);
                    contexte.fillStyle = couleur;
                    contexte.fillRect(a,b,87,87); 
                    contexte.fillStyle = "black";
                    contexte.font = "15pt Arial";
                    contexte.fillText(nom, a+25, b+50);
                }else if (type == 2){
                    contexte.strokeStyle="rgb(0,0,0)";
                    contexte.lineWidth=3;
                    contexte.strokeRect(a,b,189,87);
                    contexte.fillStyle = couleur;
                    contexte.fillRect(a,b,189,87); 
                    contexte.fillStyle = "black";
                    contexte.font = "15pt Arial";
                    contexte.fillText(nom, a+75, b+50);

                }else if (type == 3){
                    contexte.strokeStyle="rgb(0,0,0)";
                    contexte.lineWidth=3;
                    contexte.strokeRect(a,b,87,189);
                    contexte.fillStyle = couleur;
                    contexte.fillRect(a,b,87,189); 
                    contexte.fillStyle = "black";
                    contexte.font = "15pt Arial";
                    contexte.fillText(nom, a+25, b+100);

                }else if (type == 4){
                    contexte.strokeStyle="rgb(0,0,0)";
                    contexte.lineWidth=3;
                    contexte.strokeRect(a,b,189,189);
                    contexte.fillStyle = couleur;
                    contexte.fillRect(a,b,189,189); 
                    contexte.fillStyle = "black";
                    contexte.font = "15pt Arial";
                    contexte.fillText(nom, a+75, b+100);

                }
            }

            function dessiner(){
                if (etage == choix) {

                }else{
                var canevas1 = document.getElementById("hotel"); // toile sur laquelle on va dessiner
                canevas1.addEventListener("mousedown", select, false);
                var contexte = canevas1.getContext("2d"); //"2d" et non pas "2D" !
                
                contexte.fillStyle = "#efefef"; //ne pas oublier les guillemets, couleur RGB utilisé dans les dessins
                contexte.fillRect(0,0,canevas1.width,canevas1.height); // l'origine (coordonnées (0, 0)) est située en haut à gauche
                //dessin d'un rectangle de la taille du hotel

                //un tracé de plusieurs droites
                contexte.beginPath();
                contexte.strokeStyle = "#999";
                contexte.moveTo(10,10);
                contexte.lineTo(650,10);
                contexte.lineTo(650,515);
                contexte.lineTo(450,515);
                contexte.lineTo(450,210);
                contexte.lineTo(10,210);
                contexte.lineTo(10,10);
                contexte.stroke();
                contexte.closePath();

            }
        }
            function choix(){
                if (etage == choix) {

                }else{

                
                    var canevas1 = document.getElementById("hotel"); // toile sur laquelle on va dessiner
                    var contexte = canevas1.getContext("2d"); //"2d" et non pas "2D" !
                    var etage = document.getElementById("etage").value;

                    dessiner();
                    contexte.fillStyle = "#efefef"; //ne pas oublier les guillemets, couleur RGB utilisé dans les dessins
                    contexte.fillStyle = "black";
                    contexte.font = "15pt Tahoma";
                    contexte.strokeStyle = "#202020";
                    contexte.beginPath();
                     if (etage == "rdc"){
                        dessinerUneChambre(1, 15, 15, couleurChambre(1), contexte, "001");
                        dessinerUneChambre(1, 15, 117, couleurChambre(2), contexte, "002");
                        dessinerUneChambre(1, 117, 15, couleurChambre(3), contexte, "003");
                        dessinerUneChambre(1, 117, 117, couleurChambre(4), contexte, "004");
                        dessinerUneChambre(2, 219, 15, couleurChambre(5), contexte, "005");
                        dessinerUneChambre(1, 219, 117, couleurChambre(6), contexte, "006");
                        dessinerUneChambre(1, 321, 117, couleurChambre(7), contexte, "007");
                        dessinerUneChambre(1, 455, 117, couleurChambre(8), contexte, "008");
                        dessinerUneChambre(1, 455, 15, couleurChambre(9), contexte, "009");
                        dessinerUneChambre(3, 557, 15, couleurChambre("reception"), contexte);
                        contexte.fillText("Reception", 562, 16+95, 80);
                        dessinerUneChambre(3, 455, 219, couleurChambre(10), contexte, "010");
                        dessinerUneChambre(1, 557, 219, couleurChambre(11), contexte, "011");
                        dessinerUneChambre(1, 557, 321, couleurChambre(12), contexte, "012");
                        dessinerUneChambre(2, 455, 423, couleurChambre(13), contexte, "013");
                        contexte.fillStyle = "#202020"; //couleur du texte
                        contexte.lineWidth=1;
                        contexte.font = "25pt Arial"; //choix de la police et de la taille des caractères
                        contexte.fillText("Rez-de-chaussée", 70, 400);
                        
                    }else if(etage == "etage1"){
                        dessinerUneChambre(1, 15, 15, couleurChambre(101), contexte, 101);
                        dessinerUneChambre(1, 117, 15, couleurChambre(102), contexte, 102);
                        dessinerUneChambre(2, 15, 117, couleurChambre(103), contexte, 103);
                        dessinerUneChambre(1, 219, 15, couleurChambre(104), contexte, 104);
                        dessinerUneChambre(1, 219, 117, couleurChambre(105), contexte, 105);
                        dessinerUneChambre(1, 321, 15, couleurChambre(106), contexte, 106);
                        dessinerUneChambre(1, 321, 117, couleurChambre(107), contexte, 107);
                        dessinerUneChambre(1, 455, 15, couleurChambre(108), contexte, 108);
                        dessinerUneChambre(1, 455, 117, couleurChambre(109), contexte, 109);
                        dessinerUneChambre(3, 557, 15, couleurChambre(110), contexte, 110);
                        dessinerUneChambre(1, 455, 219, couleurChambre(111), contexte, 111);
                        dessinerUneChambre(1, 557, 219, couleurChambre(112), contexte, 112);
                        dessinerUneChambre(4, 455, 321, couleurChambre(113), contexte, 113);
                        contexte.fillStyle = "#202020"; //couleur du texte
                        contexte.lineWidth=1;
                        contexte.font = "25pt Arial"; //choix de la police et de la taille des caractères
                        contexte.fillText("Premier étage", 70, 400);

                    }else if (etage == "etage2"){
                        dessinerUneChambre(4, 15, 15, couleurChambre(201), contexte, 201);
                        dessinerUneChambre(2, 219, 117, couleurChambre(202), contexte, 202);
                        dessinerUneChambre(2, 219, 15, couleurChambre(203), contexte, 203);
                        dessinerUneChambre(1, 455, 15, couleurChambre(204), contexte, 204);
                        dessinerUneChambre(1, 455, 117, couleurChambre(205), contexte, 205);
                        dessinerUneChambre(3, 557, 15, couleurChambre(206), contexte, 206);
                        dessinerUneChambre(1, 455, 219, couleurChambre(207), contexte, 207);
                        dessinerUneChambre(1, 557, 219, couleurChambre(208), contexte, 208);
                        dessinerUneChambre(4, 455, 321, couleurChambre(209), contexte, 209);
                        contexte.fillStyle = "#202020"; //couleur du texte
                        contexte.lineWidth=1;
                        contexte.font = "25pt Arial"; //choix de la police et de la taille des caractères
                        contexte.fillText("Deuxième étage", 70, 400);

                    }

                    contexte.stroke();
                    contexte.closePath();
                    //un tracé de plusieurs droites
            }
        }

        function select(e) {
            chambre = getCoordonnees(this, e);
            if (chambre == "réception"){
                verifvide();
                document.getElementById("chambre").innerHTML = chambre;
            }else if (chambre == ""){
                verifvide();
                document.getElementById("chambre").innerHTML = "Vous devez selectionez une chambre";
            }else{
                date = document.getElementById("date").value;
                verifchambre(chambre,date);
                document.getElementById("chambre").innerHTML = "Vous avez choisit la chambre n°"+chambre;
            }
        }


            function getCoordonnees(el, event) {
                var ox = -el.offsetLeft;
                var oy = -el.offsetTop;
                while(el=el.offsetParent) {
                    ox += el.scrollLeft - el.offsetLeft;
                    oy += el.scrollTop - el.offsetTop;
                }
                var corx = event.clientX + ox;
                var cory = event.clientY + oy;
                if (document.getElementById("etage").value == "rdc"){
                    if (corx > 15 && corx < 15+87 && cory > 15 && cory < 15+87){
                        return "001";
                    }else if (corx > 15 && corx < 15+87 && cory > 117 && cory < 117+87){
                        return "002";
                    }else if (corx > 117 && corx < 117+87 && cory > 15 && cory < 15+87){
                        return "003";
                    }else if (corx > 117 && corx < 117+87 && cory > 117 && cory < 117+87){
                        return "004";
                    }else if (corx > 219 && corx < 219+189 && cory > 15 && cory < 15+87){
                        return "005";
                    }else if (corx > 219 && corx < 219+87 && cory > 117 && cory < 117+87){
                        return "006";
                    }else if (corx > 321 && corx < 321+87 && cory > 117 && cory < 117+87){
                        return "007";
                    }else if (corx > 455 && corx < 455+87 && cory > 117 && cory < 117+87){
                        return "008";
                    }else if (corx > 455 && corx < 455+87 && cory > 15 && cory < 15+87){
                        return "009";
                    }else if (corx > 557 && corx < 557+87 && cory > 15 && cory < 15+189){
                        return "réception";
                    }else if (corx > 455 && corx < 455+87 && cory > 219 && cory < 219+189){
                        return "010";
                    }else if (corx > 557 && corx < 557+87 && cory > 219 && cory < 219+87){
                        return "011";
                    }else if (corx > 557 && corx < 557+87 && cory > 321 && cory < 321+87){
                        return "012";
                    }else if (corx > 455 && corx < 455+189 && cory > 423 && cory < 423+87){
                        return "013";
                    }else{
                        return "";
                    }
                }else if (document.getElementById("etage").value == "etage1"){
                    if (corx > 15 && corx < 15+87 && cory > 15 && cory < 15+87){
                        return "101";
                    }else if (corx > 117 && corx < 117+87 && cory > 15 && cory < 15+87){
                        return "102";
                    }else if (corx > 15 && corx < 15+189 && cory > 117 && cory < 117+87){
                        return "103";
                    }else if (corx > 219 && corx < 219+87 && cory > 15 && cory < 15+87){
                        return "104";
                    }else if (corx > 219 && corx < 219+87 && cory > 117 && cory < 117+87){
                        return "105";
                    }else if (corx > 321 && corx < 321+87 && cory > 15 && cory < 15+87){
                        return "106";
                    }else if (corx > 321 && corx < 321+87 && cory > 117 && cory < 117+87){
                        return "107";
                    }else if (corx > 455 && corx < 455+87 && cory > 15 && cory < 15+87){
                        return "108";
                    }else if (corx > 455 && corx < 455+87 && cory > 117 && cory < 117+87){
                        return "109";
                    }else if (corx > 557 && corx < 557+87 && cory > 15 && cory < 15+189){
                        return "110";
                    }else if (corx > 455 && corx < 455+87 && cory > 219 && cory < 219+87){
                        return "111";
                    }else if (corx > 557 && corx < 557+87 && cory > 219 && cory < 219+87){
                        return "112";
                    }else if (corx > 455 && corx < 455+189 && cory > 321 && cory < 321+189){
                        return "113";
                    }else{
                        return "";
                    }
                }else if (document.getElementById("etage").value == "etage2"){
                    if (corx > 15 && corx < 15+189 && cory > 15 && cory < 15+189){
                        return "201";
                    }else if (corx > 219 && corx < 219+189 && cory > 117 && cory < 117+87){
                        return "202";
                    }else if (corx > 219 && corx < 219+189 && cory > 15 && cory < 15+87){
                        return "203";
                    }else if (corx > 455 && corx < 455+87 && cory > 15 && cory < 15+87){
                        return "204";
                    }else if (corx > 455 && corx < 455+87 && cory > 117 && cory < 117+87){
                        return "205";
                    }else if (corx > 557 && corx < 557+87 && cory > 15 && cory < 15+189){
                        return "206";
                    }else if (corx > 455 && corx < 455+87 && cory > 219 && cory < 219+87){
                        return "207";
                    }else if (corx > 557 && corx < 557+87 && cory > 219 && cory < 219+87){
                        return "208";
                    }else if (corx > 455 && corx < 455+189 && cory > 321 && cory < 321+189){
                        return "209";
                    }else{
                        return "";
                    }
                }
                
            }
                
            </script>
            <canvas id="hotel" width="770" height="600"></canvas>

            <br>
            <input type="date" id="date" <?php echo " value=\"$date\" "?>>
            <label for="etage">Selectionné l'Etage: </label>
            <select id="etage" onchange="choix()">
            <option value="rdc" selected="">Rez-de-chaussée</option> 
            <option value="etage1">Premier Etage</option>
            <option value="etage2">Deuxième Etage</option>
            </select>
            <h4 id="chambre"></h4>
            <h2 id="resultatVerification"></h2>
            <div id="resultatVerification2">
                
            </div>
        </div>
 	</body>
 </html>
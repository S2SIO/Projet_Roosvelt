<?php
if (isset($_GET["chambre"])) {
    $chambre = $_GET["chambre"];
    $date= $_GET["date"];

}else{
    exit();
}


require_once("constantes.inc.php");


try {
    $pdo = new PDO(DSN, UTILISATEUR, MDP); // tentative de connexion
    //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // utile pour le débogage
} catch(PDOException $e) {
    echo "problème de connexion\n";
    echo $e->getMessage();
    exit(1); // on arrête le script
}

//echo "le script est connecté avec la base de données\n";

try {
 
    $requetePreparee = $pdo->prepare('select * from client inner join reservation on reservation.client_id = client.id where chambre = ? and date = ?;');
    $requetePreparee->bindParam(1, $chambre, PDO::PARAM_STR);
    $requetePreparee->bindParam(2, $date, PDO::PARAM_STR);

    $resultat = $requetePreparee->execute();
    if ($resultat) {
        //echo "réussie\n";

        $lignes = $requetePreparee->fetchAll(); // on essaie de récupérer toutes les lignes
        //var_export($lignes);
        if (count($lignes)==0) {
            echo "Il n'y a pas de reservation aujourd'hui ";
            echo "cliquer <a href=\"ajout.php?chambre=$chambre&date=$date\">ici</a> pour en rajouter un ";
        }else{

            for($i = 0; $i < count($lignes); $i++) {
            echo "Monsieur : ",$lignes[$i]['nom'],"  ",$lignes[$i]['prenom'],"</br>";
            echo "à réserver la chambre : ", $lignes[$i]['chambre'],"<br>";
            echo "Pour la journée du : ",$lignes[$i]['date'],"<br>";
            
            
        }

        }
        
    } else {
        echo "échec\n";
        echo $requetePreparee->errorInfo()[2], "\n";
    }
} catch(PDOException $e) {
    echo "problème avec la requête de sélection\n";
    echo $e->getMessage();
    exit(1); // on arrête le script
}

$pdo = NULL; //fermeture de la connexion



?>

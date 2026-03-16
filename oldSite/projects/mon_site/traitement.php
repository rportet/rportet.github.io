<?php
$message="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    //C'est ici qu'on va traiter le formulaire
    $connexion="pgsql:host=localhost;port=5432;dbname=tp7;user=login;password=login";
    $database=new PDO ($connexion);

    if($database){
        $nom=$_POST["nom"];
        $courriel=$_POST["email"];
        $telephone=$_POST["notel"];
        $motif=$_POST["motif"];
        $creneau=$_POST["date"];
        $demande=$_POST["demande"];
        $message=$_POST["message"];
        $envoi=$_POST["submit"];
        $reinitialise=$_POST['reset'];

// autres variables

$requete="INSERT INTO public.formulaire(nom, courriel, telephone, motif, creneau, demande, message) values (?,?,?,?,?,?,?);"
$requete_prepare=$database->prepare($requete);
$resultat=$requete_prepare->execute([$nom, $courriel, $telephone, $motif, $creneau, $demande, $message, $envoi, $reinitialise]);
if($resultat){
    $message="Votre demande a bien été enregistrée<br/>" +
    "Nom: ".$nom."<br/>";
    "Email: ".$courriel."<br/>";
    "Numéro de téléphone: ".$telephone."<br/>";
    "Motif de contact: ".$motif."<br/>";
    "Créneau (date et heure): ".$creneau."<br/>";
    "Première demande: ".$demande."<br/>";
    "Contenu du message".$message."<br/>";

}
else {
    $message="Erreur lors de l'enregistrement, veuillez réessayer";
}
    }
    else {
        $message="Erreur de connexion à la base de données !";
    }
}
else{
$message="Aucun  formulaire envoyé";
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Page de confirmation</title>
        <link type="text/css" rel="stylesheet" href="mon_style.css" />
    </head>
    <body>
        <div><?php
        echo $message;
        ?>
</div>
<a href="accueil.html" title="accueil">retour à l'accueil</a>
</body>
    </html>
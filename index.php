<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout produit</title>
</head>
<body>

       <!-- La page index contient le formulaire qui nous permettra de renseigner les produits à l'application -->
<?php
session_start();
?>
    <h1>Ajouter un produit</h1>
      <form action="traitement.php" method="post">
        <p>
            <label>
                Nom du produit : 
                <input type="text" name="name">
            </label>
        </p>
        <p>
            <label>
                Prix du produit :
                <input type="number" step="any" name="price">
            </label>
        </p>
        <p>
            <label>
                Quantité désirée : 
                <input type="number" name="qtt" value="1">
            </label>
        </p>
        <p>
            <input type="submit" name="submit" value="Ajouter le produit">
        </p>
    
      </form>



      <!--php var_dump($SESSIONS); ?>--> 

       <!-- affiche les valeurs saisis dans "Ajouter un produit" -->




    
</body>
</html>
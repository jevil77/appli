<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.CSS">
    <title>Ajout produit</title>
</head>
<body>
    <style>

form {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
}

label {
  
      margin-bottom: 10px;
  
}

input[type="text"],
input[type="number"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
}

 input[type="submit"] {
     background-color: #8c8179;
     color: #5d6d7e
     border: none;
     padding: 10px 20px;
     border-radius: 3px;
  
}

  input[type="submit"]:hover {
        background-color:#7e7168 ;
  }





    </style>



<nav>
    <ul>
        <ol><a href="index.php"><button name="button">Ajouter produit</button></a></ol>
        <br>
        <ol><a href="recap.php"><button name="button">Afficher recap</button></a></ol>
        
    </ul>
</nav>




       <!-- La page index contient le formulaire qui nous permettra de renseigner les produits à l'application -->
<?php
session_start();
?>

<?php




if(isset ($_SESSION['products']) ) {

    $countProducts = count($_SESSION['products']);

     echo "Nombre de produits dans la session : $countProducts";


}




//echo $_SESSION['alert'];


if (isset($_SESSION['alert'])) {
    echo  $_SESSION['alert'] ;
    
    unset($_SESSION['alert']);
}



?>
 
    <h1>Ajouter un produit</h1>
      <form action="traitement.php?action=add" method="post">
        <p>
            <label>
                Nom du produit : 
                <input type="text" name="name">
            </label>
        </p>
        <p>
            <label>
                Prix du produit :
                <input type="number" min = 1 step="any" name="price">
            </label>
        </p>
        <p>
            <label>
                Quantité désirée : 
                <input type="number" min= 1 name="qtt" value="1">
                
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
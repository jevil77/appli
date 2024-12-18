
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Appli</title>
</head>
<body>





       <!-- La page index contient le formulaire qui nous permettra de renseigner les produits à l'application -->
<?php
session_start();
?>















 <div>
    <h1>Ajouter un produit</h1>
      <form class=tableau action="traitement.php?action=add" method="post">
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

      
         <ul class="centre">
           <ol><a href="index.php"><button class="btn" name="button">Ajouter produit</button></a></ol>
           <br>
           <ol><a href="recap.php"><button class="btn" name="button">Afficher recap</button></a></ol>
        
         </ul>

   </div>

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

        
      <!--php var_dump($SESSIONS); ?>--> 

       <!-- affiche les valeurs saisis dans "Ajouter un produit" -->

       
</body>
</html>
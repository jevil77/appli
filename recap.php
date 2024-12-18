<?php
  
     session_start();
    // démarrage session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Récapitulatif des produits</title>
</head>
<body>
  

 
 












   



      <!-- la page recap permet d'afficher de manère organisée et exhaustive la liste des produits présents en session + total -->

<?php 
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])) {

        echo "<p>Aucun produit en session...</p>";
    }

    else {                                                         // affichage dynamique des produits
        
        echo "<table>",
                "<thead>",
                   "<tr>",
                       "<th>#</th>",
                       "<th>Nom</th>",
                       "<th>Prix</th>",
                       "<th>Quantité</th>",
                       "<th>Total</th>",
                    "</tr>",
                 "</thead>",
                "<tbody>";
                
                
            $totalGeneral = 0;        
                
                

        foreach($_SESSION['products'] as $index => $product){



            echo "<tr>",
                    "<td>".$index."</td>",
                    "<td>".$product['name']."</td>", 
                    "<td>".number_format($product['price'],2,",","&nbsp;")."&nbsp;€</td>",
                    "<td >".$product['qtt']. "",
                     "<a href=traitement.php?action=plusQtt&id=$index> + </a><a href=traitement.php?action=moinsQtt&id=$index> - </a></td>",
                    
                    "<td>".number_format($product['total'],2,",","&nbsp;")."&nbsp;€</td>",
                  "</tr>";



        //Construction d'un tableau associatif pour chaque produit


                  
                 
            


                  $totalGeneral += $product ['total'];

        }

        echo "<tr>",
                 "<td colspan=4>Total général : </td>",
                 "<td><strong>".number_format($totalGeneral, 2,",","&nbsp;")."&nbsp;€</strong></td>",
                "</tr>",

               "</tbody>",
            "</table>";




                 
        // calcul et affichage du total général

    
    }

    // si j'ai des produits en session alors echo "Nb de produits dans la session"

    if(isset ($_SESSION['products']) ) {

        $countProducts = count($_SESSION['products']);

         echo "Nombre de produits dans la session : $countProducts";


    }

    

    

   



    
    if (isset($_SESSION['alert'])) {
     echo     $_SESSION['alert'];
    
    }


    ?>

<div class="align">    
  <div>
   <nav>
      <ul>
        <ol><a href="index.php"><button  class="btn" name="button">Ajouter produit</button></a></ol>
        <br>
        <ol><a href="recap.php"><button class="btn" name="button">Afficher recap</button></a></ol>
        <br>
        <ol><a href="traitement.php?action=clear"><button  class="btn" name="button"> Vider le panier</button></a></ol>

        
      </ul>
  </nav>
  </div>
  <div class="image">
    <img src="https://www.macary.fr/wp-content/uploads/2021/10/Epicerie-Fine-Bio-04.jpg" alt="">
    </div>

</div>






<!-- permet de naviguer entre les deux pages --> 

    







    


    










    




    



    


   
    


   

    

   
    ?>




    
</body>
</html> 
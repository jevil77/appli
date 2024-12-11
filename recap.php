<?php
  
     session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    "<td>".$product['qtt']."</td>", 
                    "<td>".number_format($product['total'],2,",","&nbsp;")."&nbsp;€</td>",
                  "</tr>";


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


    var_dump($_SESSION['products']);  

    // affiche les produits de la session


    ?>


    
</body>
</html> 
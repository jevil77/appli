<?php
  
     session_start();
    // démarrage session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif des produits</title>
</head>
<body>
    <style>

table {
  border: 1px;
  width: 100%;
}

th, td {
  border: 1px solid #cacfd2;
  padding: 8px;
  text-align: center;
}

th {
  background-color: #aeb6bf;
}

tr {
  background-color: #f2f2f2;
}






    </style>



<nav>
    <ul>
        <li><a href="index.php">Ajout produit</a></li>
        <li><a href="recap.php">Recap</a></li>
        
    </ul>
</nav>

 <!-- permet de naviguer entre les deux pages --> 


       
<a href="traitement.php?action=clear">vider le panier</a> 

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




    
</body>
</html> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <style>
        .alert {
           padding: 20px;
           background-color: #f44336; 
           color: white;
           margin-bottom: 15px;
           border-radius: 5px;
           position: relative;
        }




      </style>
    
</body>
</html>







<?php

    session_start();



    if(isset($_GET['action'])){


        switch($_GET['action']){
            
        case "add":
        






            
        

     if(isset($_POST['submit'])){

        $name = filter_input(INPUT_POST,"name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST,"price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt = filter_input(INPUT_POST,"qtt", FILTER_VALIDATE_INT);

        // filtre les valeurs transmises

        if($name && $price && $qtt){     // valeurs nettoyés

            $product = [                 // enregistrement du produit en session

                  "name"  => $name,
                  "price" => $price,
                  "qtt"   => $qtt,
                  "total" => $price*$qtt
            ];

        $_SESSION['products'][] = $product;   
        // enregistre le produit en session
        
        $_SESSION['alert'] = "<div class='alert'><p>Produit ajouté au recap</p></div>";

        

        }

        else $_SESSION['alert'] = "<div class='alert'><p>Une erreur est survenue</p></div>";

    
    
    
    }   
    
        
   
    header("Location:index.php");

    break;
    

    case "clear":

        
                           
        unset($_SESSION['products']);
        
        // header("Location:recap.php");

        // $_SESSION['alert'] = "<div><p>La session a été vidé</p><</div>";
    
        break;
        
    
    



   


    case 'plusQtt' :     
        if(isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])) {
        $_SESSION['products'][$_GET['id']]['qtt']++;
         $_SESSION['products'][$_GET['id']]['total']=
        $_SESSION['products'][$_GET['id']]['qtt']*$_SESSION['products'][$_GET['id']]['price']; 

            
        header("Location:recap.php");
        }
    break;

    //Ce code vérifie si l'ID du produit est défini dans GET et si le produit existe dans la session. Si c'est le cas, il incrémente la quantité du produit, met à jour le total et redirige vers la page recap2.php.

    case 'moinsQtt' :     
        if(isset($_GET['id']) && isset($_SESSION['products'][$_GET['id']])) {
        $_SESSION['products'][$_GET['id']]['qtt']--; 
        $_SESSION['products'][$_GET['id']]['total']=
         $_SESSION['products'][$_GET['id']]['qtt']*$_SESSION['products'][$_GET['id']]['price']; 
            if ($_SESSION['products'][$_GET['id']]['qtt']==0){
                unset($_SESSION['products'][$_GET['id']]);
            
            }

            ; 
            header("Location:recap.php");
        
        
        
        }
    
        break;

    //Ce code vérifie si l'ID du produit est défini dans GET et si le produit existe dans la session. Si c'est le cas, il décrémente la quantité du produit, met à jour le total, et supprime le produit de la session si la quantité atteint zéro. Puis redirige vers la page recap.php.

    }
    
    
}
?>



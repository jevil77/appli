<?php

    session_start();

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


        }

         
    }

   
    header("Location:index.php");


?>



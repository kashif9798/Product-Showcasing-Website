<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Medlea Pharmaceuticals Peshawar Pakistan provides Medicine pharmaceuticals neutraceuticals products">
    <title>
        <?php

            if ($page=='products') {
               echo "Products";
            }
            elseif ($page=='contact') {
               echo "Contact";
            }
            elseif ($page=='about') {
               echo "About";
            }
            elseif ($page=='details') {
               echo "Product Details";
            }
            elseif ($page=='search') {
               echo "Search";
            }
            else{
                echo "Medlea Pharma";
            }


        ?>
    </title>
    <link rel="icon" href="images/logo/ico.png" type="image/ico">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Solway" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/5d6027f243.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

   
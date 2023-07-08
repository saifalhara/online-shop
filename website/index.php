<?php 
session_start() ;
require_once "./php/createDB.php" ; 
require_once "./php//component.php" ; 

$database = new createDB("productdb" , "producttp") ; 

if(isset($_POST['add'])){
    if(isset($_SESSION['cart'])){
       $item_array_id =array_column($_SESSION['cart'] , "product_id") ;

      // print_r($item_array_id) ;
       if(in_array($_POST['product_id'] , $item_array_id)){
            echo "<script>alert('product is already added in the cart..!')</script>";
            echo "<script>window.location='index.php'</script>" ;

       }else {
            $count = count($_SESSION['cart']); 
            $item_array = array('product_id' => $_POST['product_id'] );
            $_SESSION['cart'][$count] = $item_array ;
        }
    }else {
        $item_array = array('product_id' => $_POST['product_id'] );
    
    $_SESSION['cart'][0] =$item_array ; 
    print_r($_SESSION['cart']) ; 
    }
}

?> 
<!DOCTYPE html>
<html lang="en">
<head>
<title>Shopping Cart</title>

    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap CDN -->
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    </style>
</head>
<body>
    <?php 
    require_once ("php/header.php") ;
    ?>
<div class="container">
    <div class="row text-center py-5">
        <?php 
            $result = $database->getData();
                while ($row = mysqli_fetch_assoc($result)) {
                    component($row['product_name'], $row["product_price"], $row["product_image"] , $row['id']);
            } 
        ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

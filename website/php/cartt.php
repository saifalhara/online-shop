<?php 
session_start() ; 
require_once "./createDB.php" ; 
require_once "./component.php" ; 

$database = new createDB("productdb" , "producttp") ; 
if(isset($_POST['remove'])){    
    if($_GET['action'] == 'remove'){
        foreach($_SESSION['cart'] as $key => $value){
            if($value['product_id'] == $_GET['id']){
                unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been Removed ..!')</script>";
                echo "<script>window.location 'cartt.php'</script>" ;
            
            }
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Cart</title>

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
    <body class="bg-light">
     <?php require_once ("header.php"); ?>
     <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
            <div class="shopping-cart">
                <h6>My cart</h6>
                <hr>
                <?php
                $total = 0 ;
                    if(isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'] , 'product_id') ;
                    $result = $database->getData() ;
                    while($row = mysqli_fetch_assoc($result)){
                        foreach($product_id as $id){
                            if($row['id'] == $id){
                                cartElement($row["product_image"] , $row['product_price'] , $row['product_name'] , $row['id']);
                                $total += (int)$row['product_price'] ;
                            }
                        }
                    }
                }else {
                    echo "<h5>Cart is Empty</h5>" ;
                }
                ?>
            </div>
            </div>
                <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
                    <div class="pt-4">
                        <h6>PRICE DETAILS</h6>
                        <hr>
                        <div class="row price-details">
                            <div class="col-md-6">
                                <?php
                                    if(isset($_SESSION['cart'])){
                                        $count = count($_SESSION['cart']) ;
                                        echo "<h6>Price ($count items)</h6>";
                                    }else{
                                        echo "<h6>Price (0 items)</h6>";
                                    }
                                
                                ?> 
                                <h6>Delivery Charges</h6>
                                <hr>
                                <h6>Amount payable</h6>

                            </div>
                            <div class="col-md-6">
                            <h6>
                                $
                                <?php 
                                    echo $total ;
                                ?>

                            </h6>
                            <h6 class="text-success">Free</h6>
                            <hr>
                            <h6>$ <?php 
                                echo $total ;
                            ?> </h6>

                            </div>
                        </div>
                    </div>
                </div>
        </div>
     </div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>

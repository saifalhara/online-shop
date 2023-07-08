<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5">
                <i class="fas fa-shopping-basket"></i> Shopping cart
            </h3>
        </a>
        <button class="navbar-toggler"
                    type="button" 
                    data-toggle="collapse"
                    data-target="#navbarNavAltMarkup"
                    aria-controls="navbarNavAltMarkup"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                    >
                <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
        <a href="php/cartt.php" class="nav-item nav-link active">
            <h5 class="px-5 cart">
                <i class="fas fa-shopping-cart"></i> cart
                <?php
                if(isset($_SESSION['cart'])){
                    $count = count($_SESSION['cart']);
                    echo '<span id="cart-count" style=" text-align: center ; padding: 0 0.9rem 0.1rem 0.9rem ; border-radius: 3rem ;" class="text-warning bg-light ml-2"> '.$count.' </span>';
                }else{
                    echo '<span id="cart-count" style=" text-align: center ; padding: 0 0.9rem 0.1rem 0.9rem ; border-radius: 3rem ;" class="text-warning bg-light ml-2">0</span>';

                }
                
                
                ?>
            </h5>
        </a>
    </div>
</div>

    </nav>
</header>
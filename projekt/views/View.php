<?php

// Viktigt att läsa om PHP Templating och HEREDOC syntax!
// https://css-tricks.com/php-templating-in-just-php/

class View
{

    

    public function ViewHeader($title)
    {
        $html = <<<HTML
                <!doctype html>
                        <html lang="sv">
                        <head>
                        <meta charset="utf-8">
                        <title>$title</title>
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <link rel="stylesheet" href="styles/bootstrap.css">
                        <link rel="stylesheet" href="styles/style.css">
                        </head>
                        <body class="container">
                        <h1 class="text-center">
                        <a href="index.php">$title</a>
                        </h1>

                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="views/">Admin </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact/visitor">Contact</a>
                            </li>
                        </div>
                        </nav>
                        <div class='row'>
                

                        
        HTML;

        echo $html;
    }


    public function viewFooter()
    {
        $date = date('Y');

        $html = <<<HTML
            </div> <!-- row -->
            <footer class="text-center text-muted">
            <hr>
            <p>Copyright &copy; $date</p>
            </footer>
            </body>
            </html>
        HTML;

        echo $html;
    }


public function viewProduct($product)
    {
        $html = <<<HTML
        <div class="col-md-6"> <div class="card m-1">
                                <img class="card-img-top" src="images/$product[image]" alt="$product[title]">
                                <div class="card-body">
                                    <div class="card-title text-center">
                                    <h4>$product[title]</h4>
                                <h5>$product[price] kr </h5>
                                                                </div>
                                </div>
                            </div>
                        <a href="?id=$product[product_id]">
                            <button>Buy</button>
                           
                        </a>
                    </div>  <!-- col -->
        
          
            
        HTML;
        echo $html;
    }


    public function viewAllProducts($products)
    {
        foreach ($products as $key => $product) {
            $this->viewProduct($product);
        }
    }

 
    public function viewOrderForm($product)
    {

        $html = <<<HTML
            <div class="col-md-6">
                <h3 class='text-center text-primary'>Order Form</h3>
            
                <form action="order.php" method="post">
                    <input type="hidden" name="product_id" 
                            value="$product[product_id]">

                            <input type="hidden" name="customer_id" required 
                            class="form-control form-control-lg my-2" >
                        
                   
                            <input type="text" name="name" required 
                            class="form-control form-control-lg my-2" 
                            placeholder="Enter your name">
                           
                            <input type="email" name="email" required 
                            class="form-control form-control-lg my-2" 
                            placeholder="Enter your email">

                            <input type="text" name="address" required 
                            class="form-control form-control-lg my-2" 
                            placeholder="Enter your address">
                
                            <input type="text" name="telefon" required 
                            class="form-control form-control-lg my-2" 
                            placeholder="Enter your telephone number">
                
                
                    <input type="submit" class="form-control my-2 btn btn-lg btn-outline-success" 
                            value="Confirm Order">
                </form>
                </div>
                
            <!-- col avslutas efter en alert -->
        HTML;

        echo $html;
    }


    

}
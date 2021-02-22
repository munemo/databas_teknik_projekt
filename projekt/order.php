
<!DOCTYPE html>
<html>
<body>
<div class="col-md-6">
           
                        <div class="card-body">
                            <div class="card-title text-center">
                            <h1 class="container">Delivery Details</h4>
                                <h4>Name: <?php echo $_POST['name'];?></h4>
                                <h4>Email:<?php echo $_POST['email'];?></h4>
                                <h4>Address:<?php echo $_POST['address'];?></h4>
                                <h4>Telefon:<?php echo $_POST['telefon'];?></h4>
                                
                              </div>
                    </div>    
            

<?php

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }
}

$servername = "localhost";
$username = "admin";
$password = "Zimbabwe1980!";
$dbname = "webshopdb";

$name = $_POST['name'];
$product_id = $_POST['product_id'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    

    $Query = $conn->prepare(" INSERT INTO orders (customer_id,product_id) 
    VALUES ((SELECT customer_id FROM customers WHERE name =:name), :product_id)");
    $Query->execute(['name'=> $name,'product_id'=>$product_id ]);
    $order  = $Query->setFetchMode(PDO::FETCH_ASSOC);

  // echo $order;
    
   
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;

?>

</body>
</html>

<?php
    
/***************************************
 * 
 *                DELETE MESSAGE
 * 
 ***************************************/


require_once ("database.php");

$id = htmlspecialchars($_GET['customer_id']);


$id = filter_var($id, FILTER_SANITIZE_EMAIL);


if(isset($id)) 
$sql = "DELETE FROM customers WHERE customer_id = :customer_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':customer_id', $id);
$stmt->execute();
$rowCount = $stmt->rowCount();

$message = "<div class='alert alert-danger' role='alert'>
                <p>$rowCount customer deleted!</p>
            </div>";  

echo $message;

require_once ("footer.php");

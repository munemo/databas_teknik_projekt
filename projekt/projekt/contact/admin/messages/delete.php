<?php
    
/***************************************
 * 
 *                DELETE MESSAGE
 * 
 ***************************************/


require_once ("database.php");

$id = htmlspecialchars($_GET['id']);


$id = filter_var($id, FILTER_SANITIZE_EMAIL);


if(isset($id)) 
$sql = "DELETE FROM customerdata WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$rowCount = $stmt->rowCount();

$message = "<div class='alert alert-danger' role='alert'>
                <p>$rowCount customer deleted!</p>
            </div>";  

echo $message;

require_once ("footer.php");

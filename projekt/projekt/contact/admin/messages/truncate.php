<?php
    
/***************************************
 * 
 *                DELETE
 *          Ta bort flera kontakter
 * 
 ***************************************/


require_once ("database.php");


$id = htmlspecialchars($_GET['table']);

$id = filter_var($id, FILTER_SANITIZE_EMAIL);

if(isset($id)) 
$sql = "TRUNCATE TABLE $id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rowCount = $stmt->rowCount();

$message = "<div class='alert alert-danger' role='alert'>
                <p>Table $id empty!</p>
            </div>";  

echo $message;
require_once ("footer.php");

<?php
    
/***************************************
 * 
 *                DELETE
 *          Ta bort en kontakt
 * 
 ***************************************/


require_once ("database.php");

$id = htmlspecialchars($_POST['id']);
//echo "<h2>Ta bort</h2>";

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



            $id = $_GET['table'];

if(isset($_GET['table'])) 
$sql = "TRUNCATE TABLE $id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rowCount = $stmt->rowCount();

$message = "<div class='alert alert-danger' role='alert'>
                <p>Table $id empty!</p>
            </div>";  

echo $message;
//echo $message;
require_once ("footer.php");


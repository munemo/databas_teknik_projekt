<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thank you</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<?php

/***************************************
 * 
 *                CREATE
 *          Skapa en ny kontakt
 * 
 ***************************************/

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once ("database.php");
    
    // Test att skriva ut arrayen med formulärdata
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    $name  =  htmlspecialchars($_POST['name']);
    $email =  htmlspecialchars($_POST['email']);
    $mess  =  htmlspecialchars($_POST['message']);

        
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    // Validate e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    //  echo("$email is a valid email address");
    } else {
    echo("$email is not a valid email address");
    }


    // Validate name
    $newstr = filter_var($name, FILTER_SANITIZE_STRING);
    //echo $newstr;

    // Validate message
    $messstr = filter_var($mess, FILTER_SANITIZE_STRING);
    //echo $newstr;


    // Skapa en SQL-sats (förbereda en sats)
    $stmt = $conn->prepare("INSERT INTO customerdata (name, email, message)
                                VALUES (:name , :email, :message)");

    // Binda parametrar (binda variabler med platshållare)
    $stmt->bindParam(':name', $newstr);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':message', $messstr);

    // Kör SQL-sats
    $stmt->execute();

    // Hämta sista id som infogats A_I
    $last_id = $conn->lastInsertId();

    $message = "<div class='alert alert-success' role='alert'>
                    <p>$name har sparats i databasen med id=$last_id</p>
                </div>";  
    
}

?>





<div class="text-center">
  <h1 class="header">Thank you!</h1>
  <p>We will be in touch within 2 working days</p> 
</div>
<style>
{

  .header {
        color: #36A0FF;
        font-size: 27px;
        padding: 10px;
    }

    .bigicon {
        font-size: 35px;
        color: #36A0FF;
    }

  }

</style>
</body>
</html>

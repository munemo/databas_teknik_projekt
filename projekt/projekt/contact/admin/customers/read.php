<?php

/****************************************
 * 
 *                READ
 * Läs tabellen contacts från databasen
 * Presentera resultatet i en HTML-tabell
 * 
 ***************************************/

 // Hämta $conn (en instans av PDO)
 require_once ("database.php");

 // Förbered en SQL-sats
 $stmt = $conn->prepare("SELECT * FROM customers");

 // Kör SQL-satsen
 $stmt->execute();

 // Hämta alla rader som finns i contacts
 // fetchAll()
 // Returns an array containing all of the result set rows
 $result = $stmt->fetchAll();

 $table = "
    <table class='table table-hover'>
     <tr>
        <th >Customer ID</th>
        <th >Name</th>
        <th >Email</th>
        <th >Address</th>
        <th >Telephone</th>
    </tr>

      
    ";

 foreach($result as $key => $value){

    $id = $value['customer_id'];  

    $table .= "
    
        <tr>
            <td>$value[customer_id]</td>
            <td>$value[name]</td>
            <td>$value[email]</td>
            <td>$value[address]</td>
            <td>$value[telefon]</td>
            <td>
            <a href='delete.php?customer_id=$value[customer_id]'>Delete</a>  
            <a href='update.php?customer_id=$value[customer_id]'>Update</a>                        
            </td>
            </tr>
    ";
 }

 $table .= "</table>";
 
 echo $table;

 $truncate .= "
 <hr>
 <br>
 <a href='truncate.php?db=webshopdb&table=customers'>Delete All</a>    
   
 ";

$truncate .= "</button>";

echo $truncate;

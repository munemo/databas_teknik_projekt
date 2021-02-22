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
 $stmt = $conn->prepare("SELECT * FROM customerdata");

 // Kör SQL-satsen
 $stmt->execute();

 // Hämta alla rader som finns i contacts
 // fetchAll()
 // Returns an array containing all of the result set rows
 $result = $stmt->fetchAll();

 $table = "
    <table class='table table-hover'>
     <tr>
        <th '>Namn</th>
        <th >Email</th>
        <th >Message</th>
        <th >Action</th>
    </tr>

      
    ";

 foreach($result as $key => $value){

    $id = $value['id'];  

    $table .= "
    
        <tr>
            <td>$value[name]</td>
            <td>$value[email]</td>
            <td>$value[message]</td>
            <td>
            <a href='delete.php?id=$value[id]'>Delete</a>              
            </td>
            </tr>
    ";
 }

 $table .= "</table>";
 
 echo $table;

 $truncate .= "
 <hr>
 <br>
 <a href='truncate.php?db=messages&table=customerdata'>Delete All</a>    
   
 ";

$truncate .= "</button>";

echo $truncate;

<?php

//TA bort databasen!
$conn->exec("DROP DATABASE IF EXISTS $dbName");
echo "<h2>$dbName deleted</h2>";

// Skapa en ny databas
$conn->exec("CREATE DATABASE IF NOT EXISTS $dbName
             CHARACTER SET utf8
             COLLATE utf8_swedish_ci;");
echo "<h2>$dbName created</h2>";

// Välj databasen
$conn->exec("USE $dbName");
echo "<h2>$dbName selected!</h2>";

// tabellerna
$conn->exec("CREATE TABLE customers 
(customer_id int(11) NOT NULL AUTO_INCREMENT,name varchar(100) NOT NULL,email varchar(100) NOT NULL, PRIMARY KEY(customer_id));
)");
 
$conn->exec("CREATE TABLE products (product_id int(11) NOT NULL AUTO_INCREMENT,title varchar(100) NOT NULL,price int(11) NOT NULL,image varchar(255) DEFAULT 'no-poster.png', PRIMARY KEY (product_id));
" );
$conn->exec("CREATE TABLE orders (order_id int(11) NOT NULL AUTO_INCREMENT,customer_id int(11) NOT NULL,product_id int(11) NOT NULL,order_date DATETIME DEFAULT CURRENT_TIMESTAMP,PRIMARY KEY(order_id));
)" );
    
/*
INSERT INTO `customers` (`customer_id`, `name`, `email`, `address`, `telefon`) VALUES (NULL, 'Sara aarnivaara', 'aarnivaaara@email.com', 'uservägen 130, Stockholm', '+4677334567');

CREATE TABLE products (product_id int(11) NOT NULL AUTO_INCREMENT,title varchar(100) NOT NULL,price int(11) NOT NULL,image varchar(255) DEFAULT 'no-poster.png', PRIMARY KEY (product_id));

INSERT INTO products (title, price, image)

VALUES('Small', 199, 'Matrix.jpg'), ('Medium', 299, 'Matrix.jpg'), ('Large', 499, 'Matrix.jpg');

CREATE TABLE orders (order_id int(11) NOT NULL AUTO_INCREMENT,customer_id int(11) NOT NULL,product_id int(11) NOT NULL,order_date DATETIME DEFAULT CURRENT_TIMESTAMP,PRIMARY KEY(order_id));

INSERT INTO orders (customer_id, product_id) VALUES(1,3), (2,2)


alter table orders
add foreign key (customer_id) references customers(customer_id);

--all customers with orders
SELECT* FROM customers, orders WHERE customers.customer_id = orders.customer_id;

--select a specific customer
SELECT* FROM customers, films, orders WHERE customers.customer_id = orders.customer_id AND films.film_id = orders.film_id

--Show everything
SELECT orders.order_id AS Ordernummer, 
    orders.order_date AS  Orderdatum,
    customers.customer_id AS Kundnummer,
    films.film_id AS Artikelnummer FROM customers, films, orders  
    WHERE customers.customer_id = orders.customer_id AND films.film_id= orders.film_id;

    --Show Ordernummer, Kundnamn and Titel

    SELECT orders.order_id AS Ordernummer, 
    customers.name AS Kundnamn,
    films.title AS Titel FROM customers, films, orders  
    WHERE customers.customer_id = orders.customer_id AND films.film_id= orders.film_id;

    --Skriv ut info om order nr 1.Visa ordernummer, orderdatum, kundnamn och filmtitel.

    SELECT orders.order_id AS Ordernummer,
    orders.order_date AS  Orderdatum,
    customers.name AS Kundnamn,
    films.title AS Titel 
    FROM customers, films, orders
    WHERE orders.order_id = 1;

    --Vilka kunder har köpt ”Braveheart”? Visa enbart kundnamn!
   SELECT customers.name AS Kundnamn
   FROM customers, films, orders  
   WHERE customers.customer_id = orders.customer_id AND films.title = "Braveheart";

   --Vilka filmer har ”Mahmud” köpt?Visa enbart ordernummer och filmtitel.

   SELECT orders.order_id AS Ordernummer,
   films.title AS Filmtitel
   FROM customers, films, orders  
   WHERE customers.customer_id = orders.customer_id AND customers.name = "Mahmud Al Hakim";

--Visa alla kunder som inte har köpt en film än!

   SELECT customers.name AS Kund
   FROM customers, films, orders  
   WHERE orders.order_id = 0;

*/





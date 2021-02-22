<?php

// Tips
// Bra att läsa om "Dependency Injection"
// https://codeinphp.github.io/post/dependency-injection-in-php/

class Model
{
    private $db = null;



    

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function fetchAllProducts()
    {
        $products = $this->db->select("SELECT * FROM products");
        return $products;
    }

  public function fetchProductById($id)
    {
        $statement = "SELECT * FROM products WHERE product_id=:id";
        $parameters = array(':id' => $id);
        $product = $this->db->select($statement, $parameters);

        if ($product) {
            
            return $product[0];
        }

        return false;
    }
    public function fetchCustomerId($name)
    {
        $statement = $conn->prepare("SELECT customer_id FROM customers WHERE name =:name");
        $parameters = array(['name'=> $name]);
        $customer_id  = $this->db->select($statement, $parameters);
    
        if ($customer_id) {
            
            return $customer_id[0];
        }

        return false;
    }


    public function saveOrder($product_id)
    {
        
        //$customer = $this->fetchCustomerById($customer_id);
       $product = $this->fetchProductById($product_id);

        if ($product_id) {

            $statement = "INSERT INTO orders (customer_id, product_id)  
                          VALUES (:customer_id, :product_id)";
            $parameters = array(
                ':customer_id' => $customer_id,
                ':product_id' => $product_id
            );

            $lastInsertId = $this->db->insert($statement, $parameters);

            return array('customer' => $customer, 'lastInsertId' => $lastInsertId);
        } else {
            return false;
        }
 
}
}
<?php

class Controller
{
    private $model = null;
    private $view  = null;

    public function __construct($model, $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function main()
    {
        $this->getHeader();

        if (!isset($_GET['id'])) {
            $this->getAllProducts();
            //$this->getAllCustomers();
            
           
        } else {
            $this->getOrderForm();

        }

        $this->getFooter();
    }

    public function getHeader()
    {
        $this->view->viewHeader("Solna Car Rental");
    }

    public function getFooter()
    {
        $this->view->viewFooter();
    }

    public function getAllProducts()
    {
        $products = $this->model->fetchAllProducts();
        $this->view->viewAllProducts($products);
    }

    public function getCustomerId()
    {
        $customer_id = $this->model->fetchCustomerId();
        $this->view->viewCustomer($customer_id);
    }


    

    public function getOrderForm()
    {
        $id = $this->sanitize($_GET['id']);
        
        $product = $this->model->fetchProductById($id);
       
        if ($product) {
            $this->view->viewProduct($product);
            $this->view->viewOrderForm($product);
        } else {
            header("Location:index.php");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
         $this->processOrderForm();
        }        
    }

 

    /**
     * Sanitize Inputs
     * https://www.w3schools.com/php/php_form_validation.asp
     */
    public function sanitize($text)
    {
        $text = trim($text);
        $text = stripslashes($text);
        $text = htmlspecialchars($text);
        return $text;
    }
}
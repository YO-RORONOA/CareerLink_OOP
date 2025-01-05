<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../classes/Categorie.php';



class categorieController

{
    protected $db;
    protected $categorie;
    protected $error_message = [];


    public function __construct()
    {
        $database = new Database;
        $this->db = $database->connect();
        $this->categorie = new Categorie($this->db);
    }


    public function validatecategorie($data)
    {
        if(isset($data['submit']))
        {
            $name_categorie = trim($data['namecategorie']);

            if(empty($name_categorie))
            {
                $this->error_message['name_categorie'] = 'Category name is required.';
            } 
            elseif (strlen($name_categorie) < 3) {
                $this->error_message['name_categorie'] = "Category name must be at least 3 characters.";
            }

            elseif (!preg_match("/^[a-zA-Z]+$/", $name_categorie)) {
                $this->error_message['name_categorie'] = "Category name must only contain letters.";
            }


            if(!empty($this->error_message))
            {
                $_session['error_message'] = $this->error_message;
                header('Location: ../views/categories.php');
                exit();
            }

        }
    }

}
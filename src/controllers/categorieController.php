<?php
session_start();

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


    public function createCategorie($data)
    {
        if (isset($data['submit'])) {
            $name_categorie = trim($data['namecategorie']);
            
            if (empty($name_categorie)) {
                $this->error_message['error_message'] = 'Category name is required.';
            } elseif (strlen($name_categorie) < 3) {
                $this->error_message['error_message'] = "Category name must be at least 3 characters.";
            } elseif (!preg_match("/^[a-zA-Z]+$/", $name_categorie)) {
                $this->error_message['error_message'] = "Category name must only contain letters.";
            }


            if (!empty($this->error_message)) {
                $_SESSION['error_message'] = $this->error_message;
                header('Location: ../views/categorieManagement.php');
                exit();
            }

            $this->categorie->setattributes($name_categorie);

            if ($this->categorie->createcategorie()) {
                $_SESSION['success_message'] = "Category successfully created!";
            } else {
                $_SESSION['error_message'] = ["Failed to create category. Please try again."];
            }
            header('Location: ../views/categorieManagement.php');
            exit();
        }
    }

    public function getAllCategories()
    {
        return $this->categorie->getallcategories();
    }

    public function getCategoryById($id)
    {
        $sql = "SELECT * FROM categorie WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function editCategorie($id, $categorieName)
    {
        if (empty($categorieName)) {
            $_SESSION['error_modal'] = "Category name is required.";
            header('Location: ../views/categorieManagement.php');
            exit();
        } elseif (strlen($categorieName) < 3) {
            $_SESSION['error_modal'] = "Category name must be at least 3 characters.";
            header('Location: ../views/categorieManagement.php');
            exit();
        }


        if ($this->categorie->editcategorie($id, $categorieName)) {
            $_SESSION['success_message'] = "Category successfully updated!";
        } else {
            $_SESSION['error_message'] = "Failed to update category.";
        }
        header('Location: ../views/categorieManagement.php');
        exit();
    }

    public function deleteCategorie($id)
{
    // exit();
    $this->categorie->deletecategorie($id);
}

    
}

// if(empty($_POST['category_id'])) {

// $controller = new categorieController;
// $controller->createCategorie($_POST);
// $categories = $controller->getAllCategories();
// }

// else
// {
//     $controller = new categorieController;
//     $controller->editCategorie($_POST['category_id'], $_POST['namecategorie']);
// }







if (isset($_GET['id'])) {
    $controller = new CategorieController();
    $category = $controller->getCategoryById($_GET['id']); 

    // Return category data as JSON for the JavaScript AJAX call
    echo json_encode($category);
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['action'] === 'delete') {
    echo json_encode(["test"=> 'success']);
    $controller = new CategorieController();
    $categoryId = intval($_POST['category_id']);

    if ($controller->deleteCategorie($categoryId)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete category.']);
    }
    exit;
}

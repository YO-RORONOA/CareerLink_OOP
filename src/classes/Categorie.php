<?php


class Categorie
{
    protected $db;
    protected $id;
    protected $name_categorie;

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function setattributes($name_categorie)
    {
        $this->name_categorie=$name_categorie;
    }

    public function createcategorie()
    {
        $query = "INSERT into categorie(name_categorie)
        values(:name_categorie)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name_categorie', $this->name_categorie);
        return $stmt->execute();
    }

    public function editcategorie($id, $newname)
    {
        $query = "UPDATE categorie set name_categorie = :newname where id= :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':newname', $newname);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deletecategorie($id)
    {
        $query = "DELETE from categorie where id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    
    }

    public function getallcategories()
    {
        $query= "SELECT * from categorie";
        $stmt= $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }

    
}
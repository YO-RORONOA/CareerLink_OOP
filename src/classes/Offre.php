<?php

class Offre
{
    private $db;
    private $id;
    private $name_offre;
    private $adress_offre;
    private $salaire;
    private $categorie_id;
    private $recruteur_id;
    private $archived;



    public function __construct($db)
    {
        $this->db = $db;
    }

    public function setattributes($name_offre, $adress_offre, $salaire, $categorie_id, $recruteur_id, $archived)
    {
        $this->name_offre= $name_offre;
        $this->adress_offre= $adress_offre;
        $this->salaire= $salaire;
        $this->$categorie_id= $categorie_id;
        $this->recruteur_id= $recruteur_id;
        $this->archived= $archived;
    }


    public function createoffre()
    {
        $query = "INSERT into offre(name_offre, adress_offre, salaire, categorie_id, recruteur_id, archived)
        values (:name_offre, :adress_offre :salaire, :categorie_id, :recruteur_id, :archived)";
        $stmt= $this->db->prepare($query);
        $stmt->bindParam(':name_offre', $this->name_offre);
        $stmt->bindParam(':adress_offre', $this->adress_offre);
        $stmt->bindParam(':salaire', $this->salaire);
        $stmt->bindParam(':categorie_id', $this->categorie_id);
        $stmt->bindParam(':recruteur_id', $this->recruteur_id);
        $stmt->bindParam('archived', $this->archived);
        return $stmt->execute();
    }


    public function getalloffers() {
        $query = "SELECT * FROM offre";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function deleteoffre($id)
    {
        $query = "DELETE FROM offre WHERE id = :id";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }


    public function updateOffre($id)
    {
        $query = "UPDATE offre
                  SET name_offre = :name_offre, adress_offre = :adress_offre, salaire = :salaire, 
                      categorie_id = :categorie_id, recruteur_id = :recruteur_id, archived = :archived
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':name_offre', $this->name_offre);
        $stmt->bindParam(':adress_offre', $this->adress_offre);
        $stmt->bindParam(':salaire', $this->salaire);
        $stmt->bindParam(':categorie_id', $this->categorie_id);
        $stmt->bindParam(':recruteur_id', $this->recruteur_id);
        $stmt->bindParam(':archived', $this->archived);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();  
    }

}




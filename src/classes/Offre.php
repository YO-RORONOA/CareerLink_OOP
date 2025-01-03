<?php

namespace Youcode\CareerLinkOop\offre;


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




    public function addTagsToOffer($offre_id, $tag_ids) {
        $query = "INSERT INTO offer_tags (offre_id, tag_id) VALUES (:offre_id, :tag_id)";
        $stmt = $this->db->prepare($query);
    
        foreach ($tag_ids as $tag_id) {
            $stmt->bindParam(':offre_id', $offre_id, PDO::PARAM_INT);
            $stmt->bindParam(':tag_id', $tag_id, PDO::PARAM_INT);
            $stmt->execute();
        }
        return true;
    }

    public function getTagsForOffer($offre_id) {
        $query = "SELECT t.name_tag 
                  FROM tag t 
                  INNER JOIN offer_tags ot ON t.id = ot.tag_id 
                  WHERE ot.offre_id = :offre_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':offre_id', $offre_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function removeTagsFromOffer($offre_id) {
        $query = "DELETE FROM offer_tags WHERE offre_id = :offre_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':offre_id', $offre_id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    

}




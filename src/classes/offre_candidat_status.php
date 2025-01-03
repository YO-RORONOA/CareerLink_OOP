<?php

class OffreCandidatStatus {
    private $db;
    public $id;
    public $statut;
    public $offre_id;
    public $candidat_id;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createStatus() {
        $query = "INSERT INTO offre_candidat_status (statut, offre_id, candidat_id) 
                  VALUES (:statut, :offre_id, :candidat_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':statut', $this->statut);
        $stmt->bindParam(':offre_id', $this->offre_id);
        $stmt->bindParam(':candidat_id', $this->candidat_id);
        return $stmt->execute();
    }
}

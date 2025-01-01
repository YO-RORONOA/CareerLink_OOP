<?php

class tag
{
    protected $db;
    protected $id;
    protected $name_tag;

    public function __construct($db)
    {
        $this->db = $db;
    }


    public function setattributes($name_tag)
    {
        $this->name_tag=$name_tag;
    }

    public function createtag()
    {
        $query = "INSERT into tag(name_tag)
        values(:name_tag)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name_tag', $this->name_tag);
        return $stmt->execute();
    }

    public function edittag($id, $newtag)
    {
        $query = "UPDATE tag set name_tag = :newtag where id= :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':newtag', $newtag);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function deletetag($id)
    {
        $query = "DELETE from tag where id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    
    }

    public function getalltags()
    {
        $query= "SELECT * from tag";
        $stmt= $this->db->prepare($query);
        return $stmt->fetchall(PDO::FETCH_ASSOC);
    }


}
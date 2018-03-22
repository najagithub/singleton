<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Fiche {
    protected $table = "a_fiche", $table1 = "a_categorie";
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    public function getAllFiche() {
        $query = "SELECT * FROM $this->table f INNER JOIN $this->table1 c ON c.id_categorie = f.id_categorie ";
        $getcat = $this->db->select($query);
        return $getcat;
    }
    
    public function insertNewRow($libelle_fiche,$description,$id_categorie) {
        $query = "INSERT INTO $this->table (id_fiche, libelle_fiche, description, id_categorie) "
                . "VALUES (null,'$libelle_fiche','$description','$id_categorie')";
        $insert = $this->db->insert($query);
        return $insert ? TRUE : FALSE;
    }
    
    public function getFicheById($param) {
        $query = "SELECT * FROM $this->table WHERE id_fiche = $param";
        $getcatbyid = $this->db->select($query);
        return $getcatbyid;
    }
    
    public function updateRow($id_fiche,$libelle_fiche,$description,$id_categorie) {
        $query = "UPDATE $this->table SET"
                . " libelle_fiche = '$libelle_fiche', description = '$description', id_categorie = '$id_categorie' "
                . "WHERE id_fiche = $id_fiche ";
        $update = $this->db->update($query);
        return $update ? TRUE : FALSE;
    }
    
    public function deleteRow($param){
        $query = "DELETE FROM $this->table WHERE id_fiche = $param";
        $delete = $this->db->delete($query);
        return $delete ? TRUE : FALSE;
    }
}
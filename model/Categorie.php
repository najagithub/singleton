<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Categorie {
    protected $table = "a_categorie";
    private $db;
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    public function getAllCategorie() {
        $query = "SELECT * FROM $this->table";
        $getcat = $this->db->select($query);
        return $getcat;
    }
    
    public function insertNewRow($param) {
        $query = "INSERT INTO $this->table(id_categorie, libelle_categorie) VALUES (null,'$param')";
        $insert = $this->db->insert($query);
        return $insert ? TRUE : FALSE;
    }
    
    public function getCategorieById($param) {
        $query = "SELECT * FROM $this->table WHERE id_categorie = $param";
        $getcatbyid = $this->db->select($query);
        return $getcatbyid;
    }
    
    public function updateRow($id_categorie,$libelle_categorie) {
        $query = "UPDATE $this->table SET libelle_categorie = '$libelle_categorie' WHERE id_categorie = $id_categorie ";
        $update = $this->db->update($query);
        return $update ? TRUE : FALSE;
    }
    
    public function deleteRow($param){
        $query = "DELETE FROM $this->table WHERE id_categorie = $param";
        $delete = $this->db->delete($query);
        return $delete ? TRUE : FALSE;
    }
}
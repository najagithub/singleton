<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Database {
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $db_name = DB_NAME;
    
    public $link;
    public $error;
    
    private static $_instance = null;
    
    protected function __construct() {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
        if(!$this->link){
            $this->error = "erreur".$this->link->connect_error;
            return FALSE;
        }
    }
    
    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new Database;
        }
        return self::$_instance;
    }
    
    private function __clone() {
        trigger_error("Le clonage n'est pas autorisé.", E_USER_ERROR);
    }
    
    public function select($param) {
        $result = $this->link->query($param) or die($this->link->error.__LINE__);
            if($result->num_rows > 0){
                return $result;
            }else{
                return FALSE;
            }
    }
    
    // insert
    public function insert($param) {
        $insert = $this->link->query($param) or die($this->link->error.__LINE__);
        if($insert){
            return $insert;
        }else{
            return FALSE;
        }
    }
    
    //update
    public function update($param) {
        $update = $this->link->query($param) or die($this->link->error.__LINE__);
        if($update){
            return $update;
        }else {
            return FALSE;
        }
    }
    
    //delete
    public function delete($param) {
        $delete = $this->link->query($param) or die($this->link->error.__LINE__);
        if($delete){
            return $delete;
        }else{
            return FALSE;
        }
    }
}


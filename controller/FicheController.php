<?php

include_once '../config/config.php';

$cat  = new Categorie();
$list_cat = $cat->getAllCategorie();

$fic = new Fiche();

$list_fic = $fic->getAllFiche();

$title = "Fiche Menu";
$active = 2;
//insert
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajouterFiche'])){
    
    if(isset($_POST['libelle_fiche']) && !empty($_POST['libelle_fiche'])
            && isset($_POST['description']) && !empty($_POST['description'])
            && isset($_POST['id_categorie']) && !empty($_POST['id_categorie'])){
        $insert = $fic->insertNewRow($_POST['libelle_fiche'],$_POST['description'],$_POST['id_categorie']);
        if($insert){
            header('Location:/controller/FicheController.php');
        }
    }else{
        echo '<p>Erreur Ajout</p>';
    }
}

//update
if(isset($_GET['update']) && !empty($_GET['update']) && $fic->getFicheById($_GET['update'])){
    
    $fiche = $fic->getFicheById($_GET['update']);
    $edit = $fiche->fetch_object();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modifierFiche'])){
    
        if(isset($_POST['libelle_fiche']) && !empty($_POST['libelle_fiche'])
            && isset($_POST['description']) && !empty($_POST['description'])
            && isset($_POST['id_categorie']) && !empty($_POST['id_categorie'])){
            $update = $fic->updateRow($_GET['update'],$_POST['libelle_fiche'],$_POST['description'],$_POST['id_categorie']);
            if($update){
                header('Location:/controller/FicheController.php');
            }
        }else{
            echo '<p>Erreur Modification</p>';
        }
    }
}

//delete
if(isset($_GET['delete']) && !empty($_GET['delete']) && $fic->getFicheById($_GET['delete'])){
    $delete = $fic->deleteRow($_GET['delete']);
    header('Location:/controller/FicheController.php');
}
include_once '../views/_partials/header.php';
include_once '../views/_fiche/index.php';
include_once '../views/_partials/footer.php';
<?php 

include_once '../config/config.php';

$cat  = new Categorie();
$list_cat = $cat->getAllCategorie();
$title = "Catégorie Menu";

$active = 1;
//insert
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajouterCategorie'])){
    
    if(isset($_POST['libelle_categorie']) && !empty($_POST['libelle_categorie'])){
        $insert = $cat->insertNewRow($_POST['libelle_categorie']);
        if($insert){
            header('Location:/controller/CategorieController.php');
        }
    }else{
        echo '<p>Erreur Ajout</p>';
    }
}

//update
if(isset($_GET['update']) && !empty($_GET['update']) && $cat->getCategorieById($_GET['update'])){
    
    $categorie = $cat->getCategorieById($_GET['update']);
    $edit = $categorie->fetch_object();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modifierCategorie'])){
    
        if(isset($_POST['libelle_categorie']) && !empty($_POST['libelle_categorie'])){
            $update = $cat->updateRow($_GET['update'],$_POST['libelle_categorie']);
            if($update){
                header('Location:/controller/CategorieController.php');
            }
        }else{
            echo '<p>Erreur Modification</p>';
        }
    }
}

//delete
if(isset($_GET['delete']) && !empty($_GET['delete']) && $cat->getCategorieById($_GET['delete'])){
    $delete = $cat->deleteRow($_GET['delete']);
    header('Location:/controller/CategorieController.php');
}


include_once '../views/_partials/header.php';
include_once '../views/_categorie/index.php';
include_once '../views/_partials/footer.php';



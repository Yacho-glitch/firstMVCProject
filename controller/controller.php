<?php 
    require_once __DIR__ . '/../model/model.php';

    // Handle adding a new stagiaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["add"])) {
        $nom = $_POST['nom'];
        $age = $_POST['age'];
        $niveau = $_POST['niveau'];
        insertStagiaires($nom, $age, $niveau);
        header("Location: ../view/layout.php");
        exit();
    }

    // Handle updating an existing stagiaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["update"])) {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $age = $_POST['age'];
        $niveau = $_POST['niveau'];
        updateStagiaires($id, $nom, $age, $niveau);
        header("Location: ../view/layout.php");
        exit();
    }

    // Handle deleting a stagiaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["delete"])) {
        $id = $_POST['id'];
        deleteStagiaires($id);
        header("Location: ../view/layout.php");
        exit();
    }



?>
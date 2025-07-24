<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'listStagiaires';

    $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    if (isset($_GET['delete_id'])) {
        deleteStagiaires($_GET['delete_id']);
        header("Location: ../view/layout.php");
        exit();
    }

    function selectStagiaires() {
        global $pdo;
        $query = "SELECT * FROM stagiaires";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function insertStagiaires($nom, $age, $niveau) {
        global $pdo;
        $query = "INSERT INTO stagiaires (nom, age, niveau) VALUES (:nom, :age, :niveau)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':niveau', $niveau);
        $success = $stmt->execute();

        if ($success) {
            header("Location: ../view/layout.php");
            exit();
        } else {
            echo "<p class='text-red-500'>Error adding stagiaire.</p>";
        }
        return $success;
    }

    function deleteStagiaires($id) {
        global $pdo;
        $query = "DELETE FROM stagiaires WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $success = $stmt->execute();

        // if ($success) {
        //     header("Location: ../view/layout.php");
        //     exit();
        // } else {
        //     echo "<p class='text-red-500'>Error deleting stagiaire.</p>";
        // }
        return $success;
    }

    function updateStagiaires($id, $nom, $age, $niveau) {
        global $pdo;
        $query = "UPDATE stagiaires SET nom = :nom, age = :age, niveau = :niveau WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':niveau', $niveau);
        $success = $stmt->execute();

        if ($success) {
            header("Location: ../view/layout.php");
            exit();
        } else {
            echo "<p class='text-red-500'>Error updating stagiaire.</p>";
        }
        return $success;
    }

    function selectStagiaireById($id) {
        global $pdo;
        $query = "SELECT * FROM stagiaires WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
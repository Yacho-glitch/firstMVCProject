<?php

    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'listStagiaires';

    $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);


    function selectStagiaires() {
        global $pdo;
        $query = "SELECT * FROM stagiaires";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function insertStagiaires($nom, $prenom, $email) {
        global $pdo;
        $query = "INSERT INTO stagiaires (nom, prenom, email) VALUES (:nom, :prenom, :email)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }

    function deleteStagiaires($id) {
        global $pdo;
        $query = "DELETE FROM stagiaires WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    function updateStagiaires($id, $nom, $prenom, $email) {
        global $pdo;
        $query = "UPDATE stagiaires SET nom = :nom, prenom = :prenom, email = :email WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        return $stmt->execute();
    }
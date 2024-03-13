<?php

    session_start();

    include_once("connection.php");
    include_once("url.php");

    $id;

    if (!empty($_GET)) {
        $id = $_GET['id'];
    }

    if (!empty($id)) {
        // Retorna o dado de um contato
        $query = "SELECT * FROM contacts WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $contact = $stmt->fetch();
    } else {
        // Retorna todos os contatos
        $query = "SELECT * FROM contacts";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $contacts = [];
        $contacts = $stmt->fetchAll();
    }
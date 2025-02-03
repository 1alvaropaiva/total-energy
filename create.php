<?php
session_start();
require 'conexao.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (nick, senha) VALUES (?, ?)";

    // Prepare the statement
    if ($stmt = $conexao->prepare($sql)) {  
        // Bind the parameters
        $stmt->bind_param("ss", $username, $password);

        // Execute the statement
        if ($stmt->execute()) {
            header('Location: profile.php');
            exit;
        } else {
            header('Location: index.php');
            exit;
        }

        // Close the statement
        $stmt->close();
    } else {
        // Handle query preparation failure
        echo "Error: Could not prepare query.";
    }
} else {
    echo "Error: Missing username or password.";
}

$conexao->close();
?>

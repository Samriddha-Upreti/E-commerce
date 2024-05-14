<?php
session_start();
require 'conn.php';  // Connect to the database

if (isset($_POST["login"])) {
    $username = $_POST["email"];
    $password = $_POST["password"];
    // $pw = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the SQL query using a prepared statement
    $stmt = $conn->prepare("SELECT * FROM user WHERE user_email = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a row was returned
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        // print_r($user);
        // echo $pw;
        $s = password_verify($password, $user['user_password']);
        // Verify the password
        if ($password == $user['user_password'] && $user['user_role_id'] == '2') {
            // Authentication successful
            echo "Login Successful";
            $_SESSION['user_email'] = $user['user_email'];
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['user_name'];
            $_SESSION['loggedin'] = true;  // Store user email in session for future use
            header("Location: admin.php");
            exit; // Stop execution after redirection
        } elseif ($password == $user['user_password']) {
            echo "Login Successful";
            $_SESSION['user_email'] = $user['user_email'];
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['user_name'];
            $_SESSION['loggedin'] = true; // Store user email in session for future use
            header("Location: index.php");
        } else {
            // Invalid password
            $error = "Invalid password";
            echo $s;
        }
    } else {
        // User not found
        $error = "User not found";
    }



    // Close the prepared statement
    $stmt->close();

    // Display the error message if applicable
    if (isset($error)) {
        echo $error;
    }
}

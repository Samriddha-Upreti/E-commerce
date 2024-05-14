<?php
// Initialize the session
session_start();

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect to another page after destroying the session
header("Location: login.php");
exit;

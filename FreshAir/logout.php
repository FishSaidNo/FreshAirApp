<?php
/**
 * Code to kill session and log out users
 * 
 */
session_start(); //to ensure you are using same session
session_destroy(); //destroy the session
header("location:index.php"); //to redirect back to "index.php" after logging out
exit();
?>

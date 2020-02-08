<?php
session_start();                         //session is a way to store information (in variables) to be used across multiple pages.
unset($_SESSION['user_is_logged_in']);   //if they are sent to this page they have pressed sign out/or they click delete account, so end the signed in session
session_destroy();                       //and destroy the session too
header("Location: ../index.php");       //redirect them back to the index page, without logged in set to true, so basically the sign in page
?>
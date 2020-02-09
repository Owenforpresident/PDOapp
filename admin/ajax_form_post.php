<?php include('includes/header.php'); ?>
<?php
//Include functions
include('includes/functions.php');
?>
<?php 

//require database class files
require('includes/pdocon.php');

//instatiating our database object, find corresponding entry
$db = new Pdocon;
if(isset($_POST['c_id'])){
        $id = $_POST['c_id'];   //set id sent to us as id  in the query string (URL) 
        $raw_amount         =   cleandata($_POST['salary']); //set raw_amount as the salary that was sent from the form
        $c_amount           =   valint($raw_amount);  //set clean amount as a validated integer version of the same value
        $db->query("UPDATE users SET spending=:amount WHERE id=:id");   // update this customers spending amount to the one from the form
        $db->bindValue(':id', $id, PDO::PARAM_INT);
        $db->bindValue(':amount', $c_amount, PDO::PARAM_INT);   
        $row = $db->execute();
    if($row){ //let them know it was success
         echo "<p class='bg-success text-center' style='font-weight:bold;'>User Updated </p>";
     }
}
?>
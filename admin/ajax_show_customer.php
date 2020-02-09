<?php include('includes/header.php'); ?>
<?php
//Include functions
include('includes/functions.php');
?>
 
<?php 
/****************Getting  report menu to ajax, same logic as the ajax report menu file*******************/
//Collecting id from Ajax url sent from jquery inside the reports.php file
$id = $_GET['cid'];
//require database class files
require('includes/pdocon.php');
//instatiating our database object, and finding the corresponding listing to the id we were sent from reports.php
$db = new Pdocon;
$db->query('SELECT * FROM users WHERE id=:id');
$db->bindValue(':id', $id, PDO::PARAM_INT);
$row = $db->fetchSingle();
//responding with this result to ajax so it can be displayed 
    if($row){       
        echo '  <div  class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr >
                                <th class="text-center">Name</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                           <tr class="text-center">
                            <td>' . $row['full_name'] . '</td>
                            <td>$ ' . $row['spending'] . '</td>
                            <td>' . $row['email'] . '</td>
                          </tr>
                        </tbody>
                    </table>
                </div>';
    }
?>


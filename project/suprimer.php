<?php 
if(isset($_POST['Suprimer'])){
    require_once 'db.php';
    $sup=$_POST['id'];
    $sqlState =$pdo->prepare('DELETE FROM stagiaire WHERE id=?');
    $sqlState->execute([$sup]);
    header('Location: index.php');
}

?>
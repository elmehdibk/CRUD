<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleall.css">
</head>
<body>
    <?php 
        // if(!isset($_POST['modif'])){
        //     header('location: index.php');
        // }
        require_once 'nav.php';
        include_once 'db.php';
        $id1=$_POST['id'];
        $sqlState = $pdo->prepare('SELECT * FROM stagiaire WHERE id=?');
        $sqlState->execute([$id1]);
        $st = $sqlState->fetch(PDO::FETCH_OBJ); 
            
        if(isset($_POST['envoyer'])){
            $newnom=$_POST['newnom'];
            $newprenom=$_POST['newprenom'];
            $newage=$_POST['newage'];
            $id2=$_POST['id'];
            if(!empty($id2) && !empty($newnom) && !empty($newprenom) && !empty($newage)){
                $sqlState=$pdo->prepare('UPDATE stagiaire SET nom=?,prenom=?,age=? WHERE id=?');
                $end=$sqlState->execute([$newnom,$newprenom,$newage,$id2]);
                if($end == true){
                    header('location:index.php');
                }else{
                    echo 'error';
                }
            }
            
        }
    
    ?>
    <form action="modifier.php" method="post">
    <input type="hidden" name="id" value="<?php echo $st->id?>">
        <label >nom: </label><br>
        <input type="text" name="newnom"><br>
        <label >prenom: </label><br>
        <input type="text" name="newprenom" ><br>
        <label >age: </label><br>
        <input type="number" name="newage"><br>
        <input type="submit" name='envoyer' value="envoyer">
    </form>
    
</body>
</html>
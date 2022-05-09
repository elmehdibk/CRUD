<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
            require_once 'db.php';
            include_once "nav.php";

        ?>

        <?php
                if (isset($_POST['submit'])){
                        $nom = $_POST['nom'];
                        $prenom = $_POST['prenom'];
                        $age = $_POST['age'];
                        
                    if(!empty($nom)
                    &&!empty($prenom)
                    &&!empty($age)){
                        $sqlState = $pdo->prepare('INSERT INTO stagiaire VALUES(null,?,?,?)');
                        $sqlState->execute([$nom,$prenom,$age]);
                    }else{
                        ?>
               
                   <h1> Required fields.</h1>
                
                <?php
                    }

                }
        
        ?>
        <form  method="post">

                <label >Nom :</label><br>
                <input type="text" name="nom" placeholder="Nom..."><br>
                
                <label >Prenom :</label><br>
                <input type="text" name="prenom" placeholder="Prenom..."><br>
                
                <label >Age :</label><br>
                <input type="number" name="age" placeholder="Age..."><br><br>
                <input type="submit" name="submit" value="Ajouter stagiaire">        
        </form>
</body>
</html>
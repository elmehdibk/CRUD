<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styleall.css">
</head>
<body>
  <?php
    require_once 'db.php';
    include_once 'nav.php';
    $sqlState=$pdo->query('SELECT * FROM stagiaire');
    $stagiaires=$sqlState->fetchAll(PDO::FETCH_OBJ);
  ?>
  <div class="container">
  <h3>Users</h3>
  <table>
    <tr>
    <th>#Id</th>
    <th>Nom</th>
    <th>Prenom</th>
    <th>age</th>
    <th>opérations</th>
    </tr>
    

    <?php 
      foreach($stagiaires as $stagiaire){ ?>
         <tr>
                        <td><?= $stagiaire->id ?> </td>
                        <td><?= $stagiaire->nom ?> </td>
                        <td><?= $stagiaire->prenom ?> </td>
                        <td><?= $stagiaire->age ?> </td>
                        <td><form action="suprimer.php" method="POST">
                          <input type="hidden" name="id" value="<?= $stagiaire->id ?>">
                          <input type="submit" value="Suprimer" name="Suprimer">
                        </form>
                        <form action="modifier.php" method="post">
                        <input type="hidden" name="id" value="<?= $stagiaire->id ?>">
                        <input type="submit" value="modifier" name='modifier'>
                        </form>
                      </td>
                        <?php 
      }
    ?>


  </table>
  </div>
</body>
</html>
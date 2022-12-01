<?php
$id = (isset($_GET['id'])) ? $_GET['id']: '' ;
$nome = (isset($_GET['id'])) ? $_GET['nome']: '' ;
$email = (isset($_GET['id'])) ? $_GET['email']: '' ;
?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <form method="post" action="#">
            id: <input type="text" name="id" value="<?= $id ?>" disabled="">
            Nome: <input type="text" name="name" value="<?= $nome ?>">
            Email: <input type="text" name="email" value="<?= $email ?>">
            <input type="submit" name="submit" value="Atualizar">
        </form>
    </body>
</html>
<?php
include_once 'header.php';
$id = (isset($_GET['id'])) ? $_GET['id']: '' ;
$nome = (isset($_GET['id'])) ? $_GET['nome']: '' ;
$email = (isset($_GET['id'])) ? $_GET['email']: '' ;
?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <div class="row">
        <div class="col s4 offset-s4 ">
            <h3 class="header"><?= ($id !== '')? 'Atualizar Dados' : 'Novo Usuário' ;?></h3>
            <div class="card horizontal">
            <div class="card-stacked">
                <form method="post" action="#">
                <div class="card-content">
                            id: <input type="text" name="id" value="<?= $id ?>" disabled="">
                            Nome: <input type="text" name="name" value="<?= $nome ?>">
                            Email: <input type="text" name="email" value="<?= $email ?>">
                    <div class="card-action">
                        <input class="btn" type="submit" name="submit" value="<?= ($id !== '')? 'Atualizar' : 'Salvar' ;?>">                
                    </div>
                </form>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
<?php
include_once 'header.php';
require_once 'Controller/control.php';

$ctrl = new Control();
$users = $ctrl->ctrlQuery();
$colors = $ctrl->ctrlQueryColors(); 
?>

    <table border='1'>
    <a class='btn' href='/newUser'>Novo Usuário</a>
        <tr>
            <th>ID</th>    
            <th>Nome</th>    
            <th>Email</th>
            <th>Ação</th>    
        </tr>
<?php 
    foreach($users as $user) {
        echo sprintf("
                    <tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>
                            <a class='btn blue' href='/edit?id=%s&nome=%s&email=%s'>Editar</a>
                                <a class='btn red' href='/delete?id=%s'>Excluir</a>
                                <a class='btn modal-trigger' href='/vincular-cores?id=%s&nome=%s'>Cores</a>
                        </td>
                    </tr>",
            $user->id, $user->name, $user->email, $user->id, $user->name, $user->email, $user->id, $user->id, $user->name);

    }
    echo "</table>";
 
?>
   <!-- Compiled and minified JavaScript -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
</body>
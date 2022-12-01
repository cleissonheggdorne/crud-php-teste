<?php
require_once 'Controller/control.php';

$ctrl = new Control();
$users = $ctrl->ctrlQuery();

echo "<table border='1'>
<a href='/newUser'>Novo Usuário</as>
    <tr>
        <th>ID</th>    
        <th>Nome</th>    
        <th>Email</th>
        <th>Ação</th>    
    </tr>
";

foreach($users as $user) {
    echo sprintf("
                   <tr>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>
                           <a href='/edit?id=%s&nome=%s&email=%s'>Editar</a>
                            <a href='/delete?id=%s'>Excluir</a>
                      </td>
                   </tr>",
        $user->id, $user->name, $user->email, $user->id, $user->name, $user->email, $user->id);

}

echo "</table>";
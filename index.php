<?php
require 'Controller/control.php';

$ctrl = new Control();
$users = $ctrl->ctrlQuery();

echo "<table border='1'>

    <tr>
        <th>ID</th>    
        <th>Nome</th>    
        <th>Email</th>
        <th>Ação</th>    
    </tr>
";

foreach($users as $user) {

    echo sprintf("<tr>
                      <td>%s</td>
                      <td>%s</td>
                      <td>%s</td>
                      <td>
                           <a href='#'>Editar</a>
                           <a href='#'>Excluir</a>
                      </td>
                   </tr>",
        $user->id, $user->name, $user->email);

}

echo "</table>";
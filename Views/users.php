<?php
include_once 'header.php';
require_once 'Controller/control.php';

$ctrl = new Control();
$users = $ctrl->ctrlQuery();
$colors = $ctrl->ctrlQueryColors(); 
?>
    <div>
    <table>
        <tr>
            <th>ID</th>    
            <th>Nome</th>    
            <th>Email</th>
            <th>Cores</th>
            <th>Ação</th>    
        </tr>
<?php 
    foreach($users as $user) {
        echo sprintf("
                    <tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>
                            <a class='btn blue' href='/edit?id=%s&nome=%s&email=%s'>Editar</a>
                                <a class='btn red' href='/delete?id=%s'>Excluir</a>
                                <a class='btn' href='/link-colors?id=%s&nome=%s&colors=%s'>Cores</a>
                        </td>
                    </tr>",
            $user->id, $user->name, $user->email,$user->name_color, $user->id, $user->name, $user->email, $user->id, $user->id, $user->name,$user->name_color);

    }
?>
    </table>  
    </div> 
      
</body>
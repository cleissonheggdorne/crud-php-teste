<?php
require_once "Controller/control.php";

$route = $_SERVER["REQUEST_URI"];
$method = $_SERVER["REQUEST_METHOD"];


if($method === 'GET'){
    if($route === '/')
    {
        require "Views/usuarios.php";
        exit;
    } else if ( (substr($route, 0, strlen("/edit"))  === "/edit")||(substr($route, 0, strlen("/newUser"))  === "/newUser") ){
        require "Views/edit_user.php";
        exit;
    } else if ( (substr($route, 0, strlen("/delete"))  === "/delete")){
        $control = new Control();
        $control->ctrlDelete($_REQUEST);
        header('Location: /');
        exit;
    }else if((substr($route, 0, strlen("/vincular-cores"))  === "/vincular-cores"))
    {
        require "Views/cores.php";
        exit;
    }
}else if($method === 'POST'){
    if (substr($route, 0, strlen("/edit"))  === "/edit"){
        $control = new Control();
        $control->ctrlUpdate($_REQUEST);
        header('Location: /');
        exit;
    } else if (substr($route, 0, strlen("/newUser"))  === "/newUser"){
         $control = new Control();
         $control->ctrlInsert($_REQUEST);
         header('Location: /');
         exit;
     }
}
    

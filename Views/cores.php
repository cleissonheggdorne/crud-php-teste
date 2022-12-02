<?php
include_once "header.php";
require_once 'Controller/control.php';

$ctrl = new Control();
$colors = $ctrl->ctrlQueryColors(); 
?>
    <div class="container">
    
        <input id="input_id_user" type="hidden" value=''></input>
       
        
        <ul class="collection with-header">
        <li class="collection-header"><h4><?=$_GET['nome']?></h4></li>
        <form action="#" class="col s12">
        <?php foreach($colors as $color){ ?>
            <li class="collection-item"><?= $color->name ?></li>
            <!-- <input type="checkbox" id="<?= $color->id ?>" /> -->
            <!-- <label for="<?= $color->id ?>"><?= $color->name ?></label> -->
         
        <?php } ?>
        </form>
      </ul>
    </div>
    
</body>
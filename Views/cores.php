<?php
include_once "header.php";
require_once 'Controller/control.php';

$ctrl = new Control();
$colors = $ctrl->ctrlQueryColors(); 
?>
    <div class="container">
    
        <input id="input_id_user" type="hidden" value=''></input>
       
        
        <h4><?=$_GET['nome']?></h4>
        <ul class="collection">
        <form action="#" class="col s12">
            <?php foreach($colors as $color){ ?>
                <li class="collection-item">
                    <input type="checkbox" name="cores[]" id="<?= $color->id ?>" value="<?= $color->id ?>" />
                    <label for="<?= $color->id ?>"><?= $color->name ?></label>
                </li>
            <?php } ?>
        </ul>
            <a class="btn" href="#" type="submit">Vincular</a>
        </form>
    </div>
    
</body>
<?php
include_once "header.php";
require_once 'Controller/control.php';

$ctrl = new Control();
$colors = $ctrl->ctrlQueryColors(); 
?>
    <div class="container">    
        <h4><?=$_GET['nome']?></h4>
        <ul class="collection">
        <form method="post" action="/link-colors" class="col s12">
            <input id="input_id_user" name="id_user" type="hidden" value='<?=$_GET['id']?>'></input>
            <?php foreach($colors as $color): ?>
                <li class="collection-item">
                    <input type="checkbox" <?= (mb_strpos($_GET['colors'], $color->name) !== false)? 'checked' : 'unchecked' ?> name="colors[]" id="<?= $color->id ?>" value="<?= $color->id?>" />
                    <label for="<?= $color->id ?>"><?= $color->name ?></label>
                </li>
            <?php endforeach; ?>
        </ul>
            <input type="submit" class="btn" value="Salvar">
        </form>
    </div>

</body>
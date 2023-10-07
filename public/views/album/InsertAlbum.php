<?php

/** @var $model AlbumModel */

require_once ROOT_DIR . "public/components/NavBar.php";
require_once ROOT_DIR . "src/forms/Form.php";
require_once ROOT_DIR . "src/controllers/AlbumController.php";

use forms\Form;
use models\AlbumModel;

?>
<div class="form-container">
    <h1>
       Add New Album
    </h1>

    <?php $form = Form::begin('', 'post', ['class' => 'form-list'], enctype: "multipart/form-data"); ?>

    <div class="album-quest">
        <?php echo $form->field($model, 'album_name') ?>
    </div>

    <div class="album-quest">
        <?php echo $form->field($model, 'artist') ?>
    </div>

    <div class="album-quest">
        <?php echo $form->field($model, 'genre') ?>
    </div>

    <div class="album-quest">
        <?php echo $form->field($model, 'cover_filename', ["id" => "input-file", "accept" => "image/*"])->fileField();
        echo '<label for="input-file" class="custom-file-upload" id="file-label">Choose Your Album Cover</label>';
        ?>
    </div>

    <div class="album-quest">
        <?php echo $form->field($model, 'release_date', ["value" => '2001-01-01'])->dateField() ?>
    </div>

    <div class="cancel-submit">
        <button class="cancel-btn">Cancel</button>
        <button class="add-btn" formaction="/albumAdmin/insertAlbum">Add Album</button>
    </div>

    <?php Form::end() ?>
</div>

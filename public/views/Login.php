<?php

/** @var $model \models\LoginForm */

require_once ROOT_DIR . "src/forms/Form.php";

use forms\Form;

?>

<h1>Login</h1>

<?php $form = Form::begin('', 'post') ?>
<?php echo $form->field($model, 'username') ?>
<?php echo $form->field($model, 'password')->passwordField() ?>
<button class="btn btn-success">Submit</button>
<?php Form::end() ?>

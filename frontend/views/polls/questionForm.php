<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'question_text')->textInput(['autofocus' => true]) ?>
    <?= Html::submitButton('Ask!', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>
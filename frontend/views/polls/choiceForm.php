<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use common\models\QuestionForm

?>

<?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'question_id')->dropDownList(
        ArrayHelper::map(QuestionForm::find()->all(), 'id', 'question_text'),
        ['prompt'=>'Select Question']
    ) ?>
    <?= $form->field($model, 'choice_text'); ?>
    <?= Html::submitButton('Ask!', ['class' => 'btn btn-primary']) ?>
<?php ActiveForm::end(); ?>
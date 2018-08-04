<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
?>

<?php $form = ActiveForm::begin(); ?>

<?php
    echo '<h3>'.$question->question_text.'</h3>';
    $list = [];
    foreach($choices as $choice)
    {
        $list = $list + [$choice->id=>$choice->choice_text];            
    }
    echo $form->field($model, 'choice_text')->radioList($list)->label(false);
?>

<?php ActiveForm::end(); ?>
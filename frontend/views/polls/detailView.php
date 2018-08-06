<?php
use yii\helpers\Html;
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
    echo Html::submitButton('Vote!', ['class' => 'btn btn-success']);
    echo '<h4>Results</h4>';
    echo '<ul>';
    foreach($choices as $choice)
    {
        echo '<li>'.$choice->choice_text.' - '.$choice->votes;            
    }
    echo '</ul>';
?>

<?php ActiveForm::end(); ?>
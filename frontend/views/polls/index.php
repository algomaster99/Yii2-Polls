<?php
use yii\helpers\Html;
?>

<?php 
    foreach($questions as $question)
    {
        echo Html::a('<h3>'.$question->question_text.'</h3>', ['/polls/question-detail-view', 'id'=>$question->id]);
        // echo '<ol>';
        // foreach($choices as $choice)
        // {
        //     if($choice->question_id === $question->id)
        //     {
        //         echo '<li>'.$choice->choice_text.'</li>';
        //     }
        // }
        // echo '</ol>';
    }
?>
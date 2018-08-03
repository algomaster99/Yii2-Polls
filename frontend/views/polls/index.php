<?php 
    foreach($questions as $question)
    {
        echo '<h5>'.$question->question_text.'</h5>';
        echo '<ol>';
        foreach($choices as $choice)
        {
            if($choice->question_id === $question->id)
            {
                echo '<li>'.$choice->choice_text.'</li>';
            }
        }
        echo '</ol>';
    }
?>
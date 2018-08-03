<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class QuestionForm extends ActiveRecord
{
    // private $question_text;

    public static function tableName()
    {
        return 'question';
    }

    public function rules()
    {
        return [
            [['question_text'], 'required'],
        ];
    }

}

?>
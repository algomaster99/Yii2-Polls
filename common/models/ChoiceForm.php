<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class ChoiceForm extends ActiveRecord
{

    public static function tableName()
    {
        return 'choice';
    }
    
    public function rules()
    {
        return [
            [['question_id','choice_text'], 'required'],
        ];
    }

}

?>
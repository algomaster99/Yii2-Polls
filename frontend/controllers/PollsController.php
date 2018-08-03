<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use common\models\QuestionForm;

class PollsController extends Controller
{
    public function actionIndex()
    {
        $questions = QuestionForm::find()->all();
        return $this->render('index', ['questions'=>$questions]);
    }

    public function actionAsk()
    {
        $model = new QuestionForm();
        if ($model->load(Yii::$app->request->post()))
        {
            $model->save();
            return $this->actionIndex();
        }
        return $this->render('questionForm',['model'=>$model]);
    }
}

?>
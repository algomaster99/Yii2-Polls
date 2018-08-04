<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use common\models\QuestionForm;
use common\models\ChoiceForm;

class PollsController extends Controller
{
    public function actionIndex()
    {
        $questions = QuestionForm::find()->all();
        $choices = ChoiceForm::find()->all(); 
        return $this->render('index', ['questions'=>$questions, 'choices'=>$choices]);
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

    public function actionChoice()
    {
        $model = new ChoiceForm();
        if ($model->load(Yii::$app->request->post()))
        {
            $model->save();
            return $this->actionIndex();
        }
        return $this->render('choiceForm', ['model'=>$model]);
    }

    public function actionQuestionDetailView($id)
    {
        $question = QuestionForm::findOne($id);
        $choices = ChoiceForm::find()->where(['question_id'=>$id])->all();
        $model = new ChoiceForm();
        return $this->render('detailView', [
            'model'=>$model,
            'question'=>$question,
            'choices'=>$choices,
        ]);
    }
}

?>
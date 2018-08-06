<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use common\components\AccessRule;
use common\models\User;
use common\models\QuestionForm;
use common\models\ChoiceForm;

class PollsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
            ],
            'access' => [
                'class' => AccessControl::className(),
                'ruleConfig' => [
                    'class' => AccessRule::className(),
                ],
                'only' => ['index', 'ask', 'choice', 'question-detail-view'],
                'rules' => [
                    [
                        'actions' => ['index', 'question-detail-view'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_USER,
                            User::ROLE_ADMIN,
                        ],
                    ],
                    [
                        'actions' => ['index', 'ask', 'choice', 'question-detail-view'],
                        'allow' => true,
                        'roles' => [
                            User::ROLE_ADMIN,
                        ],
                    ],
                ],
            ],
        ];
    }

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
        $model = new ChoiceForm();
        if ($model->load(Yii::$app->request->post()))
        {
            $option_arr = Yii::$app->request->post('ChoiceForm');
            $option = $option_arr['choice_text']; 
            // Yii::$app->session->setFlash('worked', $option);
            $choice = ChoiceForm::findOne(['id'=>$option]);
            $choice->votes = $choice->votes + 1;
            $choice->save();
        }
        $question = QuestionForm::findOne($id);
        $choices = ChoiceForm::find()->where(['question_id'=>$id])->all();

        return $this->render('detailView', [
            'model'=>$model,
            'question'=>$question,
            'choices'=>$choices,
        ]);
    }
}

?>
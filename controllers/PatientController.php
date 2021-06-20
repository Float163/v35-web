<?php

namespace app\controllers;

use Yii;
use app\models\domain\Patient;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * PatientController implements the CRUD actions for Patient model.
 */
class PatientController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Patient models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Patient::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionOutnorma()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Patient::find()->where(['id' => 1]),
        ]);

        return $this->render('monitor', [
            'dataProvider' => $dataProvider,
            'text' => 'Превышение нормы'
        ]);
    }

    public function actionHyper2()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Patient::find()->where(['id' => 2]),
        ]);

        return $this->render('monitor', [
            'dataProvider' => $dataProvider,
            'text' => 'Гипертензия 2+',
        ]);
    }


    /**
     * Displays a single Patient model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $mea = new ActiveDataProvider([
            'query' => \app\models\domain\Measure::find()->andWhere(['patient_id'=>$id])->orderBy('measure_date')]);
        $mea->pagination = false;

        $mea_out = new ActiveDataProvider([
            'query' => \app\models\domain\Measure::find()->andWhere(['patient_id'=>$id])->
            andWhere(['or', ['>', 'diast', 90], ['>', 'sist', 140]])->
            andWhere(['>', 'measure_date', date("Y-m-d",time() - 1036800) ])->orderBy('measure_date')]);
        $mea_out->pagination = false;

        $mea_2week = new ActiveDataProvider([
            'query' => \app\models\domain\Measure::find()->andWhere(['patient_id'=>$id])->
            andWhere(['>', 'measure_date', date("Y-m-d",time() - 1036800) ])->orderBy('measure_date')]);
        $mea_2week->pagination = false;

        return $this->render('view', [
            'model' => $this->findModel($id),
            'mea' => $mea,
            'mea_out' => $mea_out,
            'mea_2week' => $mea_2week,
        ]);
    }

    /**
     * Creates a new Patient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Patient();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Patient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Patient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Patient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Patient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Patient::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

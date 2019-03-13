<?php

namespace app\modules\dish\controllers;

use app\modules\dish\models\Ingredient;
use Throwable;
use Yii;
use app\modules\dish\models\IngredientToDish;
use app\modules\dish\models\IngredientToDishSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IngredientDishController implements the CRUD actions for IngredientToDish model.
 */
class IngredientDishController extends Controller
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
     * Lists all IngredientToDish models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IngredientToDishSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single IngredientToDish model.
     * @param integer $dis_id
     * @param integer $ingredient_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($dis_id, $ingredient_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($dis_id, $ingredient_id),
        ]);
    }

    /**
     * Creates a new IngredientToDish model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new IngredientToDish();
	    $modelsIngredients = [new Ingredient()];

	    if (Yii::$app->request->post()) {
	    	$posts = Yii::$app->request->post();


		    $model->dis_id = $posts['IngredientToDish']['dis_id'];
	    	foreach ($posts['IngredientToDish'] as $post) {
	    		if(is_array($post)) {
				    $model->setIsNewRecord(true);
	    			$model->ingredient_id = $post['ingredient_id'];
			        $model->save();
			    }
		    }
	        return $this->redirect(['index']);
	    } else {
	        return $this->render('create', [
		        'model' => $model,
		        'modelsIngredients' => $modelsIngredients,
	        ]);
        }

    }

    /**
     * Updates an existing IngredientToDish model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $dis_id
     * @param integer $ingredient_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($dis_id, $ingredient_id)
    {
        $model = $this->findModel($dis_id, $ingredient_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'dis_id' => $model->dis_id, 'ingredient_id' => $model->ingredient_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

	/**
	 * Deletes an existing IngredientToDish model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $dis_id
	 * @param integer $ingredient_id
	 * @return mixed
	 * @throws NotFoundHttpException if the model cannot be found
	 * @throws Throwable
	 * @throws \yii\db\StaleObjectException
	 */
    public function actionDelete($dis_id, $ingredient_id)
    {
        $this->findModel($dis_id, $ingredient_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the IngredientToDish model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $dis_id
     * @param integer $ingredient_id
     * @return IngredientToDish the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($dis_id, $ingredient_id)
    {
        if (($model = IngredientToDish::findOne(['dis_id' => $dis_id, 'ingredient_id' => $ingredient_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

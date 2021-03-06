<?php

	namespace app\modules\dish\controllers;

	use app\modules\dish\models\Ingredient;
	use app\modules\dish\models\IngredientToDish;
	use Yii;
	use app\modules\dish\models\Dish;
	use app\modules\dish\models\DishSearch;
	use yii\web\Controller;
	use yii\web\NotFoundHttpException;
	use yii\filters\VerbFilter;

	/**
	 * DishController implements the CRUD actions for Dish model.
	 */
	class DishController extends Controller
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
		 * Lists all Dish models.
		 * @return mixed
		 */
		public function actionIndex()
		{
			$searchModel = new DishSearch();
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

			return $this->render('index', [
				'searchModel' => $searchModel,
				'dataProvider' => $dataProvider,
			]);
		}

		/**
		 * Displays a single Dish model.
		 * @param integer $id
		 * @return mixed
		 * @throws NotFoundHttpException if the model cannot be found
		 */
		public function actionView($id)
		{
			return $this->render('view', [
				'model' => $this->findModel($id),
			]);
		}

		/**
		 * Creates a new Dish model.
		 * If creation is successful, the browser will be redirected to the 'view' page.
		 * @return mixed
		 */
		public function actionCreate()
		{
			$model = new Dish();
			$modelsIngredients = [new Ingredient()];
			//TODO-splaa Подумаь на улучшением даного функционала
			$modelInredients = $modelsIngredients;
			$ingredientToDish = new IngredientToDish();

			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				$posts = Yii::$app->request->post();

				$ingredientToDish->dis_id = $model->dis_id;

				foreach ($posts['Ingredient'] as $post) {
					if (is_array($post)) {
						$ingredientToDish->setIsNewRecord(true);
						$ingredientToDish->ingredient_id = $post['ingredient_id'];
						$ingredientToDish->save();
					}
				}

				return $this->redirect(['view', 'id' => $model->dis_id]);
			}

			return $this->render('create', [
				'model' => $model,
				'modelInredients' => $modelInredients,
				'modelsIngredients' => $modelsIngredients,
				'ingredientToDish' => $ingredientToDish,
			]);
		}

		/**
		 * Updates an existing Dish model.
		 * If update is successful, the browser will be redirected to the 'view' page.
		 * @param integer $id
		 * @return mixed
		 * @throws NotFoundHttpException if the model cannot be found
		 */
		public function actionUpdate($id)
		{
			$model = $this->findModel($id);
			$modelInredients = $model->ingredients;

			$modelsIngredients = [new Ingredient()];
			$ingredientToDish = new IngredientToDish();

			if ($model->load(Yii::$app->request->post())) {
				$posts = Yii::$app->request->post();

				$ingredientToDish->dis_id = $model->dis_id;

				foreach ($posts['Ingredient'] as $post) {
					if (is_array($post)) {
						$ingredientToDish->setIsNewRecord(true);
						$ingredientToDish->ingredient_id = $post['ingredient_id'];
						$ingredientToDish->save();
					}
				}
			}

			if ($model->load(Yii::$app->request->post()) && $model->save()) {
				return $this->redirect(['view', 'id' => $model->dis_id]);
			}

			return $this->render('update', [
				'model' => $model,
				'modelInredients' => $modelInredients,
				'modelsIngredients' => $modelsIngredients,
				'ingredientToDish' => $ingredientToDish,
			]);
		}

		/**
		 * Deletes an existing Dish model.
		 * If deletion is successful, the browser will be redirected to the 'index' page.
		 * @param integer $id
		 * @return mixed
		 * @throws NotFoundHttpException if the model cannot be found
		 * @throws \Throwable
		 * @throws \yii\db\StaleObjectException
		 */
		public function actionDelete($id)
		{
			$this->findModel($id)->delete();

			return $this->redirect(['index']);
		}

		/**
		 * Finds the Dish model based on its primary key value.
		 * If the model is not found, a 404 HTTP exception will be thrown.
		 * @param integer $id
		 * @return Dish the loaded model
		 * @throws NotFoundHttpException if the model cannot be found
		 */
		protected function findModel($id)
		{
			if (($model = Dish::findOne($id)) !== null) {
				return $model;
			}

			throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
		}
	}

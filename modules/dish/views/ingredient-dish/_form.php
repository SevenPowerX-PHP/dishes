<?php

	use yii\helpers\ArrayHelper;
	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use yii\jui\AutoComplete;
	use app\modules\dish\models\Ingredient;
	use app\modules\dish\models\Dish as ModelDish;
	use wbraganca\dynamicform\DynamicFormWidget;

	/* @var $this yii\web\View */
	/* @var $model app\modules\dish\models\IngredientToDish */
	/* @var $form yii\widgets\ActiveForm */
?>


<?php //фомируем список
	$list_ingridient = Ingredient::find()
		->select(['ingredient_id as value', 'ingredient_name as label'])
		->asArray()
		->where(['status' => 1])
		->all();

	$list_dishes = ModelDish::find()
		->select(['dis_id', 'dish_name'])
		->asArray()
		->all();

	$items = ArrayHelper::map($list_dishes, 'dis_id', 'dish_name');
	$params = [
		'prompt' => 'Select Dish'
	];

?>


<div class="ingredient-to-dish-form">

	<?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

	<?= $form->field($model, 'dis_id')->dropDownList($items, $params); ?>

	<? //Передаем список виджету AutoComplete?>

	<div class="panel panel-default">
		<div class="panel-heading"><h4><i class="glyphicon glyphicon-envelope"></i> Dish Ingredients</h4></div>
		<div class="panel-body">
			<?php /** @var array $modelsIngredients */
				DynamicFormWidget::begin([
					'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
					'widgetBody' => '.container-items', // required: css class selector
					'widgetItem' => '.item', // required: css class
					'limit' => 20, // the maximum times, an element can be cloned (default 999)
					'min' => 1, // 0 or 1 (default 1)
					'insertButton' => '.add-item', // css class
					'deleteButton' => '.remove-item', // css class
					'model' => $modelsIngredients[0],
					'formId' => 'dynamic-form',
					'formFields' => [
						'ingredient_id',
					],
				]); ?>

			<div class="container-items"><!-- widgetContainer -->
				<?php foreach ($modelsIngredients

					as $i => $modelIngredient): ?>
				<div class="item panel panel-default"><!-- widgetBody -->
					<div class="panel-heading">
						<h3 class="panel-title pull-left">Ingredients</h3>
						<div class="pull-right">
							<button type="button" class="add-item btn btn-success btn-xs"><i
										class="glyphicon glyphicon-plus"></i></button>
							<button type="button" class="remove-item btn btn-danger btn-xs"><i
										class="glyphicon glyphicon-minus"></i></button>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="panel-body">
						<?php
							// necessary for update action.
							if (!$modelIngredient->isNewRecord) {
								echo Html::activeHiddenInput($modelIngredient, "[{$i}]id");
							}
						?>
						<div class="row">
							<div class="col-sm-12">
								<?php
									$items = ArrayHelper::map($list_ingridient, 'value', 'label');
									$params = [
										'prompt' => 'Select ingredient'
									];
								?>
								<?= $form->field($model, '[' . $i . ']ingredient_id')->dropDownList($items, $params); ?>
							</div>
						</div><!-- .row -->
					</div><!-- .row -->
				</div>
			</div>
		<?php endforeach; ?>
		</div>
		<?php DynamicFormWidget::end(); ?>
	</div>

</div>

<div class="form-group">
	<?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
<script>
	$(document).ready(function () {
		$(".dynamicform_wrapper").on("afterInsert", function (e, item) {
			console.log("afterInsert");
		});
	});
</script>

</div>

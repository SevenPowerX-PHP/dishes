<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\dish\models\IngredientToDish */

$this->title = Yii::t('app', 'Create Ingredient To Dish');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ingredient To Dishes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ingredient-to-dish-create">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= $this->render('_form', [
        'model' => $model,
	    'modelsIngredients' => $modelsIngredients
    ]) ?>

</div>

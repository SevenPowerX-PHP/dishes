<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\dish\models\IngredientToDish */

$this->title = Yii::t('app', 'Update Ingredient To Dish: {name}', [
    'name' => $model->dis_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ingredient To Dishes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dis_id, 'url' => ['view', 'dis_id' => $model->dis_id, 'ingredient_id' => $model->ingredient_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ingredient-to-dish-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

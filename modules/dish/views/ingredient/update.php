<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\dish\models\Ingredient */

$this->title = Yii::t('app', 'Update Ingredient: {name}', [
    'name' => $model->ingredient_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ingredients'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ingredient_id, 'url' => ['view', 'id' => $model->ingredient_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ingredient-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

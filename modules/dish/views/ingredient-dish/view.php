<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\dish\models\IngredientToDish */

$this->title = $model->dis_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ingredient To Dishes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ingredient-to-dish-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'dis_id' => $model->dis_id, 'ingredient_id' => $model->ingredient_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'dis_id' => $model->dis_id, 'ingredient_id' => $model->ingredient_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'dis_id',
            'ingredient_id',
        ],
    ]) ?>

</div>

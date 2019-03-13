<?php

namespace app\modules\dish\models;

use Yii;

/**
 * This is the model class for table "ingredient".
 *
 * @property int $ingredient_id
 * @property string $ingredient_name
 * @property int $status
 *
 * @property IngredientToDish[] $ingredientToDishes
 * @property Dish[] $dis
 */
class Ingredient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingredient';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ingredient_name'], 'required'],
            [['status'], 'integer'],
            [['ingredient_name'], 'string', 'max' => 64],
            [['ingredient_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ingredient_id' => Yii::t('app', 'Ingredient ID'),
            'ingredient_name' => Yii::t('app', 'Ingredient Name'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredientToDishes()
    {
        return $this->hasMany(IngredientToDish::className(), ['ingredient_id' => 'ingredient_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDis()
    {
        return $this->hasMany(Dish::className(), ['dis_id' => 'dis_id'])->viaTable('ingredient_to_dish', ['ingredient_id' => 'ingredient_id']);
    }

    /**
     * {@inheritdoc}
     * @return IngredientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IngredientQuery(get_called_class());
    }
}

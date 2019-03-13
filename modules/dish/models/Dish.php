<?php

namespace app\modules\dish\models;

use Yii;
use app\modules\dish\models\IngredientToDish;
use app\modules\dish\models\Ingredient;

/**
 * This is the model class for table "dish".
 *
 * @property int $dis_id
 * @property string $dish_name
 *
 * @property IngredientToDish[] $ingredientToDishes
 * @property Ingredient[] $ingredients
 */
class Dish extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dish';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dish_name'], 'required'],
            [['dish_name', 'ingredients'], 'string', 'max' => 64],
            [['dish_name'], 'unique'],
        ];
    }

    public function ingredients() {
    	return 'test';
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dis_id' => Yii::t('app', 'Блюдо ID'),
            'dish_name' => Yii::t('app', 'Название Блюда'),
            'ingredients' => Yii::t('app', 'Ингредиенты'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredientToDishes()
    {
        return $this->hasMany(IngredientToDish::className(), ['dis_id' => 'dis_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredients()
    {
        return $this->hasMany(Ingredient::className(), ['ingredient_id' => 'ingredient_id'])->viaTable('ingredient_to_dish', ['dis_id' => 'dis_id']);
    }

    /**
     * {@inheritdoc}
     * @return DishQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DishQuery(get_called_class());
    }
}

<?php

namespace app\modules\dish\models;

use Yii;

/**
 * This is the model class for table "ingredient_to_dish".
 *
 * @property int $dis_id
 * @property int $ingredient_id
 *
 * @property Dish $dis
 * @property Ingredient $ingredient
 */
class IngredientToDish extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ingredient_to_dish';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dis_id', 'ingredient_id'], 'required'],
            [['dis_id', 'ingredient_id'], 'integer'],
            [['dis_id', 'ingredient_id'], 'unique', 'targetAttribute' => ['dis_id', 'ingredient_id']],
            [['dis_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dish::className(), 'targetAttribute' => ['dis_id' => 'dis_id']],
            [['ingredient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Ingredient::className(), 'targetAttribute' => ['ingredient_id' => 'ingredient_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dis_id' => Yii::t('app', 'Dis ID'),
            'ingredient_id' => Yii::t('app', 'Ingredient ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDis()
    {
        return $this->hasOne(Dish::className(), ['dis_id' => 'dis_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredient()
    {
	        return $this->hasOne(Ingredient::className(), ['ingredient_id' => 'ingredient_id']);
    }

    /**
     * {@inheritdoc}
     * @return IngredientToDishQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IngredientToDishQuery(get_called_class());
    }
}

<?php

namespace app\modules\dish\models;

/**
 * This is the ActiveQuery class for [[IngredientToDish]].
 *
 * @see IngredientToDish
 */
class IngredientToDishQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return IngredientToDish[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return IngredientToDish|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

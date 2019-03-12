<?php

use yii\db\Migration;

/**
 * Class m190312_181431_create_table_ingredient
 */
class m190312_181431_create_table_ingredient extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->createTable('ingredient', [
		    'ingredient_id' => $this->primaryKey(11),
		    'ingredient_name' => $this->string(64)->notNull()->unique()
	    ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->dropTable('ingredient');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190312_181431_create_table_ingredient cannot be reverted.\n";

        return false;
    }
    */
}

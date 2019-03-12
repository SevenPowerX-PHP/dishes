<?php

use yii\db\Migration;

/**
 * Class m190312_181535_create_table_ingredient_to_dish
 */
class m190312_181535_create_table_ingredient_to_dish extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->createTable('ingredient_to_dish', [
		    'dis_id' => $this->integer(11),
		    'ingredient_id' => $this->integer(11),
		    'quantity' => $this->integer(10)
	    ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->dropTable('ingredient_to_dish');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190312_181535_create_table_ingredient_to_dish cannot be reverted.\n";

        return false;
    }
    */
}

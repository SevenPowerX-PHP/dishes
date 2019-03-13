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
		    'PRIMARY KEY(dis_id, ingredient_id)',

	    ]);
	    $this->createIndex(
		    'idx-dis_id',
		    'ingredient_to_dish',
		    'dis_id'
	    );
	    $this->addForeignKey(
		    'fk-ingredient_to_dish-dish_id',
		    'ingredient_to_dish',
		    'dis_id',
		    'dish',
		    'dis_id',
		    'CASCADE'
	    );
	    $this->createIndex(
		    'idx-ingredient_id',
		    'ingredient_to_dish',
		    'ingredient_id'
	    );
	    $this->addForeignKey(
		    'fk-ingredient_to_dish-ingredient_id',
		    'ingredient_to_dish',
		    'ingredient_id',
		    'ingredient',
		    'ingredient_id',
		    'CASCADE'
	    );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    // drops foreign key for table `post`
	    $this->dropForeignKey(
		    'fk-ingredient_to_dish-dish_id',
		    'ingredient_to_dish'
	    );

	    // drops index for column `post_id`
	    $this->dropIndex(
		    'idx-dis_id',
		    'ingredient_to_dish'
	    );

	    // drops foreign key for table `tag`
	    $this->dropForeignKey(
		    'fk-ingredient_to_dish-ingredient_id',
		    'ingredient_to_dish'
	    );

	    // drops index for column `tag_id`
	    $this->dropIndex(
		    'idx-ingredient_id',
		    'ingredient_to_dish'
	    );

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

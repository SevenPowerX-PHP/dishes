<?php

	use yii\db\Migration;

	/**
	 * Class m190312_180937_create_table_dish
	 */
	class m190312_180937_create_table_dish extends Migration
	{
		/**
		 * {@inheritdoc}
		 */
		public function safeUp()
		{
			$this->createTable('dish', [
				'dis_id' => $this->primaryKey(11),
				'dish_name' => $this->string(64)->notNull()->unique()
			]);
		}

		/**
		 * {@inheritdoc}
		 */
		public function safeDown()
		{
			$this->dropTable('dish');
		}

		/*
		// Use up()/down() to run migration code without a transaction.
		public function up()
		{

		}

		public function down()
		{
			echo "m190312_180937_create_table_dish cannot be reverted.\n";

			return false;
		}
		*/
	}

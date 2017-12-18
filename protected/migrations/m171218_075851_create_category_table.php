<?php

class m171218_075851_create_category_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_category', array(
			'id' => 'pk',
			'title' => 'varchar(255) NOT NULL',
			'status' => 'boolean',
		));
	}

	public function down()
	{
		$this->dropTable('tbl_category');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
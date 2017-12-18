<?php

class m171218_070754_create_posts_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('tbl_post', array(
			'id' => 'pk',
			'title' => 'string',
			'content' => 'text',
			'category_id' => 'integer',
			'status' => 'boolean',
			'pub_date' => 'timestamp',
		));
	}

	public function down()
	{
		$this->dropTable('tbl_post');
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
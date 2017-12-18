<?php

class m171218_115948_update_users_table extends CDbMigration
{
	public function up()
	{
		$this->addColumn('tbl_users', 'role', 'string');
		$this->addColumn('tbl_users', 'password_salt', 'string');
	}

	public function down()
	{
		$this->dropColumn('tbl_users', 'role');
		$this->dropColumn('tbl_users', 'password_salt');
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
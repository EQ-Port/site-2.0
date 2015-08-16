<?php

use yii\db\Schema;
use yii\db\Migration;

class m150812_153812_auth_item extends Migration
{
    public function up()
    {
        $this->createTable(
            '{{%auth_item}}',
            [
				'name'         	=> 'varchar(64)',
				'type'		 	=> 'int(11)',
				'description' 	=> 'text',
				'rule_name'     => 'varchar(64)',
				'data'		 	=> 'text',
				'created_at' 	=> 'int(11)',
				'updated_at' 	=> 'int(11)',
            ]
        );
    }

    public function down()
    {
        $this->dropTable('{{%auth_item}}');
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}

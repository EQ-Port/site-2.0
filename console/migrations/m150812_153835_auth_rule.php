<?php

use yii\db\Schema;
use yii\db\Migration;

class m150812_153835_auth_rule extends Migration
{
    public function up()
    {
        $this->createTable(
            '{{%auth_rule}}',
            [
				'id'         	=> 'varchar(64)',
				'data'		 	=> 'text',
				'created_at' 	=> 'int(11)',
				'updated_at' 	=> 'int(11)',
            ]
        );
    }

    public function down()
    {
        $this->dropTable('{{%auth_rule}}');
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

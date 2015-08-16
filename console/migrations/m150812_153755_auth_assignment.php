<?php

use yii\db\Schema;
use yii\db\Migration;

class m150812_153755_auth_assignment extends Migration
{
    public function up()
    {
        $this->createTable(
            '{{%auth_assignment}}',
            [
				'item_name'     => 'varchar(64)',
				'user_id'		=> 'varchar(64)',
				'created_at' 	=> 'int(11)',
            ]
        );
    }

    public function down()
    {
        $this->dropTable('{{%auth_assignment}}');
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

<?php

use yii\db\Schema;
use yii\db\Migration;

class m150812_153823_auth_item_child extends Migration
{
    public function up()
    {
        $this->createTable(
            '{{%auth_item_child}}',
            [
				'parent'        => 'varchar(64)',
				'child'		 	=> 'varchar(64)',
            ]
        );
    }

    public function down()
    {
        $this->dropTable('{{%auth_item_child}}');
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

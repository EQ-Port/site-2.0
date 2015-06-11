<?php

use yii\db\Schema;
use yii\db\Migration;

class m150609_002237_calendar extends Migration
{
    public function up()
    {
        $this->createTable(
            '{{%calendar}}',
            [
				'id'         	=> 'int(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
				'date'		 	=> 'DATE NOT NULL',
				'description' 	=> 'varchar(255) NOT NULL',
            ]
        );
    }

    public function down()
    {
        $this->dropTable('{{%calendar}}');
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

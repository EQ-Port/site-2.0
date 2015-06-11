<?php

use yii\db\Schema;
use yii\db\Migration;

class m150609_002218_event extends Migration
{
    public function up()
    {
        $this->createTable(
            '{{%event}}',
            [
				'id'         	=> 'int(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
				'name'		 	=> 'varchar(100) NOT NULL',
				'code' 		 	=> 'varchar(100) NOT NULL',
				'type'   	 	=> 'int(11) NOT NULL',
				'description'  	=> 'varchar(255) NOT NULL',
				'start_date'    => 'date NOT NULL',
				'end_date'      => 'date DEFAULT NULL',
				'place'			=> 'varchar(150) NOT NULL',
				'address'		=> 'varchar(150) NOT NULL',
            ]
        );
    }

    public function down()
    {
        $this->dropTable('{{%event}}');
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

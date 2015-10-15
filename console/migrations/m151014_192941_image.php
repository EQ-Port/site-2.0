<?php

use yii\db\Migration;

class m151014_192941_image extends Migration
{
    public function up()
    {
        $this->createTable(
            '{{%image}}',
            [
                'id' => 'int(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
                'path' => 'varchar(255) NOT NULL',
            ]
        );
    }

    public function down()
    {
        $this->dropTable('{{%image}}');
    }
}

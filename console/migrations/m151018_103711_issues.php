<?php

use yii\db\Migration;

class m151018_103711_issues extends Migration
{
    public function up()
    {
        $this->createTable(
            '{{%issue}}',
            [
                'id'           => 'int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',
                'name'         => 'varchar(255) NOT NULL',
                'code'         => 'varchar(255) NOT NULL',
                'coverId'      => 'int(11) unsigned',
                'announceDate' => 'date',
                'publishDate'  => 'date',
                'lead'         => 'text'
            ]
        );

        $this->createIndex('issue_code', '{{%issue}}', 'code', true);
        $this->addForeignKey('issue_cover', '{{%issue}}', 'coverId', '{{%image}}', 'id', 'set null', 'cascade');
    }

    public function down()
    {
        $this->dropForeignKey('issue_cover', '{{%issue}}');
        $this->dropTable('{{%issue}}');
    }
}

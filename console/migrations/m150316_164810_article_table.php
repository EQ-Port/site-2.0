<?php

use yii\db\Schema;
use yii\db\Migration;

class m150316_164810_article_table extends Migration
{
    public function up()
    {
        $this->createTable(
            '{{%article}}',
            [
                'id'          => 'int(11) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY',
                'name'        => 'varchar(255) NOT NULL DEFAULT \'\'',
                'previewText' => 'text NOT NULL DEFAULT \'\'',
                'fullText'    => 'text DEFAULT NULL',
                'active'      => 'tinyint(1) DEFAULT 0',
                'activeFrom'  => 'DATETIME',
                'activeTo'    => 'DATETIME',
                'authorId'    => 'int(11) unsigned DEFAULT NULL',
            ]
        );

        $this->addForeignKey('article_author', 'article', 'authorId', 'user', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('article_author', 'article');
        $this->dropTable('{{%article}}');
    }
}

<?php

use yii\db\Migration;

class m151014_215010_article_image extends Migration
{
    public function up()
    {
        $this->addColumn('{{%article}}', 'imageId', 'int(11) unsigned DEFAULT NULL');
        $this->addForeignKey('article_image', '{{%article}}', 'imageId', '{{%image}}', 'id', 'set null', 'cascade');
    }

    public function down()
    {
        $this->dropForeignKey('article_image', '{{%article}}');
        $this->dropColumn('{{%article}}', 'imageId');
    }
}

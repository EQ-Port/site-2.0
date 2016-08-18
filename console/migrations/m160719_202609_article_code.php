<?php

use yii\db\Migration;

class m160719_202609_article_code extends Migration
{
    public function up()
    {
        $this->addColumn('{{%article}}', 'code', 'varchar(255) DEFAULT NULL AFTER name');
        $this->createIndex('article_code', '{{%article}}', 'code', true);
    }

    public function down()
    {
        $this->dropIndex('article_code', '{{%article}}');
        $this->dropColumn('{{%article}}', 'code');
    }
}

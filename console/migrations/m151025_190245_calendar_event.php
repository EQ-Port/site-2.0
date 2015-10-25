<?php

use yii\db\Migration;

class m151025_190245_calendar_event extends Migration
{
    public function up()
    {
        $this->renameTable('{{%calendar}}', '{{%calendar_event}}');

        $this->addColumn('{{%calendar_event}}', 'name', 'varchar(255) NOT NULL AFTER id');

        $this->addColumn('{{%calendar_event}}', 'imageId', 'int(11) unsigned AFTER name');

        $this->addForeignKey('calendar_image', '{{%calendar_event}}', 'imageId', '{{%image}}', 'id', 'set null', 'cascade');
    }

    public function down()
    {
        $this->dropForeignKey('calendar_image', '{{%calendar_event}}');

        $this->dropColumn('{{%calendar_event}}', 'name');

        $this->dropColumn('{{%calendar_event}}', 'imageId');

        $this->renameTable('{{%calendar_event}}', '{{%calendar}}');
    }
}

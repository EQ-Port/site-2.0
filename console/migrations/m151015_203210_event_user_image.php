<?php

use yii\db\Migration;

class m151015_203210_event_user_image extends Migration
{
    public function up()
    {
        $this->addColumn(
            '{{%event}}',
            'posterId',
            'int(11) unsigned DEFAULT NULL AFTER code'
        );

        $this->addColumn(
            '{{%user}}',
            'avatarId',
            'int(11) unsigned DEFAULT NULL AFTER username'
        );

        $this->addForeignKey('event_poster', '{{%event}}', 'posterId', '{{%image}}', 'id', 'set null', 'cascade');
        $this->addForeignKey('user_avatar', '{{%user}}', 'avatarId', '{{%image}}', 'id', 'set null', 'cascade');
    }

    public function down()
    {
        $this->dropForeignKey('event_poster', '{{%event}}');
        $this->dropForeignKey('user_avatar', '{{%user}}');

        $this->dropColumn('{{%event}}', 'posterId');
        $this->dropColumn('{{%user}}', 'avatarId');
    }
}

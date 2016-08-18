<?php

use yii\db\Migration;

class m151104_083245_user_roles extends Migration
{
    public function up()
    {
        $this->addColumn(
            '{{%user}}',
            'roles',
            'int(11) unsigned NOT NULL DEFAULT 1'
        );
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'roles');
    }
}

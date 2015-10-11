<?php

use yii\db\Migration;

class m151011_223511_auth_rule_name extends Migration
{
    public function up()
    {
        $this->addColumn('{{%auth_rule}}', 'name', 'varchar(255) AFTER id');
    }

    public function down()
    {
        $this->dropColumn('{{%auth_rule}}', 'name');
    }
}

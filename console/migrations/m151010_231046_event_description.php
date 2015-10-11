<?php

use yii\db\Migration;

class m151010_231046_event_description extends Migration
{
    public function up()
    {
        $this->alterColumn('event', 'description', 'text DEFAULT \'\'');
    }

    public function down()
    {
        $this->alterColumn('event', 'description', 'varchar(255)');
    }
}

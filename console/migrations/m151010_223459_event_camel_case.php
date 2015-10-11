<?php

use yii\db\Migration;

class m151010_223459_event_camel_case extends Migration
{
    public function up()
    {
        $this->renameColumn('event', 'start_date', 'startDate');
        $this->renameColumn('event', 'end_date', 'endDate');
    }

    public function down()
    {
        $this->renameColumn('event', 'startDate', 'start_date');
        $this->renameColumn('event', 'endDate', 'end_date');
    }
}

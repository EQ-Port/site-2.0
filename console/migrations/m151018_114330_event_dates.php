<?php

use yii\db\Migration;

class m151018_114330_event_dates extends Migration
{
    public function up()
    {
        $this->alterColumn(
            '{{%event}}',
            'startDate',
            'datetime'
        );

        $this->alterColumn(
            '{{%event}}',
            'endDate',
            'datetime'
        );
    }

    public function down()
    {
        $this->alterColumn(
            '{{%event}}',
            'startDate',
            'date'
        );

        $this->alterColumn(
            '{{%event}}',
            'endDate',
            'date'
        );
    }
}

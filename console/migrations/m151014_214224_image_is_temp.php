<?php

use yii\db\Migration;

class m151014_214224_image_is_temp extends Migration
{
    public function up()
    {
        $this->addColumn(
            '{{%image}}',
            'isTemp',
            \yii\db\mysql\Schema::TYPE_BOOLEAN . ' NOT NULL DEFAULT 1'
        );
    }

    public function down()
    {
        $this->dropColumn('{{%image}}', 'isTemp');
    }
}

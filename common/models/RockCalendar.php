<?php
namespace common\models;

class RockCalendar extends \yii\db\ActiveRecord
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public static function tableName()
    {
        return 'calendar';
    }
}
<?php
namespace frontend\models;

class Event extends \yii\db\ActiveRecord
{
	const EVENT_CONCERT 		= 1; //Концерты
	const EVENT_FESTIVALS 		= 2; //Фестивали
	const EVENT_MASTER_CLASSES 	= 4; //Мастер-классы
	const EVENT_PRESENTATION	= 8; //Презентации альбомов
	const EVENT_PARTY			= 16; //Вечеринки
	const EVENT_AUTOGRAPH		= 32; //Автограф-сессии
	const EVENT_OPEN_AIR		= 48; //Open Air
	const EVENT_ONLINE			= 64; //On-line концерт
	const EVENT_ROCK_QUEST		= 80; //Рок-квесты
	
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function tableName()
    {
        return 'event';
    }
}
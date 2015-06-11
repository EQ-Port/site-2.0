<?php
namespace frontend\models;

class Event extends \yii\db\ActiveRecord
{
	const EVENT_CONCERT 		= 1; //��������
	const EVENT_FESTIVALS 		= 2; //���������
	const EVENT_MASTER_CLASSES 	= 4; //������-������
	const EVENT_PRESENTATION	= 8; //����������� ��������
	const EVENT_PARTY			= 16; //���������
	const EVENT_AUTOGRAPH		= 32; //��������-������
	const EVENT_OPEN_AIR		= 48; //Open Air
	const EVENT_ONLINE			= 64; //On-line �������
	const EVENT_ROCK_QUEST		= 80; //���-������
	
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function tableName()
    {
        return 'event';
    }
}
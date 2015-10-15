<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property integer $type
 * @property string $description
 * @property string $startDate
 * @property string $endDate
 * @property string $place
 * @property string $address
 * @property integer $posterId
 *
 * @property Image $poster
 */
class Event extends \yii\db\ActiveRecord
{
    const EVENT_CONCERT = 1; //Концерты
    const EVENT_FESTIVALS = 2; //Фестивали
    const EVENT_MASTER_CLASSES = 4; //Мастер-классы
    const EVENT_PRESENTATION = 8; //Презентации альбомов
    const EVENT_PARTY = 16; //Вечеринки
    const EVENT_AUTOGRAPH = 32; //Автограф-сессии
    const EVENT_OPEN_AIR = 48; //Open Air
    const EVENT_ONLINE = 64; //On-line концерт
    const EVENT_ROCK_QUEST = 80; //Рок-квесты

    public static function typeList()
    {
        return [
            self::EVENT_CONCERT        => 'Концерт',
            self::EVENT_FESTIVALS      => 'Фестиваль',
            self::EVENT_MASTER_CLASSES => 'Мастер-класс',
            self::EVENT_PRESENTATION   => 'Презентация альбома',
            self::EVENT_PARTY          => 'Вечеринка',
            self::EVENT_AUTOGRAPH      => 'Автограф-сессия',
            self::EVENT_OPEN_AIR       => 'Open Air',
            self::EVENT_ONLINE         => 'Online концерт',
            self::EVENT_ROCK_QUEST     => 'Рок-квест',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code', 'type', 'description', 'startDate', 'place', 'address'], 'required'],
            [['type'], 'integer'],
            [['startDate', 'endDate'], 'safe'],
            [['posterId'], 'integer', 'skipOnEmpty' => true],
            [['name', 'code'], 'string', 'max' => 100],
            [['place', 'address'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => Yii::t('app', 'ID'),
            'name'        => Yii::t('app', 'Name'),
            'code'        => Yii::t('app', 'Code'),
            'type'        => Yii::t('app', 'Type'),
            'description' => Yii::t('app', 'Description'),
            'startDate'   => Yii::t('app', 'Start Date'),
            'endDate'     => Yii::t('app', 'End Date'),
            'place'       => Yii::t('app', 'Place'),
            'address'     => Yii::t('app', 'Address'),
            'posterId'    => Yii::t('app', 'Poster'),
        ];
    }

    public function getPoster()
    {
        return $this->hasOne(Image::className(), ['id' => 'posterId']);
    }
}

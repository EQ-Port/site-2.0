<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "calendar_event".
 *
 * @property integer $id
 * @property string $name
 * @property integer $imageId
 * @property string $date
 * @property string $description
 *
 * @property Image $image
 */
class CalendarEvent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendar_event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'date', 'description'], 'required'],
            [['imageId'], 'integer'],
            [['date'], 'safe'],
            [['name', 'description'], 'string', 'max' => 255],
            [
                ['imageId'],
                'exist',
                'skipOnError'     => true,
                'targetClass'     => Image::className(),
                'targetAttribute' => ['imageId' => 'id']
            ],
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
            'imageId'     => Yii::t('app', 'Image'),
            'date'        => Yii::t('app', 'Date'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'imageId']);
    }
}

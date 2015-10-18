<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "issue".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property integer $coverId
 * @property string $announceDate
 * @property string $publishDate
 * @property string $lead
 *
 * @property Image $cover
 */
class Issue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'issue';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['coverId'], 'integer'],
            [['announceDate', 'publishDate'], 'safe'],
            [['lead'], 'string'],
            [['name', 'code'], 'string', 'max' => 255],
            [['code'], 'unique'],
            [['coverId'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['coverId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'code' => Yii::t('app', 'Code'),
            'coverId' => Yii::t('app', 'Cover'),
            'announceDate' => Yii::t('app', 'Announce Date'),
            'publishDate' => Yii::t('app', 'Publish Date'),
            'lead' => Yii::t('app', 'Lead'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCover()
    {
        return $this->hasOne(Image::className(), ['id' => 'coverId']);
    }
}

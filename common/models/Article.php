<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $previewText
 * @property string $fullText
 * @property integer $active
 * @property string $activeFrom
 * @property string $activeTo
 * @property integer $authorId
 * @property integer $imageId
 *
 * @property User $author
 * @property Image $image
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['previewText'], 'required'],
            [['previewText', 'fullText'], 'string'],
            [['code'], 'unique'],
            [['code'], 'match', 'pattern' => '/[a-z0-9_-]/'],
            [['active', 'authorId'], 'integer'],
            [['imageId'], 'integer', 'skipOnEmpty' => true],
            [['activeFrom', 'activeTo'], 'safe'],
            [['name', 'code'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'name'        => 'Заголовок',
            'code'        => Yii::t('app', 'Code'),
            'previewText' => 'Лид',
            'fullText'    => 'Полный текст',
            'active'      => 'Опубликован',
            'activeFrom'  => 'Дата начала публикации',
            'activeTo'    => 'Дата окончания публикации',
            'authorId'    => 'Автор',
            'imageId'     => 'Картинка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'authorId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'imageId']);
    }
}

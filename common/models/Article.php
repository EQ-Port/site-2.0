<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $name
 * @property string $previewText
 * @property string $fullText
 * @property integer $active
 * @property string $activeFrom
 * @property string $activeTo
 * @property integer $authorId
 *
 * @property User $author
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
            [['active', 'authorId'], 'integer'],
            [['activeFrom', 'activeTo'], 'safe'],
            [['name'], 'string', 'max' => 255]
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
            'previewText' => 'Лид',
            'fullText'    => 'Полный текст',
            'active'      => 'Опубликован',
            'activeFrom'  => 'Дата начала публикации',
            'activeTo'    => 'Дата окончания публикации',
            'authorId'    => 'Автор',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'authorId']);
    }
}

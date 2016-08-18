<?php

namespace common\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $firstName
 * @property string $lastName
 * @property string $passwordHash
 * @property string $passwordResetToken
 * @property string $email
 * @property integer $status
 * @property integer $avatarId
 *
 * @property Article[] $articles
 * @property Image $avatar
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const ROLE_USER            = 1;
    const ROLE_PARTNER         = 2;
    const ROLE_EVENT_MANAGER   = 4;
    const ROLE_USER_MANAGER    = 8;
    const ROLE_ARTICLE_MANAGER = 16;
    const ROLE_MODERATOR       = 32;
    const ROLE_ADMIN           = 64;
    const ROLE_ISSUE_MANAGER   = 128;

    public static function roleList()
    {
        return [
            self::ROLE_USER            => Yii::t('roles', 'User'),
            self::ROLE_PARTNER         => Yii::t('roles', 'Partner'),
            self::ROLE_EVENT_MANAGER   => Yii::t('roles', 'Event Manager'),
            self::ROLE_USER_MANAGER    => Yii::t('roles', 'User Manager'),
            self::ROLE_ARTICLE_MANAGER => Yii::t('roles', 'Article Manager'),
            self::ROLE_ISSUE_MANAGER   => Yii::t('roles', 'Issue Manager'),
            self::ROLE_MODERATOR       => Yii::t('roles', 'Moderator'),
            self::ROLE_ADMIN           => Yii::t('roles', 'Admin'),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email'], 'required'],
            [['username'], 'unique'],
            [['status'], 'integer'],
            [['username', 'passwordHash', 'passwordResetToken', 'email'], 'string', 'max' => 255],
            [['avatarId'], 'integer', 'skipOnEmpty' => true],
            [['firstName', 'lastName'], 'string', 'max' => 50],
            [['passwordHash'], 'safe'],
            [['roles'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'                 => Yii::t('app', 'ID'),
            'username'           => Yii::t('app', 'Username'),
            'firstName'          => Yii::t('app', 'First Name'),
            'lastName'           => Yii::t('app', 'Last Name'),
            'passwordHash'       => Yii::t('app', 'Password Hash'),
            'passwordResetToken' => Yii::t('app', 'Password Reset Token'),
            'email'              => Yii::t('app', 'Email'),
            'status'             => Yii::t('app', 'Status'),
            'avatarId'           => Yii::t('app', 'Avatar'),
            'roles'              => Yii::t('app', 'Roles'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['authorId' => 'id']);
    }

    public function validatePassword($password)
    {
        $salt = substr($this->passwordHash, 0, 8);

        return $salt . md5($salt . $password) == $this->passwordHash;
    }

    public static function findByUsername($username)
    {
        return self::find()->where(['username' => $username])->one();
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     *
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return self::findOne(['id' => $id]);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     *
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|integer an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     *
     * @param string $authKey the given auth key
     *
     * @return boolean whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public function getAvatar()
    {
        return $this->hasOne(Image::className(), ['id' => 'avatarId']);
    }

    /**
     * @param $role
     *
     * @return bool
     */
    public function hasRole($role)
    {
        if (($this->roles & self::ROLE_ADMIN) > 0) {
            return true;
        }

        return ($this->roles >= $role) && (($this->roles & $role) > 0);
    }
}

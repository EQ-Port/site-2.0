<?php
namespace common\rbac;

use Yii;
use yii\rbac\Rule;

class GroupRule extends Rule
{
	public $name = 'group';
	
	public function execute($user,$item,$params)
	{
		if(!Yii::$app->user->isGuest)
		{
			$role = Yii::$app->user->identity->role;
			if($item->name === 'administrator')
			{
				return $role === $item->name;
			} elseif ($item->name === 'leading')
			{
				return $role === $item->name || $role === 'administrator';
			} elseif ($item->name === 'article')
			{
				return $role === $item->name || $role === 'administrator' || $role === 'leading';
			} elseif ($item->name === 'partner')
			{
				return $role === $item->name || $role === 'administrator' || $role === 'leading' || $role === 'article';
			} elseif ($item->name === 'user')
			{
				return $role === $item->name || $role === 'administrator' || $role === 'leading' || $role === 'article' || $role === 'partner';
			}
		}
		return false;
	}
}
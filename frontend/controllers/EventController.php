<?php 
namespace frontend\controllers;

use Yii;
use yii\web\Request;
use yii\web\Controller;
use frontend\models\Event;
use common\components\TransliteUrl;

class EventController extends Controller
{
    public function actionIndex()
    {
		$event = new Event;
		if ( $data = $event->find()->orderBy(['id' => SORT_DESC])->all() ) {
			echo $this->render('index', array('data' => $data));
		} else {
			Yii::$app->response->redirect(array('site/index'));
		}
    }
	
	public function actionEvent()
	{
		$code = TransliteUrl::encodeLatin(Yii::$app->request->get('code'));
		$event = new Event;
		if ( $data = $event->findOne(array('code'=> $code)) ) {
			echo $this->render('event', array('self' => $data));
		} else {
			Yii::$app->response->redirect(array('site/index'));
		}
	}
}
<?php 
namespace frontend\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\HttpException;
use yii\web\Request;
use yii\web\Controller;
use common\models\Event;

class EventController extends Controller
{
    const EVENT_PER_PAGE = 18;

    public function actionIndex()
    {
		$dataProvider = new ActiveDataProvider([
            'query' => Event::find()->orderBy(['startDate' => 'desc']),
            'pagination' => [
                'pageSize' => self::EVENT_PER_PAGE,
                'defaultPageSize' => self::EVENT_PER_PAGE,
            ],
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }
	
	public function actionDetail($code)
	{
		$event = new Event;
		if ( $event = $event->findOne(array('code'=> $code)) ) {
			return $this->render('event', array('event' => $event));
		}

        throw new HttpException(404, 'Такого мероприятия нет');
	}
}
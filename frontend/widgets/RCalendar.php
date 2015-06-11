<?php
namespace frontend\widgets;

use frontend\models\RockCalendar;

class RCalendar extends \yii\bootstrap\Widget
{	
	public function run ()
	{
		$day 	=  date('d');
		$monday =  date('m');
		$year	=  date('Y');
		
		$event = new RockCalendar;
		$data = $event->find()->where("DATE_FORMAT(date, '%m %d') = DATE_FORMAT('$year-$monday-$day', '%m %d')")->all();
		
		foreach ($data as $item) {
			list($y,$m,$d) = explode('-',$item['date']);
			$range = ($year - $y);

			$range = abs($range);
			$time1 = $range % 10;
			$time2 = $range % 100;
			$when = ($time1 == 1 && $time2 != 11 ? "год" : ($time1 >= 2 && $time1 <= 4 && ($time2 < 10 || $time2 >= 20) ? "года" : "лет"));

			if ( $range > 0 ) {
				print  "Сегодня $year-$monday-$day, $range $when назад $item[description]<br />";
			} else {
				print  "Сегодня $year-$monday-$day, $item[description]<br />";
			}

		}
	}
}
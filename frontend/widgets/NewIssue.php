<?php

namespace frontend\widgets;

use common\models\Issue;
use yii\bootstrap\Widget;
use yii\helpers\Html;
use yii\helpers\VarDumper;


class NewIssue extends Widget
{
    public function run()
    {
        /**
         * @var Issue $issue
         */
        $issue = Issue::find()->orderBy('announceDate desc')->limit(1)->one();

        if (is_null($issue)) {
            return null;
        }

        return Html::img($issue->cover->fit(210, 500)->getUrl())
        . 'С ' . \Yii::$app->formatter->asDate($issue->announceDate, 'd MMMM');
    }
}
 
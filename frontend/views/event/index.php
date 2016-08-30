<!--

<?
use yii\helpers\Html;

$this->title = "Мероприятия";
/**
 * @var \yii\data\ActiveDataProvider $dataProvider
 */
?>
 -->
    <h1>Мероприятия</h1>

<?=
\yii\widgets\ListView::widget(
    [
        'dataProvider' => $dataProvider,
        'itemView'     => '_item',
        'options'      => [
            'tag'   => 'div',
            'class' => 'row'
        ],
        'layout'       => "{items}\n{pager}",
        'pager'        => [
            'options' => [
                'class' => 'pager'
            ]
        ],
    ]
) ?>

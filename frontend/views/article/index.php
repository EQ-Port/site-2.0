<?
use yii\helpers\Html;

$this->title = "Интересные материалы";
/**
 * @var \yii\data\ActiveDataProvider $dataProvider
 */
?>

<h2>Интересные материалы</h2>

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

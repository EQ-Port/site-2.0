<?php

namespace common\widgets\BitMask;


use yii\helpers\Html;
use yii\widgets\InputWidget;

class BitMask extends InputWidget
{
    public $data;

    public function run()
    {
        if ($this->model) {
            echo Html::activeHiddenInput($this->model, $this->attribute, ['id' => $this->id]);
        } else {
            echo Html::hiddenInput($this->name, $this->value, ['id' => $this->id]);
        }

        $value = ($this->model) ? $this->model->{$this->attribute} : $this->value;

        echo '<ul id="checks-' . $this->id . '">';
        foreach ($this->data as $bit => $label) {
            echo '<li>';
            echo Html::checkbox('', ($value >= $bit) && (($value & $bit) > 0), ['value' => $bit]);
            echo Html::label($label);
            echo '</li>';
        }
        echo '</ul>';

        $js = ';$("#checks-' . $this->id . ' input[type=\'checkbox\']").click(function(){';
        $js .= 'var sum = 0;';
        $js .= 'var hidden = $("' . $this->id . '");';
        $js .= 'var checks = $("#checks-' . $this->id . ' input[type=\'checkbox\']");';
        $js .= 'for (var i = 0, j = checks.length; i < j; i++) {';
        $js .= 'if ($(checks[i]).prop("checked")) {';
        $js .= 'sum += Number($(checks[i]).val());';
        $js .= '}';
        $js .= '}';
        $js .= '$("#' . $this->id . '").val(sum)';
        $js .= '});';

        $this->view->registerJs($js);
    }
}

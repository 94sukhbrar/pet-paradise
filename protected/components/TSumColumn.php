<?php

namespace app\components;

use yii\grid\DataColumn;

/**
 *@copyright : Queeny < www.amusoftech.com >
 *@author	 : Sukhwinder Kaur < webdev.sukh@gmail.com >
 */
class TSumColumn extends DataColumn {
    public function getDataCellValue($model, $key, $index)
    {
        $value = parent::getDataCellValue($model, $key, $index);
        if ( is_numeric($value))
        {
            $this->footer += $value;
        }
        
        return $value;
    }
}
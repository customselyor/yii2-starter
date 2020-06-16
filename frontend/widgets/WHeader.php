<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 16.05.2019
 * Time: 0:03
 */

namespace frontend\widgets;


use yii\base\Widget;

class WHeader extends Widget
{
    public function run()
    {
        return $this->render('wHeader');
    }
}

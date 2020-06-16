<?php

namespace backend\behaviors;

use Yii;
use yii\base\Behavior;
use yii\base\Controller;

/**
 * Class LastActionBehavior.
 */
class LastActionBehavior extends Behavior
{
    /**
     * @var string
     */
    public $attribute = 'action_at';

    /**
     * @inheritdoc
     */
    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => 'beforeAction',
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeAction()
    {

            if (Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()) && count(Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()))>0){

                if (Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()) && array_key_exists('user', Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId())) && Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId())['user']->name=='user'){
                    Yii::$app->user->logout();
                }
            }

        if (!Yii::$app->user->isGuest) {

            $model = Yii::$app->user->identity;
            $model->touch($this->attribute);
        }


        return true;
    }
}

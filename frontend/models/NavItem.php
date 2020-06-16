<?php

namespace frontend\models;

use common\models\MenuItems;
use Yii;
use yii\base\Model;
use common\models\Menu;

/**
 * @inheritdoc
 */
class NavItem extends Model
{

    /**
     * Generate menu items for yii\widgets\Menu
     *
     * @param null|array $models
     * @return array
     */
    public static function getMenu($key=null)
    {
        $items = [];
        $model = Menu::findOne(['key' => $key]);

        if ($model) {
            $links = MenuItems::find()->where(['menu_id' => $model->id])->all();
            if ($key == "header-menu") {
                $items = self::MakeArray($links);
            }
        }

        return $items;
    }
    /**
     * @param $links
     * @return array
     */
    protected static function MakeArray($links, $add_childs = true)
    {
        $menu = [];
        foreach ($links as $link) {
            $menu = self::MakeJsonToArray(json_decode(unserialize($link->body)));
        }

        return $menu;
    }

    protected static function MakeJsonToArray($jsons)
    {
        $menu = [];
        foreach ($jsons as $k => $link) {
            $one_link['target'] = $link->target;
            $one_link['icon'] = $link->icon;
            if (\Yii::$app->language == 'uz') {
                $one_link['label'] = $link->text;
                $one_link['url'] = self::make_url($link->href);
            } elseif (\Yii::$app->language == 'ru') {
                $one_link['label'] = $link->textru;
                $one_link['url'] = self::make_url($link->hrefru);
            }elseif (\Yii::$app->language == 'en') {
                $one_link['label'] = $link->texten;
                $one_link['url'] = self::make_url($link->hrefen);
            }elseif (\Yii::$app->language == 'oz') {
                $one_link['label'] = $link->textoz;
                $one_link['url'] = self::make_url($link->hrefoz);
            }

            if (!empty($link->children)) {
                if (isset($link->children) && count($link->children) > 0) {
                    $one_link['items'] = self::MakeJsonToArray($link->children);
                } else {
                    $one_link['items'] = [];
                }
            } else {
                $one_link['items'] = [];
            }
            $menu[$k] = $one_link;
        }
        return $menu;
    }

    /**
     * @param $str string
     * @return string
     */
    protected static function make_url($str)
    {
        if (preg_match("/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/", $str))
            return $str;
        else
            return \Yii::$app->getUrlManager()->createUrl([$str]);
    }
}

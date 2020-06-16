<?php

/**
 * @copyright Copyright &copy; Gogodigital Srls
 * @company Gogodigital Srls - Wide ICT Solutions
 * @website http://www.gogodigital.it
 * @github https://github.com/cinghie/yii2-multilanguage
 * @license GNU GENERAL PUBLIC LICENSE VERSION 3
 * @package yii2-multilanguage
 * @version 2.0.0
 */

use yii\helpers\ArrayHelper;
use yii\helpers\Url;

?>
    <a href="/<?= Yii::$app->language ?>" class=" dropdown-toggle top-icons" data-toggle="dropdown" style="color: #000;"><?= changeLangCode(Yii::$app->language)  ?></a>

<?php
list($route, $params) = Yii::$app->getUrlManager()->parseRequest(Yii::$app->getRequest());
$params = ArrayHelper::merge($_GET, $params);
$url = isset($params['route']) ? $params['route'] : $route;
$html = "";
$ul = '<div class="dropdown-menu dropdown-menu-right" >';
$html .= $ul;
// All other languages

foreach ($languages as $language) {
    if ($language != $currentLang) {
        if ($link_home) {
            $url_lang = Yii::$app->urlManager->createUrl([
                    'site/index',
                    'language' => $language]
            );
        } else {
            $url_lang = Yii::$app->urlManager->createUrl(ArrayHelper::merge(
                $params, [$url, 'language' => $language]
            ));
        }


        $html .= '
                    <a href="' . $url_lang . '" class="dropdown-item" style="color: #000;" title="' . changeLang($language) . '" >
                        ' . changeLang($language) . '
                    </a>
                ';
    }
}

$html .= "</ul>";

echo $html;
?>

<?php
function changeLang($lan_code)
{
    if ($lan_code == 'ru') {
        return 'Русский';
    } elseif ($lan_code == 'en') {
        return "English";
    } else {
        return 'Oʻzbekcha';
    }
}

function changeLangCode($lan_code)
{
    if ($lan_code == 'ru') {
        return 'Ру';
    } elseif ($lan_code == 'en') {
        return "En";
    } else {
        return 'Oʻz';
    }
}

?>
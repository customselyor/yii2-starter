<?php

use backend\models\Log;
use backend\widgets\Menu;

/* @var $this \yii\web\View */
?>
<aside class="main-sidebar">
    <section class="sidebar">
        <?= Menu::widget([
            'options' => ['class' => 'sidebar-menu'],
            'items' => [
                [
                    'label' => Yii::t('app', 'Main'),
                    'options' => ['class' => 'header'],
                ],
                [
                    'label' => Yii::t('app', 'Menu'),
                    'url' => ['/menu/index'],
                    'icon' => '<i class="fa fa-sitemap"></i>',
                ],
                [
                    'label' => Yii::t('app', 'Sliders'),
                    'url' => ['/slider/index'],
                    'icon' => '<i class="fa fa-image"></i>',
                ],
                [
                    'label' => Yii::t('app', 'Contacts'),
                    'url' => ['/contacts/index'],
                    'icon' => '<i class="fa fa-address-book"></i>',
                ],
                [
                    'label' => Yii::t('app', 'Widgets'),
                    'url' => '#',
                    'icon' => '<i class="fa fa-edit"></i>',
                    'options' => ['class' => 'treeview'],
                    'items' => [
                        ['label' => Yii::t('app', 'Widgets'), 'url' => ['/post-category/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>'],
                        ['label' => Yii::t('app', 'Widget Categories'), 'url' => ['/widget-category/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>'],
                        ['label' => Yii::t('app', 'Widget items'), 'url' => ['/posts/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>'],
                    ],
                ],
                [
                    'label' => Yii::t('app', 'Content'),
                    'url' => '#',
                    'icon' => '<i class="fa fa-edit"></i>',
                    'options' => ['class' => 'treeview'],
                    'items' => [
                        ['label' => Yii::t('app', 'Viloyats'), 'url' => ['/viloyat/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>'],
                        ['label' => Yii::t('app', 'Tuman'), 'url' => ['/tuman/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>'],
                        ['label' => Yii::t('app', 'Genders'), 'url' => ['/gender/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>'],
                        ['label' => Yii::t('app', 'Lavozims'), 'url' => ['/lavozim/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>'],
                    ],
                ],
//                [
//                    'label' => Yii::t('app', 'Faculties and Departments'),
//                    'url' => '#',
//                    'icon' => '<i class="fa fa-edit"></i>',
//                    'options' => ['class' => 'treeview'],
//                    'items' => [
//                        ['label' => Yii::t('app', 'Departments'), 'url' => ['/department/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>'],
//                    ],
//                ],
//                [
//                    'label' => Yii::t('app', 'Post Categories'),
//                    'url' => ['/post-category/index'],
//                    'icon' => '<i class="fa fa-archive"></i>',
//                ],
//                [
//                    'label' => Yii::t('app', 'Posts'),
//                    'url' => ['/post/index'],
//                    'icon' => '<i class="fa fa-newspaper-o"></i>',
//                ],
//                [
//                        'label' => Yii::t('app', 'Key storage'),
//                        'url' => ['/key-storage/index'],
//                        'icon' => '<i class="fa fa-cogs"></i>'
//                ],
//                [
//                    'label' => Yii::t('app', 'Tags'),
//                    'url' => ['/tag/index'],
//                    'icon' => '<i class="fa fa-tags"></i>',
//                ],
//                [
//                    'label' => Yii::t('app', 'Content'),
//                    'url' => '#',
//                    'icon' => '<i class="fa fa-edit"></i>',
//                    'options' => ['class' => 'treeview'],
//                    'items' => [
//                        ['label' => Yii::t('app', 'Static pages'), 'url' => ['/page/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>'],
////                        ['label' => Yii::t('app', 'Articles'), 'url' => ['/article/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>'],
////                        ['label' => Yii::t('app', 'Article categories'), 'url' => ['/article-category/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>'],
//                    ],
//                ],
                [
                    'label' => Yii::t('app', 'System'),
                    'options' => ['class' => 'header'],
                ],
                [
                    'label' => Yii::t('app', 'Translations'),
                    'url' => ['/source-message/index'],
                    'icon' => '<i class="fa fa-envelope"></i>',
                    'visible' => Yii::$app->user->can('administrator'),
                ],
                // [
                //     'label' => Yii::t('app', 'Users'),
                //     'url' => ['/user/index'],
                //     'icon' => '<i class="fa fa-users"></i>',
                //     'visible' => Yii::$app->user->can('administrator'),
                // ],
                // [
                //     'label' => Yii::t('app', 'Other'),
                //     'url' => '#',
                //     'icon' => '<i class="fa fa-terminal"></i>',
                //     'options' => ['class' => 'treeview'],
                //     'items' => [
                //         [
                //             'label' => 'Gii',
                //             'url' => ['/gii'],
                //             'icon' => '<i class="fa fa-angle-double-right"></i>',
                //             'visible' => YII_ENV_DEV,
                //         ],
                //         ['label' => Yii::t('app', 'File manager'), 'url' => ['/file-manager/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>'],
                //         [
                //             'label' => Yii::t('app', 'DB manager'),
                //             'url' => ['/db-manager/default/index'],
                //             'icon' => '<i class="fa fa-angle-double-right"></i>',
                //             'visible' => Yii::$app->user->can('administrator'),
                //         ],
                //         [
                //             'label' => Yii::t('app', 'System information'),
                //             'url' => ['/phpsysinfo/default/index'],
                //             'icon' => '<i class="fa fa-angle-double-right"></i>',
                //             'visible' => Yii::$app->user->can('administrator'),
                //         ],
                //         ['label' => Yii::t('app', 'Key storage'), 'url' => ['/key-storage/index'], 'icon' => '<i class="fa fa-angle-double-right"></i>'],
                //         ['label' => Yii::t('app', 'Cache'), 'url' => ['/service/cache'], 'icon' => '<i class="fa fa-angle-double-right"></i>'],
                //         ['label' => Yii::t('app', 'Clear assets'), 'url' => ['/service/clear-assets'], 'icon' => '<i class="fa fa-angle-double-right"></i>'],
                //         [
                //             'label' => Yii::t('app', 'Logs'),
                //             'url' => ['/log/index'],
                //             'icon' => '<i class="fa fa-angle-double-right"></i>',
                //             'badge' => Log::find()->count(),
                //             'badgeOptions' => ['class' => 'label-danger'],
                //         ],
                //     ],
                // ],
            ],
        ]) ?>
    </section>
</aside>

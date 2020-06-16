<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Slider */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sliders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="slider-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'key',
            [
                'attribute' => 'created_at',
                'format' => 'html',
                'label' => Yii::t('app', 'Created at'),
                'value' => function ($model) {
                    if ($model->created_at) {
                        return Yii::$app->formatter->asDatetime($model->created_at);
                    } else {
                        return $model->created_at;
                    }
                },
            ],
            [
                'attribute' => 'updated_at',
                'format' => 'html',
                'label' => Yii::t('app', 'Updated at'),
                'value' => function ($model) {
                    if ($model->updated_at) {
                        return Yii::$app->formatter->asDatetime($model->updated_at);
                    } else {
                        return $model->updated_at;
                    }
                },
            ],
        ],
    ]) ?>

    <?php if (isset($model->sliderItems) && count($model->sliderItems) > 0): ?>
        <div class="table-responsive">
            <table class="table table-responsive table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?= Yii::t('app', 'Title') ?></th>
                    <th><?= Yii::t('app', 'Slug') ?></th>

                    <th><?= Yii::t('app', 'Image') ?></th>
                    <th><?= Yii::t('app', 'Background Image') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($model->sliderItems as $k => $v): ?>
                    <tr>
                        <td><?= ($k + 1) ?></td>
                        <td><?= ($v->title) ? $v->title : '' ?></td>
                        <td><?= ($v->slug) ? "<a href=" . $v->slug . " target='_blank'>" . $v->slug . "</a>" : '' ?></td>
                        <td><?= ($v->image) ? "<img src='" . env('STORAGE_URL') . "/images/slider/" . $v->image . "' width='80px' >" : '' ?></td>
                        <td><?= ($v->backgroun_image) ? "<img src='" . env('STORAGE_URL') . "/images/slider/" . $v->backgroun_image . "' width='80px' >" : '' ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Menu */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="menu-update">

    <?php


    /* @var $this yii\web\View */
    /* @var $model common\models\Menu */
    //$this->registerCssFile("https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css");
    $this->registerCssFile("https://use.fontawesome.com/releases/v5.3.1/css/all.css");
//    $this->registerCssFile("/static/css/fontawesomeall.css");
    $this->registerCssFile("/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css");
    ?>
    <div class="menu-update">
        <div class="row">
            <div class="col-md-6">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                                   aria-expanded="true" aria-controls="collapseThree">
                                    <i class="short-full glyphicon glyphicon-plus"></i>
                                    <?= Yii::t('app', 'Select posts') ?>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel"
                             aria-labelledby="headingThree">
                            <div class="panel-body" style="width: 100%">
                                <?= \kartik\select2\Select2::widget([
                                    'name' => 'all_posts',
                                    'id' => 'all_posts',
                                    'data' => \yii\helpers\ArrayHelper::map(\common\models\Posts::find()->active()->localized(Yii::$app->language)->all(), 'id', 'title'),
                                    'options' => ['placeholder' => Yii::t('app', 'Select posts')],
                                    'pluginOptions' => [
                                        'allowClear' => true
                                    ],
                                ]);
                                ?>
                            </div>
                        </div>


                    </div>
                </div><!-- panel-group -->
                <br>
                <div class="card border-primary mb-3">
                    <div class="card-body">
                        <form id="frmEdit">

                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#title_1">O'zbekcha</a></li>
                                <li><a data-toggle="tab" href="#title_4">Ўзбекча</a></li>
                                <li><a data-toggle="tab" href="#title_2">Русские</a></li>
                                <li><a data-toggle="tab" href="#title_3">English</a></li>
                            </ul>
                            <div class="tab-content card">
                                <div class="tab-pane fade in active" id="title_1" role="tabpanel">

                                    <div class="form-group required">
                                        <label class="control-label" for="text"><?= Yii::t('app', 'Title') ?></label>
                                        <input type="text" required="required" class="form-control item-menu"
                                               name="text" id="text"
                                               placeholder="<?= Yii::t('app', 'Title') ?>">
                                    </div>

                                    <div class="form-group required">
                                        <label for="href"><?= Yii::t('app', 'Slug') ?></label>
                                        <input type="text" class="form-control item-menu" id="href" name="href"
                                               placeholder="<?= Yii::t('app', 'Slug') ?>">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="title_4" role="tabpanel">

                                    <div class="form-group required">
                                        <label class="control-label" for="text"><?= Yii::t('app', 'Title Oz') ?></label>
                                        <input type="text" required="required" class="form-control item-menu"
                                               name="textoz" id="textoz"
                                               placeholder="<?= Yii::t('app', 'Title') ?>">
                                    </div>

                                    <div class="form-group required">
                                        <label for="href"><?= Yii::t('app', 'Slug Oz') ?></label>
                                        <input type="text" class="form-control item-menu" id="hrefoz" name="hrefoz"
                                               placeholder="<?= Yii::t('app', 'Slug Oz') ?>">
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="title_2" role="tabpanel">

                                    <div class="form-group required">
                                        <label class="control-label" for="text"><?= Yii::t('app', 'Title Ru') ?></label>
                                        <input type="text" required="required" class="form-control item-menu"
                                               name="textru" id="textru"
                                               placeholder="<?= Yii::t('app', 'Title') ?>">
                                     </div>

                                    <div class="form-group required">
                                        <label for="href"><?= Yii::t('app', 'Slug Ru') ?></label>
                                        <input type="text" class="form-control item-menu" id="hrefru" name="hrefru"
                                               placeholder="<?= Yii::t('app', 'Slug Ru') ?>">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="title_3" role="tabpanel">

                                    <div class="form-group required">
                                        <label class="control-label" for="text"><?= Yii::t('app', 'Title En') ?></label>
                                        <input type="text" required="required" class="form-control item-menu"
                                               name="texten" id="texten"
                                               placeholder="<?= Yii::t('app', 'Title') ?>">
                                     </div>

                                    <div class="form-group required">
                                        <label for="href"><?= Yii::t('app', 'Slug En') ?></label>
                                        <input type="text" class="form-control item-menu" id="hrefen" name="hrefen"
                                               placeholder="<?= Yii::t('app', 'Slug En') ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="input-group-append">
                                <button type="button" id="myEditor_icon"
                                        class="btn btn-outline-secondary"></button>
                            </div>
                            <input type="hidden" name="icon" class="item-menu">

                            <div class="form-group">
                                <label for="target"><?= Yii::t('app', 'Target') ?></label>
                                <select name="target" id="target" class="form-control item-menu">
                                    <option value="_self">Self</option>
                                    <option value="_blank">Blank</option>
                                    <option value="_top">Top</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="title"><?= Yii::t('app', 'Tooltip') ?></label>
                                <input type="text" name="title" class="form-control item-menu" id="title"
                                       placeholder="<?= Yii::t('app', 'Tooltip') ?>">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button type="button" id="btnUpdate" class="btn btn-primary" disabled><i
                                    class="fas fa-sync-alt"></i> <?= Yii::t('app', 'Update') ?>
                        </button>
                        <button type="button" id="btnAdd" class="btn btn-success"><i
                                    class="fas fa-plus"></i> </i> <?= Yii::t('app', 'Add') ?></button>
                    </div>
                </div>
            </div><!-- container -->
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header"><h5 class="float-left"><?= Yii::t('app', 'Menu') ?></h5>
                        <!--<div class="float-right">
                            <button id="btnReload" type="button" class="btn btn-outline-secondary">
                                <i class="fa fa-play"></i> Load Data</button>
                        </div>
                        -->
                    </div>
                    <div class="card-body">
                        <ul id="myEditor" class="sortableLists list-group">
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="float-right">
                            <button id="btnOutput" type="button" class="btn btn-success"><i
                                        class="fas fa-check-square"></i> <?= Yii::t('app', 'Save') ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php
    //$this->registerJsFile("https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js");
    //$this->registerJsFile("https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js");
    //$this->registerJsFile("/jquery-menu-editor.min.js");
    //$this->registerJsFile("/bootstrap-iconpicker/js/iconset/fontawesome5-3-1.min.js");
    //$this->registerJsFile("/bootstrap-iconpicker/js/bootstrap-iconpicker.min.js");

    ?>


    <?php

    $url = \yii\helpers\Url::toRoute(['menu-items/getmenus']);
    $url_add = \yii\helpers\Url::toRoute(['menu-items/addmenus']);
    $menu_id = $id;
    $url_getparent = \yii\helpers\Url::toRoute(['news/getparent']);

    //data: {id: $model->id, 'viewer_id': $viewer},
    $script = <<< JS
 $(document).ready(function () {
     
    $(function(){
        $('#all_posts').change(function() {
            var id =$( "#all_posts" ).val();
            $.ajax({
                url: '/posts/getdata',
                type: 'get',
                data: {
                    id: id,
                },
                success: function (data) {
                    if (data.status){
                        $('#text').val(data.data.titleuz);
                        $('#href').val("/"+data.data.sluguz);
                        $('#textru').val(data.data.titleru);
                        $('#hrefru').val("/"+data.data.slugru);
                        $('#texten').val(data.data.titleen);
                        $('#hrefen').val("/"+data.data.slugen);
                        $('#textoz').val(data.data.titleoz);
                        $('#hrefoz').val("/"+data.data.slugoz);
                    }else {
                        
                    }
                }
            });
        });
        $('#pagesCategory').change(function() {
            var id =$( "#pagesCategory" ).val();
            $.ajax({
                url: '/post/getdatacat',
                type: 'get',
                data: {
                    id: id,
                },
                success: function (data) { 
                    if (data.status){
                        $('#text').val(data.data.titleuz);
                        $('#href').val("/"+data.data.sluguz);
                        $('#textru').val(data.data.titleru);
                        $('#hrefru').val("/"+data.data.slugru);
                        $('#texten').val(data.data.titleen);
                        $('#hrefen').val("/"+data.data.slugen);
                    }else {
                        
                    }
                }
            });
        })
        
    });
       function toggleIcon(e) {
 
        $(e.target)
 
            .prev('.panel-heading')
 
            .find(".short-full")
 
            .toggleClass('glyphicon-plus glyphicon-minus');
 
    }
 
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
 
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
    
     $('#pagescategory').change(function() {
       var pagescategoryTitle = $("#pagescategory option:selected").text();
       var pagescategorySlug = $(this).find(':selected').val();
       if(pagescategorySlug=='katalog-produktsii' || pagescategorySlug=='novosti'){
            $('#href').val("/"+pagescategorySlug);
       }else if(pagescategorySlug=='kontakti'){
            $('#href').val("/contact");
       }else if(pagescategorySlug=='/'){
            $('#href').val("/");
       }else{
           $('#href').val("/pages/"+pagescategorySlug);
       }
       
       $('#text').val(pagescategoryTitle);
       $('#title').val(pagescategoryTitle);
       
     });
     
     
     
     
            //   e.preventDefault();
            // e.stopImmediatePropagation();
        /* =============== DEMO =============== */
        // menu items
        // var arrayjson = [{"href":"http://home.com","icon":"fas fa-home","text":"Home", "target": "_top", "title": "My Home"},{"icon":"fas fa-chart-bar","text":"Opcion2"},{"icon":"fas fa-bell","text":"Opcion3"},{"icon":"fas fa-crop","text":"Opcion4"},{"icon":"fas fa-flask","text":"Opcion5"},{"icon":"fas fa-map-marker","text":"Opcion6"},{"icon":"fas fa-search","text":"Opcion7","children":[{"icon":"fas fa-plug","text":"Opcion7-1","children":[{"icon":"fas fa-filter","text":"Opcion7-1-1"}]}]}];
        var arrayjson = [];
            var editor = new MenuEditor('myEditor', {listOptions: sortableListOptions, iconPicker: iconPickerOptions});
         $.ajax({
             url:  '$url',
             method: 'get',
             data:{id:'$id'},
             success: function(data) {
                 // var data = $.parseJSON(data);
                 if(data.status && data.data.length>0){
                    editor.setForm($('#frmEdit'));
                    editor.setUpdateButton($('#btnUpdate'));
                    editor.setData(data.data);
                 }
             }
          });
        
        var iconPickerOptions = {searchText: "Buscar...", labelHeader: "{0}/{1}"};
        // sortable list options
        var sortableListOptions = {
            placeholderCss: {'background-color': "#cccccc"}
        };
        
        if(arrayjson.length>0){
            editor.setForm($('#frmEdit'));
            editor.setUpdateButton($('#btnUpdate'));
            editor.setData(arrayjson);
        }
        
        $('#btnOutput').on('click', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            
            var str = editor.getString();
            $("#out").text(str);
            var jsonString = str;
            var csrfToken = $('meta[name="csrf-token"]').attr("content");
    
             $.ajax({
             url:  '$url_add',
             method: 'post',
             data:{id:'$id', menus:JSON.stringify(str)},
             success: function(data) {
                 location.reload();
             },
             'error' : function(request, status, error){
                  console.log('error:' + error);
            }
          });
        });
        $("#btnUpdate").click(function(){
            editor.update();
        });
        $('#myEditor').change(function(){
            
        });

        $('#btnAdd').click(function(){
            editor.add();
        });
        /* ====================================== */

        /** PAGE ELEMENTS **/
        $('[data-toggle="tooltip"]').tooltip();
//                $.getJSON( "https://api.github.com/repos/davicotico/jQuery-Menu-Editor", function( data ) {
        //                  $('#btnStars').html(data.stargazers_count);
        //                $('#btnForks').html(data.forks_count);
        //          });
    });



JS;
    $position = \yii\web\View::POS_READY;
    $this->registerJs($script, $position);
    ?>


</div>

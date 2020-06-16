<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Post;

/**
 * PostSearch represents the model behind the search form of `common\models\Post`.
 */
class PostSearch extends Post
{
    public $title;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'post_category_id', 'status', 'is_favorite', 'sort_index', 'hits_count', 'published_at', 'created_at', 'updated_at'], 'integer'],
            [['title'],'safe'],

            [['image', 'og_image', 'detail_image', 'urlcount'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $category_id=null)
    {

         

//        $query = Post::find();
        $query = Post::find()
            ->joinWith(['postTranslations'=>function($q){
                $q->from('{{%post_translation}} tr');
            }]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'post_category_id' => $this->post_category_id,
            'status' => $this->status,
            'is_favorite' => $this->is_favorite,
            'sort_index' => $this->sort_index,
            'hits_count' => $this->hits_count,
            'published_at' => $this->published_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'tr.title', $this->title]);
        if ($category_id){
            $query->andFilterWhere(['in', 'post_category_id', $category_id]);
        }else{
            $query->andFilterWhere(['not in', 'post_category_id' , $category_id]);
        }

        $query->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'og_image', $this->og_image])
            ->andFilterWhere(['like', 'detail_image', $this->detail_image])
            ->andFilterWhere(['like', 'urlcount', $this->urlcount]);

        return $dataProvider;
    }
    
}

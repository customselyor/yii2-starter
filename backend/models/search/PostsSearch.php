<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Posts;

/**
 * PostsSearch represents the model behind the search form of `common\models\Posts`.
 */
class PostsSearch extends Posts
{
    public $title;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'lavozim_id', 'gender_id', 'status', 'is_favorite', 'year', 'month', 'day', 'age', 'passport_number', 'inn', 'sort_index', 'latitude', 'longitude', 'hits_count', 'parent_id', 'published_at', 'author_id', 'updater_id', 'created_at', 'updated_at'], 'integer'],
            [['title', 'date_of_birth', 'fax', 'fax2', 'email', 'email2', 'phone', 'phone2', 'phone3', 'passport_seria', 'avatar', 'logo', 'icon', 'image', 'og_image', 'detail_image', 'urlcount', 'map'], 'safe'],
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
    public function search($params, $hasParrent = null)
    {

        $query = Posts::find()
            ->joinWith(['postsTranslations' => function ($q) {
                $q->from('{{%posts_translation}} tr');
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
            'category_id' => $this->category_id,
            'lavozim_id' => $this->lavozim_id,
            'gender_id' => $this->gender_id,
            'status' => $this->status,
            'is_favorite' => $this->is_favorite,
            'year' => $this->year,
            'month' => $this->month,
            'day' => $this->day,
            'age' => $this->age,
            'passport_number' => $this->passport_number,
            'inn' => $this->inn,
            'sort_index' => $this->sort_index,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'hits_count' => $this->hits_count,
            'parent_id' => $this->parent_id,
            'published_at' => $this->published_at,
            'author_id' => $this->author_id,
            'updater_id' => $this->updater_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        if (!$hasParrent) {
            $query->andFilterWhere(['is', 'parent_id', new \yii\db\Expression('null')]);
        } else {
            $query->andFilterWhere(['is not', 'parent_id', new \yii\db\Expression('null')]);

            if (is_numeric($hasParrent)) {
                $query->andFilterWhere(['parent_id' => $hasParrent]);
            }
        }
        $query->andFilterWhere(['like', 'tr.title', $this->title]);

        $query->andFilterWhere(['like', 'date_of_birth', $this->date_of_birth])
            ->andFilterWhere(['like', 'fax', $this->fax])
            ->andFilterWhere(['like', 'fax2', $this->fax2])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'email2', $this->email2])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'phone2', $this->phone2])
            ->andFilterWhere(['like', 'phone3', $this->phone3])
            ->andFilterWhere(['like', 'passport_seria', $this->passport_seria])
            ->andFilterWhere(['like', 'avatar', $this->avatar])
            ->andFilterWhere(['like', 'logo', $this->logo])
            ->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'og_image', $this->og_image])
            ->andFilterWhere(['like', 'detail_image', $this->detail_image])
            ->andFilterWhere(['like', 'urlcount', $this->urlcount])
            ->andFilterWhere(['like', 'map', $this->map]);

        return $dataProvider;
    }
}

<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SliderItems;

/**
 * SliderItemsSearch represents the model behind the search form of `common\models\SliderItems`.
 */
class SliderItemsSearch extends SliderItems
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'slider_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['image', 'backgroun_image', 'title', 'extra_image', 'extra_1image', 'extra_2image', 'extra_3image'], 'safe'],
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
    public function search($params)
    {
        //$query = SliderItems::find();
        $query = SliderItems::find()
            ->joinWith(['sliderItemsTranslations'=>function($q){
                $q->from('{{%slider_items_translation}} et');
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
            'status' => $this->status,
            'slider_id' => $this->slider_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
        $query->andFilterWhere(['like', 'et.title', $this->title]);

        $query->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'backgroun_image', $this->backgroun_image])
            ->andFilterWhere(['like', 'extra_image', $this->extra_image])
            ->andFilterWhere(['like', 'extra_1image', $this->extra_1image])
            ->andFilterWhere(['like', 'extra_2image', $this->extra_2image])
            ->andFilterWhere(['like', 'extra_3image', $this->extra_3image]);

        return $dataProvider;
    }
}

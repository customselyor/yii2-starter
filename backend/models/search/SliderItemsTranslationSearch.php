<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SliderItemsTranslation;

/**
 * SliderItemsTranslationSearch represents the model behind the search form of `common\models\SliderItemsTranslation`.
 */
class SliderItemsTranslationSearch extends SliderItemsTranslation
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'slider_items_id'], 'integer'],
            [['language', 'title', 'slug', 'body', 'meta_title', 'meta_description', 'extra1', 'extra2', 'extra3'], 'safe'],
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
        $query = SliderItemsTranslation::find();

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
            'slider_items_id' => $this->slider_items_id,
        ]);

        $query->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'extra1', $this->extra1])
            ->andFilterWhere(['like', 'extra2', $this->extra2])
            ->andFilterWhere(['like', 'extra3', $this->extra3]);

        return $dataProvider;
    }
}

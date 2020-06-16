<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MenuItems;

/**
 * MenuItemsSearch represents the model behind the search form of `common\models\MenuItems`.
 */
class MenuItemsSearch extends MenuItems
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'menu_id', 'parent_id', 'created_at', 'updated_at'], 'integer'],
            [['target', 'ico_path', 'title', 'slug', 'title_ru', 'slug_ru', 'title_en', 'slug_en', 'body', 'body_ru', 'body_en'], 'safe'],
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
        $query = MenuItems::find();

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
            'menu_id' => $this->menu_id,
            'parent_id' => $this->parent_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'target', $this->target])
            ->andFilterWhere(['like', 'ico_path', $this->ico_path])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'slug_ru', $this->slug_ru])
            ->andFilterWhere(['like', 'title_en', $this->title_en])
            ->andFilterWhere(['like', 'slug_en', $this->slug_en])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'body_ru', $this->body_ru])
            ->andFilterWhere(['like', 'body_en', $this->body_en]);

        return $dataProvider;
    }
}

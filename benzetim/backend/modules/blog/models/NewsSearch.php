<?php

namespace backend\modules\blog\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\blog\models\News;

/**
 * NewsSearch represents the model behind the search 
  about `backend\modules\blog\models\News`.
 */
class NewsSearch extends News
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['new_title', 'category', 'content', 'logo'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = News::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'new_title', $this->new_title])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'logo', $this->logo]);

        return $dataProvider;
    }
}

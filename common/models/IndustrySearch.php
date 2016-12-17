<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Industry;

/**
 * IndustrySearch represents the model behind the search form about `common\models\Industry`.
 */
class IndustrySearch extends Industry
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IndustryId', 'IsDelete'], 'integer'],
            [['IndustryName', 'OnDate', 'UpdatedDate'], 'safe'],
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
        $query = Industry::find();

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
            'IndustryId' => $this->IndustryId,
            'IsDelete' => 0,
            'OnDate' => $this->OnDate,
            'UpdatedDate' => $this->UpdatedDate,
        ]);

        $query->andFilterWhere(['like', 'IndustryName', $this->IndustryName]);

        return $dataProvider;
    }
}

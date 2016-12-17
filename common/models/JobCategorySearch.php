<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\JobCategory;

/**
 * JobCategorySearch represents the model behind the search form about `common\models\JobCategory`.
 */
class JobCategorySearch extends JobCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['JobCategoryId', 'IsDelete'], 'integer'],
            [['CategoryName', 'OnDate', 'UpdatedDate'], 'safe'],
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
        $query = JobCategory::find();

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
            'JobCategoryId' => $this->JobCategoryId,
            'IsDelete' => $this->IsDelete,
            'OnDate' => $this->OnDate,
            'UpdatedDate' => $this->UpdatedDate,
        ]);

        $query->andFilterWhere(['like', 'CategoryName', $this->CategoryName]);

        return $dataProvider;
    }
}

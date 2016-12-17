<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PostJob;

/**
 * PostJobSearch represents the model behind the search form about `common\models\PostJob`.
 */
class PostJobSearch extends PostJob
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['JobId', 'Location', 'NoofVacancy', 'LogoId', 'EmployerId', 'JobCategoryId', 'PositionId', 'IsDelete'], 'integer'],
            [['JobTitle', 'Salary', 'Experience', 'JobType', 'CompanyName', 'Email', 'Phone', 'Website', 'Country', 'State', 'City', 'JobShift', 'JobDescription', 'JobSpecification', 'TechnicalGuidance', 'OnDate', 'UpdatedDate'], 'safe'],
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
        $query = PostJob::find();

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
            'JobId' => $this->JobId,
            'Location' => $this->Location,
            'NoofVacancy' => $this->NoofVacancy,
            'LogoId' => $this->LogoId,
            'EmployerId' => $this->EmployerId,
            'JobCategoryId' => $this->JobCategoryId,
            'PositionId' => $this->PositionId,
            'IsDelete' => $this->IsDelete,
            'OnDate' => $this->OnDate,
            'UpdatedDate' => $this->UpdatedDate,
        ]);

        $query->andFilterWhere(['like', 'JobTitle', $this->JobTitle])
            ->andFilterWhere(['like', 'Salary', $this->Salary])
            ->andFilterWhere(['like', 'Experience', $this->Experience])
            ->andFilterWhere(['like', 'JobType', $this->JobType])
            ->andFilterWhere(['like', 'CompanyName', $this->CompanyName])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Phone', $this->Phone])
            ->andFilterWhere(['like', 'Website', $this->Website])
            ->andFilterWhere(['like', 'Country', $this->Country])
            ->andFilterWhere(['like', 'State', $this->State])
            ->andFilterWhere(['like', 'City', $this->City])
            ->andFilterWhere(['like', 'JobShift', $this->JobShift])
            ->andFilterWhere(['like', 'JobDescription', $this->JobDescription])
            ->andFilterWhere(['like', 'JobSpecification', $this->JobSpecification])
            ->andFilterWhere(['like', 'TechnicalGuidance', $this->TechnicalGuidance]);

        return $dataProvider;
    }
}

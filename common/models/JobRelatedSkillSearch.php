<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\JobRelatedSkill;

/**
 * JobRelatedSkillSearch represents the model behind the search form about `common\models\JobRelatedSkill`.
 */
class JobRelatedSkillSearch extends JobRelatedSkill
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['JobRelatedSkillId', 'JobId', 'SkillId', 'IsDelete'], 'integer'],
            [['OnDate', 'UpdatedDate'], 'safe'],
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
        $query = JobRelatedSkill::find();

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
            'JobRelatedSkillId' => $this->JobRelatedSkillId,
            'JobId' => $this->JobId,
            'SkillId' => $this->SkillId,
            'IsDelete' => $this->IsDelete,
            'OnDate' => $this->OnDate,
            'UpdatedDate' => $this->UpdatedDate,
        ]);

        return $dataProvider;
    }
}

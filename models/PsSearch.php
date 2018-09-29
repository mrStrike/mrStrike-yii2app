<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ps;

/**
 * PsSearch represents the model behind the search form of `app\models\Ps`.
 */
class PsSearch extends Ps
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'year_build', 'year_expl', 'section_count', 'trans_count', 'pris_count'], 'integer'],
            [['name', 'pos_build', 'build_org', 'project_org', 'inn', 'power_point', 'dop_data'], 'safe'],
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
        $query = Ps::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        	'pagination'=>[
        				'pageSize'=>12,
        	],
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
            'year_build' => $this->year_build,
            'year_expl' => $this->year_expl,
            'section_count' => $this->section_count,
            'trans_count' => $this->trans_count,
            'pris_count' => $this->pris_count,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'pos_build', $this->pos_build])
            ->andFilterWhere(['like', 'build_org', $this->build_org])
            ->andFilterWhere(['like', 'project_org', $this->project_org])
            ->andFilterWhere(['like', 'inn', $this->inn])
            ->andFilterWhere(['like', 'power_point', $this->power_point])
            ->andFilterWhere(['like', 'dop_data', $this->dop_data]);

        return $dataProvider;
    }
}

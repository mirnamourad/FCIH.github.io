<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Assignments;

/**
 * AssignmentsSearch represents the model behind the search form about `backend\models\Assignments`.
 */
class AssignmentsSearch extends Assignments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'instructor_id'], 'integer'],
            [['assignmentname', 'deadline', 'assignment_file'], 'safe'],
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
        $query = Assignments::find();

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
            'assignment_file' => $this->assignment_file,
            'instructor_id' => $this->instructor_id,
        ]);

        $query->andFilterWhere(['like', 'assignmentname', $this->assignmentname])
            ->andFilterWhere(['like', 'deadline', $this->deadline]);

        return $dataProvider;
    }
}

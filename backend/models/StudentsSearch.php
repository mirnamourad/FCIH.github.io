<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Students;

/**
 * StudentsSearch represents the model behind the search form about `backend\models\Students`.
 */
class StudentsSearch extends Students
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'studentstage', 'userid'], 'integer'],
            [['studentname', 'studentemail', 'studentpassword', 'studentphone'], 'safe'],
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
        $query = Students::find();

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
            'studentstage' => $this->studentstage,
            'userid' => $this->userid,
        ]);

        $query->andFilterWhere(['like', 'studentname', $this->studentname])
            ->andFilterWhere(['like', 'studentemail', $this->studentemail])
            ->andFilterWhere(['like', 'studentpassword', $this->studentpassword])
            ->andFilterWhere(['like', 'studentphone', $this->studentphone]);

        return $dataProvider;
    }
}

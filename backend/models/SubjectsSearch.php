<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Subjects;

/**
 * SubjectsSearch represents the model behind the search form about `backend\models\Subjects`.
 */
class SubjectsSearch extends Subjects
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'maxstudents', 'instructor'], 'integer'],
            [['subjectname'], 'safe'],
            [['subjectmingrade', 'subjectmaxgrade', 'subjectprice'], 'number'],
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
        $query = Subjects::find();

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
            'subjectmingrade' => $this->subjectmingrade,
            'subjectmaxgrade' => $this->subjectmaxgrade,
            'subjectprice' => $this->subjectprice,
            'maxstudents' => $this->maxstudents,
            'instructor' => $this->instructor,
        ]);

        $query->andFilterWhere(['like', 'subjectname', $this->subjectname]);

        return $dataProvider;
    }
}

<?php

namespace common\models\Search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Event as EventModel;

/**
 * Event represents the model behind the search form about `common\models\Event`.
 */
class Event extends EventModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'posterId', 'type'], 'integer'],
            [['name', 'code', 'description', 'startDate', 'endDate', 'place', 'address'], 'safe'],
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
        $query = EventModel::find();

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
            'posterId' => $this->posterId,
            'type' => $this->type,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'place', $this->place])
            ->andFilterWhere(['like', 'address', $this->address]);

        return $dataProvider;
    }
}

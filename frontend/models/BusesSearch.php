<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Buses;

/**
 * BusesSearch represents the model behind the search form about `common\models\Buses`.
 */
class BusesSearch extends Buses
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'types_equipment_id'], 'integer'],
            [['name', 'description', 'cost_in_h', 'cost_in_period', 'create_at', 'update_at'], 'safe'],
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
        $query = Buses::find();

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
            'types_equipment_id' => $this->types_equipment_id,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'cost_in_h', $this->cost_in_h])
            ->andFilterWhere(['like', 'cost_in_period', $this->cost_in_period]);

        return $dataProvider;
    }
}

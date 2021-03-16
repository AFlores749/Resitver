<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Comentarios;

/**
 * ComentariosSearch represents the model behind the search form about `backend\models\Comentarios`.
 */
class ComentariosSearch extends Comentarios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idComent', 'posts_id', 'user_id'], 'integer'],
            [['fecha', 'coment'], 'safe'],
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
        $query = Comentarios::find();

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
            'idComent' => $this->idComent,
            'posts_id' => $this->posts_id,
            'user_id' => $this->user_id,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'coment', $this->coment]);

        return $dataProvider;
    }
}

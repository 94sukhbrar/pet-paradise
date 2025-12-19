<?php

/**
 *
 *@copyright :Amusoftech Pvt. Ltd. < www.amusoftech.com >
 *@author     : Sukhwinder Kaur< er.brarsukh@gmail.com >
 *
 * All Rights Reserved.
 * Proprietary and confidential :  All information contained herein is, and remains
 * the property of Amusoftech Pvt. Ltd. and its partners.
 * Unauthorized copying of this file, via any medium is strictly prohibited.
 */

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LostFoundPet as LostFoundPetModel;
use app\models\Petcategory;
use yii\helpers\ArrayHelper;

/**
 * LostFoundPet represents the model behind the search form about `app\models\LostFoundPet`.
 */
class LostFoundPet extends LostFoundPetModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'state_id', 'type_id', 'created_by_id', 'updated_by_id'], 'integer'],
            [['pet_name', 'pet_type',  'date_lost', 'location', 'date_found', 'image', 'created_on', 'updated_on'], 'safe'],
            [['reward_amount'], 'number'],
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
    public function beforeValidate()
    {
        return true;
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

        $query = LostFoundPetModel::find();
        if (Yii::$app->controller->id === 'site') {
        $query->andWhere(['state_id' => self::STATE_ACTIVE]);
    }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }


        $query->andFilterWhere([
            'reward_amount' => $this->reward_amount,
            'state_id' => $this->state_id,
            'type_id' => $this->type_id,
            'created_by_id' => $this->created_by_id,
            'updated_by_id' => $this->updated_by_id,
        ]);

        $query->andFilterWhere(['like', 'id', $this->id])
            ->andFilterWhere(['like', 'pet_name', $this->pet_name])
            ->andFilterWhere(['like', 'pet_type', $this->pet_type])
            ->andFilterWhere(['like', 'date_lost', $this->date_lost])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'date_found', $this->date_found])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'created_on', $this->created_on])
            ->andFilterWhere(['like', 'updated_on', $this->updated_on]);

        if (!empty($params)) {
            $query->andFilterWhere([
                'pet_type' => $this->pet_type,
                'type_id' => $this->type_id,
            ]);
        }

        return $dataProvider;
    }
}

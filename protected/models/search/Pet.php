<?php

/**
 *@copyright : Amusoftech Pvt. Ltd. < www.amusoftech.com >
 *@author    : Amu < er.amu@live.com >
 */

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pet as PetModel;

/**
 * Pet represents the model behind the search form about `app\models\Pet`.
 */
class Pet extends PetModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'gender', 'pet_category_id', 'state_id', 'type_id', 'created_by_id'], 'integer'],
            [['name', 'content', 'date_of_birth', 'about_me', 'contact_no', 'address', 'breed', 'created_on', 'updated_on'], 'safe'],
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
        $query = PetModel::find()->alias('p')->joinWith(['petCategory c']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
        ]);
        if (!empty(Yii::$app->user->identity) && Yii::$app->user->identity->role_id !== User::ROLE_ADMIN && Yii::$app->controller->id !='site') {
            $query = $query->andFilterWhere(['p.created_by_id' => Yii::$app->user->identity->id]);
        }
         if ( Yii::$app->controller->id =='site') {
            $query = $query->andFilterWhere(['p.state_id' => Pet::STATE_ACTIVE]);
        }

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'date_of_birth' => $this->date_of_birth,
            'gender' => $this->gender,
            'pet_category_id' => $this->pet_category_id,
            'state_id' => $this->state_id,
            'type_id' => $this->type_id,
            'created_on' => $this->created_on,
            'updated_on' => $this->updated_on,
            'created_by_id' => $this->created_by_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'about_me', $this->about_me])
            ->andFilterWhere(['like', 'contact_no', $this->contact_no])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'breed', $this->breed]);
        //->andWhere(['c.id' => Yii::$app->request->get('pet_category_id')]);
        $query->andFilterWhere(['pet_category_id' => Yii::$app->request->get('pet_category_id')]);

        
        if (!empty($params)) {
            $query->andFilterWhere([
                'gender' => $this->gender,
                'pet_category_id' => $this->pet_category_id,
                'type_id' => $this->type_id,
            ]);
        }

        return $dataProvider;
    }
}

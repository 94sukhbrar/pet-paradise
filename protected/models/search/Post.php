<?php
/**
 *@copyright : Amusoftech Pvt. Ltd. < www.amusoftech.com >
 *@author    : Amu < er.amu@live.com >
 */
namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Post as PostModel;

/**
 * Post represents the model behind the search form about `app\models\Post`.
 */
class Post extends PostModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'view_count', 'state_id', 'type_id', 'created_by_id'], 'integer'],
            [['title', 'content', 'keywords', 'image_file', 'created_on', 'updated_on'], 'safe'],
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
    public function beforeValidate(){
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
        $query = PostModel::find();

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

         if (Yii::$app->user->identity->role_id !== User::ROLE_ADMIN) {
            $query = $query->andFilterWhere(['p.created_by_id' => Yii::$app->user->identity->id]);
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'view_count' => $this->view_count,
            'state_id' => $this->state_id,
            'type_id' => $this->type_id,
            'created_on' => $this->created_on,
            'updated_on' => $this->updated_on,
            'created_by_id' => $this->created_by_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'image_file', $this->image_file]);

        return $dataProvider;
    }
}

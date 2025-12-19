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



/**
 * This is the model class for table "tbl_lost_found_pet".
 *
 * @property integer $id
 * @property string $pet_name
 * @property string $pet_type
 * @property string $last_seen_location
 * @property string $date_lost
 * @property string $found_location
 * @property string $date_found
 * @property string $image
 * @property string $reward_amount
 * @property integer $state_id
 * @property integer $type_id
 * @property string $created_on
 * @property string $updated_on
 * @property integer $created_by_id
 * @property integer $updated_by_id

 * === Related data ===
 * @property User $createdBy
 * @property User $updatedBy
 */

namespace app\models;

use Yii;
use app\models\Feed;
use app\models\User;

use yii\helpers\ArrayHelper;

class LostFoundPet extends \app\components\TActiveRecord
{
	public  function __toString()
	{
		return (string)$this->pet_name;
	}
	const STATE_NEW 		= 0;
	const STATE_FINDING	 	= 1;
	const STATE_CLOSE 		= 2;
	const STATE_ACTIVE 		= 3;


	const TYPE_LOST	 	= 0;
	const TYPE_FOUND 	= 1;

	public static function getStateOptions()
	{
		return [
			self::STATE_NEW			=> "New",
			self::STATE_FINDING 	=> "Finding",
			self::STATE_CLOSE 		=> "Close",
			self::STATE_ACTIVE 		=> "Active",
		];
	}
	public function getState()
	{
		$list = self::getStateOptions();
		return isset($list[$this->state_id]) ? $list[$this->state_id] : 'Not Defined';
	}
	public function getStateBadge()
	{
		$list = [
			self::STATE_NEW			=> "primary",
			self::STATE_FINDING 	=> "success",
			self::STATE_CLOSE 		=> "danger",
			self::STATE_ACTIVE 		=> "warning",
		];
		return isset($list[$this->state_id]) ? \yii\helpers\Html::tag('span', $this->getState(), ['class' => 'label label-' . $list[$this->state_id]]) : 'Not Defined';
	}
	public static function getActionOptions()
	{
		return [
			self::STATE_NEW	 	=> "New",
			self::STATE_FINDING => "Finding",
			self::STATE_CLOSE 	=> "Close",
			self::STATE_ACTIVE 	=> "Active",
		];
	}

	public static function getTypeOptions()
	{
		return [
			self::TYPE_LOST		=> "Lost",
			self::TYPE_FOUND	=> "Found",
		];
	}

	public function getType()
	{
		$list = self::getTypeOptions();
		return isset($list[$this->type_id]) ? $list[$this->type_id] : 'Not Defined';
	}
	public function getTypeBadge()
	{
		$list = [
			self::TYPE_LOST 		=> "warning",
			self::TYPE_FOUND 		=> "danger",
		];
		return isset($list[$this->type_id]) ? \yii\helpers\Html::tag('span', $this->getType(), ['class' => 'label label-' . $list[$this->type_id]]) : 'Not Defined';
	}
	public static function getPetCategoryOptions()
	{
		return ArrayHelper::Map(Petcategory::findActive()->all(), 'id', 'title');
	}
	public function getCategory()
	{
		$list = self::getPetCategoryOptions();
		return isset($list[$this->pet_type]) ? $list[$this->pet_type] : 'Not Defined';
	}

	public static function getUpdatedByOptions()
	{
		return ["TYPE1", "TYPE2", "TYPE3"];
		//return ArrayHelper::Map ( User::findActive ()->all (), 'id', 'title' );
	}

	public function beforeValidate()
	{
		if ($this->isNewRecord) {
			if (empty($this->created_on)) {
				$this->created_on = date('Y-m-d H:i:s');
			}
			if (empty($this->updated_on)) {
				$this->updated_on = date('Y-m-d H:i:s');
			}
			if (empty($this->created_by_id)) {
				$this->created_by_id = self::getCurrentUser();
			}
		} else {
			$this->updated_on = date('Y-m-d H:i:s');
		}
		return parent::beforeValidate();
	}


	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%lost_found_pet}}';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['pet_name',  'date_lost',  'date_found', 'image', 'reward_amount', 'contact_detail', 'updated_on', 'created_by_id', 'updated_by_id'], 'default', 'value' => null],
			[['state_id'], 'default', 'value' => 1],
			[['type_id'], 'default', 'value' => 0],
			[['pet_type', 'created_on', 'image', 'contact_detail', 'location'], 'required'],
			[['date_lost', 'date_found', 'created_on', 'updated_on'], 'safe'],
			[['reward_amount'], 'number'],
			[['state_id', 'type_id', 'created_by_id', 'updated_by_id'], 'integer'],
			[['pet_name',  'image'], 'string', 'max' => 255],
			[['pet_type'], 'string', 'max' => 100],
			[['created_by_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by_id' => 'id']],
			[['updated_by_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by_id' => 'id']],
			[['pet_name', 'image', 'pet_type'], 'trim'],
			[['pet_name'], 'app\components\TNameValidator'],
			[['state_id'], 'in', 'range' => array_keys(self::getStateOptions())],
			[['type_id'], 'in', 'range' => array_keys(self::getTypeOptions())]
		];
	}

	/**
	 * @inheritdoc
	 */


	public function attributeLabels()
	{
		return [
			'id' => Yii::t('app', 'ID'),
			'pet_name' => Yii::t('app', 'Pet Name'),
			'pet_type' => Yii::t('app', 'Pet Type'),
			'date_lost' => Yii::t('app', 'Date Lost'),
			'date_found' => Yii::t('app', 'Date Found'),
			'location' => Yii::t('app', 'Location'),
			'image' => Yii::t('app', 'Image'),
			'reward_amount' => Yii::t('app', 'Reward Amount'),
			'contact_detail' => Yii::t('app', 'Contact Details'),
			'state_id' => Yii::t('app', 'State'),
			'type_id' => Yii::t('app', 'Type'),
			'created_on' => Yii::t('app', 'Created On'),
			'updated_on' => Yii::t('app', 'Updated On'),
			'created_by_id' => Yii::t('app', 'Created By'),
			'updated_by_id' => Yii::t('app', 'Updated By'),
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCreatedBy()
	{
		return $this->hasOne(User::class, ['id' => 'created_by_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getUpdatedBy()
	{
		return $this->hasOne(User::class, ['id' => 'updated_by_id']);
	}
	public static function getHasManyRelations()
	{
		$relations = [];

		$relations['feeds'] = [
			'feeds',
			'Feed',
			'model_id'
		];
		return $relations;
	}
	public static function getHasOneRelations()
	{
		$relations = [];
		$relations['created_by_id'] = ['createdBy', 'User', 'id'];
		$relations['updated_by_id'] = ['updatedBy', 'User', 'id'];
		return $relations;
	}

	public function beforeDelete()
	{
		if (! parent::beforeDelete()) {
			return false;
		}
		//TODO : start here
		return true;
	}

	public function beforeSave($insert)
	{
		if (! parent::beforeSave($insert)) {
			return false;
		}
		//TODO : start here

		return true;
	}
	public function asJson($with_relations = false)
	{
		$json = [];
		$json['id'] 	= $this->id;
		$json['pet_name'] 	= $this->pet_name;
		$json['pet_type'] 	= $this->pet_type;
		$json['last_seen_location'] 	= $this->last_seen_location;
		$json['date_lost'] 	= $this->date_lost;
		$json['found_location'] 	= $this->found_location;
		$json['date_found'] 	= $this->date_found;
		$json['image'] 	= $this->image;
		$json['reward_amount'] 	= $this->reward_amount;
		$json['state_id'] 	= $this->state_id;
		$json['type_id'] 	= $this->type_id;
		$json['created_on'] 	= $this->created_on;
		$json['created_by_id'] 	= $this->created_by_id;
		$json['updated_by_id'] 	= $this->updated_by_id;
		if ($with_relations) {
			// createdBy
			$list = $this->createdBy;

			if (is_array($list)) {
				$relationData = [];
				foreach ($list as $item) {
					$relationData[] 	= $item->asJson();
				}
				$json['createdBy'] 	= $relationData;
			} else {
				$json['createdBy'] 	= $list;
			}
			// updatedBy
			$list = $this->updatedBy;

			if (is_array($list)) {
				$relationData = [];
				foreach ($list as $item) {
					$relationData[] 	= $item->asJson();
				}
				$json['updatedBy'] 	= $relationData;
			} else {
				$json['updatedBy'] 	= $list;
			}
		}
		return $json;
	}


	public static function addTestData($count = 1)
	{
		$faker = \Faker\Factory::create();
		$states = array_keys(self::getStateOptions());
		for ($i = 0; $i < $count; $i++) {
			$model = new self();

			$model->pet_name = $faker->name;
			$model->pet_type = $faker->text(10);
			$model->last_seen_location = $faker->text(10);
			$model->date_lost = $faker->date($format = 'Y-m-d', $max = 'now');
			$model->found_location = $faker->text(10);
			$model->date_found = $faker->date($format = 'Y-m-d', $max = 'now');
			$model->image = $faker->text(10);
			$model->reward_amount = $faker->text(10);
			$model->state_id = $states[rand(0, count($states))];
			$model->type_id = 0;
			$model->updated_by_id = 1;
			$model->save();
		}
	}
	public static function addData($data)
	{
		$faker = \Faker\Factory::create();
		if (self::find()->count() != 0)
			return;
		foreach ($data as $item) {
			$model = new self();


			$model->pet_name = isset($item['pet_name']) ? $item['pet_name'] : $faker->name;

			$model->pet_type = isset($item['pet_type']) ? $item['pet_type'] : $faker->text(10);

			$model->last_seen_location = isset($item['last_seen_location']) ? $item['last_seen_location'] : $faker->text(10);

			$model->date_lost = isset($item['date_lost']) ? $item['date_lost'] : $faker->date($format = 'Y-m-d', $max = 'now');

			$model->found_location = isset($item['found_location']) ? $item['found_location'] : $faker->text(10);

			$model->date_found = isset($item['date_found']) ? $item['date_found'] : $faker->date($format = 'Y-m-d', $max = 'now');

			$model->image = isset($item['image']) ? $item['image'] : $faker->text(10);

			$model->reward_amount = isset($item['reward_amount']) ? $item['reward_amount'] : $faker->text(10);
			$model->state_id = self::STATE_ACTIVE;

			$model->type_id = isset($item['type_id']) ? $item['type_id'] : 0;

			$model->updated_by_id = isset($item['updated_by_id']) ? $item['updated_by_id'] : 1;
			if (!$model->save()) {
				self::log($model->getErrorsString());
			}
		}
	}

	public function isAllowed()
	{

		if (User::isAdmin())
			return true;

		if ($this instanceof User) {
			return ($this->id == Yii::$app->user->id);
		}
		if ($this->hasAttribute('created_by_id')) {
			return ($this->created_by_id == Yii::$app->user->id);
		}

		if ($this->hasAttribute('user_id')) {
			return ($this->user_id == Yii::$app->user->id);
		}

		return false;
	}
}

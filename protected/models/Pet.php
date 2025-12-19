<?php



/**
 * This is the model class for table "tbl_pet".
 *
 * @property integer $id
 * @property string $name
 * @property string $content
 * @property string $date_of_birth
 * @property integer $gender
 * @property string $about_me
 * @property string $contact_no
 * @property string $address
 * @property string $breed
 * @property string $profile_picture
 * @property integer $price
 * @property integer $pet_category_id
 * @property integer $state_id
 * @property integer $type_id
 * @property string $created_on
 * @property string $updated_on
 * @property integer $created_by_id

 * === Related data ===
 * @property User $createdBy
 * @property Petcategory $petCategory
 */

namespace app\models;

use Yii;
use app\models\User;
use app\models\Petcategory;
use DateTime;
use yii\helpers\ArrayHelper;

class Pet extends \app\components\TActiveRecord
{
	public  function __toString()
	{
		return (string)$this->name;
	}
	public static function getPetCategoryOptions()
	{
		return ArrayHelper::Map(PetCategory::findActive()->all(), 'id', 'title');
	}

	const STATE_INACTIVE 	= 0;
	const STATE_ACTIVE	 	= 1;
	const STATE_DELETED 	= 2;
	const GENDER_MALE 	= 1;
	const GENDER_FEMALE 	= 2;
	const TYPE_ADOPT 	= 1;
	const TYPE_BUY 	= 2;

	public static function getStateOptions()
	{
		return [
			self::STATE_INACTIVE		=> "New",
			self::STATE_ACTIVE 			=> "Active",
			self::STATE_DELETED 		=> "Archived",
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
			self::STATE_INACTIVE 		=> "primary",
			self::STATE_ACTIVE 			=> "success",
			self::STATE_DELETED 		=> "danger",
		];
		return isset($list[$this->state_id]) ? \yii\helpers\Html::tag('span', $this->getState(), ['class' => 'label label-' . $list[$this->state_id]]) : 'Not Defined';
	}


	public static function getTypeOptions()
	{
		return [
			self::TYPE_ADOPT		=> "Adoption",
			self::TYPE_BUY 			=> "Buy"
		];
	}
	public static function getGenderOptions()
	{
		return [
			self::GENDER_FEMALE		=> '<span class="text-primary">Female &#9794;</span>',
			self::GENDER_MALE 		=> '<span class="text-primary">Male &#9794;</span>'
		];
	}
	public static function getGenders()
	{
		return [
			self::GENDER_FEMALE		=> 'Female',
			self::GENDER_MALE 		=> 'Male'
		];
	}
	public function getGender()
	{
		$list = self::getGenderOptions();
		return isset($list[$this->type_id]) ? $list[$this->type_id] : 'Not Defined';
	}

	public function getType()
	{
		$list = self::getTypeOptions();
		return isset($list[$this->type_id]) ? $list[$this->type_id] : 'Not Defined';
	}
	public function beforeValidate()
	{
		if ($this->isNewRecord) {
			if (!isset($this->created_on)) $this->created_on = date('Y-m-d H:i:s');
			if (!isset($this->updated_on)) $this->updated_on = date('Y-m-d H:i:s');
			if (!isset($this->created_by_id)) $this->created_by_id = Yii::$app->user->id;
		} else {
			$this->updated_on = date('Y-m-d H:i:s');
		}
		return parent::beforeValidate();
	}

	public function calculateAge($created_on)
	{
		$date1 = new DateTime($created_on);
		$date2 = new DateTime(date('Y-m-d h:i:sa'));

		// Difference
		$diff = $date1->diff($date2);

		// Convert to total hours
		$totalHours = ($diff->days * 24) + $diff->h + ($diff->i / 60);


		if(Yii::$app->controller->action->id=='adopt' && $totalHours > 24){
			if($diff->days > 365){
				return floor($diff->days/365). ' Year';
			}
			return floor( $diff->days/30).' months';
		}
		if ($totalHours < 24) {
			return round($totalHours) . " hours ";
		} else {
			return $diff->days . " days ";
		}
	}


	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%pet}}';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['name', 'content', 'pet_category_id', 'gender','breed','state_id', 'created_on','profile_picture'], 'required'],
			[['content'], 'string'],
			[['date_of_birth', 'created_on', 'updated_on'], 'safe'],
			[['gender', 'price', 'pet_category_id', 'state_id', 'type_id', 'created_by_id'], 'integer'],
			[['name', 'about_me', 'contact_no', 'profile_picture'], 'string', 'max' => 255],
			[['address'], 'string', 'max' => 512],
			[['breed'], 'string', 'max' => 100],
			[['pet_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Petcategory::class, 'targetAttribute' => ['pet_category_id' => 'id']],
			[['created_by_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by_id' => 'id']],
			[['name', 'about_me', 'contact_no', 'profile_picture', 'address', 'breed'], 'trim'],
			[['name'], 'app\components\TNameValidator'],
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
			'name' => Yii::t('app', 'Name'),
			'content' => Yii::t('app', 'Content'),
			'date_of_birth' => Yii::t('app', 'Date Of Birth'),
			'gender' => Yii::t('app', 'Gender'),
			'about_me' => Yii::t('app', 'About Me'),
			'contact_no' => Yii::t('app', 'Contact No'),
			'address' => Yii::t('app', 'Address'),
			'breed' => Yii::t('app', 'Breed'),
			'profile_picture' => Yii::t('app', 'Profile Picture'),
			'price' => Yii::t('app', 'Price'),
			'pet_category_id' => Yii::t('app', 'Pet Category'),
			'state_id' => Yii::t('app', 'State'),
			'type_id' => Yii::t('app', 'Type'),
			'created_on' => Yii::t('app', 'Created On'),
			'updated_on' => Yii::t('app', 'Updated On'),
			'created_by_id' => Yii::t('app', 'Created By'),
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
	public function getPetCategory()
	{
		return $this->hasOne(Petcategory::class, ['id' => 'pet_category_id']);
	}
	public static function getHasManyRelations()
	{
		$relations = [];
		return $relations;
	}
	public static function getHasOneRelations()
	{
		$relations = [];
		$relations['pet_category_id'] = ['petCategory', 'Petcategory', 'id'];
		$relations['created_by_id'] = ['createdBy', 'User', 'id'];
		return $relations;
	}

	public function beforeDelete()
	{
		return parent::beforeDelete();
	}

	public function asJson($with_relations = false)
	{
		$json = [];
		$json['id'] 	= $this->id;
		$json['name'] 	= $this->name;
		$json['content'] 	= $this->content;
		$json['date_of_birth'] 	= $this->date_of_birth;
		$json['gender'] 	= $this->gender;
		$json['about_me'] 	= $this->about_me;
		$json['contact_no'] 	= $this->contact_no;
		$json['address'] 	= $this->address;
		$json['breed'] 	= $this->breed;
		if (isset($this->profile_picture))
			$json['profile_picture'] 	= \Yii::$app->createAbsoluteUrl('pet/download', array('file' => $this->profile_picture));
		$json['price'] 	= $this->price;
		$json['pet_category_id'] 	= $this->pet_category_id;
		$json['state_id'] 	= $this->state_id;
		$json['type_id'] 	= $this->type_id;
		$json['created_on'] 	= $this->created_on;
		$json['created_by_id'] 	= $this->created_by_id;
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
				$json['CreatedBy'] 	= $list;
			}
			// petCategory
			$list = $this->petCategory;

			if (is_array($list)) {
				$relationData = [];
				foreach ($list as $item) {
					$relationData[] 	= $item->asJson();
				}
				$json['petCategory'] 	= $relationData;
			} else {
				$json['PetCategory'] 	= $list;
			}
		}
		return $json;
	}
	public function isAllowed()
	{

		if (Yii::$app->controller->action->id == 'detail') {
			return true;
		} else {


			if (method_exists(get_parent_class(), 'isAllowed')) {
				return parent::isAllowed();
			}
			if (User::isAdmin())
				return true;

			if (User::isUser())
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
		}
		return false;
	}
}

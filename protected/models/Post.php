<?php



/**
 * This is the model class for table "tbl_post".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $keywords
 * @property string $image_file
 * @property integer $view_count
 * @property integer $state_id
 * @property integer $type_id
 * @property string $created_on
 * @property string $updated_on
 * @property integer $created_by_id

 * === Related data ===
 * @property User $createdBy
 */

namespace app\models;

use Yii;
use app\models\User;
use DateTime;
use yii\helpers\ArrayHelper;

class Post extends \app\components\TActiveRecord
{
	public  function __toString()
	{
		return (string)$this->title;
	}
	const STATE_INACTIVE 	= 0;
	const STATE_ACTIVE	 	= 1;
	const STATE_DELETED 	= 2;

	const TYPE_PET 	= 1;
	const TYPE_ARTICAL	 	= 2;

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

	public static function getPetList()
	{
		if(Yii::$app->user->identity->role_id===User::ROLE_ADMIN){
			return ArrayHelper::Map(Pet::findActive()->all(), 'id', 'name');
		}else{
			return ArrayHelper::Map(Pet::findActive()->where(['created_by_id'=>Yii::$app->user->identity->id])->all(), 'id', 'name');
		}
	}


	public function getTypeOptions()
	{
		
		return [
			self::TYPE_ARTICAL 		=> "Pet",
			self::TYPE_PET 			=> "Artical",
		];

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


		if ($totalHours < 24) {
			return round($totalHours) . " hours ago";
		} else {
			return $diff->days . " days ago";
		}
	}
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return '{{%post}}';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['title', 'content', 'state_id', 'created_on', 'updated_on', 'created_by_id'], 'required'],
			[['content'], 'string'],
			[['view_count', 'state_id', 'type_id', 'created_by_id', 'pet_id'], 'integer'],
			[['created_on', 'updated_on'], 'safe'],
			[['title'], 'string', 'max' => 256],
			[['keywords'], 'string', 'max' => 255],
			[['image_file'], 'string', 'max' => 1024],
			[['created_by_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by_id' => 'id']],
			[['title', 'keywords', 'image_file'], 'trim'],
			[
				['image_file'],
				'file',
				'skipOnEmpty' => true,
				'extensions' => 'png, jpg,jpeg'
			],
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
			'title' => Yii::t('app', 'Title'),
			'content' => Yii::t('app', 'Content'),
			'keywords' => Yii::t('app', 'Keywords'),
			'image_file' => Yii::t('app', 'Image File'),
			'view_count' => Yii::t('app', 'View Count'),
			'state_id' => Yii::t('app', 'State'),
			'type_id' => Yii::t('app', 'Type'),
			'created_on' => Yii::t('app', 'Created On'),
			'updated_on' => Yii::t('app', 'Updated On'),
			'created_by_id' => Yii::t('app', 'Created By'),
			'pet_id' => Yii::t('app', 'Pet'),
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCreatedBy()
	{
		return $this->hasOne(User::class, ['id' => 'created_by_id']);
	}
	public function getPet()
	{
		return $this->hasOne(Pet::class, ['id' => 'pet_id']);
	}
	public static function getHasManyRelations()
	{
		$relations = [];
		return $relations;
	}
	public static function getHasOneRelations()
	{
		$relations = [];
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
		$json['title'] 	= $this->title;
		$json['content'] 	= $this->content;
		$json['keywords'] 	= $this->keywords;
		if (isset($this->image_file))
			$json['image_file'] 	= \Yii::$app->createAbsoluteUrl('post/download', array('file' => $this->image_file));
		$json['view_count'] 	= $this->view_count;
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

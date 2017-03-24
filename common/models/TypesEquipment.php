<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\web\UploadedFile;

/**
 * This is the model class for table "types_equipment".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $create_at
 * @property string $update_at
 * @property string $image_path
 * @property string $price
 * @property string $category_id
 */
class TypesEquipment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'types_equipment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['description', 'image_path'], 'string'],
            [['category_id'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
        ];
    }

//    public function behaviors(){
//        return [
//            [
//                'class' => TimestampBehavior::className(),
//                'attributes' => [
//                    ActiveRecord::EVENT_BEFORE_INSERT => ['create_at', 'update_at'],
//                    ActiveRecord::EVENT_BEFORE_UPDATE => ['update_at'],
//                ],
//                'value' => new Expression('NOW()'),
//            ],
//        ];
//    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'description' => 'Описание',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
            'image_path' => 'Кртинка',
            'category_id' => 'Категория',
        ];
    }
}

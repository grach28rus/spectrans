<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "characteristics_buses".
 *
 * @property integer $id
 * @property integer $buses_id
 * @property string $name
 * @property string $value
 * @property string $create_at
 * @property string $update_at
 */
class CharacteristicsBuses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'characteristics_buses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['buses_id', 'name', 'value'], 'required'],
            [['buses_id'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['name'], 'string', 'max' => 250],
            [['value'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'buses_id' => 'Техника',
            'name' => 'Наименование',
            'value' => 'Значение',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }
}

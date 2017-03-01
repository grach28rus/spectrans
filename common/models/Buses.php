<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "buses".
 *
 * @property integer $id
 * @property integer $types_equipment_id
 * @property string $name
 * @property string $description
 * @property string $cost_in_h
 * @property string $cost_in_period
 * @property string $create_at
 * @property string $update_at
 */
class Buses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'buses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['types_equipment_id', 'name', 'cost_in_h'], 'required'],
            [['types_equipment_id'], 'integer'],
            [['description'], 'string'],
            [['create_at', 'update_at'], 'safe'],
            [['name', 'cost_in_h', 'cost_in_period'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'types_equipment_id' => 'Types Equipment ID',
            'name' => 'Name',
            'description' => 'Description',
            'cost_in_h' => 'Cost In H',
            'cost_in_period' => 'Cost In Period',
            'create_at' => 'Create At',
            'update_at' => 'Update At',
        ];
    }
}

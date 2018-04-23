<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "stages".
 *
 * @property integer $id
 * @property string $stagename
 *
 * @property Students[] $students
 */
class Stages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stagename'], 'required'],
            [['stagename'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stagename' => 'Level',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Students::className(), ['studentstage' => 'id']);
    }
}

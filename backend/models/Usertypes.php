<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "usertypes".
 *
 * @property integer $id
 * @property string $usertypename
 *
 * @property Users[] $users
 */
class Usertypes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usertypes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usertypename'], 'required'],
            [['usertypename'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usertypename' => 'User Type Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['usertype' => 'id']);
    }
}

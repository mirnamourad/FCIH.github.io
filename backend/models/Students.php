<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property integer $id
 * @property string $studentname
 * @property string $studentemail
 * @property string $studentpassword
 * @property string $studentphone
 * @property integer $studentstage
 * @property integer $userid
 *
 * @property Stages $studentstage0
 * @property Users $user
 * @property StudentsSubjects[] $studentsSubjects
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['studentname', 'studentemail', 'studentpassword', 'studentphone', 'studentstage', 'userid'], 'required'],
            [['studentstage', 'userid'], 'integer'],
            [['studentname', 'studentemail', 'studentpassword', 'studentphone'], 'string', 'max' => 255],
            [['studentstage'], 'exist', 'skipOnError' => true, 'targetClass' => Stages::className(), 'targetAttribute' => ['studentstage' => 'id']],
            [['userid'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['userid' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'studentname' => 'Student Name',
            'studentemail' => 'Student Email',
            'studentpassword' => 'Student Password',
            'studentphone' => 'Student Phone',
            'studentstage' => 'Student Stage',
            'userid' => 'Userid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentstage0()
    {
        return $this->hasOne(Stages::className(), ['id' => 'studentstage']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'userid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentsSubjects()
    {
        return $this->hasMany(StudentsSubjects::className(), ['student_id' => 'id']);
    }
}

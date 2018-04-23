<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "instructors".
 *
 * @property integer $id
 * @property string $instructorname
 * @property string $instructoremail
 * @property string $instructorpassword
 * @property integer $userid
 *
 * @property Assignments[] $assignments
 * @property Users $user
 * @property StudentsSubjects[] $studentsSubjects
 * @property Subjects[] $subjects
 */
class Instructors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'instructors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['instructorname', 'instructoremail', 'instructorpassword', 'userid'], 'required'],
            [['userid'], 'integer'],
            [['instructorname', 'instructoremail', 'instructorpassword'], 'string', 'max' => 255],
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
            'instructorname' => 'Instructor Name',
            'instructoremail' => 'Instructor Email',
            'instructorpassword' => 'Instructor Password',
            'userid' => 'Userid',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssignments()
    {
        return $this->hasMany(Assignments::className(), ['instructor_id' => 'id']);
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
        return $this->hasMany(StudentsSubjects::className(), ['instructor_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasMany(Subjects::className(), ['instructor' => 'id']);
    }
}

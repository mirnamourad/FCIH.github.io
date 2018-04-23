<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "students_subjects".
 *
 * @property integer $id
 * @property integer $student_id
 * @property integer $subject_id
 * @property integer $pay_or_not
 *
 * @property Students $student
 * @property Subjects $subject
 */
class StudentsSubjects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students_subjects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id', 'subject_id', 'pay_or_not'], 'required'],
            [['student_id', 'subject_id', 'pay_or_not'], 'integer'],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['student_id' => 'id']],
            [['subject_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subjects::className(), 'targetAttribute' => ['subject_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student Name',
            'subject_id' => 'Subject Name',
            'pay_or_not' => 'Pay Or Not',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Students::className(), ['id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subjects::className(), ['id' => 'subject_id']);
    }
}

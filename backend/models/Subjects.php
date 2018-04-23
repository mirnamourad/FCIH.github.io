<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "subjects".
 *
 * @property integer $id
 * @property string $subjectname
 * @property double $subjectmingrade
 * @property double $subjectmaxgrade
 * @property string $subjectprice
 * @property integer $maxstudents
 * @property integer $instructor
 *
 * @property StudentsSubjects[] $studentsSubjects
 * @property Instructors $instructor0
 */
class Subjects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subjects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subjectname', 'subjectmingrade', 'subjectmaxgrade', 'subjectprice', 'maxstudents', 'instructor'], 'required'],
            [['subjectmingrade', 'subjectmaxgrade', 'subjectprice'], 'number'],
            [['maxstudents', 'instructor'], 'integer'],
            [['subjectname'], 'string', 'max' => 255],
            [['instructor'], 'exist', 'skipOnError' => true, 'targetClass' => Instructors::className(), 'targetAttribute' => ['instructor' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subjectname' => 'Subject Name',
            'subjectmingrade' => 'Minimum Grade',
            'subjectmaxgrade' => 'Maximum Grade',
            'subjectprice' => 'Price',
            'maxstudents' => 'Max Students',
            'instructor' => 'Instructor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudentsSubjects()
    {
        return $this->hasMany(StudentsSubjects::className(), ['subject_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstructor0()
    {
        return $this->hasOne(Instructors::className(), ['id' => 'instructor']);
    }
}

<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "assignments".
 *
 * @property integer $id
 * @property string $assignmentname
 * @property string $deadline
 * @property string $assignment_file
 * @property integer $instructor_id
 *
 * @property Instructors $instructor
 */
class Assignments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'assignments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['assignmentname', 'deadline', 'assignment_file', 'instructor_id'], 'required'],
            [['file'], 'file'],
            [['deadline'],'safe'],
            [['instructor_id'], 'integer'],
            [['assignmentname','assignment_file'], 'string', 'max' => 255],
            [['instructor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Instructors::className(), 'targetAttribute' => ['instructor_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'assignmentname' => 'Assignment Name',
            'deadline' => 'Deadline',
            'assignment_file' => 'Assignment File',
            'instructor_id' => 'Instructor ID',
            'file' => 'Assignment',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstructor()
    {
        return $this->hasOne(Instructors::className(), ['id' => 'instructor_id']);
    }
}

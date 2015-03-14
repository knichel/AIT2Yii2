<?php

namespace app\models;

use Yii;
//use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
//use yii\helpers\Security;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $user_id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $password
 * @property string $auth_key
 * @property string $email
 * @property string $send_attend_email
 * @property integer $secret_question1
 * @property string $secret_answer1
 * @property integer $secret_question2
 * @property string $secret_answer2
 * @property integer $grade_level
 * @property string $is_active
 * @property integer $school_id
 * @property string $phone
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $pass_change_code
 * @property string $weekly_progress
 * @property integer $created_by
 * @property string $STGUID
 * @property string $created_date
 * @property string $parent_link_code
 * @property string $last_login
 *
 * @property Attendance[] $attendances
 * @property Comment[] $comments
 * @property Course[] $courses
 * @property CustomScore[] $customScores
 * @property Download[] $downloads
 * @property Grade[] $grades
 * @property Assignment[] $assignments
 * @property IncidentReferral[] $incidentReferrals
 * @property Message[] $messages
 * @property Parent2student[] $parent2students
 * @property Student2class[] $student2classes
 * @property Section[] $sections
 * @property Student2wbl[] $student2wbls
 * @property Teacher2SMS $teacher2SMS
 * @property TeacherPage[] $teacherPages
 * @property School $school
 * @property SecretQuestion $secretQuestion1
 * @property SecretQuestion $secretQuestion2
 * @property User2center[] $user2centers
 * @property EdCenter[] $edCenters
 */

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'password', 'email', 'grade_level'], 'required'],
            [['send_attend_email', 'is_active', 'weekly_progress'], 'string'],
            [['secret_question1', 'secret_question2', 'grade_level', 'school_id', 'created_by'], 'integer'],
            [['username', 'first_name', 'last_name', 'phone'], 'string', 'max' => 20],
            [['password', 'auth_key',  'pass_change_code'], 'string', 'max' => 32],
            [['email', 'address1', 'address2'], 'string', 'max' => 100],
            [['secret_answer1', 'secret_answer2'], 'string', 'max' => 50],
            [['city'], 'string', 'max' => 30],
            [['state'], 'string', 'max' => 2],
            [['zip'], 'string', 'max' => 5],
            [['parent_link_code'], 'string', 'max' => 36],
            [['username'], 'unique'],
            [['parent_link_code'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'username' => 'UserName',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'email' => 'Email',
            'send_attend_email' => 'Send Attend Email',
            'secret_question1' => 'Secret Question1',
            'secret_answer1' => 'Secret Answer1',
            'secret_question2' => 'Secret Question2',
            'secret_answer2' => 'Secret Answer2',
            'grade_level' => 'Grade Level',
            'is_active' => 'Is Active',
            'school_id' => 'School',
            'phone' => 'Phone',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'city' => 'City',
            'state' => 'State',
            'zip' => 'Zip',
            'pass_change_code' => 'Pass Change Code',
            'weekly_progress' => 'Weekly Progress',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'parent_link_code' => 'Parent Link Code',
            'last_login' => 'Last Login',
        ];
    }

    /**
     * Following added to implement user authentication
     * By knichel on 03-06-16
     */
    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        $user = self::find()
                ->where([
                    "user_id" => $id
                ])
                ->one();
        if (!count($user)) {
            return null;
        }
        return new static($user);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $userType = null) {

        $user = self::find()
                ->where(["accessToken" => $token])
                ->one();
        if (!count($user)) {
            return null;
        }
        return new static($user);
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username) {
        $user = self::find()
                ->where([
                    "username" => $username
                ])
                ->one();
        if (!count($user)) {
            return null;
        }
        return new static($user);
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->user_id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->auth_key === $authKey;
    }
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Security::generateRandomKey();
    }
    
    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        return $this->password === md5($password);
    }

    /**************************************
     * End of added for User Authentication
     *************************************/
    
    /**
     * @return user full name
     */
    public function getFullName(){
        return $this->first_name." ".$this->last_name;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttendances()
    {
        return $this->hasMany(Attendance::className(), ['student_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['student_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['teacher_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomScores()
    {
        return $this->hasMany(CustomScore::className(), ['teacher_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDownloads()
    {
        return $this->hasMany(Download::className(), ['teacher_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrades()
    {
        return $this->hasMany(Grade::className(), ['student_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAssignments()
    {
        return $this->hasMany(Assignment::className(), ['assignment_id' => 'assignment_id'])->viaTable('grade', ['student_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIncidentReferrals()
    {
        return $this->hasMany(IncidentReferral::className(), ['teacher_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessages()
    {
        return $this->hasMany(Message::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent2students()
    {
        return $this->hasMany(Parent2student::className(), ['student_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent2classes()
    {
        return $this->hasMany(Student2class::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSections()
    {
        return $this->hasMany(Section::className(), ['section_id' => 'section_id'])->viaTable('student2class', ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent2wbls()
    {
        return $this->hasMany(Student2wbl::className(), ['student_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher2SMS()
    {
        return $this->hasOne(Teacher2SMS::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacherPages()
    {
        return $this->hasMany(TeacherPage::className(), ['teacher_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(School::className(), ['school_id' => 'school_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecretQuestion1()
    {
        return $this->hasOne(SecretQuestion::className(), ['secret_question_id' => 'secret_question1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecretQuestion2()
    {
        return $this->hasOne(SecretQuestion::className(), ['secret_question_id' => 'secret_question2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser2centers()
    {
        return $this->hasMany(User2center::className(), ['user_id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEdCenters()
    {
        return $this->hasMany(EdCenter::className(), ['ed_center_id' => 'ed_center_id'])->viaTable('user2center', ['user_id' => 'user_id']);
    }
}

<?php

namespace app\models;

use yii\base\Model;

class RegisterForm extends Model
{
    public $prefix_th;
    public $prefix_en;
    public $first_name;
    public $last_name;
    public $citizen_id;
    public $birth_date;
    public $email;
    public $phone;
    public $affiliation;
    public $position;
    public $type;

    public function rules()
    {
        return [
            [['prefix_th', 'prefix_en', 'first_name', 'last_name', 'citizen_id', 'birth_date', 'email', 'phone'], 'required'],
            [['first_name', 'last_name'], 'string', 'max' => 50],
            [['email'], 'email'],
            [['phone'], 'string', 'max' => 10],
            [['citizen_id'], 'string', 'length' => 13],
        ];
    }

    public function attributeLabels()
    {
        return [
            'prefix_th' => 'คำนำหน้า (ไทย)',
            'prefix_en' => 'คำนำหน้า (อังกฤษ)',
            'first_name' => 'ชื่อ',
            'last_name' => 'นามสกุล',
            'citizen_id' => 'เลขบัตรประชาชน',
            'birth_date' => 'วัน/เดือน/ปีเกิด',
            'email' => 'อีเมล',
            'phone' => 'เบอร์โทร',
            'affiliation' => 'สังกัด',
            'position' => 'ตำแหน่ง/วิชาชีพ',
            'type' => 'ประเภท',
        ];
    }
}

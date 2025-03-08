<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class RegisterForm extends ActiveRecord
{
    public static function tableName()
    {
        return 'user_data_providerid'; // เชื่อมกับตารางจริงในฐานข้อมูล
    }

    public function rules()
    {
        return [
            [['title_th', 'title_en', 'firstname_th', 'lastname_th', 'provider_id', 'date_of_birth', 'email'], 'required'],
            [['firstname_th', 'lastname_th'], 'string', 'max' => 50],
            [['email'], 'email'],
            [['provider_id'], 'string', 'length' => 13],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title_th' => 'คำนำหน้า (ไทย)',
            'title_en' => 'คำนำหน้า (อังกฤษ)',
            'firstname_th' => 'ชื่อ',
            'lastname_th' => 'นามสกุล',
            'provider_id' => 'เลขบัตรประชาชน',
            'date_of_birth' => 'วัน/เดือน/ปีเกิด',
            'email' => 'อีเมล',
        ];
    }
}


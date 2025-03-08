<?php 

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\UserDataProviderid; // ตรวจสอบตาราง user_data_providerid

class AuthController extends Controller
{
    public function actionCheckEmail()
{
    Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
    
    $email = Yii::$app->request->post('email');
    
    $user = (new \yii\db\Query())
        ->select(['name_th', 'position_1'])
        ->from('user_data_providerid') // ตารางที่เก็บข้อมูลผู้ใช้
        ->where(['email' => $email])
        ->one();
    
    if ($user) {
        return ['success' => true, 'data' => $user];
    } else {
        return ['success' => false, 'message' => 'ไม่พบอีเมลในระบบ'];
    }
}

}



?>
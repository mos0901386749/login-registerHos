<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

use app\models\LoginForm;
use app\models\UserDataProviderid; //
use app\models\RegisterForm;

use app\models\ContactForm;

class SiteController extends Controller
{
    public function actionRegister()
    {
        // ดึงข้อมูลจากฐานข้อมูล
        $model = RegisterForm::find()->where(['email' => 'narongrit0901386749@gmail.com'])->one();

        if (!$model) {
            $model = new RegisterForm(); // ถ้าไม่มีข้อมูล ให้สร้างโมเดลเปล่า
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'ลงทะเบียนสำเร็จ!');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'เกิดข้อผิดพลาดในการบันทึกข้อมูล');
            }
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }


    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $email = Yii::$app->request->post('email');

        if ($email) {
            // ค้นหาอีเมลในฐานข้อมูล
            $user = UserDataProviderid::findOne(['email' => $email]);

            if ($user) {
                // ถ้าพบผู้ใช้ ให้เข้าสู่ระบบและ redirect ไปหน้า register.php
                Yii::$app->session->set('user', $user->toArray()); // เก็บข้อมูลผู้ใช้ใน session
                return $this->redirect(['site/register']);
            } else {
                Yii::$app->session->setFlash('error', 'ไม่พบอีเมลนี้ในระบบ');
            }
        }

        return $this->render('login');
    }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}

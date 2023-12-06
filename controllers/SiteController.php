<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'], // Az ellenőrzés csak az 'index' akcióra vonatkozik
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['@'], // Csak bejelentkezett felhasználók
                        'denyCallback' => function () {
                            // Ha a felhasználó nincs bejelentkezve, átirányítás a login oldalra
                            return Yii::$app->getResponse()->redirect(['site/login']);
                        },
                    ],
                ],
            ],
            // További viselkedések...
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
        $model = new LoginForm();
    
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->login()) {
                return Yii::$app->response->redirect(['']);
            }
        }
    
        return $this->render('login', [
            'model' => $model,
        ]);
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
    public $uranuskod;
    public $jelszo;

    public function actionProfile()
    {
        $user = Yii::$app->user->identity;
    
        $profilAdatok = $user->getProfilAdatok();
    
        return $this->render('profile', [
            'profilAdatok' => $profilAdatok,
        ]);
    }
    
}

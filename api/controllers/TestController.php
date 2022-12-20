<?php

namespace api\controllers;

use common\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;

class TestController extends \yii\rest\ActiveController {

    public $modelClass = "Test";
    public $enableCsrfValidation = false;

    private array $noAuthRoutes = ["login"];

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'corsFilter' => [
                'class' => \yii\filters\Cors::class,
                'cors' => [
                    'Origin' => [
                        '*',
                    ],
                    'Access-Control-Request-Method' => [
                        'GET',
                        'POST',
                        'PUT',
                        'PATCH',
                        'DELETE',
                        'HEAD',
                        'OPTIONS',
                    ],
                    'Access-Control-Request-Headers' => [
                        '*',
                    ],
                    'Access-Control-Allow-Credentials' => null,
                    'Access-Control-Max-Age' => 86400,
                    'Access-Control-Expose-Headers' => [],
                ],
            ],
            'authenticator' => [
                'class' => HttpBearerAuth::class,
                'except' => $this->noAuthRoutes,
                /*'auth' => function ($username, $password) {
                    return User::findOne([
                        'username' => $username,
                        'password' => $password,
                    ]);
                },*/
            ],
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['test'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        //'roles' => ['?']
                    ]
                ],
            ],
        ];
    }

    public function actionIndex() {
        return "Asdf";
    }

    public function actionTest() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $data = \Yii::$app->request->getBodyParam("data");

        $data["name"] .= " (modified by server api)";
        $data["description"] .= " (modified by server)";

        return $data;
    }

    public function actionLogin() {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $data = \Yii::$app->request->getBodyParam("data");

        if($user = User::findByUsername($data["login"])) {
            if(Yii::$app->getSecurity()->validatePassword($data['pass'], $user->password_hash)) {
                $access_token = Yii::$app->getSecurity()->generateRandomString(64);
                $user->setAccessToken($access_token);
                $user->save();
                Yii::$app->response->setStatusCode(200);
                return [
                    "code" => 200,
                    "access_token" => $user->getAccessToken()
                ];
            } else {
                Yii::$app->response->setStatusCode(401);
                return "incorrect login or pass";
            }
        } else {
            Yii::$app->response->setStatusCode(401);
            return "incorrect login or pass";
        }
    }

}

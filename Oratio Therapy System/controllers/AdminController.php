<?php

namespace amnah\yii2\user\controllers;

use Yii;
use amnah\yii2\user\models\User;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\widgets\ActiveForm;

/**
 * AdminController implements the CRUD actions for User model.
 */
class AdminController extends Controller
{
    /**
     * @var \amnah\yii2\user\Module
     * @inheritdoc
     */
    public $module;
    
    /**
     * @inheritdoc
     */
    public function init()
    {
        // check for admin permission (`tbl_role.can_admin`)
        // note: check for Yii::$app->user first because it doesn't exist in console commands (throws exception)
        if (!empty(Yii::$app->user) && !Yii::$app->user->can("admin")) {
            throw new ForbiddenHttpException('You are not allowed to perform this action.');
        }

        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * List all User models
     * @return mixed
     */
 
   /* public function actionIndex()
    {
        /** @var \amnah\yii2\user\models\search\UserSearch $searchModel */
 /*       $searchModel = $this->module->model("UserSearch");
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        return $this->render('index', compact('searchModel', 'dataProvider'));
    } */

    public function actionUtente()
    {
        /** @var \amnah\yii2\user\models\search\UserSearchUtente $searchModel */
        $searchModel = $this->module->model("UserSearchUtente");
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        return $this->render('utente', compact('searchModel', 'dataProvider'));
    }

    public function actionCaregiver()
    {
        /** @var \amnah\yii2\user\models\search\UserSearchCaregiver $searchModel */
        $searchModel = $this->module->model("UserSearchCaregiver");
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
        return $this->render('caregiver', compact('searchModel', 'dataProvider'));
    }

    /**
     * Display a single User model
     * @param string $id
     * @return mixed
     */
    public function actionViewutente($id)
    {
        return $this->render('viewutente', [
            'user' => $this->findModel($id),
        ]);
    }

  /**
     * Display a single User model
     * @param string $id
     * @return mixed
     */
    public function actionViewcaregiver($id)
    {
        return $this->render('viewcaregiver', [
            'user' => $this->findModel($id),
        ]);
    }

    
    /**
     * Create a new User model. If creation is successful, the browser will
     * be redirected to the 'view' page.
     * @return mixed
     */
   /* public function actionCreate()
    {
        /** @var \amnah\yii2\user\models\User $user */
        /** @var \amnah\yii2\user\models\Profile $profile */

    /*    $user = $this->module->model("User");
        $user->setScenario("admin");
        $profile = $this->module->model("Profile");

        $post = Yii::$app->request->post();
        $userLoaded = $user->load($post);
        $profile->load($post);

        // validate for ajax request
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($user, $profile);
        }

        if ($userLoaded && $user->validate() && $profile->validate()) {
            $user->save(false);
            $profile->setUser($user->id)->save(false);
            return $this->redirect(['view', 'id' => $user->id]);
        }

        // render
        return $this->render('create', compact('user', 'profile'));
    }*/

    /**
     * Update an existing User model. If update is successful, the browser
     * will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
 /*   public function actionUpdate($id)
    {
        // set up user and profile
        $user = $this->findModel($id);
        $user->setScenario("admin");
        $profile = $user->profile;

        $post = Yii::$app->request->post();
        $userLoaded = $user->load($post);
        $profile->load($post);

        // validate for ajax request
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($user, $profile);
        }

        // load post data and validate
        if ($userLoaded && $user->validate() && $profile->validate()) {
            $user->save(false);
            $profile->setUser($user->id)->save(false);
            return $this->redirect(['view', 'id' => $user->id]);
        }

        // render
        return $this->render('update', compact('user', 'profile'));
    } */

    /**
     * Delete an existing User model. If deletion is successful, the browser
     * will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
   /* public function actionDelete($id)
    {
        // delete profile and userTokens first to handle foreign key constraint
        $user = $this->findModel($id);
        $profile = $user->profile;
        $userToken = $this->module->model("UserToken");
        $userAuth = $this->module->model("UserAuth");
        $userToken::deleteAll(['user_id' => $user->id]);
        $userAuth::deleteAll(['user_id' => $user->id]);
        $profile->delete();
        $user->delete();

        return $this->redirect(['index']);
    } */

    /**
     * Find the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        /** @var \amnah\yii2\user\models\User $user */
        $user = $this->module->model("User");
        $user = $user::findOne($id);
        if ($user) {
            return $user;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCreateuser()
    {
        /** @var \amnah\yii2\user\models\User $user */
        /** @var \amnah\yii2\user\models\Profile $profile */

        $user = $this->module->model("User");
        $user->setScenario("admin");
        $profile = $this->module->model("Profile");

        $post = Yii::$app->request->post();
        $userLoaded = $user->load($post);
        $profile->load($post);

        // validate for ajax request
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($user, $profile);
        }

        if ($userLoaded && $user->validate() && $profile->validate()) {
            $user->save(false);
            $profile->setUser($user->id)->save(false);


            //spedisco email

             // perform registration
             $role = $this->module->model("Role");
             /** @var \amnah\yii2\user\models\Role $role */
             $user->setRegisterAttributes($role::ROLE_USER)->save(); // 
             $profile->setUser($user->id)->save();
             $this->afterRegister($user);
             $successText = Yii::t("user", "Successfully registered [ {displayName} ]", ["displayName" => $user->getDisplayName()]);
             $guestText = "";
             if (!Yii::$app->user->isGuest) {
                 $guestText = Yii::t("user", " - Per favore, verifica la tua email per confermare il tuo account");
             }
             Yii::$app->session->setFlash("Register-success", $successText . $guestText);
          // 

            
            return $this->redirect(['viewutente', 'id' => $user->id]);
        }

        // render
        return $this->render('createUser', compact('user', 'profile'));
    }

    public function actionCreatecaregiver()
    {
        /** @var \amnah\yii2\user\models\User $user */
        /** @var \amnah\yii2\user\models\Profile $profile */

        $user = $this->module->model("User");
        $user->setScenario("admin");
        $profile = $this->module->model("Profile");

        $post = Yii::$app->request->post();
        $userLoaded = $user->load($post);
        $profile->load($post);
        
        // validate for ajax request
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($user, $profile);
        }

        if ($userLoaded && $user->validate() && $profile->validate()) {
            $user->save(false);
            $profile->setUser($user->id)->save(false);
           // echo 'a'; 
            //print_r($user->validate());
           // echo 'b'; 
            //print_r($profile->validate());
            //die();
            
         //spedisco email

             // perform registration
             $role = $this->module->model("Role");
             /** @var \amnah\yii2\user\models\Role $role */
             $user->setRegisterAttributes($role::ROLE_CAREGIVER)->save(); // 
             $profile->setUser($user->id)->save();
             $this->afterRegister($user);
             $successText = Yii::t("user", "Successfully registered [ {displayName} ]", ["displayName" => $user->getDisplayName()]);
             $guestText = "";
             if (!Yii::$app->user->isGuest) {
                 $guestText = Yii::t("user", " - Per favore, verifica la tua email per confermare il tuo account");
             }
             Yii::$app->session->setFlash("Register-success", $successText . $guestText);
          //   


            return $this->redirect(['viewcaregiver', 'id' => $user->id]);
        }

        // render
        return $this->render('createCaregiver', compact('user', 'profile'));
    }



    /************************************************** inserita da me *****************   */
  /**
     * Process data after registration
     * @param \amnah\yii2\user\models\User $user
     */
    protected function afterRegister($user)
    {
        /** @var \amnah\yii2\user\models\UserToken $userToken */
        $userToken = $this->module->model("UserToken");

        // determine userToken type to see if we need to send email
        $userTokenType = null;
        if ($user->status == $user::STATUS_INACTIVE) {
            $userTokenType = $userToken::TYPE_EMAIL_ACTIVATE;
        } elseif ($user->status == $user::STATUS_UNCONFIRMED_EMAIL) {
            $userTokenType = $userToken::TYPE_EMAIL_CHANGE;
        }
        
        // check if we have a userToken type to process, or just log user in directly
        if ($userTokenType) {
            $userToken = $userToken::generate($user->id, $userTokenType);
            if (!$numSent = $user->sendEmailConfirmation($userToken)) {

                // handle email error
                Yii::$app->session->setFlash("Email-error", "Failed to send email");
            }
        //} else {
        //    Yii::$app->user->login($user, $this->module->loginDuration);
        }
    }



}



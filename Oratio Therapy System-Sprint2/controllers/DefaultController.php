<?php

namespace amnah\yii2\user\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;


/**
 * Default controller for User module
 */
class DefaultController extends Controller
{
    /**
     * @var \amnah\yii2\user\Module
     * @inheritdoc
     */
    public $module;

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index', 'confirm', 'resend', 'logout'],
                        'allow' => true,
                        'roles' => ['?', '@'],
                    ],
                    [
                        'actions' => ['account', 'profile', 'resend-change', 'cancel'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['login', 'register', 'forgot', 'reset', 'login-email', 'login-callback'],
                        'allow' => true,
                        'roles' => ['?'],
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
     * Display index - debug page, login page, or account page
     */
   /* public function actionIndex()
    {
        if (defined('YII_DEBUG') && YII_DEBUG) {
            $actions = $this->module->getActions();
            return $this->render('index', ["actions" => $actions]);
        } elseif (Yii::$app->user->isGuest) {
            return $this->redirect(["/user/login"]);
        } else {
            return $this->redirect(["/user/account"]);
        }
    } */

    /**
     * Display login page
     */
    public function actionLogin()
    {
        /** @var \amnah\yii2\user\models\forms\LoginForm $model */
        $model = $this->module->model("LoginForm");

        // load post data and login
        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->validate()) {
            
            $returnUrl = $this->performLogin($model->getUser(), $model->rememberMe);
           
            
                if  ($returnUrl =='UTENTE' ||  $returnUrl =='CAREGIVER' || $returnUrl =='LOGOPEDISTA')
            {
                
                $message = 'Con le credenziali di cui si è provato a loggarsi non è possibile accedere come ' . $returnUrl . '. Rifare il login' ;
                Yii::$app->session->setFlash("errore",$message);
                //return $this->render('login', compact("model"));
            }
            else
            return $this->redirect($returnUrl);
        }

        return $this->render('login', compact("model"));
    }

    /**
     * Login/register via email
     */
 /*   public function actionLoginEmail()
    {
        /** @var \amnah\yii2\user\models\forms\LoginEmailForm $loginEmailForm */
   /*     $loginEmailForm = $this->module->model("LoginEmailForm");

        // load post data and validate
        $post = Yii::$app->request->post();
        if ($loginEmailForm->load($post) && $loginEmailForm->sendEmail()) {
            $user = $loginEmailForm->getUser();
            $message = $user ? "Login link sent" : "Registration link sent";
            $message .= " - Please check your email";
            Yii::$app->session->setFlash("Login-success", Yii::t("user", $message));
        }

        return $this->render("loginEmail", compact("loginEmailForm"));
    } */

    /**
     * Login/register callback via email
     */
 /*   public function actionLoginCallback($token)
    {
        
        /** @var \amnah\yii2\user\models\Profile $profile */
        
   /*     $user = $this->module->model("User");
        $profile = $this->module->model("Profile");
        $userToken = $this->module->model("UserToken");

        // check token and log user in directly
        /** @var \amnah\yii2\user\models\UserToken $userToken */
  /*      $userToken = $userToken::findByToken($token, $userToken::TYPE_EMAIL_LOGIN);
        if ($userToken && $userToken->user) {
            $returnUrl = $this->performLogin($userToken->user, $userToken->data);
            $userToken->delete();
            return $this->redirect($returnUrl);
        }

        // load post data
        $post = Yii::$app->request->post();
        $userLoaded = $user->load($post);
        $profileLoaded = $profile->load($post);
        if ($userToken && ($userLoaded || $profileLoaded)) {

            // ensure that email is taken from the $userToken (and not from user input)
            $user->email = $userToken->data;

            // validate and register
            if ($user->validate() && $profile->validate()) {
                $role = $this->module->model("Role");
                /** @var \amnah\yii2\user\models\Role $role */
                /** @var \amnah\yii2\user\models\User $user */
   /*             $user->setRegisterAttributes($role::ROLE_USER, $user::STATUS_ACTIVE)->save();
                $profile->setUser($user->id)->save();

                // log user in and delete token
                $returnUrl = $this->performLogin($user);
                $userToken->delete();
                return $this->redirect($returnUrl);
            }
        }

        $user->email = $userToken ? $userToken->data : null;
        return $this->render("loginCallback", compact("user", "profile", "userToken"));
    } */

    /**
     * Perform the login
     */
    protected function performLogin($user, $rememberMe = true)
    {
        
        $request = Yii::$app->request;
        $tipo = $request->get('tag');
        
        $pagina='';
          if($user->role_id == 1){
            $pagina='/user';
          }if ($user->role_id == 2){
            $pagina='/site/homeutente';
          }else if($user->role_id == 3){
            $pagina='/site/homelogopedista';
          }else if($user->role_id == 4){
            $pagina='/site/homecaregiver';
          }
          $returnUrl = $pagina;
          if (($tipo == 'utente' && $user->role_id <> 2) || ($tipo == 'caregiver' && $user->role_id <> 4) || ($tipo == 'logopedista' && $user->role_id <> 3))
          {  
            if ($tipo == 'utente' && $user->role_id <> 2) $tipol ="UTENTE";
            if (($tipo == 'caregiver' && $user->role_id <> 4)) $tipol ="CAREGIVER";
            if ($tipo == 'logopedista' && $user->role_id <> 3) $tipol ="LOGOPEDISTA";
            $returnUrl=$tipol;
  
            
          }
          else{
          // log user in
          $loginDuration = $rememberMe ? $this->module->loginDuration : 0;
          Yii::$app->user->login($user, $loginDuration);
          }

        // check for a valid returnUrl (to prevent a weird login bug)
        //   https://github.com/amnah/yii2-user/issues/115
      //  $loginRedirect = $this->module->loginRedirect;
        //echo $loginRedirect;
        //die();
      //  $returnUrl = Yii::$app->user->getReturnUrl($loginRedirect);
        
      //  if (strpos($returnUrl, "user/login") !== false || strpos($returnUrl, "user/logout") !== false) {
      //      $returnUrl = null;
      //  }

        return $returnUrl;
    }

    /**
     * Log user out and redirect
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        // handle redirect
        $logoutRedirect = $this->module->logoutRedirect;
        if ($logoutRedirect) {
            return $this->redirect($logoutRedirect);
        }
        return $this->goHome();
    }

    /**
     * Display registration page
     */
    public function actionRegister()
    {
        /** @var \amnah\yii2\user\models\User $user */
        /** @var \amnah\yii2\user\models\Profile $profile */
        

        // set up new user/profile objects
        $user = $this->module->model("User", ["scenario" => "register"]);
        $profile = $this->module->model("Profile");

        // load post data
        $post = Yii::$app->request->post();
       
        

        if ($user->load($post)) {
                
           
            // ensure profile data gets loaded
            $profile->load($post);
            
            // validate for ajax request
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($user, $profile);
            }
            
            // validate for normal request
            if ($user->validate() && $profile->validate()) {

                // perform registration
                $role = $this->module->model("Role");
                /** @var \amnah\yii2\user\models\Role $role */
                $user->setRegisterAttributes($role::ROLE_LOGOPEDISTA)->save(); // 3
                $profile->setUser($user->id)->save();
                $this->afterRegister($user);
                
                // set flash
                // don't use $this->refresh() because user may automatically be logged in and get 403 forbidden
                $successText = Yii::t("user", "Successfully registered [ {displayName} ]", ["displayName" => $user->getDisplayName()]);
                $guestText = "";
                if (Yii::$app->user->isGuest) {
                    $guestText = Yii::t("user", " - Please check your email to confirm your account");
                }
                Yii::$app->session->setFlash("Register-success", $successText . $guestText);
            }
        }

        return $this->render("register", compact("user", "profile","post"));
    }

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

    /**
     * Confirm email
     */
    public function actionConfirm($token)
    {
        
        /** @var \amnah\yii2\user\models\User $user */

        // search for userToken
        $success = false;
        $email = "";

        /** @var \amnah\yii2\user\models\UserToken $userToken */
        $userToken = $this->module->model("UserToken");
        $userToken = $userToken::findByToken($token, [$userToken::TYPE_EMAIL_ACTIVATE, $userToken::TYPE_EMAIL_CHANGE]);
        if ($userToken) {

            // find user and ensure that another user doesn't have that email
            //   for example, user registered another account before confirming change of email
            $user = $this->module->model("User");
            $user = $user::findOne($userToken->user_id);
            $newEmail = $userToken->data;
            if ($user->confirm($newEmail)) {
                $success = true;
            }

            // set email and delete token
            $email = $newEmail ?: $user->email;
            $userToken->delete();
        }

        return $this->render("confirm", compact("userToken", "success", "email"));
    }

    /**
     * Account
     */
    public function actionAccount()
    {
        

        // set up user and load post data
        $user = Yii::$app->user->identity;
        /** @var \amnah\yii2\user\models\User $user */
        $user->setScenario("account");
        $loadedPost = $user->load(Yii::$app->request->post());

        // validate for ajax request
        if ($loadedPost && Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($user);
        }

        // validate for normal request
        $userToken = $this->module->model("UserToken");
        if ($loadedPost && $user->validate()) {

            // check if user changed his email - ma per progetto l'email è la stessa
            $newEmail = $user->checkEmailChange();
            if ($newEmail) {
                 /** @var \amnah\yii2\user\models\UserToken $userToken */
                $userToken = $userToken::generate($user->id, $userToken::TYPE_EMAIL_CHANGE, $newEmail);
                if (!$numSent = $user->sendEmailConfirmation($userToken)) {

                    // handle email error
                    Yii::$app->session->setFlash("Email-error", "Failed to send email");
                }
            }

            // save, set flash, and refresh page
            $user->save(false);
            Yii::$app->session->setFlash("Account-success", Yii::t("user", "La password è stata cambiata"));
            return $this->refresh();
        } else {
            /** @var \amnah\yii2\user\models\UserToken $userToken */
            $userToken = $userToken::findByUser($user->id, $userToken::TYPE_EMAIL_CHANGE);
        }

        return $this->render("account", compact("user", "userToken"));
    }

    /**
     * Profile
     */
  /*  public function actionProfile()
    {
        /** @var \amnah\yii2\user\models\Profile $profile */

  /*      // set up profile and load post data
        $profile = Yii::$app->user->identity->profile;
        $loadedPost = $profile->load(Yii::$app->request->post());

        // validate for ajax request
        if ($loadedPost && Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($profile);
        }

        // validate for normal request
        if ($loadedPost && $profile->validate()) {
            $profile->save(false);
            Yii::$app->session->setFlash("Profile-success", Yii::t("user", "Profile updated"));
            return $this->refresh();
        }

        return $this->render("profile", compact("profile"));
    }
*/
    /**
     * Resend email confirmation
     */
  /*  public function actionResend()
    {
        /** @var \amnah\yii2\user\models\forms\ResendForm $model */

        // load post data and send email
  /*      $model = $this->module->model("ResendForm");
        if ($model->load(Yii::$app->request->post()) && $model->sendEmail()) {

            // set flash (which will show on the current page)
            Yii::$app->session->setFlash("Resend-success", Yii::t("user", "Conferma email rispedita"));
            return $this->refresh();
        }

        return $this->render("resend", compact("model"));
    } */

    /**
     * Resend email change confirmation
     */
 /*   public function actionResendChange()
    {
        /** @var \amnah\yii2\user\models\User $user */
       

        // find userToken of type email change
 /*       $user = Yii::$app->user->identity;
        $userToken = $this->module->model("UserToken");
         /** @var \amnah\yii2\user\models\UserToken $userToken */
 /*       $userToken = $userToken::findByUser($user->id, $userToken::TYPE_EMAIL_CHANGE);
        if ($userToken) {

            // send email and set flash message
            $user->sendEmailConfirmation($userToken);
            Yii::$app->session->setFlash("Resend-success", Yii::t("user", "Conferma email rispedita"));
        }

        return $this->redirect(["/user/account"]);
    }
 */
    /**
     * Cancel email change
     */
 /*   public function actionCancel()
    {
        /** @var \amnah\yii2\user\models\User $user */
        

        // find userToken of type email change
  /*     $user = Yii::$app->user->identity;
        $userToken = $this->module->model("UserToken");
        /** @var \amnah\yii2\user\models\UserToken $userToken */
 /*       $userToken = $userToken::findByUser($user->id, $userToken::TYPE_EMAIL_CHANGE);
        if ($userToken) {
            $userToken->delete();
            Yii::$app->session->setFlash("Cancel-success", Yii::t("user", "Email change cancelled"));
        }

        return $this->redirect(["/user/account"]);
    } */

    /**
     * Forgot password
     */
 /*   public function actionForgot()
    {
        /** @var \amnah\yii2\user\models\forms\ForgotForm $model */

        // load post data and send email
   /*     $model = $this->module->model("ForgotForm");
        if ($model->load(Yii::$app->request->post()) && $model->sendForgotEmail()) {

            // set flash (which will show on the current page)
            Yii::$app->session->setFlash("Forgot-success", Yii::t("user", "Instructions to reset your password have been sent"));
            return $this->refresh();
        }

        return $this->render("forgot", compact("model"));
    } */

    /**
     * Reset password
     */
  /*  public function actionReset($token)
    {
        /** @var \amnah\yii2\user\models\User $user */
        /** @var \amnah\yii2\user\models\UserToken $userToken */

        // get user token and check expiration
 /*       $userToken = $this->module->model("UserToken");
        $userToken = $userToken::findByToken($token, $userToken::TYPE_PASSWORD_RESET);
        if (!$userToken) {
            return $this->render('reset', ["invalidToken" => true]);
        }

        // get user and set "reset" scenario
        $success = false;
        $user = $this->module->model("User");
        $user = $user::findOne($userToken->user_id);
        $user->setScenario("reset");

        // load post data and reset user password
        if ($user->load(Yii::$app->request->post()) && $user->save()) {

            // delete userToken and set success = true
            $userToken->delete();
            $success = true;
        }

        return $this->render('reset', compact("user", "success"));
    } */
}

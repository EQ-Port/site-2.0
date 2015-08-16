<?php
namespace console\controllers;
 
use Yii;
use yii\console\Controller;
use common\rbac\GroupRule;
use yii\rbac\DbManager;

 /**
 * RBAC console controller.
 */
class RbacController extends Controller
{
    /**
     * Initial RBAC action
     * @param integer $id Superadmin ID
     */
    public function actionInit($id = null)
    {
        $auth = new DbManager;
        $auth->init();
 
        $auth->removeAll(); //удаляем старые данные
        // Rules
        $groupRule = new GroupRule();
 
        $auth->add($groupRule);
 
        // Roles
        $superadmin = $auth->createRole('administrator');
        $superadmin->description = 'administrator';
        $superadmin->ruleName = $groupRule->name;
        $auth->add($superadmin);

        $leading = $auth->createRole(' leading ');
        $leading ->description = 'leading ';
        $leading ->ruleName = $groupRule->name;
        $auth->add($leading);
		
        $article = $auth->createRole(' article ');
        $article ->description = 'article ';
        $article ->ruleName = $groupRule->name;
        $auth->add($article);
		
        $partner = $auth->createRole(' partner ');
        $partner ->description = 'partner ';
        $partner ->ruleName = $groupRule->name;
        $auth->add($partner);
		
        $user = $auth->createRole('user');
        $user->description = 'user';
        $user->ruleName = $groupRule->name;
        $auth->add($user);
 
        // Superadmin assignments
        if ($id !== null) {
            $auth->assign($superadmin, $id);
        }
    }
}
?>
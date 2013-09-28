<?php 
defined('C5_EXECUTE') or die("Access Denied.");

class DashboardJapaneseLangfileChangeController extends Controller
{

	public function view() {
		if($_REQUEST['change_language']){
			$this->change_language();
		}
	}
	
	public function change_language() {
		if (Loader::helper('validation/token')->validate('change_language')) {
			Loader::model('user_list');

			$ul = new UserList();
			$ul->filter('uDefaultLanguage','ja_JP.UTF8');
			$users = $ul->get();
			foreach($users as $user){
				$u = User::getByUserID($user->getUserID());
				$u->setUserDefaultLanguage('ja_JP');
			}

			$locale =  Config::get('SITE_LOCALE');
			if($locale == 'ja_JP.UTF8') {
				Config::save('SITE_LOCALE','ja_JP');
			}
			$this->set('save_change',true);
			$this->set('message', t('変更しました'));
		}
	}
}

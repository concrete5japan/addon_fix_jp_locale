<?php

defined('C5_EXECUTE') or die(_("Access Denied."));

class JapaneseLangfilePackage extends Package {

	protected $pkgHandle = 'japanese_langfile';
	protected $appVersionRequired = '5.6.2.1';
	protected $pkgVersion = '1.0';

	public function getPackageDescription() {
		return t('5.6.2.1以降日本語言語ファイル変更用パッケージ');
	}

	public function getPackageName() {
		return t('日本語言語ファイル変更');
	}

	public function install() {

		$pkg = parent::install();
		$this->installSinglePages($pkg);
	}

	public function uninstall() {

		parent::uninstall();
	}

	private function installSinglePages($pkg) {
		Loader::model('single_page');

		$def = SinglePage::add('/dashboard/japanese_langfile', $pkg);
		$def->update(array('cName' => t('日本語言語ファイル適用'), 'cDescription' => t('5.6.2.1以降のバージョンで日本語言語ファイルを適用します。')));

		$def = SinglePage::add('/dashboard/japanese_langfile/change', $pkg);
		$def->update(array('cName' => t('日本語言語ファイル適用'), 'cDescription' => t('5.6.2.1以降のバージョンで日本語言語ファイルを適用します。')));
	}
}

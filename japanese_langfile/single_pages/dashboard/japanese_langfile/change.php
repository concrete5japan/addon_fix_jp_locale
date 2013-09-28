<?php defined('C5_EXECUTE') or die("Access Denied.");?>

<?php echo Loader::helper('concrete/dashboard')->getDashboardPaneHeaderWrapper(t('言語ファイル適用'), false, 'span8 offset2', false)?>

<?php if (isset($save_change)){ ?>
	<div class="ccm-pane-body">
	</div>
<?php } else {?>
	<form method="post" class="form-horizontal" action="<?php echo $this->action('change_language')?>">
	<div class="ccm-pane-body">

		<div class="control-group">
			実行ボタンを押すと言語ファイルが適用されます。一度ログアウトし再度ログインしてください。
			また、アドオンの言語ファイルがja_JP.UTF8になっている場合は修正が必要ですのでご注意ください。
		</div>

		<?php echo Loader::helper('validation/token')->output('change_language')?>
	</div>
	<div class="ccm-pane-footer">
		<?php echo Loader::helper('concrete/interface')->submit('実行', 'save', 'right', 'primary')?>
	</div>
	</form>

<?php } ?>

<?php echo Loader::helper('concrete/dashboard')->getDashboardPaneFooterWrapper(false)?>

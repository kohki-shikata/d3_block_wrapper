<?php 
defined('C5_EXECUTE') or die("Access Denied.");

$c = Page::getCurrentPage();

if($c->isEditMode() OR $c->isAdminArea() OR strstr($_SERVER['REQUEST_URI'], 'edit_block_popup')){
	echo '<div style="height: 20px; width: 100%;" class="d3-block-wrapper-close">'.t('Close Wrapper (&lt;/article&gt;').'</div>';
} else {
	echo '</div>';
	echo '</article>';
}

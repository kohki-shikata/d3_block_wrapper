<?php 
defined('C5_EXECUTE') or die("Access Denied.");

$nh = Loader::helper('navigation');
$c = Page::getCurrentPage();

if(!empty($link_cID)){
	$link = $nh->getLinkToCollection(Page::getByID($link_cID), true);
	$css_classes = $css_classes . ' ut-clickable';
}

if($c->isEditMode() OR $c->isAdminArea() OR strstr($_SERVER['REQUEST_URI'], 'edit_block_popup')){
	echo '<div style="height: 20px; width: 100%;" class="d3-block-wrapper-open">'.t('Open Wrapper(&lt;nav&gt;)').'</div>';
} else {
	echo '<nav class="'.$css_classes.'" '.$html_attributes.' '.(isset($link) ? 'data-link="'.$link.'"' : '').'>';
	
	if(strlen($block_title) >0){
		echo '<header class="box-title">'.$block_title.'</header>';
	}
	
	echo '<div class="box-content">';
}

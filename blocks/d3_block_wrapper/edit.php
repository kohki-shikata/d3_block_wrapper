<?php 
defined('C5_EXECUTE') or die(_("Access Denied."));

$form   = Loader::helper('form');
$txt    = Loader::helper('text');
$ps     = Loader::helper('form/page_selector');
?>


<div class="control-group">
	<?php  echo $form->label('template', t('Select template')) ?>
	
	<div class="input">
		<select name="template">
			<?php
			foreach($this->controller->getTemplates() as $tpl) {
				$selected = '';
				if($tpl == $this->controller->getSelectedTemplate()){
					$selected = 'selected="selected"';
				}

				echo '<option value="'.$tpl.'" '.$selected.'>';

				if (strpos($tpl, '.') !== false) {
					echo substr($txt->unhandle($tpl), 0, strrpos($tpl, '.'));
				} else {
					echo $txt->unhandle($tpl);
				}

				echo '</option>';
			}
			?>
		</select>
	</div>
</div>

<?php
if($this->controller->getSelectedTemplate() != 'close.php'){
	?>
	<div class="control-group">
		<?php
		echo $form->label('block_title', t('Block Title (Optional)'));
		?>
		<div class="input">
			<?php
			echo $form->text('block_title', $block_title);
			?>
		</div>
	</div>

	<div class="control-group">
		<?php  
		echo $form->label('css_classes', t('Extra CSS classes'));
		?>
		<div class="input">
			<?php
			echo $form->text('css_classes', $css_classes);
			?>
		</div>
	</div>

	<div class="control-group">
		<?php  
		echo $form->label('html_attributes', t('Extra HTML attribute'));
		?>
		<div class="input">
			<?php
			echo $form->textarea('html_attributes', $html_attributes, array('rows' => '4'));
			?>
		</div>
	</div>

	<div class="control-group">
		<?php
		echo $form->label('link_cID', t('Link to page'));
		?>
		<div class="input">
			<?php
			echo $ps->selectPage('link_cID', $link_cID);
			?>
		</div>
	</div>
	<?php
}
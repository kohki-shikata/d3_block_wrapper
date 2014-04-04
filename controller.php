<?php
defined('C5_EXECUTE') or die(_("Access Denied."));

class D3BlockWrapperPackage extends Package {

	protected $pkgHandle = 'd3_block_wrapper';
	protected $appVersionRequired = '5.6.0';
	protected $pkgVersion = '1.2.1';
	
	public function getPackageDescription() {
		return t("Installs a block called 'Block Wrapper'");
	}
	
	public function getPackageName() {
		return t("Block Wrapper");
	} 
	
	public function install() {
		$pkg = parent::install();
		
		// install block
		BlockType::installBlockTypeFromPackage('d3_block_wrapper', $pkg);
	}
}
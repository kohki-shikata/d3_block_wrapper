<?php
defined('C5_EXECUTE') or die("Access Denied.");

class D3BlockWrapperBlockController extends BlockController {
	
	protected $btTable             = 'btD3BlockWrapper';
	protected $btInterfaceWidth    = "370";
	protected $btInterfaceHeight   = "250";
	protected $btWrapperClass = 'ccm-ui';
	
	protected $btCacheBlockRecord = true;
	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = false;
	protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;
	
	public function getBlockTypeDescription() {
		return t('Meant to wrap blocks in an HTML-element');
	}
	
	public function getBlockTypeName() {
		return t('Block Wrapper');
	}
	
	
	public function view(){
		$this->set('block_title', $this->block_title);
		$this->set('css_classes', $this->css_classes);
	}
	
	public function edit(){
		$this->set('block_title', $this->block_title);
		$this->set('css_classes', $this->css_classes);
	}
	
	public function save($data){
	   parent::save($data);
        
        if(isset($data['template'])) {
            $b = Block::getById($this->bID);
            $b->setCustomTemplate($data['template']);
        }
	}
	
    public function getTemplates(){ 
        $bt         = BlockType::getByHandle('d3_block_wrapper');
        $templates  = $bt->getBlockTypeCustomTemplates();
        return $templates;
    }
    
    public function getSelectedTemplate(){
        $blockObject = $this->getBlockObject();
			
        if (is_object($blockObject)) {
			//a template has been selected before
            return $blockObject->getBlockFilename();
        } else {
			//select the 'close' wrapper if there are unclosed wrappers
			
			//are we adding a block to a stack?
			if(strstr($_SERVER['REQUEST_URI'], 'add_block_popup') && isset($_GET['cID'])){
				if(ctype_digit($_GET['cID'])){
					$s = Stack::getByID($_GET['cID']);
					if($s){	
						$blocks = $s->getBlocks(STACKS_AREA_NAME);

						$openers = 0;
						$closers = 0;
						foreach($blocks as $block) {
							if (is_object($block)) {
					            if(strstr($block->getBlockFilename(), 'open')){
									$openers += 1;
								} elseif(strstr($block->getBlockFilename(), 'close')){
									$closers += 1;
								}
							}
						}

						if($closers < $openers){
							return 'close.php';
						}
					}
				}
			}
			
            return 'open.php';
        }
    }
}
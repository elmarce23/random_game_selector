<?php 

require_once 'models/platforms.php';

class platfomrsController{
	public $page_title;
	public $view;
    public $platfObj;

	public function __construct() {
		$this->view = 'list_platf';
		$this->page_title = '';
		$this->platfObj = new Platfomrs();
	}

	/* List all notes */
	public function list(){
		$this->page_title = 'Listado de notas';
		return $this->platfObj->getAll();
	}

}

?>
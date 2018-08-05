<?php

jimport('joomla.plugin.plugin');

class plgAPIEvents extends ApiPlugin {

	public function __construct(&$subject, $config = array()) {
		
		parent::__construct($subject, $config = array());

		ApiResource::addIncludePath(dirname(__FILE__).'/resource');
		
		$lang = JFactory::getLanguage(); 
		$lang->load('com_users', JPATH_ADMINISTRATOR, '', true);
		
		//Questo va eliminato una volta messo in funzione sul sito
		$this->setResourceAccess('latest', 'public', 'get');
		$this->setResourceAccess('category', 'public', 'get');
		$this->setResourceAccess('categorylist', 'public', 'get');
		$this->setResourceAccess('all', 'public', 'get');
	}
}

?>
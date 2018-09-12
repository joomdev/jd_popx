<?php
/**
 * @package JDPopX
 * @author JoomDev https://www.joomdev.com/
 * @copyright Copyright (C) 2008 - 2018 JoomDev.com. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/

defined('_JEXEC') or die;
if(!include_once(rtrim(JPATH_ADMINISTRATOR,DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'com_jdpopx'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.'settings.php')){
	echo 'The plugin can not work without JDPopX Component.';
	return false;
}
class PlgSystemJdpopx extends JPlugin
{

	public function __construct(&$subject, $config)
	{
		parent::__construct($subject, $config);
	}
	 public function onAfterInitialise(){
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
			$ispopx = JFactory::getApplication()->input->get('ispopx');
			$popxemail = JFactory::getApplication()->input->get('popx_email');
			if(isset($ispopx) &&  $ispopx == 1){
				if(!JSession::checkToken()){
					echo json_encode(array('message'=> JText::_('Invalid Token'),'success'=>false));
					exit;
				}
				$popxdata['name'] = JFactory::getApplication()->input->get('popx_name');
				$popxdata['email'] = JFactory::getApplication()->input->get('popx_email','','');
				$popxresponse = JdpopxControllerSettings::doSubscribe($popxdata);
				echo json_encode($popxresponse);
				exit;
			 }
		}
	 } 
	 
	 /*
	 *	Adding Necessary CSS & Scripts to the Head
	 */
	 public function onBeforeCompileHead(){
		// Check that we are in the site application.
		if (JFactory::getApplication()->isClient('administrator'))
		{
			return true;
		}
		$doc = JFactory::getDocument();
		$doc->addStyleSheet('media/com_jdpopx/css/jdpopx.css');
		$doc->addScript('media/com_jdpopx/js/jquery.buttonLoader.js');
		$doc->addScript('media/com_jdpopx/js/jquery.validate.js');
		$doc->addScript('media/com_jdpopx/js/jdpopx.js');
	 }
	 
	public function onAfterRender()
	{
		// Check that we are in the site application.
		if (JFactory::getApplication()->isClient('administrator'))
		{
			return true;
		}
		
		$lang = JFactory::getLanguage();
		$lang->load("com_jdpopx");

		$buffer = JFactory::getApplication()->getBody();
		$popx = new JdpopxControllerSettings;	
		$html = $popx->getPopx();		 
		$buffer= str_ireplace('</body>',$html.'</body>',$buffer);
		JFactory::getApplication()->setBody($buffer);	
		return true;
	}
}
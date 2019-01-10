<?php
/**
 * @package JDPopX
 * @author JoomDev https://www.joomdev.com/
 * @copyright Copyright (C) 2008 - 2018 JoomDev.com. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Setting controller class.
 *
 * @since  1.6
 */
 
require_once(rtrim(JPATH_ADMINISTRATOR,DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.'components'.DIRECTORY_SEPARATOR.'com_acym'.DIRECTORY_SEPARATOR.'helpers'.DIRECTORY_SEPARATOR.'helper.php');
class JdpopxControllerSettings extends JControllerForm
{
	/**
	 * Constructor
	 *
	 * @throws Exception
	 */
	public function __construct()
	{
		$this->view_list = 'settings';
		parent::__construct();
	}
	
	public function getModel($name = 'settings', $prefix = 'JdpopxModel', $config = array())
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
	
	function save_data(){
		$jinput 					= JFactory::getApplication()->input;
		$app 						= JFactory::getApplication();
		$data  						= array();
		$data['effect']				= $jinput->getString('effect');
		$data['after_subscribe'] 	= $jinput->get('after_subscribe');
		$data['url'] 				= $jinput->get('url','',null);
		$data['time_delay'] 		= $jinput->get('time_delay');		
		$data['cookie_time'] 		= $jinput->get('cookie_time');		
		$data['listid'] 			= $jinput->get('listid');		
		$option_type  		 		= $jinput->get('option_type');
		$data['option_type']		= $option_type;
		// set form data
		$app->setUserState("formdata",$data);
		if(!empty($option_type)){
			
			$templatedata			= $jinput->get($option_type, null, null);  
			$tmpl 					= $jinput->get('subtmpl_'.$option_type);
			$selecttmpl   			= 'template'.$tmpl;	
			$tmpldata 	  			= $templatedata[$selecttmpl];
			$tmpldata['tmpl'] 	  	= $tmpl;
			if(!isset($tmpldata['input_fields'])){
			 	$tmpldata['input_fields'][] = 'email';
			}	
			// set tmpldata data
			$app->setUserState("tmpldata",$tmpldata);
			
			$files = $jinput->files->get($option_type);	
			if(isset($files[$selecttmpl]['image']['name']) && !empty($files[$selecttmpl]['image']['name'])){
				$tmpldata['image']		= $this->uploadImage($option_type,$selecttmpl);	
			}else{
				
				$tmpldata['image']		= isset($tmpldata['old_image']) ? $tmpldata['old_image'] : '';
			}
			
			unset($tmpldata['old_image']);
			
			$data['tmpl'] 			= $tmpl;
			$data[$option_type] 	= json_encode($tmpldata); 
		}
		
		
		$model 	   					= $this->getModel('settings');
		
		$response = $model->saveData($data);
		$app->setUserState("tmpldata",array());
		$app->setUserState("formdata",array());
		if($response){
			JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_jdpopx', false),JText::_('COM_JDPOPX_FORM_SUCCESS_MSG'), 'success');
		}else{
			JFactory::getApplication()->redirect(JRoute::_('index.php?option=com_jdpopx', false),JText::_('COM_JDPOPX_FORM_ERROR_MSG'), 'error');
		} 
	}
	
	function uploadImage($type = null,$tmpl = null, $oldimg = null){
		jimport('joomla.filesystem.file');
		$input = JFactory::getApplication()->input;
		$files = $input->files->get($type);
		
		$safename = JFile::makeSafe($files[$tmpl]['image']['name']);
		$filename = time().'_'.$safename;
		$src = $files[$tmpl]['image']['tmp_name'];
		$dest = JPATH_ROOT."/media/com_jdpopx/uploads/".$filename;
		
		if (strtolower(JFile::getExt($filename)) == 'jpg' || strtolower(JFile::getExt($filename)) == 'jpeg' || strtolower(JFile::getExt($filename)) == 'png' || strtolower(JFile::getExt($filename)) == 'gif') 
		{
		  if (JFile::upload($src, $dest))
		   {
			 if($oldimg){
				 $deletPath = JPATH_ROOT."/media/com_jdpopx/uploads/".$oldimg;
				 //JFile::delete($deletPath);
			 }  
			 return $filename;
		   } 
		   else
		   {			  
			  JFactory::getApplication()->redirect('index.php?option=com_jdpopx',JText::_('COM_JDPOPX_ERROR_UNABLE_TO_UPLOAD_FILE'),'error');
		   }
		}
		else
		{
			
		   JFactory::getApplication()->redirect('index.php?option=com_jdpopx',JText::_('COM_JDPOPX_IMAGE_EXTENSION_ERROR_MSG'),'error');
		}		
	}
	
	
	public function getPopx(){
		JdpopxControllerSettings::loadLang();
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);	
		$query->clear()
				->select('*')
				->from($db->quoteName('#__jdpopx_setting'));
		$db->setQuery($query);

		try
		{
			$rows = $db->loadObject();
		}
		catch (RuntimeException $e)
		{
			$rows = array(); 
		}
		
		$tmpl 			= (isset($rows->tmpl) && !empty($rows->tmpl)) ? '_template'.$rows->tmpl : '_template1';
		$option_type 	= (isset($rows->option_type) && !empty($rows->option_type)) ? $rows->option_type : 'light_box';
		$template 		= $option_type.$tmpl;
		$layout = new JLayoutFile($template,$basePath = JPATH_ROOT .'/administrator/components/com_jdpopx/layouts');
		$html = $layout->render($rows);
		return $html;
	}
	
	public static function doSubscribe($data =  array()){
		JdpopxControllerSettings::loadLang(); 
		if(isset($data['email']) && !empty($data['email'])){
			if(!JdpopxControllerSettings::isSubscribe($data['email'])){
				$emailOrUserID 	 = $data['email'];
				$subscriberClass = acym_get('class.user');
				
				$subid 			 = $subscriberClass->getOneByEmail($emailOrUserID);
				
				if(!$subid){
					$myUser = new stdClass();
					$myUser->email = $data['email']; 
					$myUser->name = (isset($data['name'])) ? $data['name'] : '';
					$subid = $subscriberClass->save($myUser);
				}
				
				$listId	 = JdpopxControllerSettings::getDefaultList();

				$subscription = new stdClass();
				$subscription->user_id = $subid;
				$subscription->list_id = $listId;
				$subscription->status = 1;
				$subscription->subscription_date = date("Y-m-d H:i:s", time());

				$is_subscribe = JFactory::getDbo()->insertObject('#__acym_user_has_list', $subscription);

				if($is_subscribe){
					$response['message'] =  JText::_('COM_JDPOPX_SUBSCRIPTION_OK');
					$response['success'] = true;
					return $response;	
				}else{
					$response['message'] =  JText::_('COM_JDPOPX_EMAIL_ALREADY');
					$response['success'] = false;
					return $response;
				}
			}else{
				$response['message'] =  JText::_('COM_JDPOPX_EMAIL_ALREADY');
				$response['success'] = false;
				return $response;
			}
			
			
		}else{
			$response['message'] =  JText::_('COM_JDPOPX_INVALID_EMAIL');
			$response['success'] = false;
			return $response;
		}
	}
	
	public static function loadLang(){
		$lang = JFactory::getLanguage();
		$extension = 'com_jdpopx';
		$base_dir = JPATH_ADMINISTRATOR;
		$language_tag = 'en-GB';
		$reload = true;
		$lang->load($extension, $base_dir, $language_tag, $reload);
	}
	
	// get acy mailing list
	public static function getDefaultList()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('listid');
		$query->from($db->quoteName('#__jdpopx_setting'));
		$db->setQuery($query);
		$results = $db->loadObject();
		return (isset($results->listid)) ? $results->listid : '';
	} 
	
	public static function isSubscribe($email)
	{
		
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('id');
		$query->from($db->quoteName('#__acym_user'));
		$query->where("email = '".$email."'");
		$db->setQuery($query);
		$results = $db->loadObject();
		return (isset($results->id)) ? $results->id : false;
	} 

}

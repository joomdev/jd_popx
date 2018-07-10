<?php
/**
 * @package JDPopX
 * @version - 1.0
 * @author JoomDev https://www.joomdev.com/
 * @copyright Copyright (C) 2008 - 2018 JoomDev.com. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.modeladmin');

/**
 * Jdpopx model.
 *
 * @since  1.6
 */
class JdpopxModelSettings extends JModelList
{
	/**
	 * @var      string    The prefix to use with controller messages.
	 * @since    1.6
	 */
	protected $text_prefix = 'COM_JDPOPX'; 
	public function saveData($data = array())
	{
		if(!empty($data)){
			
			// delete old record
			$db = JFactory::getDBO();
			$query = $db->getQuery(true);
			$query->delete($db->quoteName('#__jdpopx_setting'));
			$db->setQuery($query);
			$db->execute();
			$db->clear();
			
			// inset new records
			foreach($data as $k=>$val){
				$columns[] = $k;
				$values[] = $db->quote($val);
			}
			$query = $db->getQuery(true);
			$query->insert($db->quoteName('#__jdpopx_setting'));
			$query->columns($db->quoteName($columns));
			$query->values(implode(',', $values)); 
			$db->setQuery($query);
			$response = $db->execute();
			return $response;
		}else{
			return false;
		}	
	}
	
	public function getSettingData()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('*');
		$query->from($db->quoteName('#__jdpopx_setting'));
		$db->setQuery($query);
		$results = $db->loadObject();
		return $results;
	} 
	
	// get acy mailing list
	public function getAcyMailinList()
	{
		$db = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('listid,name');
		$query->from($db->quoteName('#__acymailing_list'));
		$query->where('published = 1');
		$db->setQuery($query);
		$results = $db->loadObjectList();
		return $results;
	}	
}
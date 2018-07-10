<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Jdpopx
 * @author     JoomDev
 * @copyright  Copyright (C) 2008 - 2018 JoomDev.com. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_jdpopx'))
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Jdpopx', JPATH_COMPONENT_ADMINISTRATOR);
JLoader::register('JdpopxHelper', JPATH_COMPONENT_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'jdpopx.php');

$controller = JControllerLegacy::getInstance('Jdpopx');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();

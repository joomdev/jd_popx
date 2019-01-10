<?php
/**
 * @package JDPopX
 * @version - 1.4
 * @author JoomDev https://www.joomdev.com/
 * @copyright Copyright (C) 2008 - 2018 JoomDev.com. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
//no direct accees
defined ('_JEXEC') or die ('resticted aceess');

class plgSystemCom_jdpopxInstallerScript {
    
    public function preflight($parent)
	{
		 if(!is_dir(JPATH_ADMINISTRATOR.'/components/com_acym')){
			  JFactory::getApplication()->enqueueMessage('Cannot install com_jdpopx in a Joomla without com_acymailing. please install com_acymailing first.'); 
			return false;
		 } 
	}
    
    function postflight($type, $parent) {
        $db = JFactory::getDBO();
        $status = new stdClass;
        $status->plugins = array();

        $src = $parent->getParent()->getPath('source');
        $manifest = $parent->getParent()->manifest;
        $plugins = $manifest->xpath('plugins/plugin');

        foreach ($plugins as $key => $plugin) {
            $name = (string)$plugin->attributes()->plugin;
            $group = (string)$plugin->attributes()->group;
            $path = $src.'/plugins/'.$group;

            if (JFolder::exists($src.'/plugins/'.$group.'/'.$name))
            {
                $path = $src.'/plugins/'.$group.'/'.$name;
            }

            $installer = new JInstaller;
            $result = $installer->install($path);

            if ($result) {
                $query = "UPDATE #__extensions SET enabled=1 WHERE type='plugin' AND element=".$db->Quote($name)." AND folder=".$db->Quote($group);
                $db->setQuery($query);
                $db->query();
            }
        }

        $component_path = $src.'/component';

        if (JFolder::exists( $component_path )) {
            $installer = new JInstaller;
            $installer->install($component_path);
        }

        $conf = JFactory::getConfig();
        $conf->set('debug', false);
        $parent->getParent()->abort();
    }

    public function abort($msg = null, $type = null){
        if ($msg) { 
			JFactory::getApplication()->enqueueMessage($msg); 
        }
        foreach ($this->packages as $package) {
            $package['installer']->abort(null, $type);
        }
    }
}
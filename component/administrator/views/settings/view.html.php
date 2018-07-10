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

jimport('joomla.application.component.view');

/**
 * View to edit
 *
 * @since  1.6
 */
class JdpopxViewSettings extends JViewLegacy
{
	protected $state;	

	protected $item;

	protected $form;
	 
	/**
	 * Display the view
	 *
	 * @param   string  $tpl  Template name
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	public function display($tpl = null)
	{
		
		 
		
		$templdata 			= JFactory::getApplication()->getUserState("tmpldata");
		$formdata 			= JFactory::getApplication()->getUserState("formdata"); 
		
		$this->SettingData  = $this->get('SettingData');
		$this->acymailinlist  = $this->get('AcyMailinList');
		
		if(isset($formdata) && !empty($formdata)){
			$option_type  		= (isset($formdata['option_type']) && !empty($formdata['option_type'])) ? $formdata['option_type'] : '';
			$optionData 		=  new StdClass;
		}else{
			$option_type  		= (isset($this->SettingData->option_type)) ? $this->SettingData->option_type : 'full_screen';
			$optionData 		= (isset($this->SettingData->$option_type) && !empty($this->SettingData->$option_type)) ? json_decode($this->SettingData->$option_type) : new StdClass; 	
		}
		
		$this->$option_type = new StdClass; 
		
		if((isset($this->SettingData->tmpl) && $this->SettingData->tmpl == 1) || (isset($templdata['tmpl']) && !empty($templdata['tmpl']))){
			if(isset($templdata) && !empty($templdata)){				
				$this->$option_type->tmpl 			= (isset($templdata['tmpl'])) ? $templdata['tmpl'] : '';
				$this->$option_type->input_fields 	= (isset($templdata['input_fields'])) ? implode(',',$templdata['input_fields']) : '';
				$this->$option_type->bg_color 		= (isset($templdata['bg_color'])) ? $templdata['bg_color'] : '';
				$this->$option_type->heading 		= (isset($templdata['heading'])) ? $templdata['heading'] : '';
				$this->$option_type->description 	= (isset($templdata['description'])) ? $templdata['description'] : '';
				$this->$option_type->button_text 	= (isset($templdata['button_text'])) ? $templdata['button_text'] : '';
				$this->$option_type->button_color 	= (isset($templdata['button_color'])) ? $templdata['button_color'] : '';
				$this->$option_type->bottom_line 	= (isset($templdata['bottom_line'])) ? $templdata['bottom_line'] : '';
				$this->$option_type->border_color 	= (isset($templdata['border_color'])) ? $templdata['border_color'] : '';
				$this->$option_type->position 		= (isset($templdata['position'])) ? $templdata['position'] : '';
				$this->$option_type->align 			= (isset($templdata['align'])) ? $templdata['align'] : '';
				$this->$option_type->primary_bg_color = (isset($templdata['primary_bg_color'])) ? $templdata['primary_bg_color'] : '';
				$this->$option_type->secondary_bg_color = (isset($templdata['secondary_bg_color'])) ? $templdata['secondary_bg_color'] : '';
				$this->$option_type->heading_bg_color = (isset($templdata['heading_bg_color'])) ? $templdata['heading_bg_color'] : '';
			}else{
				$this->$option_type->tmpl 			= (isset($this->SettingData->tmpl)) ? $this->SettingData->tmpl : '';
				$this->$option_type->input_fields 	= (isset($optionData->input_fields)) ? implode(',',$optionData->input_fields) : '';
				$this->$option_type->bg_color 		= (isset($optionData->bg_color)) ? $optionData->bg_color : '';
				$this->$option_type->heading 		= (isset($optionData->heading)) ? $optionData->heading : '';
				$this->$option_type->description 	= (isset($optionData->description)) ? $optionData->description : '';
				$this->$option_type->button_text 	= (isset($optionData->button_text)) ? $optionData->button_text : '';
				$this->$option_type->button_color 	= (isset($optionData->button_color)) ? $optionData->button_color : '';
				$this->$option_type->bottom_line 	= (isset($optionData->bottom_line)) ? $optionData->bottom_line : '';
				$this->$option_type->border_color 	= (isset($optionData->border_color)) ? $optionData->border_color : '';
				$this->$option_type->position 		= (isset($optionData->position)) ? $optionData->position : '';
				$this->$option_type->align 			= (isset($optionData->align)) ? $optionData->align : '';
				$this->$option_type->primary_bg_color = (isset($optionData->primary_bg_color)) ? $optionData->primary_bg_color : '';
				$this->$option_type->secondary_bg_color = (isset($optionData->secondary_bg_color)) ? $optionData->secondary_bg_color : '';
				$this->$option_type->heading_bg_color = (isset($optionData->heading_bg_color)) ? $optionData->heading_bg_color : '';
				$this->$option_type->image 			= (isset($optionData->image)) ? $optionData->image : '';
			}	
			
		}else{
			 
			if(isset($templdata) && !empty($templdata)){				
				$this->$option_type->tmpl 			= (isset($templdata['tmpl'])) ? $templdata['tmpl'] : '';
				$this->$option_type->input_fields2 	= (isset($templdata['input_fields'])) ? implode(',',$templdata['input_fields']) : '';
				$this->$option_type->bg_color2 		= (isset($templdata['bg_color'])) ? $templdata['bg_color'] : '';
				$this->$option_type->heading2 		= (isset($templdata['heading'])) ? $templdata['heading'] : '';
				$this->$option_type->description2 	= (isset($templdata['description'])) ? $templdata['description'] : '';
				$this->$option_type->button_text2 	= (isset($templdata['button_text'])) ? $templdata['button_text'] : '';
				$this->$option_type->button_color2 	= (isset($templdata['button_color'])) ? $templdata['button_color'] : '';
				$this->$option_type->bottom_line2 	= (isset($templdata['bottom_line'])) ? $templdata['bottom_line'] : '';
				$this->$option_type->border_color2 	= (isset($templdata['border_color'])) ? $templdata['border_color'] : '';
				$this->$option_type->position2		= (isset($templdata['position'])) ? $templdata['position'] : '';
				$this->$option_type->align2 			= (isset($templdata['align'])) ? $templdata['align'] : '';
				$this->$option_type->primary_bg_color2 = (isset($templdata['primary_bg_color'])) ? $templdata['primary_bg_color'] : '';
				$this->$option_type->secondary_bg_color2 = (isset($templdata['secondary_bg_color'])) ? $templdata['secondary_bg_color'] : '';
				$this->$option_type->heading_bg_color2 = (isset($templdata['heading_bg_color'])) ? $templdata['heading_bg_color'] : '';
			}else{
				$this->$option_type->tmpl 			= (isset($this->SettingData->tmpl)) ? $this->SettingData->tmpl : '';
				$this->$option_type->input_fields2 	= (isset($optionData->input_fields)) ? implode(',',$optionData->input_fields) : '';
				$this->$option_type->bg_color2 		= (isset($optionData->bg_color)) ? $optionData->bg_color : '';
				$this->$option_type->heading2 		= (isset($optionData->heading)) ? $optionData->heading : '';
				$this->$option_type->description2 	= (isset($optionData->description)) ? $optionData->description : '';
				$this->$option_type->button_text2 	= (isset($optionData->button_text)) ? $optionData->button_text : '';
				$this->$option_type->button_color2 	= (isset($optionData->button_color)) ? $optionData->button_color : '';
				$this->$option_type->bottom_line2 	= (isset($optionData->bottom_line)) ? $optionData->bottom_line : '';
				$this->$option_type->border_color2 	= (isset($optionData->border_color)) ? $optionData->border_color : '';
				$this->$option_type->position2 		= (isset($optionData->position)) ? $optionData->position : '';
				$this->$option_type->align2 		= (isset($optionData->align)) ? $optionData->align : '';
				$this->$option_type->primary_bg_color2 = (isset($optionData->primary_bg_color)) ? $optionData->primary_bg_color : '';
				$this->$option_type->secondary_bg_color2 = (isset($optionData->secondary_bg_color)) ? $optionData->secondary_bg_color : '';
				$this->$option_type->heading_bg_color2 = (isset($optionData->heading_bg_color)) ? $optionData->heading_bg_color : '';
				$this->$option_type->image2 			= (isset($optionData->image)) ? $optionData->image : '';
			}
		} 
		
		if(isset($formdata) && !empty($formdata)){
			$this->SettingData = new StdClass; 
			$this->SettingData->option_type  	= (isset($formdata['option_type']) && !empty($formdata['option_type'])) ? $formdata['option_type'] : '';
			$this->SettingData->effect  		= (isset($formdata['effect']) && !empty($formdata['effect'])) ? $formdata['effect'] : '';
			$this->SettingData->after_subscribe = (isset($formdata['after_subscribe']) && !empty($formdata['after_subscribe'])) ? $formdata['after_subscribe'] : '';
			$this->SettingData->time_delay  	= (isset($formdata['time_delay']) && !empty($formdata['time_delay'])) ? $formdata['time_delay'] : ''; 
		}

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors));
		}
		
		JdpopxHelper::addSubmenu('settings');
		$this->addToolbar();
		$this->sidebar = JHtmlSidebar::render();
		
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return void
	 *
	 * @throws Exception
	 */
	protected function addToolbar()
	{
		JToolBarHelper::title(JText::_('COM_JDPOPX_TITLE_SETTINGS'), 'setting.png');
		JToolBarHelper::apply('settings.save_data', 'JTOOLBAR_APPLY'); 
		JToolBarHelper::back(JText::_('COM_JDPOPX_SETTINGS_CONTROL_PANEL'),Juri::base());
		
		// Set sidebar action - New in 3.0
		JHtmlSidebar::setAction('index.php?option=com_jdpopx&view=settings');
	}
}
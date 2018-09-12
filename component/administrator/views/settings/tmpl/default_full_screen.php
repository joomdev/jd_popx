<?php
/**
 * @package JDPopX
 * @author JoomDev https://www.joomdev.com/
 * @copyright Copyright (C) 2008 - 2018 JoomDev.com. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
// No direct access
defined('_JEXEC') or die;
?>
<div class="controls">
	<ul id="full_screen_template" class="option_type_sub">
		 <li data-id="full_screen1" data-tmpl="1" <?php echo (isset($this->full_screen->tmpl) && $this->full_screen->tmpl == 1) ? 'class="active"': ''; ?>>
			<label  for="full_screen_template1">
				<img src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/full_screen1.jpg" />
			</label>
		 </li>
		 <li data-id="full_screen2" data-tmpl="2" <?php echo (isset($this->full_screen->tmpl) && $this->full_screen->tmpl == 2) ? 'class="active"': ''; ?>>
			<label for="full_screen_template2">
				<img src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/full_screen2.jpg" />
			</label> 
		 </li>  
		 <input type="hidden" name="subtmpl_full_screen" value="<?php echo (isset($this->full_screen->tmpl)) ? $this->full_screen->tmpl : 1; ?>" />
	</ul> 
	<div class="full_sid_tmpl subtmpl" id="full_screen1" <?php echo (isset($this->full_screen->tmpl) && $this->full_screen->tmpl == 1) ? 'style="display:block"' : ''; ?>>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_input_fields-lbl" for="jform_input_fields" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS'); ?> 
				</label>
			</div>
			<div class="controls">
				<?php $inputs = (isset($this->full_screen->input_fields) && !empty($this->full_screen->input_fields)) ? explode(',',$this->full_screen->input_fields) : array('name','email'); ?>
				<input <?php echo (in_array('name',$inputs)) ? 'checked="checked"' : '';  ?> type="checkbox" name="full_screen[template1][input_fields][]" value="name" id="full_screen_template1_name"><?php echo JText::_('COM_JDPOPX_FORM_NAME'); ?> 
				<input checked="checked" disabled="disabled" type="checkbox" name="full_screen[template1][input_fields][]" value="email" id="full_screen_template1_email"><?php echo JText::_('COM_JDPOPX_FORM_EMAIL'); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_full_screen_tmpl_image-lbl" for="jform_full_screen_tmpl_image" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_IMAGE_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_IMAGE'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_IMAGE'); ?> 
				</label>
			</div>
			<div class="controls">
				<input type="file" name="full_screen[template1][image]" id="jform_full_screen_tmpl_image" />
				<input type="hidden" name="full_screen[template1][old_image]" value="<?php echo (isset($this->full_screen->image)) ? $this->full_screen->image : ''; ?>" />
				
				<?php if(isset($this->full_screen->image) && !empty($this->full_screen->image)){ ?>
					<img class="popximageadmin" src="<?php echo juri::root(); ?>media/com_jdpopx/uploads/<?php echo $this->full_screen->image; ?>" />
				<?php }else{ ?>
					<img class="popximageadmin" src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/fullscreen_man_11635.png" />
					
				<?php } ?>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_full_screen_image-lbl" for="jform_full_screen_bg_color" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_BG_COLOR_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_BG_COLOR'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_BG_COLOR'); ?> 
				</label>
			</div>
			<div class="controls">
				<input type="text" name="full_screen[template1][bg_color]" id="jform_full_screen_bg_color" class="minicolors" value="<?php echo (isset($this->full_screen->bg_color)) ? $this->full_screen->bg_color : JText::_('COM_JDPOPX_FULL_SCREEN_FORM_BG_COLOR_VALUE'); ?>" />
				
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_heading-lbl" for="jform_full_screen_heading" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING'); ?> 
				</label>
			</div>
			<div class="controls">
			<input type="text" name="full_screen[template1][heading]" id="jform_full_screen_heading" value="<?php echo (isset($this->full_screen->heading)) ? $this->full_screen->heading : 'Hold On'; ?>" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_full_screen_description-lbl" for="jform_full_screen_description" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_LB_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_DESC'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_DESC'); ?> 
				</label>
			</div>
			<div class="controls">
			<input type="text" name="full_screen[template1][description]" value="<?php echo (isset($this->full_screen->description)) ? $this->full_screen->description : 'Get 10 % Discount Immediately'; ?>" />
			</div>
		</div>	
		<div class="control-group">
			<div class="control-label">
				<label id="jform_full_screen_button_text-lbl" for="jform_full_screen_button_text" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT'); ?> 
				</label>
			</div>
			<div class="controls">
			<input type="text" name="full_screen[template1][button_text]" id="jform_full_screen_button_text" value="<?php echo (isset($this->full_screen->button_text)) ? $this->full_screen->button_text : 'Submit'; ?>" />
			</div>
		</div>	
		<div class="control-group">
			<div class="control-label">
				<label id="jform_full_screen_button_color-lbl" for="jform_full_screen_button_color" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR'); ?> 
				</label>
			</div>
			<div class="controls">
				<input type="text" name="full_screen[template1][button_color]" class="minicolors" id="jform_full_screen_button_color" value="<?php echo (isset($this->full_screen->button_color)) ? $this->full_screen->button_color : JText::_('COM_JDPOPX_FULL_SCREEN_FORM_CHANGE_BUTTON_COLOR'); ?>" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_full_screen_bottom_line-lbl" for="jform_full_screen_bottom_line" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BOTTON_LINE_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BOTTON_LINE'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BOTTON_LINE'); ?> 
				</label>
			</div>
			<div class="controls">
				<input type="text" name="full_screen[template1][bottom_line]" id="jform_full_screen_bottom_line" value="<?php echo (isset($this->full_screen->bottom_line)) ? $this->full_screen->bottom_line : 'We never spam your inbox'; ?>" />
			</div>
		</div>		
	</div>
	<div class="full_sid_tmpl subtmpl" id="full_screen2" <?php echo (isset($this->full_screen->tmpl) && $this->full_screen->tmpl == 2) ? 'style="display:block"' : ''; ?>>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_full_screen2_effect-lbl" for="jform_input_fields" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS'); ?> 
				</label>
			</div>
			<div class="controls">
				<?php $inputs2 = (isset($this->full_screen->input_fields2) && !empty($this->full_screen->input_fields2)) ? explode(',',$this->full_screen->input_fields2) : array('name','email'); ?>
				<input <?php echo (in_array('name',$inputs2)) ? 'checked="checked"' : '';  ?> type="checkbox" name="full_screen[template2][input_fields][]" value="name" id="full_screen_template2_name"><?php echo JText::_('COM_JDPOPX_FORM_NAME'); ?> 
				<input type="checkbox" checked="checked" disabled="disabled"  name="full_screen[template2][input_fields][]" value="email" id="full_screen_template2_email"><?php echo JText::_('COM_JDPOPX_FORM_EMAIL'); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_full_screen2_image-lbl" for="jform_full_screen2_image" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_IMAGE_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_IMAGE'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_IMAGE'); ?> 
				</label>
			</div>
			<div class="controls">
				<input type="file" name="full_screen[template2][image]" id="jform_full_screen2_image" />
				<input type="hidden" name="full_screen[template2][old_image]" value="<?php echo (isset($this->full_screen->image2)) ? $this->full_screen->image2 : ''; ?>" />
				
				<?php if(isset($this->full_screen->image2) && !empty($this->full_screen->image2)){ ?>
					<img class="popximageadmin" src="<?php echo juri::root(); ?>media/com_jdpopx/uploads/<?php echo $this->full_screen->image2; ?>" />
				<?php }else{ ?>
					<img class="popximageadmin" src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/fullscreen_151636.png" />
				<?php } ?>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="full_screen2_bg_color-lbl" for="jform_full_screen2_bg_color" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_BG_COLOR_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_BG_COLOR'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_BG_COLOR'); ?> 
				</label>
			</div>
			<div class="controls">
				<input type="text" name="full_screen[template2][bg_color]" value="<?php echo (isset($this->full_screen->bg_color2)) ? $this->full_screen->bg_color2 : JText::_('COM_JDPOPX_FULL_SCREEN2_FORM_BG_COLOR_VALUE'); ?>" class="minicolors" id="jform_full_screen2_bg_color" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_full_screen2_heading-lbl" for="jform_full_screen2_heading" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING'); ?> 
				</label>
			</div>
			<div class="controls">
				<input type="text" name="full_screen[template2][heading]" value="<?php echo (isset($this->full_screen->heading2)) ? $this->full_screen->heading2 : 'Download the free guide now' ?>" id="jform_full_screen2_heading" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_full_screen2_description-lbl" for="jform_full_screen2_description" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_LB_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_DESC'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_DESC'); ?> 
				</label>
			</div>
			<div class="controls">
				<input type="text" name="full_screen[template2][description]" id="jform_full_screen2_description" value="<?php echo (isset($this->full_screen->description2)) ? $this->full_screen->description2 : 'Various versions have evolved over the years, sometimes by accident, sometimes on purpose' ?>" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_full_screen2_button_text-lbl" for="jform_full_screen2_button_text" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT'); ?> 
				</label>
			</div>
			<div class="controls">
				<input type="text" name="full_screen[template2][button_text]" id="jform_full_screen2_button_text" value="<?php echo (isset($this->full_screen->button_text2)) ? $this->full_screen->button_text2 : 'Submit'; ?>" />
			</div>
		</div>		 
		<div class="control-group">
			<div class="control-label">
				<label id="jform_full_screen2_button_color-lbl" for="jform_full_screen2_button_color" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR'); ?> 
				</label>
			</div>
			<div class="controls">
				<input type="text" name="full_screen[template2][button_color]" class="minicolors" value="<?php echo (isset($this->full_screen->button_color2)) ? $this->full_screen->button_color2 : '#30f3e7'; ?>" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_full_screen2_bottom_line-lbl" for="jform_full_screen2_bottom_line" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BOTTON_LINE_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BOTTON_LINE'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BOTTON_LINE'); ?> 
				</label>
			</div>
			<div class="controls">
				<input type="text" name="full_screen[template2][bottom_line]" id="jform_full_screen2_bottom_line" value="<?php echo 'We never spam your inbox'; ?>" />
			</div>
		</div>
	</div> 
</div>
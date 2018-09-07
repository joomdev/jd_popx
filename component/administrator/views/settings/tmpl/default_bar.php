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
	<ul id="bar_template" class="option_type_sub">
		 <li data-id="bar1" data-tmpl="1" <?php echo (isset($this->bar->tmpl) && $this->bar->tmpl == 1) ? 'class="active"': ''; ?>>
			<label  for="bar_tempalte1">
				<img src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/bar1.jpg" />
			</label>			
		 </li>
		 <li data-id="bar2" data-tmpl="2" <?php echo (isset($this->bar->tmpl) && $this->bar->tmpl == 2) ? 'class="active"': ''; ?>>
			<label for="bar_tempalte2">
				<img src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/bar2.jpg" />
			</label>			 
		 </li>  
		 <input type="hidden" name="subtmpl_bar" value="<?php echo (isset($this->bar->tmpl)) ? $this->bar->tmpl : 1; ?>" />
	</ul>	
	<div class="full_sid_tmpl subtmpl" id="bar1" <?php echo (isset($this->bar->tmpl) && $this->bar->tmpl == 1) ? 'style="display:block"' : ''; ?>>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_bar_input_fields-lbl" for="jform_bar_input_fields" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS'); ?>
				</label>
			</div>
			<div class="controls">
				<?php $inputs = (isset($this->bar->input_fields) && !empty($this->bar->input_fields)) ? explode(',',$this->bar->input_fields) : array('name','email'); ?>
				<input <?php echo (in_array('name',$inputs)) ? 'checked="checked"' : '';  ?> type="checkbox" name="bar[template1][input_fields][]" value="name" id="bar_template1_name"><?php echo JText::_('COM_JDPOPX_FORM_NAME'); ?> 
				<input checked="checked" disabled="disabled" type="checkbox" name="bar[template1][input_fields][]" value="email" id="bar_template1_email"><?php echo JText::_('COM_JDPOPX_FORM_EMAIL'); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_bar_position-lbl" for="jform_small_sidebar_position" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_POSITION_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_POSITION'); ?>">
					<?php echo JText::_('COM_JDPOPX_POSITION'); ?>
				</label>
			</div>
			
			<div class="controls">
				<?php echo JText::_('COM_JDPOPX_POSITION_TOP'); ?>
				<input  type="radio" name="bar[template1][position]" id="bar_position_top" <?php echo (isset($this->bar->position) && $this->bar->position == 'top') ? 'checked="checked"' : ''; ?> value="top" />
				<?php echo JText::_('COM_JDPOPX_POSITION_BOTTOM'); ?>
				<input type="radio" name="bar[template1][position]" id="position_right" <?php echo ((isset($this->bar->position) && $this->bar->position == 'bottom') || (empty($this->bar->position))) ? 'checked="checked"' : ''; ?> value="bottom" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_bar_tmpl_image-lbl" for="jform_bar_tmpl_image" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_IMAGE_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_IMAGE'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_IMAGE'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="file" name="bar[template1][image]" id="jform_bar_tmpl_image" />
				<input type="hidden" name="bar[template1][old_image]" value="<?php echo (isset($this->bar->image)) ? $this->bar->image : ''; ?>" />
				
				<?php if(isset($this->bar->image) && !empty($this->bar->image)){ ?>
					<img class="popximageadmin" src="<?php echo juri::root(); ?>media/com_jdpopx/uploads/<?php echo $this->bar->image; ?>" />
				<?php }else{ ?>
					<img class="popximageadmin" src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/baremail_151633.png" />
				<?php } ?>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_bar_image-lbl" for="jform_primary_bg_color" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_PRIMARY_BG_COLOR_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_PRIMARY_BG_COLOR'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_PRIMARY_BG_COLOR'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="bar[template1][primary_bg_color]" id="jform_primary_bg_color" class="minicolors" value="<?php echo (isset($this->bar->primary_bg_color)) ? $this->bar->primary_bg_color : JText::_('COM_JDPOPX_BAR_FORM_PRIMARY_BG_COLOR_VALUE'); ?>" />
				
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_bar_secondary_bg_color-lbl" for="jform_secondary_bg_color" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_SECONDORY_BG_COLOR_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_SECONDORY_BG_COLOR'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_SECONDORY_BG_COLOR'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="bar[template1][secondary_bg_color]" id="jform_secondary_bg_color" class="minicolors" value="<?php echo (isset($this->bar->secondary_bg_color)) ? $this->bar->secondary_bg_color : JText::_('COM_JDPOPX_BAR_FORM_SECONDORY_BG_COLOR'); ?>" />
				
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_heading-lbl" for="jform_bar_heading" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="bar[template1][heading]" id="jform_bar_heading" value="<?php echo (isset($this->bar->heading)) ? $this->bar->heading : JText::_('COM_JDPOPX_BAR_FORM_CHANGE_HEADING'); ?>" />
			</div>
		</div> 
		<div class="control-group">
			<div class="control-label">
				<label id="jform_bar_button_text-lbl" for="jform_bar_button_text" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="bar[template1][button_text]" id="jform_bar_button_text" value="<?php echo (isset($this->bar->button_text)) ? $this->bar->button_text : JText::_('COM_JDPOPX_BAR_FORM_CHANGE_BUTTON_TEXT'); ?>" />
			</div>
		</div>	
		<div class="control-group">
			<div class="control-label">
				<label id="jform_bar_button_color-lbl" for="jform_bar_button_color" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="bar[template1][button_color]" class="minicolors" id="jform_bar_button_color" value="<?php echo (isset($this->bar->button_color)) ? $this->bar->button_color : JText::_('COM_JDPOPX_BAR_FORM_CHANGE_BUTTON_COLOR'); ?>" />
			</div>
		</div> 
	</div>
	<div class="full_sid_tmpl subtmpl" id="bar2" <?php echo (isset($this->bar->tmpl) && $this->bar->tmpl == 2) ? 'style="display:block"' : ''; ?>>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_bar2_effect-lbl" for="jform_input_fields" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS'); ?>
				</label>
			</div>
			<div class="controls">
				<?php $inputs2 = (isset($this->bar->input_fields2) && !empty($this->bar->input_fields2)) ? explode(',',$this->bar->input_fields2) : array('email'); ?>
				<input <?php echo (in_array('name',$inputs2)) ? 'checked="checked"' : '';  ?> type="checkbox" name="bar[template2][input_fields][]" value="name" id="bar_template2_name"><?php echo JText::_('COM_JDPOPX_FORM_NAME'); ?> 
				<input type="checkbox" checked="checked" disabled="disabled"  name="bar[template2][input_fields][]" value="email" id="bar_template2_email"><?php echo JText::_('COM_JDPOPX_FORM_EMAIL'); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_bar2_position-lbl" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_POSITION_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_POSITION'); ?>">
					<?php echo JText::_('COM_JDPOPX_POSITION'); ?>
				</label>
			</div>
			
			<div class="controls">
				<?php echo JText::_('COM_JDPOPX_POSITION_TOP'); ?>
				<input  type="radio" name="bar[template2][position]" id="bar2_position_top" <?php echo (isset($this->bar->position2) && $this->bar->position2 == 'top') ? 'checked="checked"' : ''; ?> value="top" />
				<?php echo JText::_('COM_JDPOPX_POSITION_BOTTOM'); ?>
				<input type="radio" name="bar[template2][position]" id="bat2_position_bottom" <?php echo ((isset($this->bar->position2) && $this->bar->position2 == 'bottom') || (empty($this->bar->position2))) ? 'checked="checked"' : ''; ?> value="bottom" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_bar2_image-lbl" for="jform_bar2_image" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_IMAGE_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_IMAGE'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_IMAGE'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="file" name="bar[template2][image]" id="jform_bar2_image" />
				<input type="hidden" name="bar[template2][old_image]" value="<?php echo (isset($this->bar->image2)) ? $this->bar->image2 : ''; ?>" />
				
				<?php if(isset($this->bar->image2) && !empty($this->bar->image2)){ ?>
					<img class="popximageadmin" src="<?php echo juri::root(); ?>media/com_jdpopx/uploads/<?php echo $this->bar->image2; ?>" />
				<?php }else{ ?>
					<img class="popximageadmin" src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/barbook151634.png" />
				<?php } ?>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_bar2_primary_bg_color-lbl" for="jform_bar2primary_bg_color" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_PRIMARY_BG_COLOR_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_PRIMARY_BG_COLOR'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_PRIMARY_BG_COLOR'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="bar[template2][primary_bg_color]" id="jform_bar2primary_bg_color" class="minicolors" value="<?php echo (isset($this->bar->primary_bg_color2)) ? $this->bar->primary_bg_color2 : JText::_('COM_JDPOPX_BAR2_FORM_PRIMARY_BG_COLOR_VALUE'); ?>" />
				
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_bar2_secondary_bg_color-lbl" for="jform_bar2secondary_bg_color" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_SECONDORY_BG_COLOR_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_SECONDORY_BG_COLOR'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_SECONDORY_BG_COLOR'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="bar[template2][secondary_bg_color]" id="jform_bar2secondary_bg_color" class="minicolors" value="<?php echo (isset($this->bar->secondary_bg_color2)) ? $this->bar->secondary_bg_color2 : JText::_('COM_JDPOPX_BAR2_FORM_SECONDORY_BG_COLOR'); ?>" />
				
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_bar2_heading-lbl" for="jform_bar2_heading" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="bar[template2][heading]" value="<?php echo (isset($this->bar->heading2)) ? $this->bar->heading2 : JText::_('COM_JDPOPX_BAR2_FORM_CHANGE_HEADING'); ?>" id="jform_bar2_heading" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_bar2_description-lbl" for="jform_bar2_description" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_LB_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_DESC'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_DESC'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="bar[template2][description]" id="jform_bar2_description" value="<?php echo (isset($this->bar->description2)) ? $this->bar->description2 : JText::_('COM_JDPOPX_BAR2_FORM_CHANGE_DESC'); ?>" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_bar2_button_text-lbl" for="jform_bar2_button_text" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="bar[template2][button_text]" id="jform_bar2_button_text" value="<?php echo (isset($this->bar->button_text2)) ? $this->bar->button_text2 : JText::_('COM_JDPOPX_BAR2_FORM_CHANGE_BUTTON_TEXT'); ?>" />
			</div>
		</div>		 
		<div class="control-group">
			<div class="control-label">
				<label id="jform_bar2_button_color-lbl" for="jform_bar2_button_color" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="bar[template2][button_color]" class="minicolors" value="<?php echo (isset($this->bar->button_color2)) ? $this->bar->button_color2 : JText::_('COM_JDPOPX_BAR2_FORM_CHANGE_BUTTON_COLOR'); ?>" />
			</div>
		</div> 
	</div> 
	
</div>
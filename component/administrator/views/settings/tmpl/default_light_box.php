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
	<ul id="light_box_template" class="option_type_sub">
		 <li data-id="light_box1" data-tmpl="1" <?php echo (isset($this->light_box->tmpl) && $this->light_box->tmpl == 1) ? 'class="active"': ''; ?>>
			<label  for="light_box_template1">
				<img src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/light_box_1.jpg" />
			</label>
		 </li>
		 <li data-id="light_box2" data-tmpl="2" <?php echo (isset($this->light_box->tmpl) && $this->light_box->tmpl == 2) ? 'class="active"': ''; ?>>
			<label for="light_box_template2">
				<img src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/light_box_2.png" />
			</label>			 
		 </li>  
		 <input type="hidden" name="subtmpl_light_box" value="<?php echo (isset($this->light_box->tmpl)) ? $this->light_box->tmpl : 1; ?>" />
	</ul>
	<div class="full_sid_tmpl subtmpl" id="light_box1" <?php echo (isset($this->light_box->tmpl) && $this->light_box->tmpl == 1) ? 'style="display:block"' : ''; ?>>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_light_box_effect-lbl" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS'); ?>
				</label>
			</div>
			<div class="controls">
				<?php 
				 
				$inputs = (isset($this->light_box->input_fields) && !empty($this->light_box->input_fields)) ? explode(',',$this->light_box->input_fields) : array('name','email'); ?>
				<input <?php echo (in_array('name',$inputs)) ? 'checked="checked"' : '';  ?> type="checkbox" name="light_box[template1][input_fields][]" value="name"> <span class="check_label"><?php echo JText::_('COM_JDPOPX_FORM_NAME'); ?> </span>
				<input type="checkbox" checked="checked" disabled="disabled" name="light_box[template1][input_fields][]" value="email"> <span><?php echo JText::_('COM_JDPOPX_FORM_EMAIL'); ?></span>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_light_box_image-lbl" for="jform_light_box_image" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_IMAGE_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_IMAGE'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_IMAGE'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="file" name="light_box[template1][image]" id="jform_light_box_image" />
				<input type="hidden" name="light_box[template1][old_image]" value="<?php echo (isset($this->light_box->image)) ? $this->light_box->image : ''; ?>" />
				
				<?php if(isset($this->light_box->image) && !empty($this->light_box->image)){ ?>
					<img class="popximageadmin" src="<?php echo juri::root(); ?>media/com_jdpopx/uploads/<?php echo $this->light_box->image; ?>" />
				<?php }else { ?>
					<img class="popximageadmin" src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/mail_light_box151637.png" />
				<?php } ?>
			</div>
		</div>	
		<div class="control-group">
			<div class="control-label">
				<label id="jform_light_box_bg_color-lbl" for="jform_light_box_bg_color" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_BG_COLOR_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_BG_COLOR'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_BG_COLOR'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="light_box[template1][bg_color]" value="<?php echo (isset($this->light_box->bg_color)) ? $this->light_box->bg_color : JText::_('COM_JDPOPX_FORM_BG_COLOR_VALUE'); ?>"  id="jform_light_box_bg_color" class="minicolors" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_light_box_heading-lbl" for="jform_light_box_heading" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="light_box[template1][heading]" value="<?php echo (isset($this->light_box->heading)) ? $this->light_box->heading : 'Subscribe'; ?>" id="jform_light_box_heading" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label" >
				<label id="jform_light_box_description-lbl" for="jform_light_box_description" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_LB_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_DESC'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_DESC'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="light_box[template1][description]" value="<?php echo (isset($this->light_box->description)) ? $this->light_box->description : 'Free Guide Now'; ?>" id="jform_light_box_description" />
			</div>
		</div>	
		<div class="control-group">
			<div class="control-label">
				<label id="jform_light_box_button_text-lbl" for="jform_light_box_button_text" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="light_box[template1][button_text]" value="<?php echo (isset($this->light_box->button_text)) ? $this->light_box->button_text : 'Subscribe Now'; ?>" id="jform_light_box_button_text" />
			</div>
		</div>	
		<div class="control-group">
			<div class="control-label">
				<label id="jform_light_box_button_color-lbl" for="jform_light_box_button_color" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="light_box[template1][button_color]" class="minicolors" value="<?php echo (isset($this->light_box->button_color)) ? $this->light_box->button_color : '#e74b3b'; ?>" id="jform_light_box_button_color" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_light_box_bottom_line-lbl" for="jform_light_box_bottom_line" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BOTTON_LINE_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BOTTON_LINE'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BOTTON_LINE'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="light_box[template1][bottom_line]" value="<?php echo (isset($this->light_box->bottom_line)) ? $this->light_box->bottom_line : 'We never spam your inbox'; ?>" id="jform_light_box_bottom_line" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_light_box_border_color-lbl" for="jform_light_box_border_color" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BORDER_COLOR_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BORDER_COLOR'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BORDER_COLOR'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="light_box[template1][border_color]" value="<?php echo (isset($this->light_box->border_color)) ? $this->light_box->border_color : '#e74b3b'; ?>" id="jform_light_box_border_color" class="minicolors" />
			</div>
		</div>
		
	</div>
	<div class="full_sid_tmpl subtmpl" id="light_box2" <?php echo (isset($this->light_box->tmpl) && $this->light_box->tmpl == 2) ? 'style="display:block"' : ''; ?>>	
		<div class="control-group">
			<div class="control-label">
				<label id="jform_light_box_effect-lbl" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS'); ?>
				</label>
			</div>
			<div class="controls">
				<?php $inputs2 = (isset($this->light_box->input_fields2) && !empty($this->light_box->input_fields2)) ? explode(',',$this->light_box->input_fields2) : array('name','email'); ?>
				<input <?php echo (in_array('name',$inputs2)) ? 'checked="checked"' : '';  ?> type="checkbox" name="light_box[template2][input_fields][]" value="name"> <span class="check_label"><?php echo JText::_('COM_JDPOPX_FORM_NAME'); ?> </span>
				<input type="checkbox" checked="checked" disabled="disabled" name="light_box[template2][input_fields][]" value="email"> <span><?php echo JText::_('COM_JDPOPX_FORM_EMAIL'); ?></span>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_light_box2_image-lbl" for="jform_light_box2_image" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_IMAGE_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_IMAGE'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_IMAGE'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="file" name="light_box[template2][image]" id="jform_light_box2_image" />
				<input type="hidden" name="light_box[template2][old_image]" value="<?php echo (isset($this->light_box->image2)) ? $this->light_box->image2 : ''; ?>" />
				
				<?php if(isset($this->light_box->image2) && !empty($this->light_box->image2)){ ?>
					<img class="popximageadmin" src="<?php echo juri::root(); ?>media/com_jdpopx/uploads/<?php echo $this->light_box->image2; ?>" />
				<?php }else{ ?>
					<img class="popximageadmin"  src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/mail_light_box151638.png" />
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
				<input type="text" name="light_box[template2][primary_bg_color]" id="jform_primary_bg_color" class="minicolors" value="<?php echo (isset($this->light_box->primary_bg_color)) ? $this->light_box->primary_bg_color : JText::_('COM_JDPOPX_LIGHT_BOX_FORM_PRIMARY_BG_COLOR_VALUE'); ?>" />
				
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_bar_secondary_bg_color-lbl" for="jform_secondary_bg_color" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_SECONDORY_BG_COLOR_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_SECONDORY_BG_COLOR'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_SECONDORY_BG_COLOR'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="light_box[template2][secondary_bg_color]" id="jform_secondary_bg_color" class="minicolors" value="<?php echo (isset($this->light_box->secondary_bg_color)) ? $this->light_box->secondary_bg_color : JText::_('COM_JDPOPX_LIGHT_BOX_FORM_SECONDORY_BG_COLOR_VALUE'); ?>" />
				
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_light_box2_heading-lbl" for="jform_light_box2_heading" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="light_box[template2][heading]"  value="<?php echo (isset($this->light_box->heading2)) ? $this->light_box->heading2 : 'Subscribe'; ?>" id="jform_light_box2_heading" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_light_box2_description-lbl" for="jform_light_box2_description"  class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_LB_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_DESC'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_DESC'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="light_box[template2][description]" value="<?php echo (isset($this->light_box->description2)) ? $this->light_box->description2 : 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'; ?>" id="jform_light_box2_description" />
			</div>
		</div>	
		<div class="control-group">
			<div class="control-label">
				<label id="jform_light_box2_button_text-lbl" for="jform_light_box2_button_text" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="light_box[template2][button_text]" value="<?php echo (isset($this->light_box->button_text2)) ? $this->light_box->button_text2 : 'Subscribe Now'; ?>" id="jform_light_box2_button_text" />
			</div>
		</div>	
		<div class="control-group">
			<div class="control-label">
				<label id="jform_light_box2_button_color-lbl" for="jform_light_box2_button_color" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="light_box[template2][button_color]" value="<?php echo (isset($this->light_box->button_color2)) ? $this->light_box->button_color2 : '#103b4b'; ?>" class="minicolors" id="jform_light_box2_button_color" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_light_box2_bottom_line-lbl" for="jform_light_box2_bottom_line" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BOTTON_LINE_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BOTTON_LINE'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BOTTON_LINE'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="light_box[template2][bottom_line]" value="<?php echo (isset($this->light_box->bottom_line2)) ? $this->light_box->bottom_line2 : 'We never spam your inbox'; ?>" id="jform_light_box2_bottom_line" />
			</div>
		</div> 
	</div>
</div>
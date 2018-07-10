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
?>

<div class="controls">
	<ul id="small_sidebar_template" class="option_type_sub">
		 <li data-id="small_sidebar1" data-tmpl="1" <?php echo (isset($this->small_sidebar->tmpl) && $this->small_sidebar->tmpl == 1) ? 'class="active"': ''; ?>>
			<label  for="small_sidebar_tempalte1">
				<img src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/small_sidebar1.png" />
			</label>			
		 </li>
		 <li data-id="small_sidebar2" data-tmpl="2" <?php echo (isset($this->small_sidebar->tmpl) && $this->small_sidebar->tmpl == 2) ? 'class="active"': ''; ?>>
			<label for="small_sidebar_tempalte2">
				<img src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/small_sidebar2.png" />
			</label>			 
		 </li>  
		 <input type="hidden" name="subtmpl_small_sidebar" value="<?php echo (isset($this->small_sidebar->tmpl)) ? $this->small_sidebar->tmpl : 1; ?>" />
	</ul>
	
	
	<div class="full_sid_tmpl subtmpl" id="small_sidebar1" <?php echo (isset($this->small_sidebar->tmpl) && $this->small_sidebar->tmpl == 1) ? 'style="display:block"' : ''; ?>>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_small_sidebar_input_fields-lbl" for="jform_small_sidebar_input_fields" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS'); ?>
				</label>
			</div>
			<div class="controls">
				<?php $inputs = (isset($this->small_sidebar->input_fields) && !empty($this->small_sidebar->input_fields)) ? explode(',',$this->small_sidebar->input_fields) : array('name','email'); ?>
				<input <?php echo (in_array('name',$inputs)) ? 'checked="checked"' : '';  ?> type="checkbox" name="small_sidebar[template1][input_fields][]" value="name" id="small_sidebar_name"><?php echo JText::_('COM_JDPOPX_FORM_NAME'); ?> 
				<input checked="checked" disabled="disabled" type="checkbox" name="small_sidebar[template1][input_fields][]" value="email" id="small_sidebar_email"><?php echo JText::_('COM_JDPOPX_FORM_EMAIL'); ?>
			</div>
		</div>	
		<div class="control-group">
			<div class="control-label">
				<label id="jform_small_sidebar_position-lbl" for="jform_small_sidebar_position" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_POSITION_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_POSITION'); ?>">
					<?php echo JText::_('COM_JDPOPX_POSITION'); ?>
				</label>
			</div>
			<div class="controls">
				<?php echo JText::_('COM_JDPOPX_POSITION_LEFT'); ?>
				<input  type="radio" name="small_sidebar[template1][position]" id="position_left" <?php echo (isset($this->small_sidebar->position) && $this->small_sidebar->position == 'left') ? 'checked="checked"' : ''; ?> value="left" />
				<?php echo JText::_('COM_JDPOPX_POSITION_RIGHT'); ?>
				<input type="radio" name="small_sidebar[template1][position]" id="position_right" <?php echo ((isset($this->small_sidebar->position) && $this->small_sidebar->position == 'right') || (empty($this->small_sidebar->position))) ? 'checked="checked"' : ''; ?> value="right" />
			</div>
		</div>	
		<div class="control-group">
			<div class="control-label">
				<label id="jform_small_sidebar_align-lbl" for="jform_small_sidebar_align" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_POSITION_ALIGN_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_POSITION_ALIGN'); ?>">
					<?php echo JText::_('COM_JDPOPX_POSITION_ALIGN'); ?>
				</label>
			</div>
			<div class="controls">
				<?php echo JText::_('COM_JDPOPX_ALIGN_TOP'); ?>
				<input type="radio" name="small_sidebar[template1][align]" id="jform_small_sidebar_align_top" <?php echo (isset($this->small_sidebar->align) && $this->small_sidebar->align == 'top') ? 'checked="checked"' : ''; ?> value="top" />
				<?php echo JText::_('COM_JDPOPX_ALIGN_BOTTOM'); ?>
				<input type="radio" name="small_sidebar[template1][align]" id="jform_small_sidebar_align_bottom" <?php echo ((isset($this->small_sidebar->align) && $this->small_sidebar->align == 'bottom') || (empty($this->small_sidebar->align))) ? 'checked="checked"' : ''; ?> value="bottom" />
				
				<?php echo JText::_('COM_JDPOPX_ALIGN_CENTER'); ?>
				<input type="radio" name="small_sidebar[template1][align]" id="jform_small_sidebar_align_center" <?php echo (isset($this->small_sidebar->align) && $this->small_sidebar->align == 'center') ? 'checked="checked"' : ''; ?> value="center" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_small_sidebar_heading_bg_color-lbl" for="jform_small_sidebar_heading_bg_color" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_HEADING_BG_COLOR_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_HEADING_BG_COLOR'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_HEADING_BG_COLOR'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="small_sidebar[template1][heading_bg_color]" id="jform_small_sidebar_heading_bg_color" class="minicolors" value="<?php echo (isset($this->small_sidebar->heading_bg_color)) ? $this->small_sidebar->heading_bg_color : JText::_('COM_JDPOPX_SIDE_BAR_FORM_HEADING_BG_COLOR_VALUE'); ?>" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_small_sidebar_bg_color-lbl" for="jform_small_sidebar_bg_color" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_BG_COLOR_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_BG_COLOR'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_BG_COLOR'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="small_sidebar[template1][bg_color]" id="jform_small_sidebar_bg_color" class="minicolors" value="<?php echo (isset($this->small_sidebar->bg_color)) ? $this->small_sidebar->bg_color : JText::_('COM_JDPOPX_SIDE_BAR_FORM_BG_COLOR_VALUE'); ?>" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_small_sidebar_heading-lbl" for="jform_small_sidebar_heading" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="small_sidebar[template1][heading]" id="jform_small_sidebar_heading" value="<?php echo (isset($this->small_sidebar->heading)) ? $this->small_sidebar->heading : JText::_('COM_JDPOPX_SIDE_BAR_FORM_CHANGE_HEADING_VALUE'); ?>" />
			</div>
		</div>	 	
		<div class="control-group">
			<div class="control-label">
				<label id="jform_small_sidebar_button_text-lbl" for="jform_small_sidebar_button_text" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="small_sidebar[template1][button_text]" id="jform_small_sidebar_button_text" value="<?php echo (isset($this->small_sidebar->button_text)) ? $this->small_sidebar->button_text : JText::_('COM_JDPOPX_SIDE_BAR_FORM_CHANGE_BUTTON_TEXT_VALUE'); ?>" />
			</div>
		</div>	
		<div class="control-group">
			<div class="control-label">
				<label id="jform_small_sidebar_button_color-lbl" for="jform_small_sidebar_button_color" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="small_sidebar[template1][button_color]" class="minicolors" value="<?php echo (isset($this->small_sidebar->button_color)) ? $this->small_sidebar->button_color : JText::_('COM_JDPOPX_SIDE_BAR_FORM_CHANGE_BUTTON_COLOR_VALUE'); ?>" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_small_sidebar_bottom_line-lbl" for="jform_small_sidebar_bottom_line" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BOTTON_LINE_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BOTTON_LINE'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BOTTON_LINE'); ?> 
				</label>
			</div>
			<div class="controls">
				<input type="text" name="small_sidebar[template1][bottom_line]" id="jform_small_sidebar_bottom_line" value="<?php echo (isset($this->small_sidebar->bottom_line)) ? $this->small_sidebar->bottom_line : JText::_('COM_JDPOPX_SIDE_BAR_FORM_CHANGE_BOTTON_LINE_VALUE'); ?>" />
			</div>
		</div>		
	</div>
	<div class="full_sid_tmpl subtmpl" id="small_sidebar2" <?php echo (isset($this->small_sidebar->tmpl) && $this->small_sidebar->tmpl == 2) ? 'style="display:block"' : ''; ?>>
		<div class="control-group">
			<div class="control-label">
				<label class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_INPUT_FIELDS'); ?>
				</label>
			</div>
			<div class="controls">
				<?php $inputs2 = (isset($this->small_sidebar->input_fields2) && !empty($this->small_sidebar->input_fields2)) ? explode(',',$this->small_sidebar->input_fields2) : array('name','email'); ?>
				<input <?php echo (in_array('name',$inputs2)) ? 'checked="checked"' : '';  ?>  type="checkbox" name="small_sidebar[template2][input_fields][]" value="name" id="small_sidebar2_name"><?php echo JText::_('COM_JDPOPX_FORM_NAME'); ?> 
				<input checked="checked" disabled="disabled" type="checkbox" name="small_sidebar[template2][input_fields][]" value="email" id="small_sidebar2_email"><?php echo JText::_('COM_JDPOPX_FORM_EMAIL'); ?>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_small_sidebar2_position-lbl" for="jform_small_sidebar2_position" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_POSITION_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_POSITION'); ?>">
					<?php echo JText::_('COM_JDPOPX_POSITION'); ?>
				</label>
			</div>
			<div class="controls">
				<?php echo JText::_('COM_JDPOPX_POSITION_LEFT'); ?>
				<input type="radio" name="small_sidebar[template2][position]" id="jform_small_sidebar2_position_left" <?php echo (isset($this->small_sidebar->position2) && $this->small_sidebar->position2 == 'left') ? 'checked="checked"' : ''; ?> value="left" />
				<?php echo JText::_('COM_JDPOPX_POSITION_RIGHT'); ?>
				<input type="radio" name="small_sidebar[template2][position]" id="jform_small_sidebar2_position_right" <?php echo ((isset($this->small_sidebar->position2) && $this->small_sidebar->position2 == 'right') || (empty($this->small_sidebar->position2))) ? 'checked="checked"' : ''; ?> value="right" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_small_sidebar2_align-lbl" for="jform_small_sidebar2_align" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_POSITION_ALIGN_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_POSITION_ALIGN'); ?>">
					<?php echo JText::_('COM_JDPOPX_POSITION_ALIGN'); ?> 
				</label>
			</div>
			<div class="controls">
				<?php echo JText::_('COM_JDPOPX_ALIGN_TOP'); ?>
				<input type="radio" name="small_sidebar[template2][align]" id="jform_small_sidebar2_align_top" <?php echo (isset($this->small_sidebar->align2) && $this->small_sidebar->align2 == 'top') ? 'checked="checked"' : ''; ?> value="top" />
				<?php echo JText::_('COM_JDPOPX_ALIGN_BOTTOM'); ?>
				<input type="radio" name="small_sidebar[template2][align]" id="jform_small_sidebar2_align_bottom" <?php echo ((isset($this->small_sidebar->align2) && $this->small_sidebar->align2 == 'bottom') || (empty($this->small_sidebar->align2))) ? 'checked="checked"' : ''; ?> value="bottom" />
				
				<?php echo JText::_('COM_JDPOPX_ALIGN_CENTER'); ?>
				<input type="radio" name="small_sidebar[template2][align]" id="jform_small_sidebar2_align_center" <?php echo (isset($this->small_sidebar->align2) && $this->small_sidebar->align2 == 'center') ? 'checked="checked"' : ''; ?> value="center" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_small_sidebar2_image-lbl" for="jform_small_sidebar2_image" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_IMAGE_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_IMAGE'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_IMAGE'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="file" name="small_sidebar[template2][image]" id="jform_small_sidebar2_image"  />
				<input type="hidden" name="small_sidebar[template2][old_image]" value="<?php echo (isset($this->small_sidebar->image2)) ? $this->small_sidebar->image2 : ''; ?>" />				
				<?php if(isset($this->small_sidebar->image2) && !empty($this->small_sidebar->image2)){ ?>
					<img class="popximageadmin" src="<?php echo juri::root(); ?>media/com_jdpopx/uploads/<?php echo $this->small_sidebar->image2; ?>" />
				<?php }else{ ?>
					<img class="popximageadmin" src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/fullscreen_151636.png" />
				<?php } ?>
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_small_sidebar2_bg_color-lbl" for="jform_small_sidebar2_bg_color" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_BG_COLOR_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_BG_COLOR'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_BG_COLOR'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" class="minicolors" name="small_sidebar[template2][bg_color]" id="jform_small_sidebar2_bg_color" value="<?php echo (isset($this->small_sidebar->bg_color2)) ? $this->small_sidebar->bg_color2 : JText::_('COM_JDPOPX_SIDE_BAR2_FORM_BG_COLOR_VALUE'); ?>" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_small_sidebar2_heading-lbl" for="jform_small_sidebar2_heading" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_HEADING'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="small_sidebar[template2][heading]" value="<?php echo (isset($this->small_sidebar->heading2)) ? $this->small_sidebar->heading2 : JText::_('COM_JDPOPX_SIDE_BAR2_FORM_CHANGE_HEADING_VALUE'); ?>" id="jform_small_sidebar2_heading" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_small_sidebar2_description-lbl" for="jform_small_sidebar2_description" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_LB_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_DESC'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_DESC'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="small_sidebar[template2][description]" value="<?php echo (isset($this->small_sidebar->description2)) ? $this->small_sidebar->description2 : JText::_('COM_JDPOPX_SIDE_BAR2_FORM_CHANGE_DESC'); ?>" id="jform_small_sidebar2_description" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_small_sidebar2_button_text-lbl" for="jform_small_sidebar2_button_text" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_TEXT'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="small_sidebar[template2][button_text]" value="<?php echo (isset($this->small_sidebar->button_text2)) ? $this->small_sidebar->button_text2 : JText::_('COM_JDPOPX_SIDE_BAR2_FORM_CHANGE_BUTTON_TEXT_VALUE'); ?>" id="jform_small_sidebar2_button_text" />
			</div>
		</div>	 
		<div class="control-group">
			<div class="control-label">
				<label id="jform_small_sidebar2_button_color-lbl" for="jform_small_sidebar2_button_color" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BUTTON_COLOR'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="small_sidebar[template2][button_color]" value="<?php echo (isset($this->small_sidebar->button_color2)) ? $this->small_sidebar->button_color2 : JText::_('COM_JDPOPX_SIDE_BAR2_FORM_CHANGE_BUTTON_COLOR_VALUE'); ?>" class="minicolors" />
			</div>
		</div>
		<div class="control-group">
			<div class="control-label">
				<label id="jform_bottom_line-lbl" for="jform_small_sidebar2_bottom_line" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BOTTON_LINE_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BOTTON_LINE'); ?>">
					<?php echo JText::_('COM_JDPOPX_FORM_CHANGE_BOTTON_LINE'); ?>
				</label>
			</div>
			<div class="controls">
				<input type="text" name="small_sidebar[template2][bottom_line]" value="<?php echo (isset($this->small_sidebar->bottom_line2)) ? $this->small_sidebar->bottom_line2 : JText::_('COM_JDPOPX_SIDE_BAR2_FORM_CHANGE_BOTTON_LINE_VALUE'); ?>" />
			</div>
		</div>
	</div> 
</div>
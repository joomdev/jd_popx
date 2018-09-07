<?php
/**
 * @package JDPopX
 * @author JoomDev https://www.joomdev.com/
 * @copyright Copyright (C) 2008 - 2018 JoomDev.com. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
// No direct access
defined('_JEXEC') or die;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');
JHtml::_('behavior.colorpicker');

// Import CSS

$document = JFactory::getDocument();
$document->addStyleSheet(JUri::base() . 'components/com_jdpopx/assets/css/jdpopx.css');
$document->addScript(JUri::base() . 'components/com_jdpopx/assets/js/jdpopx.js');
$document->addScript(JUri::base() . 'components/com_jdpopx/assets/js/jquery.validate.js');
$data = $this->SettingData;

?> 
<script type="text/javascript">
	jQuery(document).ready(function ($) {
		$('.hasPopover').popover({
         container: 'body',
         trigger: 'hover focus'
		});
		$('#setting-form').validate({
			errorPlacement: function(error, element) {
				if (element.attr("type") == "radio"){ 
					error.insertAfter('#redirect');
					//error.insertAfter(element);
				}else{
					error.insertAfter(element);
				}  
			}
		});
	});
	Joomla.submitbutton = function (task) {
		Joomla.submitform(task, document.getElementById('setting-form'));
	}
</script> 
<form action="<?php echo JRoute::_('index.php?option=com_jdpopx'); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="setting-form" class="form-validate jdpopxadmin" enctype="multipart/form-data">
<?php if (!empty($this->sidebar)): ?>
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?> 
	</div>
	<div id="j-main-container" class="span10">
		<?php else : ?>
		<div id="j-main-container">
			<?php endif; ?> 

	<div class="form-horizontal">
		<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>

		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_JDPOPX_TITLE_SETTING', true)); ?>
		<div class="row-fluid">
			<div class="span10 form-horizontal">
				<fieldset class="adminform">
				<input type="hidden" name="jform[id]" value="<?php echo (isset($this->item->id)) ? $this->item->id : ''; ?>" />
				<div class="control-group">
					<div class="control-label">
						<label id="jform_acymailing_list" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_ACYMAILING_LIST_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_ACYMAILING_LIST'); ?>">
							<?php echo JText::_('COM_JDPOPX_FORM_ACYMAILING_LIST'); ?><span class="star">&nbsp;*</span>
						</label>
					</div>
					<div class="controls">
						<select name="listid" id="jform_acymailing_list" class="required listid">
							<?php if(isset($this->acymailinlist) && !empty($this->acymailinlist)){
								foreach($this->acymailinlist as $list){ ?>
								<option value="<?php echo (isset($list->listid)) ? $list->listid : '';?>" <?php echo (isset($data->listid) && $data->listid == $list->listid) ? "selected='selected'" : ''; ?>><?php echo (isset($list->name)) ? $list->name : '';?></option>
							<?php }
							}  ?> 
						</select>
					</div>
				</div> 
				<div class="control-group">
					<div class="control-label">
						<label id="jform_option_type-lbl" for="jform_option_type" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_LBL_SETTING_OPTIN_TYPE_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_LBL_SETTING_OPTIN_TYPE'); ?>">
							<?php echo JText::_('COM_JDPOPX_FORM_LBL_SETTING_OPTIN_TYPE'); ?> <span class="star">&nbsp;*</span>
						</label>
					</div>
					<div class="controls">
						<ul class="option_type">
							 <li data-type="full_screen" <?php echo (isset($data->option_type) && $data->option_type == 'full_screen') ? 'class="active"' : ''; ?>>
								<label  for="full_screen">
									<img title="<?php echo JText::_('COM_JDPOPX_FORM_FULL_SCREEN_POPUP'); ?>" src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/full-screen.jpg" />
								</label> 
							 </li>
							 <li data-type="small_sidebar" <?php echo (isset($data->option_type) && $data->option_type == 'small_sidebar') ? 'class="active"' : ''; ?>>
								<label for="small_sidebar">
									<img  title="<?php echo JText::_('COM_JDPOPX_FORM_SMALL_SLIDER'); ?>" src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/small-side-bar.jpg" />
								</label> 
							 </li> 
							<li data-type="bar" <?php echo (isset($data->option_type) && $data->option_type == 'bar') ? 'class="active"' : ''; ?>>
								<label for="bar"><img title="<?php echo JText::_('COM_JDPOPX_FORM_BAR'); ?>" src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/bar.jpg" /></label>
							</li>
							<li data-type="light_box" <?php echo (isset($data->option_type) && $data->option_type == 'light_box') ? 'class="active"' : ''; ?>>
								<label for="light_box"><img title="<?php echo JText::_('COM_JDPOPX_FORM_LIGHT_BOX'); ?>"  src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/light-box.jpg" /></label> 
							</li>
							<input type="hidden" name="option_type" id="option_type_input" value="<?php echo (isset($data->option_type) && !empty($data->option_type)) ? $data->option_type : ''; ?>" />	
						</ul>
					</div>
				</div>					
				<div class="control-label">
					<label id="jform_option_type-lbl" for="jform_option_type" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_SELECT_DESIGN_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_SELECT_DESIGN'); ?>">
						<?php echo JText::_('COM_JDPOPX_FORM_SELECT_DESIGN'); ?>
					</label> 
				</div>				
				<div class="control-group option_template full_screen" <?php echo (isset($data->option_type) && $data->option_type == 'full_screen') ? 'style="display:block"' : ''; ?>>
					 <?php echo $this->loadTemplate('full_screen'); ?>
				</div>
				<div class="control-group option_template small_sidebar" <?php echo (isset($data->option_type) && $data->option_type == 'small_sidebar') ? 'style="display:block"' : ''; ?>>
					 <?php echo $this->loadTemplate('small_sidebar'); ?>
				</div>
				<div class="control-group option_template bar" <?php echo (isset($data->option_type) && $data->option_type == 'bar') ? 'style="display:block"' : ''; ?>>
					 <?php echo $this->loadTemplate('bar'); ?>
				</div>
				<div class="control-group option_template light_box" <?php echo (isset($data->option_type) && $data->option_type == 'light_box') ? 'style="display:block"' : ''; ?>>
					 <?php echo $this->loadTemplate('light_box'); ?>
				</div>
				
				<div class="control-group">
					<div class="control-label">
						<label id="jform_effect-lbl" for="jform_effect" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_LBL_SETTING_EFFECT_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_LBL_SETTING_EFFECT'); ?>">
							<?php echo JText::_('COM_JDPOPX_FORM_LBL_SETTING_EFFECT'); ?> <span class="star">&nbsp;*</span>
						</label>
					</div>
					<div class="controls">
						 <select name="effect" id="effect" class="required effect">
							<option  <?php echo (isset($data->effect) && $data->effect == 'fadein') ? 'selected="selected"' : ''; ?> value="fadein"><?php echo JText::_('COM_JDPOPX_FORM_FADE_IN'); ?></option>
							<option <?php echo (isset($data->effect) && $data->effect == 'slide') ? 'selected="selected"' : ''; ?> value="slide"><?php echo JText::_('COM_JDPOPX_FORM_SLIDE'); ?></option>
							<option <?php echo (isset($data->effect) && $data->effect == 'flip') ? 'selected="selected"' : ''; ?> value="flip"><?php echo JText::_('COM_JDPOPX_FORM_FLIP'); ?></option>
							<option <?php echo (isset($data->effect) && $data->effect == 'bounce') ? 'selected="selected"' : ''; ?> value="bounce"><?php echo JText::_('COM_JDPOPX_FORM_BOUNCE'); ?></option>
						</select>
					</div>
				</div> 
				<div class="control-group">
					<div class="control-label">
						<label id="jform_after_subscribe-lbl" for="jform_after_subscribe" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_LBL_SETTING_AFTER_SUBSCRIBE_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_LBL_SETTING_AFTER_SUBSCRIBE'); ?>">
							<?php echo JText::_('COM_JDPOPX_FORM_LBL_SETTING_AFTER_SUBSCRIBE'); ?> <span class="star">&nbsp;*</span>
						</label>
					</div>
					<div class="controls">
						<?php echo JText::_('COM_JDPOPX_FORM_CLOSE'); ?>
						<input class="required" type="radio" name="after_subscribe" id="close" <?php echo (isset($data->after_subscribe) && $data->after_subscribe == 'close') ? 'checked="checked"' : ''; ?> value="close" />
						<?php echo JText::_('COM_JDPOPX_FORM_REDIRECT'); ?>
						<input class="required" type="radio" name="after_subscribe" id="redirect" <?php echo (isset($data->after_subscribe) && $data->after_subscribe == 'redirect') ? 'checked="checked"' : ''; ?> value="redirect" />
					</div>
				</div>
				
				<div class="control-group" id="url" <?php echo (isset($data->url) && (isset($data->after_subscribe) && $data->after_subscribe == 'redirect')) ? "style='display:block;'" : ''; ?> >
					<div class="control-label">
						<label id="jform_jform_url-lbl" for="jform_url" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_LBL_SETTING_URL_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_LBL_SETTING_URL'); ?>">
							<?php echo JText::_('COM_JDPOPX_FORM_LBL_SETTING_URL'); ?> <span class="star">&nbsp;*</span>
						</label>
					</div>
					<div class="controls">						 
						<input type="text" class="required" name="url" id="jform_url" value="<?php echo (isset($data->url)) ? $data->url : ''; ?>" />
					</div>
				</div>
				
				<div class="control-group">
					<div class="control-label">
						<label id="jform_jform_time_delay-lbl" for="jform_time_delay" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_LBL_SETTING_TIME_DELAY_DESC'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_LBL_SETTING_TIME_DELAY'); ?>">
							<?php echo JText::_('COM_JDPOPX_FORM_LBL_SETTING_TIME_DELAY'); ?> <span class="star">&nbsp;*</span>
						</label>
					</div>
					<div class="controls">						 
						<input type="text" required="true" class="required" name="time_delay" id="jform_time_delay" value="<?php echo (isset($data->time_delay)) ? $data->time_delay : ''; ?>" />
					</div>
				</div> 
				
				<div class="control-group">
					<div class="control-label">
						<label id="jform_cookie_time-lbl" for="jform_cookie_time" class="hasPopover" data-content="<?php echo JText::_('COM_JDPOPX_FORM_LBL_COOKIE_TIME_DECS'); ?>" data-original-title="<?php echo JText::_('COM_JDPOPX_FORM_LBL_COOKIE_TIME'); ?>">
							<?php echo JText::_('COM_JDPOPX_FORM_LBL_COOKIE_TIME'); ?> <span class="star">&nbsp;*</span>
						</label>
					</div>
					<div class="controls">						 
						<input type="text" required="true" class="required" name="cookie_time" id="cookie_time" value="<?php echo (isset($data->cookie_time)) ? $data->cookie_time : ''; ?>" />
					</div>
				</div>
				<div class="control-group">
					<hr>
					<div class="center">
						<p>JD PopX v1.3</p>
						<p>Like this extension? <a target="_blank" href="https://extensions.joomla.org/extension/jd-popx/">Leave a review on JED <span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span><span class="icon-star"></span></a></p>
						<p><a href="https://www.joomdev.com/products/extensions" target="_blank">More Joomla Extensions</a> |<a href="https://www.joomdev.com/products/templates" target="_blank"> Free Joomla Templates</a> | <a href="https://www.joomdev.com/forum/jd-popx" target="_blank">Support</a></p>
						<p>© 2018 - JoomDev. All Rights Reserved</p>
					</div>
				</div>
				
				</fieldset>
			</div>
		</div>
		
		<?php echo JHtml::_('bootstrap.endTab'); ?>

		<?php echo JHtml::_('bootstrap.endTabSet'); ?>

		<input type="hidden" name="task" value=""/>
		<?php echo JHtml::_('form.token'); ?>

	</div>
</div>
</form>
<?php  
/**
 * @package JDPopX
 * @author JoomDev https://www.joomdev.com/
 * @copyright Copyright (C) 2008 - 2018 JoomDev.com. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
defined('_JEXEC') or die;
$option_type 	= (isset($displayData->option_type) && !empty($displayData->option_type)) ? $displayData->option_type : 'light_box'; 
$data = (isset($displayData->$option_type) && !empty($displayData->$option_type)) ? json_decode($displayData->$option_type) : array();

if(isset($displayData->effect)){
	$animationclass = '';
	switch($displayData->effect){
		case 'fadein';
			$animationclass = 'jdpopx_animation_fadein';
		break;
		case 'slide';
			$animationclass = 'jdpopx_animation_slideup';
		break;
		case 'bounce';
			$animationclass = 'jdpopx_animation_bounce';
		break;
		case 'flip';
			$animationclass = 'jdpopx_animation_flipinx';
		break;
		default :
			$animationclass = 'jdpopx_animation_fadein';
	}
}

$flyinclas = (isset($data->position) && !empty($data->position)) ? $data->position : 'right';
 
?>
<style type="text/css">
    .jd-popx-page-center,
    .small-sidebar.style1 .jd-popx-author-wrapper {
        <?php echo (isset($data->bg_color) && !empty($data->bg_color)) ? 'background:'.$data->bg_color: '' ?>!important;
    }

    .small-sidebar.style1 .jd-popx-form-title-group {
        <?php echo (isset($data->heading_bg_color) && !empty($data->heading_bg_color)) ? 'background:'.$data->heading_bg_color: '' ?>!important;
    }

    .small-sidebar.style1 .jd-popx-field-group button {
        <?php echo (isset($data->button_color) && !empty($data->button_color)) ? 'background:'.$data->button_color: '' ?>!important;
    }

</style>
<div class="jdpopxcontainer jdpopx_flyin jdpopx_flyin_<?php echo $flyinclas; ?> jdpopx_auto_popup jdpopx_align_<?php echo (isset($data->align) && !empty($data->align)) ? $data->align : 'bottom'; ?>" data-delay="<?php echo (isset($displayData->time_delay) && !empty($displayData->time_delay)) ? $displayData->time_delay : ''; ?>" data-aftersubscribe="<?php echo (isset($displayData->after_subscribe)) ? $displayData->after_subscribe : ''; ?>" data-url="<?php echo (isset($displayData->url)) ? $displayData->url : ''; ?>" data-cookies="<?php echo (isset($displayData->cookie_time)) ? $displayData->cookie_time : ''; ?>">
    <div class="jdpopx_form_container jdpopx_form_bottom jdpopx_form_text_dark <?php echo $animationclass; ?>">
        <!--jd-popx -->
        <div class="jd-popx small-sidebar bg-dark style1">
            <div id="jd-popx-page-wrapper">
                <div class="jd-popx-page-container">
                    <div class="jd-popx-page-center">
                        <div class="jd-popx-content-wrap">
                            <div class="jd-popx-close-btn-wrapper"><a class="jd-popx-close-btn">X</a></div>
                            <?php if(isset($data->heading) && !empty($data->heading)){ ?>
                            <div class="jd-popx-form-title-group jd-popx-text-center">
                                <div class="jd-popx-form-title">
                                    <?php echo $data->heading; ?>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="popx_response"></div>
                            <div class="jd-popx-form-wrapper">
                                <form action="" method="post" name="popx_subscribe_form" id="popx_subscribe_form">
                                    <?php if(isset($data->input_fields) && in_array('name',$data->input_fields)){ ?>
                                    <fieldset class="jd-popx-field-group">
                                        <input type="text" required="true" placeholder="<?php echo JText::_('COM_JDPOPX_NAME_INPUT_LABEL'); ?>" name="popx_name">
                                    </fieldset>
                                    <?php } ?>

                                    <fieldset class="jd-popx-field-group">
                                        <input type="email" required="true" id="popx_email" placeholder="<?php echo JText::_('COM_JDPOPX_EMAIL_INPUT_LABEL'); ?>" name="popx_email">
                                    </fieldset>
                                    <fieldset class="jd-popx-field-group jd-popx-btn-group">
                                        <input type="hidden" name="ispopx" value="1">
                                        <button type="submit" id="popx_submit" class="popx-has-spinner"><?php echo (isset($data->button_text) && !empty($data->button_text)) ? $data->button_text : JText::_('COM_JDPOPX_SUBMIT'); ?></button>
                                    </fieldset>
                                    <?php if(isset($data->bottom_line) && !empty($data->bottom_line)){ ?>
                                    <div class="jd-popx-massage-container">
                                        <span>
                                            <?php echo $data->bottom_line; ?>
                                        </span>
                                    </div>
                                    <?php } ?>
                                    <?php echo JHtml::_('form.token'); ?>
                                </form>
                                <div class="jd-popx-author-wrapper">
                                    <div class="jd-by"><a href="https://www.joomdev.com/products/extensions/jd-popx" target="_blank">by <span>JD PopX</span></a></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

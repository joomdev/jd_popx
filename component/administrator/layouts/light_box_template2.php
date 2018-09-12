<?php  
/**
 * @package JDPopX
 * @author JoomDev https://www.joomdev.com/
 * @copyright Copyright (C) 2008 - 2018 JoomDev.com. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
*/
defined('_JEXEC') or die;

$option_type 	= (isset($displayData->option_type) && !empty($displayData->option_type)) ? $displayData->option_type : 'light_box'; 
$data = (isset($displayData->$option_type) && !empty($displayData->$option_type)) ? json_decode($displayData->$option_type) :  new StdClass;
if(isset($displayData->effect)){
	$animationclass = '';
	switch($displayData->effect){
		case 'fadein';
			$animationclass = 'jdpopx_animation_fadein';
		break;
		case 'slide';
			$animationclass = 'jdpopx_animation_slidedown';
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


 ?>
<style type="text/css">
    .light-box.style2 .jd-popx-form-title-group {
        <?php echo (isset($data->primary_bg_color) && !empty($data->primary_bg_color)) ? 'background:'.$data->primary_bg_color: '' ?>!important;
    }

    .light-box.style2 .jd-popx-page-center {
        <?php echo (isset($data->secondary_bg_color) && !empty($data->secondary_bg_color)) ? 'background:'.$data->secondary_bg_color: '' ?>!important;
    }

    .light-box.style2 .jd-popx-author-wrapper {
        <?php echo (isset($data->secondary_bg_color) && !empty($data->secondary_bg_color)) ? 'background:'.$data->secondary_bg_color: '' ?>!important;
    }

    .light-box.style2 .jd-popx-field-group button {
        <?php echo (isset($data->button_color) && !empty($data->button_color)) ? 'background:'.$data->button_color: '' ?>!important;
    }

</style>
<div class="jdpopxcontainer jdpopx_popup jdpopx_auto_popup" data-delay="<?php echo (isset($displayData->time_delay)) ? $displayData->time_delay : 0; ?>" data-aftersubscribe="<?php echo (isset($displayData->after_subscribe)) ? $displayData->after_subscribe : ''; ?>" data-url="<?php echo (isset($displayData->url)) ? $displayData->url : ''; ?>">
    <div class="jdpopx_form_container <?php echo $animationclass; ?>">
        <div class="jd-popx light-box bg-dark style2 lightboxslide">
            <div id="jd-popx-page-wrapper">
                <div class="jd-popx-page-container">
                    <div class="jd-popx-page-center">
                        <div class="jd-popx-content-wrap jd-popx-text-center">
                            <div class="jd-popx-close-btn-wrapper"><a class="jd-popx-close-btn">X</a></div>
                            <!--End Close Btn Wrapper-->
                            <div class="jd-popx-form-title-group jd-popx-text-center">

                                <?php if(isset($data->heading) && !empty($data->heading)){ ?>
                                <div class="jd-popx-form-title">
                                    <?php echo $data->heading; ?>
                                </div>
                                <?php } ?>
								<div class="jd-popx-image-container">
								<?php if(isset($data->image) && !empty($data->image)){ ?>
										<img src="<?php echo juri::root(); ?>media/com_jdpopx/uploads/<?php echo $data->image ?>" alt="">
									<?php }else{ ?>
										<img src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/mail_light_box151638.png" />	
									<?php } ?>
								</div>
									
                                <?php if(isset($data->description) && !empty($data->description)){ ?>
                                <div class="jd-popx-form-subtitle">
                                    <?php echo $data->description; ?>
                                </div>
                                <?php } ?>

                            </div>
                            <div class="popx_response"></div>
                            <div class="jd-popx-form-wrapper">
                                <form action="" method="post" name="popx_subscribe_form" id="popx_subscribe_form">
                                    <?php if(isset($data->input_fields) && in_array('name',$data->input_fields)){ ?>
                                    <fieldset class="jd-popx-field-group">
                                        <input type="text" required="true" placeholder="<?php echo JText::_('COM_JDPOPX_NAME_INPUT_LABEL'); ?>" name="popx_name" id="popx_name">
                                    </fieldset>
                                    <?php } ?>
                                    <fieldset class="jd-popx-field-group">
                                        <input type="email" required="true" id="popx_email" placeholder="<?php echo JText::_('COM_JDPOPX_EMAIL_INPUT_LABEL'); ?>" name="popx_email">
                                    </fieldset>

                                    <fieldset class="jd-popx-field-group jd-popx-btn-group">
                                        <input type="hidden" name="ispopx" value="1">
                                        <button type="submit" class="popx-has-spinner"><?php echo (isset($data->button_text) && !empty($data->button_text)) ? $data->button_text : JText::_('COM_JDPOPX_SUBMIT'); ?></button>
                                    </fieldset>
                                    <?php if(isset($data->bottom_line) && !empty($data->bottom_line)){ ?>
                                    <div class="jd-popx-massage-container">
                                        <span><?php echo $data->bottom_line; ?></span>
                                    </div>
                                    <?php } ?>
                                    <?php echo JHtml::_('form.token'); ?>
                                </form>
                            </div>
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

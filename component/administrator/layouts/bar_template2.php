<?php  
/**
 * @package JDPopX
 * @version - 1.0
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
    .bar-full-width.style2 #jd-popx-page-wrapper {
        <?php echo (isset($data->primary_bg_color) && !empty($data->primary_bg_color)) ? 'background:'.$data->primary_bg_color: '' ?>!important;
    }

    .bar-full-width.style2 .jd-popx-image-wrap:before {
        <?php echo (isset($data->secondary_bg_color) && !empty($data->secondary_bg_color)) ? 'background:'.$data->secondary_bg_color: '' ?>!important;
    }

    .bar-full-width.style2 .jd-popx-field-group button {
        <?php echo (isset($data->button_color) && !empty($data->button_color)) ? 'background:'.$data->button_color: '' ?>!important;
    }

</style>
<div class="jdpopxcontainer jd-popx bar-full-width bg-dark style2 jdpopx_auto_popup <?php echo (isset($data->position) && !empty($data->position)) ? $data->position : 'bottom' ?> <?php echo $animationclass; ?>" data-delay="<?php echo (isset($displayData->time_delay)) ? $displayData->time_delay : 0; ?>" data-aftersubscribe="<?php echo (isset($displayData->after_subscribe)) ? $displayData->after_subscribe : ''; ?>" data-url="<?php echo (isset($displayData->url)) ? $displayData->url : ''; ?>" data-cookies="<?php echo (isset($displayData->cookie_time)) ? $displayData->cookie_time : ''; ?>">

    <div id="jd-popx-page-wrapper">
        <div class="jd-popx-page-container jd-popx-page-padding">
            <div class="jd-popx-close-btn-wrapper"><a class="jd-popx-close-btn">X</a></div>
            <!--End Close Btn Wrapper-->
            <div class="jd-popx-row-group">
                <div class="jd-popx-col-tab-wrap-2 jd-popx-col-mobile-wrap-12 jd-popx-image-wrap jd-popx-mobile-none">
					<div class="jd-popx-image-container jd-popx-text-center">
						<?php if(isset($data->image) && !empty($data->image)){ ?>
							<img src="<?php echo juri::root(); ?>media/com_jdpopx/uploads/<?php echo $data->image ?>" alt="">
						<?php }else{ ?>
							<img src="https://cdn.joomdev.com/extensionupdates/jdpopx/images/barbook151634.png" />	
						<?php } ?>
					 </div>
                    <!--End jd-popx-image-container -->
                </div>
                <!--End jd-popx-image-wrap-->
                <!--End Jd Popx Image Wrap -->
                <div class="jd-popx-col-tab-wrap-10 jd-popx-col-mobile-wrap-12 jd-popx-content-wrap">
                    <div class="jd-popx-form-wrapper">

                        <form action="" method="post" name="popx_subscribe_form" id="popx_subscribe_form">
                            <div class="jd-popx-row-group jd-d-flex jd-align-items-center">
                                <div class="jd-popx-col-tab-wrap-3 jd-popx-col-mobile-wrap-12">
                                    <div class="jd-popx-form-title-group jd-popx-table">
                                        <div class="jd-popx-table-cell jd-popx-vertical-middle">
                                            <?php if(isset($data->description) && !empty($data->description)){ ?>
                                            <div class="jd-popx-form-subtitle">
                                                <?php echo $data->description; ?>
                                            </div>
                                            <?php } ?>
                                            <?php if(isset($data->heading) && !empty($data->heading)){ ?>
                                            <div class="jd-popx-form-title">
                                                <?php echo $data->heading; ?>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!-- End Form Title Group -->
                                </div>
                                <!-- End jd-popx-form-title -->

                                <div class="jd-popx-col-tab-wrap-8 jd-popx-col-mobile-wrap-12">
                                    <div class="popx_response"></div>
                                    <div class="jd-popx-row-group">
                                        <?php if(isset($data->input_fields) && in_array('name',$data->input_fields)){ ?>
                                        <fieldset class="jd-popx-col-tab-wrap-4 jd-popx-col-mobile-wrap-12 jd-popx-field-group">
                                            <input type="text" required="true" placeholder="Name" name="popx_name" id="popx_name">
                                        </fieldset>
                                        <?php } ?>
                                        <fieldset class="jd-popx-col-tab-wrap-4 jd-popx-col-mobile-wrap-12 jd-popx-field-group">
                                            <input type="email" placeholder="Email" required="true" id="popx_email" name="popx_email">
                                        </fieldset>
                                        <!--End Email fieldset-->
                                        <fieldset class="jd-popx-col-tab-wrap-4 jd-popx-col-mobile-wrap-12 jd-popx-field-group jd-popx-btn-group">
                                            <input type="hidden" name="ispopx" value="1">
                                            <button type="submit" class="popx-has-spinner"><?php echo (isset($data->button_text) && !empty($data->button_text)) ? $data->button_text : JText::_('COM_JDPOPX_SUBMIT'); ?></button>
                                        </fieldset>
                                        <!--End Button fieldset-->
                                    </div>
                                </div>
                            </div>
                            <!-- End Row Group -->
                            <?php echo JHtml::_('form.token'); ?>
                        </form>
                        <!--End Form -->
                    </div>
                    <!--End form wrapper-->
                </div>
                <!--End content wrap-->
            </div>
            <!-- End row group -->
            <div class="jd-popx-author-wrapper">
                <div class="jd-by"><a href="https://www.joomdev.com/products/extensions/jd-popx" target="_blank">by <span>JD PopX</span></a></div>
            </div>
            <!--End Author wrapper-->
        </div>
        <!--End page container-->
    </div>
    <!--End page Wrapper -->
</div>

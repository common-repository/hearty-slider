<?php

class HeartySliderParams {

	public static function generate_fields($obj, $number_of_settings_instances, $number_of_content_items) {

        $modify_settings_instance_arr = array();

        for ($i = 1; $i <= $number_of_settings_instances; $i++) {

            $modify_settings_instance_arr[$i] = 'Settings Instance '.$i;

        }

        add_settings_field(
            'modify_settings_instance',
            'Modify Settings for',
            array($obj, 'fields_callback'),
            'heartyslider-setting-admin',
            'heartyslider_global_settings_section',
            array(
                'id' => 'modify_settings_instance',
                'type' => 'pills',
                'options' => $modify_settings_instance_arr,
                'default' => 1,
                //'force' => 1,
                'description' => 'Choose the settings instance you would like to modify. This is the free version of our <a href="https://www.heartyplugins.com/wordpress-plugins/premium-plugins/product/hearty-slider-pro" target="_blank">Hearty Slider Pro</a> plugin, so compared to the full version, it has limited features and settings. This plugin has 1 settings instance, 10 content items, simple widgets and shortcodes, so for <b>multiple settings instances</b>, <b>unlimited content items</b> and <b>flexible widgets</b>, <a href="https://www.heartyplugins.com/wordpress-plugins/premium-plugins/product/hearty-slider-pro" target="_blank">check out the full version</a>.',
            )
        );

        for ($i = 1; $i <= $number_of_settings_instances; $i++) {

			//------------- SCRIPT INSERT

            add_settings_field(
                'carousel_autorun_'.$i,
                'Slideshow Autorun <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'carousel_autorun_'.$i,
                    'type' => 'select',
                    'default' => '1',
                    'options' => array('1' => 'Yes','0' => 'No',),
                    'description' => 'Choose to animate the slideshow automatically.',
                )
            );

            add_settings_field(
                'cycling_speed_'.$i,
                'Slideshow Cycling Speed <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'cycling_speed_'.$i,
                    'type' => 'text',
                    'class' => 'hearty-sep',
                    'default' => '3000',
                    'description' => 'Insert the speed of the slideshow, in milliseconds. Insert only the value, for example: 5000, not 5000ms. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'caption_color_'.$i,
                'Caption Color <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'caption_color_'.$i,
                    'type' => 'select',
                    'default' => 'heartyslider-caption-dark',
                    'options' => array('heartyslider-caption-transparent' => 'Transparent','heartyslider-caption-dark' => 'Dark','heartyslider-caption-light' => 'Light',),
                    'description' => 'Set the caption color for the slideshow.',
                )
            );

            add_settings_field(
                'show_caption_effect_'.$i,
                'Show Caption Effect <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'show_caption_effect_'.$i,
                    'type' => 'select',
                    'class' => 'hearty-sep',
                    'default' => '1',
                    'options' => array('1' => 'Yes','0' => 'No',),
                    'description' => 'Choose if a CSS3 effect for the slideshow caption should be displayed or not. Note that the CSS3 features are not supported by older browsers.',
                )
            );

            add_settings_field(
                'show_title_'.$i,
                'Show Caption Title <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'show_title_'.$i,
                    'type' => 'select',
                    'default' => '1',
                    'options' => array('1' => 'Yes','0' => 'No',),
                    'description' => 'Choose if the caption title for the slideshow should be displayed or not.',
                )
            );

            add_settings_field(
                'title_color_'.$i,
                'Title Color <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'title_color_'.$i,
                    'type' => 'text',
                    'class' => 'hearty-colorpicker',
                    'default' => '#FFFFFF',
                    'description' => 'Choose the color for the title of the slideshow. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'title_font_size_'.$i,
                'Title Font Size <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'title_font_size_'.$i,
                    'type' => 'text',
                    'class' => '',
                    'default' => '21px',
                    'description' => 'Insert the font size for the title using pixels, percent or em (for example: 14px, 120% or 1.2em, not 14). A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'title_line_height_'.$i,
                'Title Line Height <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'title_line_height_'.$i,
                    'type' => 'text',
                    'class' => '',
                    'default' => '1.3em',
                    'description' => 'Insert the line height for the title using pixels or em (for example: 14px or 1.2em, not 14). The line-height property is used to modify the spacing between the lines of text. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'title_margin_'.$i,
                'Title Margin <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'title_margin_'.$i,
                    'type' => 'text',
                    'class' => 'hearty-sep',
                    'default' => '0px 0px 10px 0px',
                    'description' => 'Insert the margin for the title using pixels or percent (for example: 14px or 10%, not 14). The margin is a CSS property that sets the space around the content, including the padding. The margin can have from 1 to 4 values (top, right, bottom and left). A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'show_description_'.$i,
                'Show Caption Description <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'show_description_'.$i,
                    'type' => 'select',
                    'default' => '1',
                    'options' => array('1' => 'Yes','0' => 'No',),
                    'description' => 'Choose if the caption description for the slideshow should be displayed or not.',
                )
            );

            add_settings_field(
                'description_text_color_'.$i,
                'Description Text Color <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'description_text_color_'.$i,
                    'type' => 'text',
                    'class' => 'hearty-colorpicker',
                    'default' => '#FFFFFF',
                    'description' => 'Choose the color for the description text. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'description_text_font_size_'.$i,
                'Description Font Size <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'description_text_font_size_'.$i,
                    'type' => 'text',
                    'class' => '',
                    'default' => '14px',
                    'description' => 'Insert the font size for the description text using pixels, percent or em (for example: 14px, 120% or 1.2em, not 14). A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'description_text_line_height_'.$i,
                'Description Line Height <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'description_text_line_height_'.$i,
                    'type' => 'text',
                    'class' => '',
                    'default' => '1.5em',
                    'description' => 'Insert the line height for the description text using pixels or em (for example: 14px or 1.2em, not 14). The line-height property is used to modify the spacing between the lines of text. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'description_text_margin_'.$i,
                'Description Margin <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'description_text_margin_'.$i,
                    'type' => 'text',
                    'class' => 'hearty-sep',
                    'default' => '0px',
                    'description' => 'Insert the margin for the description text using pixels or percent (for example: 14px or 10%, not 14). The margin is a CSS property that sets the space around the content, including the padding. The margin can have from 1 to 4 values (top, right, bottom and left). A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'show_mobile_title_'.$i,
                'Show Mobile Title <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'show_mobile_title_'.$i,
                    'type' => 'select',
                    'default' => '1',
                    'options' => array('1' => 'Yes','0' => 'No',),
                    'description' => 'Choose if the caption title for the slideshow should be displayed or not on mobile devices.',
                )
            );

            add_settings_field(
                'show_mobile_description_'.$i,
                'Show Mobile Description <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'show_mobile_description_'.$i,
                    'type' => 'select',
                    'default' => '1',
                    'options' => array('1' => 'Yes','0' => 'No',),
                    'description' => 'Choose if the caption description for the slideshow should be displayed or not on mobile devices.',
                )
            );

            add_settings_field(
                'caption_hide_'.$i,
                'Mobile Caption Hide <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'caption_hide_'.$i,
                    'type' => 'text',
                    'class' => 'hearty-sep',
                    'default' => '0px',
                    'description' => 'Insert the maximum width of the device when the caption is no longer visible using pixels (for example: 420px not 420). For example, when setting the caption hide to 420px, the caption is no longer visible for any device with a width smaller than 420px. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'show_arrows_'.$i,
                'Show Arrows <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'show_arrows_'.$i,
                    'type' => 'select',
                    'default' => '1',
                    'options' => array('1' => 'Yes','0' => 'No',),
                    'description' => 'Choose if the arrows for the slideshow should be displayed or not.',
                )
            );

            add_settings_field(
                'arrows_color_'.$i,
                'Arrows Color <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'arrows_color_'.$i,
                    'type' => 'text',
                    'class' => 'hearty-colorpicker',
                    'default' => '#FFFFFF',
                    'description' => 'Choose the color for the carousel navigation arrows. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'arrows_bg_color_'.$i,
                'Arrows Background Color <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'arrows_bg_color_'.$i,
                    'type' => 'text',
                    'class' => 'hearty-colorpicker',
                    'default' => '#111111',
                    'description' => 'Choose the background color for the carousel navigation arrows. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'arrows_border_radius_'.$i,
                'Arrows Border Radius <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'arrows_border_radius_'.$i,
                    'type' => 'text',
                    'class' => 'hearty-sep',
                    'default' => '0',
                    'description' => 'Insert the border-radius for the arrows using pixels or percent (for example: 140px or 80%, not 140). For circle background shapes for arrows, choose the 50% value. Note that the CSS3 features are not supported by older browsers. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'show_indicators_'.$i,
                'Show Indicators <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'show_indicators_'.$i,
                    'type' => 'select',
                    'default' => '1',
                    'options' => array('1' => 'Yes','0' => 'No',),
                    'description' => 'Choose if the bullet indicators for the slideshow should be displayed or not.',
                )
            );

            add_settings_field(
                'indicators_color_'.$i,
                'Indicators Color <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'indicators_color_'.$i,
                    'type' => 'select',
                    'default' => 'heartyslider-dark',
                    'options' => array('heartyslider-dark' => 'Dark','heartyslider-light' => 'Light',),
                    'description' => 'Choose the color for the bullet indicators. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'indicators_active_color_'.$i,
                'Indicators Active Color <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_basic_section',
                array(
                    'id' => 'indicators_active_color_'.$i,
                    'type' => 'text',
                    'class' => 'hearty-colorpicker',
                    'default' => '#f5504e',
                    'description' => 'Choose the color for the active bullet indicator. A blank field reverts the setting to the default value.',
                )
            );

			for ($j = 1; $j <= $number_of_content_items; $j++) {

            add_settings_field(
                'show_slide'.$j.'_'.$i,
                'Show Slide '.$j.' <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_content_options_section_'.$j,
                array(
                    'id' => 'show_slide'.$j.'_'.$i,
                    'type' => 'select',
                    'class' => 'hearty-sep',
                    'default' => '1',
                    'options' => array('1' => 'Yes','0' => 'No',),
                    'description' => 'Choose if this slide should be displayed or not.',
                )
            );

			add_settings_field(
				'upload_image'.$j.'_'.$i,
				'Image '.$j.' Upload <span class="hearty-admin-badge">'.$i.'</span>',
				array($obj, 'media_callback'),
				'heartyslider-setting-admin',
				'heartyslider_content_options_section_'.$j,
				array(
					'id' => 'upload_image'.$j.'_'.$i,
					'type' => 'text',
					'default' => '',
					'description' => 'Upload the image for this slide. To clear the uploaded image, press the clear (X) button. After uploading the image, please save your changes.',
				)
			);

            add_settings_field(
                'image_alt'.$j.'_'.$i,
                'Image '.$j.' Alt Text <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_content_options_section_'.$j,
                array(
                    'id' => 'image_alt'.$j.'_'.$i,
                    'type' => 'text',
                    'class' => '',
                    'default' => '',
                    'description' => 'Insert the text for the image Alt. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'image_link'.$j.'_'.$i,
                'Image '.$j.' Link <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_content_options_section_'.$j,
                array(
                    'id' => 'image_link'.$j.'_'.$i,
                    'type' => 'text',
                    'class' => '',
                    'default' => '',
                    'description' => 'Insert the URL for the image. Note that the link must include http:// or https://. A blank field means that no link is assigned to the image.',
                )
            );

            add_settings_field(
                'image_link_target'.$j.'_'.$i,
                'Image '.$j.' Link Target <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_content_options_section_'.$j,
                array(
                    'id' => 'image_link_target'.$j.'_'.$i,
                    'type' => 'select',
                    'class' => 'hearty-sep',
                    'default' => 'blank',
                    'options' => array('self' => 'self','blank' => 'blank','parent' => 'parent','top' => 'top',),
                    'description' => 'Choose the target for the URL of the image.',
                )
            );

            add_settings_field(
                'title_text'.$j.'_'.$i,
                'Title '.$j.' Text <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_content_options_section_'.$j,
                array(
                    'id' => 'title_text'.$j.'_'.$i,
                    'type' => 'text',
                    'class' => 'hearty-sep',
                    'default' => 'Simply Amazing',
                    'description' => 'Insert the text for the title inside the caption. A blank field reverts the setting to the default value.',
                )
            );

            add_settings_field(
                'description_text'.$j.'_'.$i,
                'Description '.$j.' Text <span class="hearty-admin-badge">'.$i.'</span>',
                array($obj, 'fields_callback'),
                'heartyslider-setting-admin',
                'heartyslider_content_options_section_'.$j,
                array(
                    'id' => 'description_text'.$j.'_'.$i,
                    'type' => 'textarea',
                    'class' => '',
                    'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                    'description' => 'Insert the text for the description inside the caption. A blank field reverts the setting to the default value.',
                )
            );

			}

            //------------- END SCRIPT INSERT

        }

	}

}

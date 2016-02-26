<?php
/*
 * Author: KhangLe
 * 
 * 
 */

function benefit_theme_customize_register($wp_customize) {
    $wp_customize->add_section('schedule', array(
        'title' => __('SCHEDULE PAGE'),
        'priority' => 99,
    ));
    $wp_customize->add_setting('google_calendar_iframe', array(
        'default' => '',
    ));
    $wp_customize->add_control('google_calendar_iframe_c', array(
        'label' => __('Public Google Calendar Iframe'),
        'section' => 'schedule',
        'settings' => 'google_calendar_iframe',
        'priority' => 1,
        'type' => 'textarea',
    ));
}

add_action('customize_register', 'benefit_theme_customize_register');


function get_google_calendar_iframe() {

    return get_theme_mod('google_calendar_iframe');
}

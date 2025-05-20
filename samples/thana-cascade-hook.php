<?php
/**
 * Clean WordPress Filter Snippet: Dynamic Thana Cascade Field Hook
 * Author: Md Mehedi Sheikh (@mdmehedisheikh) | Mehedi It Solution
 */

if (!defined('ABSPATH')) {
    exit;
}

add_filter('woocommerce_checkout_fields', 'mits_override_checkout_thana_fields', 9999);

function mits_override_checkout_thana_fields($fields) {
    // 1. Convert City field into standardized District Selector
    $fields['billing']['billing_city']['type'] = 'select';
    $fields['billing']['billing_city']['label'] = __('District (জেলা)', 'mehedi-it-bd-checkout');
    $fields['billing']['billing_city']['required'] = true;
    $fields['billing']['billing_city']['class'] = array('form-row-wide', 'mits-district-select');

    // 2. Inject Sub-District / Thana Field with Dynamic Cascading
    $fields['billing']['billing_address_2']['type'] = 'select';
    $fields['billing']['billing_address_2']['label'] = __('Thana / Upazila (থানা)', 'mehedi-it-bd-checkout');
    $fields['billing']['billing_address_2']['placeholder'] = __('Select District First', 'mehedi-it-bd-checkout');
    $fields['billing']['billing_address_2']['required'] = true;
    $fields['billing']['billing_address_2']['class'] = array('form-row-wide', 'mits-thana-select');

    return $fields;
}
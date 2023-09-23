<?php

function assessment_custom_endpoint_list() {

    register_rest_route('assessment/v1', '/get-list', array(
        'methods' => 'GET',
        'callback' => 'assessment_get_list_callback',
    ));

    register_rest_route('assessment/v1', '/create-list', array(
        'methods' => 'POST',
        'callback' => 'assessment_create_list_callback',
    ));

    register_rest_route('assessment/v1', '/delete-list', array(
        'methods' => 'POST',
        'callback' => 'assessment_delete_list_callback',
    ));

    register_rest_route('assessment/v1', '/get-item', array(
        'methods' => 'GET',
        'callback' => 'assessment_get_item_callback',
    ));

    register_rest_route('assessment/v1', '/create-item', array(
        'methods' => 'POST',
        'callback' => 'assessment_create_item_callback',
    ));

    register_rest_route('assessment/v1', '/delete-item', array(
        'methods' => 'POST',
        'callback' => 'assessment_delete_item_callback',
    ));

}
add_action('rest_api_init', 'assessment_custom_endpoint_list');

?>
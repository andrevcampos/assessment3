<?php

    function assessment_custom_endpoint() {
        register_rest_route('assessment/v1', '/create-list', array(
            'methods' => 'POST',
            'callback' => 'assessment_create_list_callback',
        ));
    }

    function assessment_create_list_callback($request) {

        include '../../../../wp-load.php';
    
        $title = $request->get_param('title');
        $userid = $request->get_param('userid');
        // $title = $_POST["title"];
        // $userid = $_POST["userid"];

        //lowercap
        $post_name = strtolower($title);
        //remove white space
        $post_name2 = trim($post_name);
        //replace space with -
        $slug = str_replace(' ', '-', $post_name2);
        //add region to slug
        $regionslug = $slug;

        //Create Post
        $my_post = array(
        'post_title'    => $title,
        'post_status'   => 'publish',
        'post_author'   => $userid,
        'post_type'   => 'todo-list',
        'post_name'   => $regionslug,
        );

        $post_id = wp_insert_post( $my_post );

        if ($post_id) {
            // Success response
            http_response_code(200);
            echo json_encode(array("message" => "Post created successfully", "Title" => $title));
            //echo json_encode(array("message" => "Post created successfully", "post_id" => $post_id));
        } else {
            // Error response
            http_response_code(500);
            echo json_encode(array("message" => "Error creating post"));
        }
    }
    
    add_action('rest_api_init', 'assessment_custom_endpoint');

    // // Register the custom endpoint
    // add_action('rest_api_init', 'assessment_custom_endpoint');

    // include '../../../../wp-load.php';

    // $title = $_POST["title"];
    // $userid = $_POST["userid"];
    // //lowercap
    // $post_name = strtolower($title);
    // //remove white space
    // $post_name2 = trim($post_name);
    // //replace space with -
    // $slug = str_replace(' ', '-', $post_name2);
    // //add region to slug
    // $regionslug = $slug;

    // //Create Post
    // $my_post = array(
    // 'post_title'    => $title,
    // 'post_status'   => 'publish',
    // 'post_author'   => $userid,
    // 'post_type'   => 'todo-list',
    // 'post_name'   => $regionslug,
    // );

    // $post_id = wp_insert_post( $my_post );

    // if ($post_id) {
    //     // Success response
    //     http_response_code(200);
    //     echo json_encode(array("message" => "Post created successfully"));
    //     //echo json_encode(array("message" => "Post created successfully", "post_id" => $post_id));
    // } else {
    //     // Error response
    //     http_response_code(500);
    //     echo json_encode(array("message" => "Error creating post"));
    // }

?>
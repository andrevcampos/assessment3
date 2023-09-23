<?php
    function assessment_create_item_callback($request) {
        include '../../../../wp-load.php';
        $meta_value = $request->get_param('title');
        $post_id = $request->get_param('postid');
        $meta_key = 'todoitem';
        // Add post metadata
        $result = add_post_meta($post_id, $meta_key, $meta_value, false);
        if ($result) {
            http_response_code(200);
            echo json_encode(array("message" => "Item created successfully", "Title" => $meta_value));
        } else {
            http_response_code(500);
            echo json_encode(array("message" => "Error creating item"));
        }
    }
?>
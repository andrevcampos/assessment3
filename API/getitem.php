<?php

    function assessment_get_item_callback($request) {

        include '../../../../wp-load.php';
    
        $post_id = $request->get_param('postid');
        $meta_key = 'todoitem';

        $meta_value = get_post_meta($post_id, $meta_key, false);

        if (!empty($meta_value)) {

            foreach ($meta_value as $post) {
                setup_postdata($post);
                $posts_array[] = array(
                    "Title" => $post,
                );
            }
            $message = "You have " . count($meta_value) . " item registered.";
            // Success response
            http_response_code(200);
            echo json_encode(array("message" => $message, "posts" => $posts_array));
        } else {
            $message = "You have an empty item list";
            // Error response
            http_response_code(500);
            echo json_encode(array("message" => $message));
        }

    }
    
?>
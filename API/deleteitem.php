<?php
    function assessment_delete_item_callback($request) {
        include '../../../../wp-load.php';
        $post_id = $request->get_param('postid');
        $meta_value = $request->get_param('title');
        $meta_key = 'todoitem';
        // delete post metadata
        $result = delete_post_meta($post_id, $meta_key, $meta_value);
        if ($result) {
            http_response_code(200);
            echo json_encode(array("message" => "Item deleted successfully", "Title" => $meta_value));
        } else {
            http_response_code(500);
            echo json_encode(array("message" => "Error deleting the item"));
        }
    }
?>
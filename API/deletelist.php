<?php
    function assessment_delete_list_callback($request) {
        include '../../../../wp-load.php';
        $post_id = $request->get_param('postid');
        $result = wp_delete_post($post_id, true);
        if ($result) {
            http_response_code(200);
            echo json_encode(array("message" => "List deleted successfully"));
        } else {
            http_response_code(500);
            echo json_encode(array("message" => "Error deleting the list"));
        }
    }
?>
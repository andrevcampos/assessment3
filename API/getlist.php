<?php

    function assessment_get_list_callback($request) {

        include '../../../../wp-load.php';
    
        $userid = $request->get_param('userid');

        $author_posts = get_posts(array(
            'author' => $userid, // Replace 1 with the author's ID
            'post_type' => 'todo-list', // You can specify the post type if needed
            'posts_per_page' => -1, // Retrieve all posts by the author
        ));

        if (!empty($author_posts)) {
            $posts_array = array();

            foreach ($author_posts as $post) {
                setup_postdata($post);

                // Get the post title and ID
                $post_title = $post->post_title;
                $post_id = $post->ID;

                // Push the title and ID into the posts_array
                $posts_array[] = array(
                    "Title" => $post_title,
                    "ID" => $post_id,
                );
            }
            $message = "You have " . count($author_posts) . " list registered.";
            // Success response
            http_response_code(200);
            echo json_encode(array("message" => $message, "posts" => $posts_array));
        } else {
            $message = "You have an empty list";
            // Error response
            http_response_code(500);
            echo json_encode(array("message" => $message));
        }

    }
    
?>
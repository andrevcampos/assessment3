<?php

function ac_displaylist_shortcode() {

    wp_enqueue_script( 'mainjs', plugins_url() . '/assessment3/public/js.js' );
    $current_user_id = get_current_user_id();

    $api_url = "https://valedigital.co.nz/assessment3/wp-json/assessment/v1/get-list?userid=" . $current_user_id; // Replace with your API endpoint URL

    $ch = curl_init($api_url);
    
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);

    if ($response === false) {
        echo "cURL Error: " . curl_error($ch);
    } else {
        $data = json_decode($response, true);
        if ($data) {
            echo'<h4 class="text-body-emphasis">' . $data['message'] . '</h4>';
            // Data is retrieved successfully
            echo '<ul class="list-unstyled ps-0">';
                foreach ($data['posts'] as $post) {
                    echo '<li>';
                        echo '<a class="icon-link mb-1" href="https://valedigital.co.nz/assessment3/list/?id=' . $post["ID"] . '&title=' . $post["Title"] . '" rel="noopener"><i class="fa-solid fa-circle-arrow-right"></i>';
                            echo $post['Title'];
                        echo '</a>';
                        $postid = $post["ID"];
                        echo "<i onclick='DeleteList(\"$postid\")' class='px-2 fa-solid fa-xmark' style='cursor:pointer; color: #ff0000;'></i>";
                    echo '</li>';
                }
            echo '</ul>';
        } else {
            echo "Error decoding JSON data.";
        }
    }
    
    curl_close($ch);
}
add_shortcode('ac_displaylist', 'ac_displaylist_shortcode');
?>
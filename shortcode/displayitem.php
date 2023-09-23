<?php

function ac_displayitem_shortcode() {

    wp_enqueue_script( 'mainjs', plugins_url() . '/assessment3/public/js.js' );
    $current_user_id = get_current_user_id();
    
    $post_id = $_GET['id'];
    $title = $_GET['title'];

    $api_url = "https://valedigital.co.nz/assessment3/wp-json/assessment/v1/get-item?postid=" . $post_id; // Replace with your API endpoint URL

    $ch = curl_init($api_url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);

    echo"<a class='btn btn-primary mt-4 mb-4' href='https://valedigital.co.nz/assessment3/new-item/?postid=$post_id&posttitle=$title'>New Item</a>";

    echo'<h2 class="text-body-emphasis">' .  $title . '</h2>';

    if ($response === false) {
        echo "cURL Error: " . curl_error($ch);
    } else {
        $data = json_decode($response, true);
        if ($data) {
            echo'<h5 class="text-body-emphasis">' . $data['message'] . '</h5><br>';
            // Data is retrieved successfully
            echo '<ul class="list-unstyled ps-0">';
                foreach ($data['posts'] as $post) {
                    echo '<li class="mt-2" style="font-size:18px;">';
                        echo '<i class="fa-regular fa-square px-2"></i>';
                        echo $post['Title'];
                        $posttitle = $post['Title'];
                        echo "<i onclick='DeleteItem(\"$post_id\",\"$posttitle\",\"$title\")' class='px-2 fa-solid fa-xmark' style='cursor:pointer; color: #ff0000;'></i>";
                    echo '</li>';
                }
            echo '</ul>';
        } else {
            echo "Error decoding JSON data.";
        }
    }
    
    curl_close($ch);
}
add_shortcode('ac_displayitem', 'ac_displayitem_shortcode');
?>
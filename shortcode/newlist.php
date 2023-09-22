<?php

function ac_newlist_shortcode() {
    ob_start();

    wp_enqueue_script( 'mainjs', plugins_url() . '/assessment3/public/js.js' );
    $current_user_id = get_current_user_id();

    ?>

    <input type="text" class="form-control" name="userid" id="userid" value="<?php echo $current_user_id; ?>" style="display: none;">
    <div class="form-floating">
        <input class="form-control" type="text" name="title" id="title">
        <label for="floatingInput">Title</label>
    </div>
    <button id="myButton" class="btn btn-primary w-100 py-2 mt-3" onclick="CreateNewList()">Create List</button>


    <?php

    return ob_get_clean();
}
// Register shortcode
add_shortcode('ac_newlist', 'ac_newlist_shortcode');

?>
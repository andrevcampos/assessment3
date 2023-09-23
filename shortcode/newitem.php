<?php

function ac_newitem_shortcode() {
    ob_start();

    wp_enqueue_script( 'mainjs', plugins_url() . '/assessment3/public/js.js' );
    $current_user_id = get_current_user_id();
    $post_id = $_GET['postid'];
    $posttitle = $_GET['posttitle'];

    ?>

    <input type="text" class="form-control" name="posttitle" id="posttitle" value="<?php echo $posttitle; ?>" style="display: none;">
    <input type="text" class="form-control" name="postid" id="postid" value="<?php echo $post_id; ?>" style="display: none;">
    <div class="form-floating">
        <input class="form-control" type="text" name="title" id="title">
        <label for="floatingInput">Title</label>
    </div>
    <button id="myButton" class="btn btn-primary w-100 py-2 mt-3" onclick="CreateNewItem()">Create Item</button>


    <?php

    return ob_get_clean();
}
// Register shortcode
add_shortcode('ac_newitem', 'ac_newitem_shortcode');

?>
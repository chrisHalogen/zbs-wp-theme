<?php

if (!defined('ABSPATH')) exit;

function zbs_about_settings()
{

    if (isset($_POST['submit'])) {
        // write_log($_POST);
        try {

            if (isset($_POST['icon-media-id'])) {
                $icon = sanitize_text_field($_POST['icon-media-id']);
                zbs_update_wp_option('zbs-about-hero', $icon);
            }

            if (isset($_POST['about-content'])) {
                $content = sanitize_textarea_field($_POST['about-content']);
                zbs_update_wp_option('zbs-about-text', $content);
            }

            if (isset($_POST['mission'])) {
                $icon = sanitize_text_field($_POST['mission']);
                zbs_update_wp_option('zbs-mission', $icon);
            }

            if (isset($_POST['vision'])) {
                $icon = sanitize_text_field($_POST['vision']);
                zbs_update_wp_option('zbs-vision', $icon);
            }

            $bod = [];

            for ($i = 1; $i < 4; $i++) {

                if (isset($_POST["bod-$i-name"]) && isset($_POST["bod-$i-role"]) && isset($_POST["bod-$i-about"])) {
                    $temp = array(
                        "name" => sanitize_text_field($_POST["bod-$i-name"]),
                        "role" => sanitize_text_field($_POST["bod-$i-role"]),
                        "about" => sanitize_textarea_field($_POST["bod-$i-about"])
                    );

                    array_push($bod, $temp);
                }
            }

            zbs_update_wp_option('zbs-bod', $bod);

            // write_log($bod);

            echo "<script>location.replace('admin.php?page=zbs-about-page-options&result=1');</script>";
        } catch (\Throwable $th) {

            echo "<script>location.replace('admin.php?page=zbs-about-page-options&result=0');</script>";
        }
    }

    if (isset($_GET['result']) && $_GET['result'] == 0) {
        $class = 'notice notice-error';
        $message = __('An error Occured', 'zbs-theme');

        printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
    } else if (isset($_GET['result']) && $_GET['result'] == 1) {
        $class = 'notice notice-success is-dismissible';
        $message = __('The Options Updated Successfully', 'zbs-theme');

        printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
    }

    $image = "";
    $image_id = 0;

    if (wp_get_attachment_url(get_option('zbs-about-hero'))) {
        $image = wp_get_attachment_url(get_option('zbs-about-hero'));
        $image_id = get_option('zbs-about-hero');
    }

    $directors = get_option('zbs-bod');

?>

    <div class="wrap" id="zbs-options" class="media-upload-required">
        <h2>About Page Options</h2>
        <p>Welcome to the General Theme Options</p>

        <form action="" method="post">
            <table class="form-table">
                <tbody>

                    <tr>
                        <th scope="row">
                            <label for="logo">Hero Background</label>
                        </th>
                        <td>

                            <img id="asset-image-tag" style="display: block;max-width: 200px;max-height:200px" src="<?php if ($image) echo $image ?>">
                            <br>
                            <input type="hidden" id="icon-media-id" name="icon-media-id" value="<?php if ($image_id) echo $image_id ?>">
                            <input type="button" id="image-select-button" class="button" name="custom_image_data" value="Select Image">
                            <input type="button" id="image-delete-button" class="button" name="custom_image_data" value="Delete Image">

                            <p class="description">Upload the hero image of the about page</p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="about-content">About Content</label>
                        </th>
                        <td>
                            <textarea name="about-content" class="regular-text" id="about-content" cols="40" rows="5"><?php if (get_option('zbs-about-text')) echo get_option('zbs-about-text') ?></textarea>

                            <p class="description">About Us Content</p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="mission">Mission Statement</label>
                        </th>

                        <td>
                            <input name="mission" type="tel" id="mission" class="regular-text" value="<?php if (get_option('zbs-mission')) echo get_option('zbs-mission') ?>">

                            <p class="description">What is ZBS Mission Statement</p>
                        </td>
                    </tr>

                    <!-- <tr>
                        <th scope="row">
                            <label for="vision">Vision</label>
                        </th>

                        <td>
                            <input name="vision" type="tel" id="vision" class="regular-text" value="<?php if (get_option('zbs-vision')) echo get_option('zbs-vision') ?>">

                            <p class="description">Enter ZBS Vision</p>
                        </td>
                    </tr> -->

                    <tr>
                        <th scope="row">
                            <label for="vision">Vision</label>
                        </th>

                        <td>
                            <input name="vision" type="tel" id="vision" class="regular-text" value="<?php if (get_option('zbs-vision')) echo get_option('zbs-vision') ?>">

                            <p class="description">Enter ZBS Vision</p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="bod-1">Members of BOD</label>
                        </th>

                        <td>
                            <?php
                            $position = ['First', 'Second', 'Third'];

                            for ($i = 0; $i < 3; $i++) {
                                $inc = $i + 1;
                            ?>

                                <p class="description"><?php echo $position[$i] ?> Person</p>
                                <br>
                                <input name="bod-<?php echo $inc ?>-name" type="tel" id="bod-<?php echo $inc ?>-name" class="regular-text" value="<?php echo isset($directors[$i]['name']) ? $directors[$i]['name'] : "" ?>" placeholder="The Name of this Board Member">
                                <br>
                                <br>
                                <input name="bod-<?php echo $inc ?>-role" type="tel" id="bod-<?php echo $inc ?>-role" class="regular-text" value="<?php echo isset($directors[$i]['role']) ? $directors[$i]['role'] : "" ?>" placeholder="The Role of this Board Member">
                                <br>
                                <br>

                                <textarea name="bod-<?php echo $inc ?>-about" class="regular-text" id="bod-<?php echo $inc ?>-about" cols="40" rows="5" placeholder="About this BOD member"><?php echo isset($directors[$i]['about']) ? $directors[$i]['about'] : "" ?></textarea>
                                <br>
                                <br>

                            <?php
                            }
                            ?>
                            <!-- First BOD Member -->
                            <!-- <p class="description">First Person</p>
                            <br>
                            <input name="bod-1-name" type="tel" id="bod-1-name" class="regular-text" value="<?php echo isset($directors[0]['name']) ? $directors[0]['name'] : "" ?>" placeholder="The Name of this Board Member">
                            <br>
                            <br>
                            <input name="bod-1-role" type="tel" id="bod-1-role" class="regular-text" value="<?php echo isset($directors[0]['role']) ? $directors[0]['role'] : "" ?>" placeholder="The Role of this Board Member">
                            <br>
                            <br>
                            <textarea name="bod-1-about" class="regular-text" id="bod-1-about" cols="40" rows="5" placeholder="About this BOD member"><?php echo isset($directors[0]['about']) ? $directors[0]['about'] : "" ?></textarea>
                            <br>
                            <br> -->

                            <!-- Second BOD Member -->
                            <!-- <p class="description">Second Person</p>
                            <br>
                            <input name="bod-2-name" type="tel" id="bod-2-name" class="regular-text" value="<?php echo "" ?>" placeholder="The Name of this Board Member">
                            <br>
                            <br>
                            <input name="bod-2-role" type="tel" id="bod-2-role" class="regular-text" value="<?php echo "" ?>" placeholder="The Role of this Board Member">
                            <br>
                            <br>
                            <textarea name="bod-2-about" class="regular-text" id="bod-2-about" cols="40" rows="5" placeholder="About this BOD member"><?php echo "" ?></textarea>
                            <br>
                            <br> -->

                            <!-- Third Person -->
                            <!-- <p class="description">Third Person</p>
                            <br>
                            <input name="bod-3-name" type="tel" id="bod-3-name" class="regular-text" value="<?php echo "" ?>" placeholder="The Name of this Board Member">
                            <br>
                            <br>
                            <input name="bod-3-role" type="tel" id="bod-3-role" class="regular-text" value="<?php echo "" ?>" placeholder="The Role of this Board Member">
                            <br>
                            <br>
                            <textarea name="bod-3-about" class="regular-text" id="bod-3-about" cols="40" rows="5" placeholder="About this BOD member"><?php echo "" ?></textarea> -->

                            <!-- <p class="description">The name of this member</p> -->
                        </td>
                    </tr>


                </tbody>
            </table>
            <p class="submit">

                <button type="submit" name="submit" id="submit" class="button button-primary">Save Changes &#10003;</button>

            </p>
        </form>
    </div>
    <?php

    if (isset($_GET['result']) && $_GET['result'] == 1) {
    ?>
        <script>
            // Change the current URL in case it has the result get parameter
            const nextURL = "<?php echo admin_url("admin.php?page=zbs-about-page-options") ?>";
            const nextTitle = 'Theme Options Page';
            const nextState = {
                additionalInformation: 'Updated the URL with JS'
            };

            window.history.pushState(nextState, nextTitle, nextURL);
        </script>

    <?php
    }


    ?>

<?php

}

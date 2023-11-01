<?php

if (!defined('ABSPATH')) exit;

function zbs_general_settings()
{

    if (isset($_POST['submit'])) {
        // write_log($_POST);
        try {
            // Save Welcome Text
            if (isset($_POST['welcome'])) {
                $welcome = sanitize_text_field($_POST['welcome']);
                zbs_update_wp_option('zbs-welcome', $welcome);
            }

            // Save Street
            if (isset($_POST['street'])) {
                $street = sanitize_text_field($_POST['street']);
                zbs_update_wp_option('zbs-street', $street);
            }

            // Save City
            if (isset($_POST['city-state'])) {
                $city = sanitize_text_field($_POST['city-state']);
                zbs_update_wp_option('zbs-city-state', $city);
            }

            // Save Phone Number
            if (isset($_POST['phone'])) {
                $phone = sanitize_text_field($_POST['phone']);
                zbs_update_wp_option('zbs-phone', $phone);
            }

            // if (isset($_POST['address'])) {
            //     $address = sanitize_textarea_field($_POST['address']);
            //     zbs_update_wp_option('zbs-address', $address);
            // }

            if (isset($_POST['email'])) {
                $email = sanitize_email($_POST['email']);
                zbs_update_wp_option('zbs-email', $email);
            }

            if (isset($_POST['facebook'])) {
                $fb = sanitize_url($_POST['facebook']);
                zbs_update_wp_option('zbs-fb', $fb);
            }

            if (isset($_POST['twitter'])) {
                $twitter = sanitize_url($_POST['twitter']);
                zbs_update_wp_option('zbs-tw', $twitter);
            }

            if (isset($_POST['linkedin'])) {
                $ln = sanitize_url($_POST['linkedin']);
                zbs_update_wp_option('zbs-ln', $ln);
            }

            if (isset($_POST['instagram'])) {
                $ig = sanitize_url($_POST['instagram']);
                zbs_update_wp_option('zbs-ig', $ig);
            }

            if (isset($_POST['icon-media-id'])) {
                $icon = sanitize_text_field($_POST['icon-media-id']);
                zbs_update_wp_option('zbs-logo', $icon);
            }

            if (isset($_POST['footer-content'])) {
                $content = sanitize_textarea_field($_POST['footer-content']);
                zbs_update_wp_option('zbs-ft-text', $content);
            }

            echo "<script>location.replace('admin.php?page=zbs-options&result=1');</script>";
        } catch (\Throwable $th) {
            echo "<script>location.replace('admin.php?page=zbs-options&result=0');</script>";
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

    if (wp_get_attachment_url(get_option('zbs-logo'))) {
        $image = wp_get_attachment_url(get_option('zbs-logo'));
        $image_id = get_option('zbs-logo');
    }

?>

    <div class="wrap" id="zbs-options" class="media-upload-required">
        <h2>Theme Options</h2>
        <p>Welcome to the General Theme Options</p>

        <form action="" method="post">
            <table class="form-table">
                <tbody>
                    <!-- <tr>
                        <th scope="row">
                            <label for="welcome">Welcome Text</label>
                        </th>

                        <td>
                            <input name="welcome" type="text" id="welcome" class="regular-text" value="<?php if (get_option('zbs-welcome')) echo get_option('zbs-welcome') ?>">

                            <p class="description">Enter Welcome Text on the Topmost Section</p>
                        </td>
                    </tr> -->
                    <tr>
                        <th scope="row">
                            <label for="phone">Phone Number</label>
                        </th>

                        <td>
                            <input name="phone" type="tel" id="phone" class="regular-text" value="<?php if (get_option('zbs-phone')) echo get_option('zbs-phone') ?>">

                            <p class="description">Enter Company's Contact Phone Number</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="street">Address Information</label>
                        </th>

                        <td>
                            <input name="street" type="text" id="street" class="regular-text" value="<?php if (get_option('zbs-street')) echo get_option('zbs-street') ?>" placeholder="Enter Street Address...">
                            <br>
                            <input name="city-state" type="text" id="city-state" class="regular-text" value="<?php if (get_option('zbs-city-state')) echo get_option('zbs-city-state') ?>" placeholder="Enter City, State...">

                            <!-- <textarea name="address" class="regular-text" id="address" cols="40" rows="5"><?php if (get_option('zbs-address')) echo get_option('zbs-address') ?></textarea> -->

                            <p class="description">Where is the business located?</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="email">Email Address</label>
                        </th>

                        <td>
                            <input name="email" type="email" id="email" class="regular-text" value="<?php if (get_option('zbs-email')) echo get_option('zbs-email') ?>">

                            <p class="description">What is company's Contact Email Address?</p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="facebook">Facebook URL</label>
                        </th>

                        <td>
                            <input name="facebook" type="url" id="facebook" class="regular-text" value="<?php if (get_option('zbs-fb')) echo get_option('zbs-fb') ?>">

                            <p class="description">The link to your Facebook Page</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="twitter">Twitter URL</label>
                        </th>

                        <td>
                            <input name="twitter" type="url" id="twitter" class="regular-text" value="<?php if (get_option('zbs-tw')) echo get_option('zbs-tw') ?>">

                            <p class="description">The link to your Twitter Page</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="linkedin">Linkedin URL</label>
                        </th>

                        <td>
                            <input name="linkedin" type="url" id="linkedin" class="regular-text" value="<?php if (get_option('zbs-ln')) echo get_option('zbs-ln') ?>">

                            <p class="description">The link to your Linkedin Page</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="instagram">Instagram URL</label>
                        </th>

                        <td>
                            <input name="instagram" type="url" id="instagram" class="regular-text" value="<?php if (get_option('zbs-ig')) echo get_option('zbs-ig') ?>">

                            <p class="description">The link to your Instagram Page</p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="logo">Logo</label>
                        </th>
                        <td>

                            <img id="asset-image-tag" style="display: block;max-width: 200px;max-height:200px" src="<?php if ($image) echo $image ?>">
                            <br>
                            <input type="hidden" id="icon-media-id" name="icon-media-id" value="<?php if ($image_id) echo $image_id ?>">
                            <input type="button" id="image-select-button" class="button" name="custom_image_data" value="Select Image">
                            <input type="button" id="image-delete-button" class="button" name="custom_image_data" value="Delete Image">

                            <p class="description">Upload Your Business Logo</p>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            <label for="footer-content">Footer Content</label>
                        </th>
                        <td>
                            <textarea name="footer-content" class="regular-text" id="footer-content" cols="40" rows="5"><?php if (get_option('zbs-ft-text')) echo get_option('zbs-ft-text') ?></textarea>

                            <p class="description">The text under the Footer Logo</p>
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
            const nextURL = "<?php echo admin_url("admin.php?page=zbs-options") ?>";
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

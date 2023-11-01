<?php

if (!defined('ABSPATH')) exit;

function zbs_contact_settings()
{

    if (isset($_POST['submit'])) {
        // write_log($_POST);
        try {

            if (isset($_POST['icon-media-id'])) {
                $icon = sanitize_text_field($_POST['icon-media-id']);
                zbs_update_wp_option('zbs-contact-hero', $icon);
            }

            echo "<script>location.replace('admin.php?page=zbs-contact-page-options&result=1');</script>";
        } catch (\Throwable $th) {

            echo "<script>location.replace('admin.php?page=zbs-contact-page-options&result=0');</script>";
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

    if (wp_get_attachment_url(get_option('zbs-contact-hero'))) {
        $image = wp_get_attachment_url(get_option('zbs-contact-hero'));
        $image_id = get_option('zbs-contact-hero');
    }

?>

    <div class="wrap" id="zbs-options" class="media-upload-required">
        <h2>Contact Page Options</h2>
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

                            <p class="description">Upload the hero image of the contact page</p>
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
            const nextURL = "<?php echo admin_url("admin.php?page=zbs-contact-page-options") ?>";
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

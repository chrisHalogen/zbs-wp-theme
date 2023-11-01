<?php

if (!defined('ABSPATH')) exit;

function zbs_home_settings()
{

    if (isset($_POST['submit'])) {
        // write_log($_POST);
        try {

            if (isset($_POST['intro'])) {
                $content = sanitize_textarea_field($_POST['intro']);
                zbs_update_wp_option('zbs-intro', $content);
            }

            if (isset($_POST['support'])) {
                $icon = sanitize_text_field($_POST['support']);
                zbs_update_wp_option('zbs-support', $icon);
            }

            if (isset($_POST['advisory'])) {
                $icon = sanitize_text_field($_POST['advisory']);
                zbs_update_wp_option('zbs-advisory', $icon);
            }

            if (isset($_POST['clients'])) {
                $icon = sanitize_text_field($_POST['clients']);
                zbs_update_wp_option('zbs-clients', $icon);
            }

            if (isset($_POST['transactions'])) {
                $icon = sanitize_text_field($_POST['transactions']);
                zbs_update_wp_option('zbs-transactions', $icon);
            }

            // write_log($bod);

            echo "<script>location.replace('admin.php?page=zbs-home-page-options&result=1');</script>";
        } catch (\Throwable $th) {

            echo "<script>location.replace('admin.php?page=zbs-home-page-options&result=0');</script>";
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

?>

    <div class="wrap" id="zbs-options" class="media-upload-required">
        <h2>Home Page Options</h2>
        <p>Welcome to the General Theme Options</p>

        <form action="" method="post">
            <table class="form-table">
                <tbody>

                    <tr>
                        <th scope="row">
                            <label for="home-content">Introduction</label>
                        </th>
                        <td>
                            <textarea name="intro" class="regular-text" id="intro" cols="40" rows="5"><?php if (get_option('zbs-intro')) echo get_option('zbs-intro') ?></textarea>

                            <p class="description">Home Page Introduction</p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="stats">Business Statistics</label>
                        </th>

                        <td>
                            <input name="support" type="tel" id="support" class="regular-text" value="<?php if (get_option('zbs-support')) echo get_option('zbs-support') ?>" placeholder="Number of People Supported..." pattern="[0-9]{1,5}">
                            <br><br>
                            <input name="advisory" type="tel" id="advisory" class="regular-text" value="<?php if (get_option('zbs-advisory')) echo get_option('zbs-advisory') ?>" placeholder="Number of Advisory..." pattern="[0-9]{1,5}">
                            <br><br>
                            <input name="clients" type="tel" id="clients" class="regular-text" value="<?php if (get_option('zbs-clients')) echo get_option('zbs-clients') ?>" placeholder="Number of Satisfied Clients..." pattern="[0-9]{1,5}">
                            <br><br>
                            <input name="transactions" type="tel" id="transactions" class="regular-text" value="<?php if (get_option('zbs-transactions')) echo get_option('zbs-transactions') ?>" placeholder="Number of Completed Transactions....." pattern="[0-9]{1,5}">

                            <p class="description">Business Statical Figures displayed on the Homepage</p>
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
            const nextURL = "<?php echo admin_url("admin.php?page=zbs-home-page-options") ?>";
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

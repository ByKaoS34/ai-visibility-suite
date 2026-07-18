<?php

if (!defined('ABSPATH')) {
    exit;
}

class AVS_Settings {


    public function __construct() {

        add_action(
            'admin_menu',
            array($this, 'add_settings_page')
        );

        add_action(
            'admin_init',
            array($this, 'register_settings')
        );

    }


    public function add_settings_page() {
error_log('AVS Settings menu çalıştı');
        add_submenu_page(
            'ai-visibility-suite',
            'AI Visibility Ayarları',
            'Ayarlar',
            'manage_options',
           'ai-visibility-settings',
            array($this, 'settings_page')
        );

    }


    public function register_settings() {


        register_setting(
            'avs_options',
            'avs_site_name'
        );


        register_setting(
            'avs_options',
            'avs_description'
        );


        register_setting(
            'avs_options',
            'avs_phone'
        );


        register_setting(
            'avs_options',
            'avs_whatsapp'
        );


        register_setting(
            'avs_options',
            'avs_keywords'
        );


        register_setting(
            'avs_options',
            'avs_site_type'
        );


        register_setting(
            'avs_options',
            'avs_main_topic'
        );

    }



    public function settings_page() {

?>

<div class="wrap">

<h1>AI Visibility Suite Ayarları</h1>


<form method="post" action="options.php">


<?php

settings_fields('avs_options');

?>


<table class="form-table">


<tr>

<th>Site / Firma Adı</th>

<td>

<input type="text"
name="avs_site_name"
value="<?php echo esc_attr(get_option('avs_site_name')); ?>"
class="regular-text">

</td>

</tr>



<tr>

<th>Açıklama</th>

<td>

<textarea
name="avs_description"
rows="5"
class="large-text"><?php echo esc_textarea(get_option('avs_description')); ?></textarea>

</td>

</tr>




<tr>

<th>Telefon</th>

<td>

<input type="text"
name="avs_phone"
value="<?php echo esc_attr(get_option('avs_phone')); ?>"
class="regular-text">

</td>

</tr>




<tr>

<th>WhatsApp</th>

<td>

<input type="text"
name="avs_whatsapp"
value="<?php echo esc_attr(get_option('avs_whatsapp')); ?>"
class="regular-text">

</td>

</tr>




<tr>

<th>Anahtar Kelimeler</th>

<td>

<textarea
name="avs_keywords"
rows="4"
class="large-text"><?php echo esc_textarea(get_option('avs_keywords')); ?></textarea>

</td>

</tr>




<tr>

<th>Site Türü</th>

<td>

<input type="text"
name="avs_site_type"
value="<?php echo esc_attr(get_option('avs_site_type')); ?>"
class="regular-text">

<p class="description">
Örnek: Information Website, Service Website, Affiliate Website
</p>

</td>

</tr>




<tr>

<th>Ana Konu</th>

<td>

<input type="text"
name="avs_main_topic"
value="<?php echo esc_attr(get_option('avs_main_topic')); ?>"
class="regular-text">

<p class="description">
Örnek: Air Conditioner Information, Comparisons and Guides
</p>

</td>

</tr>



</table>


<?php

submit_button('Ayarları Kaydet');

?>


</form>


</div>


<?php

    }


}

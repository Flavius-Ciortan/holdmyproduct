<?php
/**
 * Plugin Name: HoldMyProduct
 * Plugin URI: -
 * Description: You can reserve a product from the shop.
 * Version: 1.0
 * Author: Anghel Emanuel, Ciortan Flavius
 * Author URI: -
 * License: GPL2
 */

// ✅ Încarcă fișierul CSS din plugin (frontend)
function holdmyproduct_enqueue_styles() {
    // Rulează doar în frontend
    if (!is_admin()) {
        wp_enqueue_style(
            'holdmyproduct-style',
            plugin_dir_url(__FILE__) . 'style.css',
            array(),
            '1.0'
        );
    }
}
add_action('wp_enqueue_scripts', 'holdmyproduct_enqueue_styles');


// ✅ Afișează formularul doar pe paginile de produs WooCommerce
function holdmyproduct_display_form() {

    if ( !is_product() )
        return;

    include plugin_dir_path(__FILE__) . 'form_template.php';
}

//  function insert_custom_html_into_product() {
// 	// Path to your HTML file
// 	$html_file_path = get_template_directory() . '/index.html';

// 	// Check if the file exists
// 	if (file_exists($html_file_path)) {
// 		// Read the content of the HTML file
// 		$html_content = file_get_contents($html_file_path);

// 	// Output the HTML
// 	echo $html_content;
//      } else {
// 	echo '<p>HTML file not found.</p>';
//      }
// }

// Îl adăugăm sub butonul „Adaugă în coș”
add_action('woocommerce_after_add_to_cart_form', 'holdmyproduct_display_form');

// // Hook the function into the WooCommerce product page
// add_action('woocommerce_after_product_summary' , 'insert_custom_html_into_product', 10);

function holdmyproduct_enqueue_scripts() {
    if (!is_admin()) {
        wp_enqueue_script(
            'holdmyproduct-js',
            plugin_dir_url(__FILE__) . 'holdmyproduct.js',
            array('jquery'),
            '1.0',
            true
        );

        // Trimite la JS adresa AJAX și nonce pentru securitate
        wp_localize_script('holdmyproduct-js', 'holdmyproduct_ajax', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('holdmyproduct_nonce')
        ));
    }
}
add_action('wp_enqueue_scripts', 'holdmyproduct_enqueue_scripts');


function holdmyproduct_handle_reservation() {
    check_ajax_referer('holdmyproduct_nonce', 'security');

    $product_id = intval($_POST['product_id']);

    if (!$product_id) {
        wp_send_json_error('Invalid product ID.');
    }

    $product = wc_get_product($product_id);

    if (!$product) {
        wp_send_json_error('Product not found.');
    }

    // Verifică dacă produsul e gestionat stoc
    if (!$product->managing_stock()) {
        wp_send_json_error('Product stock is not managed.');
    }

    // Verifică stocul actual
    $stock_quantity = $product->get_stock_quantity();

    if ($stock_quantity <= 0) {
        wp_send_json_error('No stock available.');
    }

    // Scade 1 din stoc
    $new_stock = $stock_quantity - 1;
    $product->set_stock_quantity($new_stock);

    // Actualizează stocul în bază
    $product->save();

    wp_send_json_success('Stock updated.');

}
add_action('wp_ajax_holdmyproduct_reserve', 'holdmyproduct_handle_reservation');
add_action('wp_ajax_nopriv_holdmyproduct_reserve', 'holdmyproduct_handle_reservation');

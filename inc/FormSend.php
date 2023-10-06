<?php 
// обработка данных с формы
function formSend() {
    print_r($_POST);
    print_r($_FILES);
    die();
}
add_action('wp_ajax_formSend', 'formSend');
add_action('wp_ajax_nopriv_formSend', 'formSend');

?>
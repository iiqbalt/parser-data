<?php 
include 'simple_html_dom.php';

// Create DOM from URL or file
$html = file_get_html($_POST['url']);

foreach ($html->find('table tr td') as $key => $value) {
    
    if (strpos($value, "Email")) {
        echo str_replace('&nbsp;', '', $html->find('table tr td')[$key + 2]->plaintext);
    }
}
?>

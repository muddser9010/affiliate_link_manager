<?php
require 'assets/qrcode/phpqrcode.php';

if (isset($_GET['code'])) {
    $short_code = htmlspecialchars($_GET['code']);
    $url = "http://localhost/affiliate_link_manager/redirect.php?code={$short_code}";
    QRcode::png($url);
}
?>

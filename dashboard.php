<?php
require_once 'includes/db.php';
require_once 'includes/functions.php';
require_login();

if (is_admin()) {
    header('Location: admin/admin_dashboard.php');
} else {
    header('Location: client/client_dashboard.php');
}
exit;
?>
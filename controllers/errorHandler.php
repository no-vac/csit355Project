<?php
$errors = array (
    1 => "Item already in your cart",
    2 => "My house is on fire!"
);

$error_id = isset($_GET['err']) ? (int)$_GET['err'] : 0;
if ($error_id != 0 && isset($errors[$error_id])) {
    echo '<div class="alert alert-warning" role="alert">
    '.$errors[$error_id].'
  </div>';
}
?>

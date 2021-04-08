<?php
$friends = array('jose<br>', 'maria<br>', 'raul<br>', 'sara<br>', 'pedro<br>', 'camila<br>', 'luis<br>', 'david<br>');
arsort($friends);
print_r($friends);
echo "<br>" . $friends[0];
?>

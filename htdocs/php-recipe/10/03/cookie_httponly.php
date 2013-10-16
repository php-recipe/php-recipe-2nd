<?php
// HttpOnly属性を指定
setcookie('name', 'test', 0, '', '', false, true);
?>
<script>alert(document.cookie);</script>

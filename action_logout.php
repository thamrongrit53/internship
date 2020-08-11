<?php

session_start();
unset($_SESSION["std_id"]);
unset($_SESSION["std_photo"]);
session_destroy();

echo "
  <script>
    Swal.fire({
      type: 'warning',
      title: 'ออกจากระบบ',
      text: 'คุณต้องการออกจากระบบใช่หรือไม่',
      showCancelButton: true,
    }).then((result) => {
      if(result.value) {
        window.location.href = 'login.php';   
      }
    });
  </script>
";

?>
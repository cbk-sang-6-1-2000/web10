<?php
    session_start();

    if (isset($_POST['dangnhap'])) {
        $conn = new mysqli('localhost', 'root', '', 'data_sql');
        $User = addslashes($_POST['tai_khoan']);
        $Pass = addslashes($_POST['mat_khau']);

        //Kiểm tra tên đăng nhập có tồn tại không
        $sql = "SELECT *FROM users WHERE UserName = '$User' && Password = '$Pass'";

        $result = $conn->query($sql);
        if ($result->num_rows >0) {
            while ($row = $result->fetch_assoc()) {
                echo '<script language="javascript">window.location="../admin/thietbi/index.php";</script>';
                //Lưu tên đăng nhập
                $_SESSION['tai_khoan'] = $User;
                $_SESSION['mat_khau'] = $Pass;
            }
            
        } 
        else {
            echo '<script language="javascript">alert("Tên đăng nhập hoặc mật khẩu không chính xác!"); window.location="index.php";</script>';
        }
        $conn->close();
    }
?>
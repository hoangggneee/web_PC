<?php 
    if(isset($_POST['dangnhap'])){
        $email =$_POST['email'];
        $matkhau =md5($_POST['matkhau']);
        $sql = "SELECT * FROM tbl_dangky WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1 ";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row); //đếm số dòng của row
        
        if($count>0){ //điền đúng
            $row_data = mysqli_fetch_array($row);
            $_SESSION['dangky'] = $row_data['tenkhachhang'];
            $_SESSION['id_khachhang'] = $row_data['id_dangky'];// id_khachhang do mình đặt ----- id_dangky là trong database và nếu đăng nhập trùng email thì nó sẽ lấy chung 1 id
            ob_start();    header("Location:index.php");  ob_end_flush();  //nhập đúng thì vào trang hệ quản trị 
        }else{
            echo '<p style="color:red">Mật Khẩu Hoặc Email Sai</p>';

        }
    }
?>


<h1>ĐĂNG NHẬP</h1>
        <form action="" autocomplete="off" method="POST">
            <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa Chỉ Email (Tài Khoản Đăng Nhập) </label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mật Khẩu</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" name="matkhau" placeholder="Nhập Mật Khẩu">
                    </div>
                </div>
                    <button type="submit" name="dangnhap" class="btn btn-primary">Đăng Nhập</button>
            </div>
        </form>










<!-- <form action="" autocomplete="off" method="POST">
        <table border="1" width="50%" class="table-login" style="text-align: center;border-collapse:collapse;">
            <tr>
                <td colspan="2"><h3>Đăng Nhập Khách Hàng</h3></td>
            </tr>
            <tr>
                <td>Tài Khoản</td>
                <td><input type="text" size="50" name="email" placeholder="Email..."></td>
            </tr>
            <tr>
                <td>Mật Khẩu</td>
                <td><input type="password" size="50" name="matkhau"placeholder="Mật Khẩu..."></td>
            </tr>
            <tr>
                
                <td colspan="2"><input type="submit" name="dangnhap" value="Đăng Nhập "></td>
            </tr>
        </table>
    </form> -->
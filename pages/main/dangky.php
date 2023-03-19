<?php
    if(isset($_POST['dangky'])){
        $tenkhachhang = $_POST['hovaten'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $matkhau = md5($_POST['matkhau']);
        $dienthoai = $_POST['dienthoai'];
        $sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('".$tenkhachhang."'
        ,'".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
        if($sql_dangky){   //thông báo đăng ký thành công
            echo '<p style="color:green">Đăng Ký Thành Công !</p>'; 
            $_SESSION['dangky'] = $tenkhachhang;
            $_SESSION['id_khachhang'] = mysqli_insert_id($mysqli); //khi đăng ký tk mới  
            header('Location:index.php?quanly=giohang');
        }
        
    }
?>

    <h1>NHẬP TOHONG TIN ĐĂNG KÝ</h1>
        <form action="" method="POST">
            <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa Chỉ Email (Tài Khoản Đăng Nhập) </label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
        
                    <div class="form-group">
                        <label for="exampleInputPassword1">Họ Và Tên</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="hovaten" placeholder="Nhập Họ Và Tên">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Địa Chỉ</label>
                        <input type="text" class="form-control" id="exampleInputPassword2" name="diachi" placeholder="Nhập Địa Chỉ">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Số Điện Thoại</label>
                        <input type="text" class="form-control" id="exampleInputPassword3" name="dienthoai" placeholder="Nhập Số Điện Thoại">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mật Khẩu</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" name="matkhau" placeholder="Nhập Mật Khẩu">
                    </div>
                    </div>
                    <button type="submit" name="dangky" class="btn btn-primary">Đăng Ký</button>
            </div>
        </form>

<!-- <p>Đăng Ký Thành Viên</p>
<style>
    table.dangky tr td{
        padding: 5px;
    }
</style>
<form action="" method="POST" >
<table class="dangky" border="1" width="50%" style="border-collapse:collapse;">
    <tr>
        <td>Họ Và Tên</td>
        <td><input type="text" size="50" name="hovaten"></td> 
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" size="50" name="email"></td> 
    </tr>
    <tr>
        <td>Điện Thoại</td>
        <td><input type="text"size="50" name="dienthoai"></td> 
    </tr>
    <tr>
        <td>Địa Chỉ</td>
        <td><input type="text"size="50" name="diachi"></td> 
    </tr>
    <tr>
        <td>Mật Khẩu</td>
        <td><input type="password"size="50" name="matkhau"></td> 
    </tr>
    <tr>
        <td><input type="submit" name="dangky" value="Đăng Ký"></td> 
        <td><a style="text-decoration: none;" href="index.php?quanly=dangnhap">Đăng Nhập nếu có tài khoản</a></td> 
    </tr>
</table>
</form> -->
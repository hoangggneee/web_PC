<?php 
    if(isset($_POST['doimatkhau'])){
        $taikhoan =$_POST['email'];
        $matkhau_cu =md5($_POST['password_cu']);
        $matkhau_moi =md5($_POST['password_moi']);
        $sql = "SELECT * FROM tbl_dangky WHERE email='".$taikhoan."' AND matkhau='".$matkhau_cu."' LIMIT 1 ";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row); //đếm số dòng của row
        if($count>0){ //điền đúng 
            $sql_update =mysqli_query($mysqli,"UPDATE tbl_dangky SET matkhau='".$matkhau_moi."'");
            echo '<p style="color :green;">Mật Khẩu Đã Được Thay Đổi</p>';
        }else{
            echo '<p style="color :red;">Email Hoặc Mật Khẩu Sai !!!, Vui Lòng Nhập Lại</p>';
        }
    }
?>

<h1>ĐỔI MẬT KHẨU NGƯỜI DÙNG</h1>
        <form action="" autocomplete="off" method="POST">
            <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa Chỉ Email (Tài Khoản Đăng Nhập) </label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>                   
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mật Khẩu Cũ</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" name="password_cu" placeholder="Nhập Mật Khẩu">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mật Khẩu Mới</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" name="password_moi" placeholder="Nhập Mật Khẩu">
                    </div>
                </div>
                    <button type="submit" name="doimatkhau" class="btn btn-primary">Thay Đổi</button>
            </div>
        </form>






<!-- 
<form action="" autocomplete="off" method="POST">
        <table border="1" class="table-login" style="text-align: center;border-collapse:collapse;">
            <tr>
                <td colspan="2"><h3>Đổi Mật Khẩu </h3></td>
            </tr>
            <tr>
                <td>Tài Khoản</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Mật Khẩu Cũ</td>
                <td><input type="text" name="password_cu"></td>
            </tr>
            <tr>
                <td>Mật Khẩu Mới</td>
                <td><input type="text" name="password_moi"></td>
            </tr>
            <tr>
                
                <td colspan="2"><input type="submit" name="doimatkhau" value="Đổi Mật Khẩu "></td>
            </tr>
        </table>
    </form> -->
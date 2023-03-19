<p>Thông tin vận chuyển</p>
<div class="container">
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
    <div class="step done "> <span> <a href="index.php?quanly=giohang" > Giỏ Hàng</a></span> </div>
    <div class="step current"> <span><a href="index.php?quanly=vanchuyen" >Vận Chuyển</a><span> </div>
    <div class="step"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh Toán</a><span> </div>
    <br>
    <br>
    <br>
    <h4>Thông Tin Vận Chuyển</h4>
        <?php 
          if(isset($_POST['themvanchuyen'])){
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $note = $_POST['note'];
            $id_dangky =  $_SESSION['id_khachhang']; //id đăng ký trong db của shipping
            $sql_them_vanchuyen = mysqli_query($mysqli,"INSERT INTO tbl_shipping(name,phone,address,note,id_dangky) VALUE('$name','$phone','$address','$note','$id_dangky')");
            if($sql_them_vanchuyen){
              echo '<script>alert("Thêm vận chuyển thành công")</script>';
            }
          }elseif(isset($_POST['capnhatvanchuyen'])){
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $note = $_POST['note'];
            $id_dangky =  $_SESSION['id_khachhang']; //id đăng ký trong db của shipping
            $sql_update_vanchuyen = mysqli_query($mysqli,"UPDATE tbl_shipping SET name='$name',phone='$phone',address='$address',note='$note',id_dangky='$id_dangky'
            WHERE id_dangky='$id_dangky'");
            if($sql_update_vanchuyen){
              echo '<script>alert("Cập Nhật vận chuyển thành công")</script>';
            }
          }
        ?>
    <div class="row">
      <?php 
        $id_dangky =  $_SESSION['id_khachhang'];
        $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_shipping WHERE id_dangky = '$id_dangky' LIMIT 1");
        $count = mysqli_num_rows($sql_get_vanchuyen);
        if($count>0){   //nếu id khách hàng cũ vào lại thì tự động điền thông tin
          $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
          $name = $row_get_vanchuyen['name'];
          $phone = $row_get_vanchuyen['phone'];
          $address = $row_get_vanchuyen['address'];
          $note = $row_get_vanchuyen['note'];
        }else{ // còn không phải khách hàng cũ thì rỗng như bình thường
          $name = '';
          $phone = '';
          $address = '';
          $note = '';
        }
      
      ?>
      <div class="col-md-12">
                <form action="" autocomplete="off" method="POST">
              <div class="form-group">
                <label for="email">Họ Và Tên</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="Nhập Họ Và Tên....">  <!--- khách hàng cũ echo ra name--->
              </div>
              <div class="form-group">
                <label for="email">Số Điện Thoại</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $phone ?>" placeholder="Nhập SDT...."> <!--- khách hàng cũ echo ra sdt--->
              </div>
              <div class="form-group">
                <label for="email">Địa Chỉ</label>
                <input type="text" name="address" class="form-control" value="<?php echo $address ?>" placeholder="Nhập Địa Chỉ...."> <!--- khách hàng cũ echo ra địa chỉ--->
              </div>
              <div class="form-group">
                <label for="email">Ghi Chú</label>
                <input type="text" name="note" class="form-control" value="<?php echo $note ?>" placeholder=".............">  <!--- khách hàng cũ echo ra ghi chú--->
              </div>
              <?php 
              if($name == '' && $phone==''){
              ?>
              <button type="submit" name="themvanchuyen" class="btn btn-success">Thêm Vận Chuyển</button>
              <?php 
               }  //end if
              else if($name != '' && $phone!=''){
              ?>
              <button type="submit" name="capnhatvanchuyen" class="btn btn-primary">Cập Nhật Vận Chuyển</button>

              <?php
              
              } //end else
              ?>
            </form>
            </div>
            
            <!-------Gio HANG--------->
            <table style="width:100%; text-align: center; border-collapse:collapse;" border="1">
  <tr>
    <th>STT</th>
    <th>Mã Sản Phẩm</th>
    <th>Tên Sản Phẩm</th>
    <th>Hình Ảnh</th>
    <th>Số Lượng</th>
    <th>Gía Sản Phẩm</th>
    <th>Thành Tiền</th>
  </tr>
    <?php 
    if(isset($_SESSION['cart'])){
        $i=0;
       $tongtien=0;
        foreach($_SESSION['cart'] as $cart_item){
            $thanhtien=$cart_item['soluong']*$cart_item['giasp'];
            $tongtien+=$thanhtien;  //$tongtien+$thanhtien
            $i++;
    
    ?>
  <tr>
    <td><?php echo $i; ?></td>
    <td><?php echo $cart_item['masp'] ?></td>
    <td><?php echo $cart_item['tensanpham'] ?></td>
    <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>"width="150px"></td>
    <td>
      <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus"></i></a><!--Cộng -->
    <?php echo $cart_item['soluong'] ?>
    <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"> <i class="fa-solid fa-minus"></i> </a><!--Trừ -->
  
  </td>
    <td><?php echo number_format($cart_item['giasp'],0,',','.').'vnd' ?></td>
    <td><?php echo number_format($thanhtien,0,',','.').'vnd'; ?></td>
  </tr>
  <?php
        }// kết thúc forech
    ?>
     <tr>
    <td colspan="8">
      <p>Tổng Tiền: <?php echo number_format($tongtien,0,',','.').'vnd' ?></p>
        <div style="clear: both;"></div>
        <?php 
        if(isset($_SESSION['dangky'])){
        ?>
        <p><a style="text-decoration: none;" href="index.php?quanly=thongtinthanhtoan">Thanh Toán</a></p>
        <?php
        }else{ 
        ?>
        <p><a style="text-decoration: none;" href="index.php?quanly=dangky">Đăng Ký Đặt Hàng</a></p>
        <?php
      }
        ?>
        
       
    </td>
     
  </tr>
    <?php    
    }else{
     ?>
     <tr>
    <td colspan="8"><p>Hiện Tại Giỏ Hàng Trống, Vui Lòng Chọn Sản Phẩm Để Thanh Toán</p><a><i class="fa-regular fa-cart-circle-xmark"></i><a> 
      <a style="text-decoration: none;" href="index.php"><i class="fa-solid fa-house"></i> Trang Chủ</a> </td>
  </tr>
     <?php  
    }
     ?>

</table>
        </div>
  </div>
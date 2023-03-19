<p>Thông tin thanh toán</p>
<div class="container">
  <!-- Responsive Arrow Progress Bar -->
  <div class="arrow-steps clearfix">
    <div class="step done"> <span> <a href="index.php?quanly=giohang" > Giỏ Hàng</a></span> </div>
    <div class="step done"> <span><a href="index.php?quanly=vanchuyen" >Vận Chuyển</a><span> </div>
    <div class="step current"> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh Toán</a><span> </div>
    <br><br>
<form action="pages/main/xulythanhtoan.php" method="POST">
    <div class ="row">
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
      <div class="col-md-8">
        <h4>Thông Tin Vận Chuyển Và Giỏ Hàng</h4>
        <ul>
          <li>Họ Và Tên Người Nhận : <b><?php echo $name ?></b></li>
          <li>SĐT Người Nhận : <b></b><?php echo $phone ?></li>
          <li>Địa Chỉ Người Nhận : <b><?php echo $address ?></b></li>
          <li>Ghi Chú Người Nhận : <b><?php echo $note ?></b></li>
        </ul>
                    <!---GIO HANGGGGGGG---->
                    <h5>Giỏ Hàng Của Bạn</h5>
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
                    <div style="clear: both;"></div>
                    
                  
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
            <!----END GIO HANGGGGGGG---->

      </div>
      <style type="text/css">
        .col-md-4.hinhthucthanhtoan .form-check {
            margin: 9px;
      }
      </style>
      <div class="col-md-4 hinhthucthanhtoan">
        <h4>Phương Thức Thanh Toán</h4>
          <div class="form-check">
          <input class="form-check-input" type="radio" name="payment" id="exampleRadios1" value="tien mat" checked> <!----CHECKED là mặc định--->
          <img src="images/cash.jpg" height="32" width="32">
          <label class="form-check-label" for="exampleRadios1">
            Thanh Toán Khi Nhận Hàng (Tiền Mặt)
          </label>
          <div class="form-check">
          <input class="form-check-input" type="radio" name="payment" id="exampleRadios2" value="chuyen khoan">
          <img src="images/nganghang.png" height="31" width="69">
          <label class="form-check-label" for="exampleRadios2">
            Hình Thức Chuyển Khoản
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="momo">
          <label class="form-check-label" for="exampleRadios3">
          Hình Thức Chuyển Momo
          </label>
        </div>
        <p>Tổng Tiền: <?php echo number_format($tongtien,0,',','.').'vnd' ?></p>
        <input type="submit" value="Đặt Hàng" name="thanhtoanngay" class="btn btn-danger">
        
        </div>
      </div>
    </div>
  </div>
</form>
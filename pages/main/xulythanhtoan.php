<?php
    session_start();
    include('../../admincp/config/config.php');
    require('../../carbon/autoload.php');
    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    $now= Carbon::now('Asia/Ho_Chi_Minh');
    $id_khachhang = $_SESSION['id_khachhang'];
    $code_order = rand(0,9999); //  mã order của đơn hàng random từ 0->9999
    $cart_payment = $_POST['payment'];
    //LẤY THÔNG TIN VẬN CHUYỂN CỦA KHÁCH HÀNG 
    $id_dangky =  $_SESSION['id_khachhang'];
    $sql_get_vanchuyen = mysqli_query($mysqli,"SELECT * FROM tbl_shipping WHERE id_dangky = '$id_dangky' LIMIT 1");
    $row_get_vanchuyen = mysqli_fetch_array($sql_get_vanchuyen);
    $id_shipping = $row_get_vanchuyen['id_shipping'];
    //INSERT CART


    $insert_cart = "INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status,cart_date,cart_payment,cart_shipping) VALUE('".$id_khachhang."','".$code_order."',1,
    '".$now."','".$cart_payment."','".$id_shipping."')";
    $cart_query = mysqli_query($mysqli,$insert_cart);
    if($cart_query){
        //thêm giỏ hàng chi tiết
        foreach($_SESSION['cart']  as $key => $value){
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUE('".$id_sanpham."','".$code_order."','".$soluong."')";
            mysqli_query($mysqli,$insert_order_details);
        }//mỗi lần chạy vòng lập thì insert vào

    }
    unset($_SESSION['cart']); //bỏ hết sản phẩm trong giỏ hàng
    header('Location:../../index.php?quanly=camon');

?>
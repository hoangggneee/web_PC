<?php
            
              $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY tendanhmuc DESC";
              $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
              
            
?>
<?php
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['dangky']);
    }
?>




<!-- MENU MỚI BOOSTRAP -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Trang Chủ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?quanly=giohang">Giỏ Hàng</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="index.php?quanly=tintuc">Tin Tức</a> </li>
                <li class="nav-item"><a class="nav-link" href="index.php?quanly=lienhe">Liên Hệ</a> </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Danh Mục Sản Phẩm
                </a>
                <div class="dropdown-menu">
                <?php
                        while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                        ?>
                <a class="dropdown-item" href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a>
                <?php
                        }
                        ?>
                </div>
            </li>
            <?php
                            if(isset ($_SESSION['dangky'])){

                        ?>
                        <li class="nav-item"><a class="nav-link" href="index.php?dangxuat=1">Đăng Xuất</a> </li>
                       
                        <li class="nav-item"><a class="nav-link" href="index.php?quanly=thaydoimatkhau">Đổi Mật Khẩu</a> </li>
                        <li class="nav-item"><a class="nav-link" href="index.php?quanly=lichsudonhang">Lịch Sử Đặt Hàng</a> </li>
                        <?php
                        }else{
                            
                        ?>
                         <li class="nav-item"><a class="nav-link" href="index.php?quanly=dangnhap">Đăng Nhập</a> </li>
                        <li class="nav-item"><a class="nav-link" href="index.php?quanly=dangky">Đăng Ký</a> </li>
                        <?php
                        }
                        ?>
            </ul>
    <form class="form-inline my-2 my-lg-0" action="index.php?quanly=timkiem" method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Tìm Kiếm Sản Phẩm...." name="tukhoa" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0"  type="submit" name="timkiem">Tìm Kiếm</button>
    </form>
  </div>
</nav>




















<p style="text-align: center; font-weight: bold ">Chi Tiết Sản Phẩm</p>
<?php
    $sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.
    id_sanpham='$_GET[id]' LIMIT 1"; 
    $query_chitiet = mysqli_query($mysqli,$sql_chitiet);
    while($row_chitiet = mysqli_fetch_array($query_chitiet)){
?>
<div class ="wrapper_chitiet">    <!--bao quanh -->
    <div class="hinhanh_sanpham">
            <img width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
    </div>
    <form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham']?>">
        <div class="chitiet_sanpham">
            <h3 style="margin: 0;" >Tên: <?php echo $row_chitiet['tensanpham'] ?></h3>
            <p>Mã: <?php echo $row_chitiet['masp'] ?></p> 
            <p>Giá: <?php echo number_format($row_chitiet['giasp'],0,',','.').'vnd' ?></p>
            <p>Số Lượng: <?php echo $row_chitiet['soluong'] ?></p>
            <p>Danh Mục: <?php echo $row_chitiet['tendanhmuc'] ?></p>
            <p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm Vào Giỏ Hàng"></p>
        </div>
    </form>
</div>

<div class="clear"></div>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color:blue;
  border-radius: 15px;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
</head>
<body>

<h2 style="color:red;">Thông Tin Sản Phẩm</h2>

<div class="tab"> 
  <button class="tablinks" onclick="openCity(event, 'London')">Thông số kỹ thuật</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Nội Dung</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Hình Ảnh</button>
</div>

<div id="London" class="tabcontent">
  <h3>Thông số kỹ thuật</h3>
  <?php echo $row_chitiet['tomtat'] ?>
</div>

<div id="Paris" class="tabcontent">
  <h3>Nội Dung</h3>
  <?php echo $row_chitiet['noidung'] ?>
</div>

<div id="Tokyo" class="tabcontent">
  <h3>Hình Ảnh</h3>
  <img width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh'] ?>">
</div>

<script>
function openCity(evt, cityName) {  
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
   
</body>
</html> 

<?php
    }
?>
<?php
    $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]'  ORDER BY id_sanpham DESC"; //đem id danh mục của sp đem so sánh id danh mục của danh mục 
    $query_pro = mysqli_query($mysqli,$sql_pro);
    //get tên danh mục
    $sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc='$_GET[id]' LIMIT 1"; //đem id danh mục của sp đem so sánh id danh mục của danh mục 
    $query_cate = mysqli_query($mysqli,$sql_cate);
    $row_title = mysqli_fetch_array($query_cate);

?>
<h3>Danh Mục Sản Phẩm: <?php echo $row_title['tendanhmuc'] ?></h3>
<div class="row">
                    <?php
                    while($row = mysqli_fetch_array($query_pro)){

                    ?>
                <div class = "col-md-2">
                <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                        <img class="img img-responsive" width="100%" src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" >
                        <p class ="Title_product"><?php echo $row['tensanpham'] ?></p>
                        <p class ="Price_product"><?php echo number_format($row['giasp'],0,',','.').'vnd' ?></p>
                        </a>
                    </div>
                    <?php 
                    }
                    ?>
                </div>
 <?php
    $sql_bv = "SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id_danhmuc='$_GET[id]'  ORDER BY id DESC"; 
    $query_bv = mysqli_query($mysqli,$sql_bv);
    //get tên danh mục
    $sql_cate = "SELECT * FROM tbl_danhmucbaiviet WHERE tbl_danhmucbaiviet.id_baiviet='$_GET[id]' LIMIT 1"; 
    $query_cate = mysqli_query($mysqli,$sql_cate);
    $row_title = mysqli_fetch_array($query_cate);

?>
<h3>Danh Mục Bài Viết: <span style="text-align: center; text-transform: uppercase;"><?php echo $row_title['tendanhmucbaiviet'] ?></span></h3>
                <div class="row">
                    <?php 
                    while($row_bv = mysqli_fetch_array($query_bv)){
                    ?>
                    <div class = "col-md-3">  
                        <a href="index.php?quanly=baiviet&id=<?php echo $row_bv['id'] ?>">
                        <img class="img img-responsive" width="100%%" src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>" >
                        <p class ="Title_product">Tên Bài Viết : <?php echo $row_bv['tenbaiviet'] ?></p>
                        
                        
                        </a>
                        <p style="margin: 10px;" class ="Title_product">Tóm Tắt : <?php echo $row_bv['tomtat'] ?></p>
                    </div>
                        <?php
                    } 
                    ?>
                </div>
                 
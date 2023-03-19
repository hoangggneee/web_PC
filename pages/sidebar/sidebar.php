
            <h4>Danh Mục Sản Phẩm</h4>
            <ul class = "list_sidebar">
            <?php
              $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY tendanhmuc DESC";
              $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
              while($row = mysqli_fetch_array($query_danhmuc)){

            ?>
            <li style="text-transform: uppercase;"><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc'] ?>"><?php echo $row['tendanhmuc'] ?></a></li>
            <?php
             ob_start();
            }
            ob_end_flush(); 
            ?>    
            </ul>
            <h4>Bài viết</h4>
            <ul class = "list_sidebar">
            <?php
              $sql_danhmuc_bv = "SELECT * FROM tbl_danhmucbaiviet ORDER BY id_baiviet DESC";
              $query_danhmuc_bv = mysqli_query($mysqli,$sql_danhmuc_bv);
              while($row = mysqli_fetch_array($query_danhmuc_bv)){

            ?>
            <li style="text-transform: uppercase;" ><a href="index.php?quanly=danhmucbaiviet&id=<?php echo $row['id_baiviet'] ?>"><?php echo $row['tendanhmucbaiviet'] ?></a></li>
            <?php

            }
            ?>    
            </ul>

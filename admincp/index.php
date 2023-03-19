<?php
session_start();
if(!isset($_SESSION['dangnhap'])){
    header('Location:login.php');  
}

?>
<!DOCTYPE html>
<lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type ="text/css" href="css/styleadmincp.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="shortcut icon" 
    href="../images/incon_gear.png" 
    type="image/x-icon">
    <title>Trang Admin</title>
</head>
<body>
    <div class="title_admin">
        <h3>TRANG HỆ QUẢN TRỊ</h3>
    </div>
    <div class="wrapper">
    <?php
        include("config/config.php"); // không cần gọi file config cho từng trang
        include("modules/header.php");
        include("modules/menu.php");
        include("modules/main.php");
        include("modules/footer.php");
    ?>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.20.2/full/ckeditor.js"></script>   <!--chức năng word -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
     <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script>
            CKEDITOR.replace('tomtat');
             CKEDITOR.replace('noidung'); //dựa vào textairier
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                thongke();
            var char =  new Morris.Area({

                element: 'chart',


                xkey: 'date',

                ykeys: ['date','order','sales','quantity'],

                labels: ['Đơn Hàng','Doanh Thu','Số Lượng Bán Ra']
                });
                
                $('.select-date').change(function(){
                    var thoigian = $(this).val();
                    if(thoigian=='7ngay'){
                        var text ='7 Ngày Qua';
                    }else if(thoigian=='28ngay'){
                        var text ='28 Ngày Qua';
                    }else if(thoigian=='90ngay'){
                        var text ='90 Ngày Qua';
                    }else{
                        var text ='365 Ngày Qua';
                    }
                    $.ajax({
                         url:"modules/thongke.php", // lấy tại đây
                         method:"POST",
                         dataType:"JSON",
                         data:{thoigian:thoigian},
                         success:function(data){
                            char.setData(data);
                            $('#text-date').text(text);  
                        }
                     });

                })
                function thongke(){
                    var text = '365 Ngày qua';
                    $('#text-date').text(text);
                     $.ajax({
                         url:"modules/thongke.php", // lấy tại đây
                         method:"POST",
                         dataType:"JSON",
                         success:function(data){
                            char.setData(data);
                            $('#text-date').text(text);  
                         }
                     });
                }
            });
        </script>
        
</body>
</html>
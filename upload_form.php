<!Doctype html>
<html>
<head>
    <?php include_once "head.php";?>

    <title>目前已借用的資訊設備</title>
</head>
<body>

<!--表頭-->
<div class = "container">
    <div class = "jumbotron">


        目前已借用的資訊設備


        <form action="" method="post">
            <input type="submit" class = "navbar-btn btn-info btn pull-right " value="借用資訊設備" />
            <a href = "http://www.tsces.ntpc.edu.tw" class = "navbar-btn btn-primary btn pull-right">回首頁</a>

        </form>
    </div>
</div>


<!--主要內容-->
<div class = "container">
    <form id="uploadForm" enctype="multipart/form-data">
        <input type="file" id="myFile" name="myFile" required="required">

        <input type="button" id='btnUpload' value="上傳檔案">
    </form>

    <!--訊息顯示-->
    <div id="message"></div>
</div>


<div class="container">
    <?php include_once "footer.php";?>
</div>


<script>
    if( $("#btnUpload")){
        $("#btnUpload").on('click', function(){

            var data = new FormData();
            $.each($('#myFile')[0].files, function(i, file) {
                data.append('file-'+i, file);
                console.log( file );

            });

            /*var filename = $("#uploadForm")[0];*/
            $.ajax({
                url: 'upload.php',
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(data){
                    if( data == 'OK'){

                        $('#message').html('<h2 class="alert alert-success">上傳成功</h2>');

                    }else if (data == 'ERR'){
                        $('#message').html('<h2 class="alert alert-danger">上傳失敗</h2>');

                    }else{
                        $('#message').html('<h2 class="alert alert-danger">上傳失敗，原因不明！</h2>');

                    };

                    console.log(data);
                },
                error: function () {
                    $('#message').html('<h2 class="alert alert-danger">上傳失敗</h2>');
                    $('#message').attr('class', 'alert alert-danger');
                }

            });

        });
    }
</script>
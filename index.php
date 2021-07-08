<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Parser Kemdikbud.go.id</title>
    <!-- <script src="jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <style>
        body {
            padding : 20px;
        };
        .layout-footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: red;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Data Parser kemdikbud.go.id</a>
    </div>
        <div id="navbar" class="navbar-collapse collapse">
            <p class="navbar-text navbar-right">
                <a target="_blank" href="https://bulk-gmail-sender.herokuapp.com/" class="navbar-link">Bulk Gmail Sender</a>
            </p>
        </div>
    </div>
</nav>

<div class="container">
    <div style="display:flex;flex : 1; flex-direction: row;padding : 15px" class="row">
        <input type="text" id="link_url" class=" col-md-8 form-control" placeholder="masukkan url kecamatan tujuan...">
        <button style="margin-left : 10px" class="btn_cari col-md-2 btn btn-success">Cari</button>

    </div>
    <div style="display:flex;flex : 1">
        <div class="form-group">
            <label>Suffix Alamat</label>
            <input type="text" id="suffix_alamat" class=" col-md-4 form-control" placeholder="Kec. Taman Kab.Sidoarjo">
        </div>
    </div>

    <div id="output" style="margin : 10px;"></div>

    <div class="layout-footer">
        <div class="container">
            <div class="row">
                Made with <span style="color: #e25555;">♥</span>
                <a href="mailto:iqbal.taufiqurrochman@gmail.com">iiqbalt</a>
            </div>
            <div class="row">
                <img src="wa.png" style="width : 30px; height : 30px; object-fit : cover">
                <a style="" target="blank" href="https://wa.me/085850943784">connect with me on whatsapp</a>
            </div>
            <div class="row">
            	<span>Auto deploy with <a href="https://github.com/iiqbalt/parser-data">github</a></span>
            </div>
        </div>
    </div>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){

        // $.ajaxPrefilter(function( options, original_Options, jqXHR ) {
        //     options.async = true;
        // });

        $(".btn_cari").on('click', function(){
            let link_url = $("#link_url").val()
            let suffix_alamat = $("#suffix_alamat").val()

            $.ajax({
                type : 'post',
                data : {url : link_url, suffix_alamat : suffix_alamat},
                url : 'get-data.php',
                // async: true,
                success : function(data){

                    $("#output").html(data);
                }
            })
        })

    })
</script>

</body>
</html>

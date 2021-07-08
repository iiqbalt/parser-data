<?php 
    include 'simple_html_dom.php';

    // ini_set('max_execution_time', 300); //300 seconds = 5 minutes
    // ini_set('default_socket_timeout', 100); // 100 seconds = 1 Minutes 40 sec
    // Create DOM from URL or file
    $html = file_get_html($_POST['url']);
    $suffix_alamat = $_POST['suffix_alamat'];
    $base_url = "https://referensi.data.kemdikbud.go.id/";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- <script src="jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
<?php 

    foreach($html->find('h5') as $value){
        echo $value;
    }

    $table = [];
    foreach($html->find('table tr') as $key => $td){

        if ( !strpos($td, "Data Master") && !strpos($td, "Unit Layanan") && !strpos($td, "HelpDesk KEMENAG") ) {

            $row = [];
            $url = '';
            foreach($td->find('td') as $cell) {

                //get url link
                foreach ($cell->find('a') as $link) {
                    $url = $link->href;
                }
                $row[] = $cell->plaintext;
            }
            $row[] = $url;
            
            $table[] = $row;
        }
    };

    $html = '<table style="border: 1px solid black;
    border-collapse: collapse; text-align:center">';

    $html .= '
        <tr>
            <th style="border: 1px solid black;
    border-collapse: collapse; text-align:center">No</th>
            <th style="border: 1px solid black;
    border-collapse: collapse; text-align:center">NAMA SEKOLAH</th>
            <th style="border: 1px solid black;
    border-collapse: collapse; text-align:center">ALAMAT</th>
            <th style="border: 1px solid black;
    border-collapse: collapse; text-align:center">EMAIL</th>
        </tr>
    ';

    foreach ($table as $tr) {
        $html .= '<tr>';
            foreach ($tr as $key => $value) {

                if ($value != '') {
                    if ($key == 3) {

                        $html .= '<td contenteditable="true" style="border: 1px solid black;
                        border-collapse: collapse;text-transform:capitalize;">'.strtolower($value)." Desa/Kelurahan ".$tr[4]." ".$suffix_alamat.'</td>';
                    } else if ($key == 0){
        
                        $html .= '<td style="border: 1px solid black;
                        border-collapse: collapse">'.$value.'</td>';
                    }else if ($key == 2){
        
                        $html .= '<td style="border: 1px solid black;
                        border-collapse: collapse">'.$value.'</td>';
                    }
                }

            }
        
            if ($value != '') {
                //get email
                $html .= '
                <td id="td_'.str_replace('&nbsp;', '', $tr[1]).'" style="border: 1px solid black; border-collapse: collapse">
                    <button style="padding : 2px 10px; margin : 2px 10px;" class="btn btn-primary" id="'.str_replace('&nbsp;', '', $tr[1]).'">cek</button>
                </td>';
            }
            
        $html .= '</tr>';
    }
    $html .= '</table>';

    echo $html;

    ?>
</body>
</html>

<script>

    // $.ajaxPrefilter(function( options, original_Options, jqXHR ) {
    //     options.async = true;
    // });

    $(".btn").on('click', function(){
            
            let id = this.id

            $.ajax({
                type : 'post',
                data : {url : "https://referensi.data.kemdikbud.go.id/tabs.php?npsn=" + id},
                url : 'get-email.php',
                // async: true,
                success : function(data){

                    $("#td_"+id).html(data);
                }
            })
            
        })
</script>
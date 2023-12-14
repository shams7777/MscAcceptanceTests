<?php
$dir = '/var/www/html/public/Files/';
$a = array_map('basename', glob($dir . "*.{jpg,JPG,jpeg,JPEG,png,PNG,pdf}", GLOB_BRACE));

$b=count($a);
$res = '';
$links = array();
$files = glob($dir.'*.{pdf}', GLOB_BRACE);
//scandir( "/var/www/html/acc/tests/_output/debug");
$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

foreach ($files as $fileToDisplay)
{
    if (in_array($fileToDisplay, array('.','..'))) continue;

    array_push($links,'/var/www/html/public/Files/'.basename($fileToDisplay));

}

for($x=0;$x<$b;$x++)
{

    $res.= "
<div class='row1'>
            <div class='column1' >
                <label>
                    <a id='file' class='filename' href='Files/$a[$x]'  target='_blank'><strong> $a[$x] </strong></a>
                </label>
                
            </div>
            <div class='column1' >
                <span class='tiny label   secondary right'>
            <strong><a class='download_btn' href='Files/$a[$x]' download='$a[$x]'>Download</a></strong>
                    </span>
            </div>
        </div>
        ";


}
if ($b > 0)
{$res.="<div class='delete_btn'></div>
        <!--<button id='delete' class='btn right alert' >Delete All</button>
      
         <button id='downloadall' class='button btn right success' >Download All</button>-->
         <div class='center'>
         <ul class='button-group round '>
         <li><a href='#' id='deletepdf' class='button small alert  right'><strong>Delete All</strong></a></li> 
         <li><a href='#' id='downloadallpdf' class='button small success right'><strong>Download All</strong></a></li>
          </ul>
         </div>
       ";
}
else{
    $res .="<div class='delete_btn'></div>
            <div class='text-center'><strong class='empty'>No PDF Files !!!</strong></div>" ;

}


echo $res;
?>
<script>
    var pdfs = <?php echo json_encode($links)?>;
    /*var pdfs = [
        'http://b93c77e.online-server.cloud/thpgacceptancetests/public/Files/chrome_file.pdf',
        'http://b93c77e.online-server.cloud/thpgacceptancetests/public/Files/THPG_B2B_Product_Delivery.pdf',
        'http://b93c77e.online-server.cloud/thpgacceptancetests/public/Files/Thpg_B2C_DE_Express_Shipping_Costs.pdf'
    ]*/
        $('#downloadallpdf').click(function() {
            console.log(pdfs);

            var link = document.createElement('a');
            $c =1;

            $c+=1;

            document.body.appendChild(link);

            for (var i = 0; i < pdfs.length; i++) {
                link.setAttribute('download',pdfs[i].split('/').reverse()[0]);
                link.style.display = 'none';
                link.setAttribute('href', pdfs[i]);
                link.click();
            }

            document.body.removeChild(link);
        });

    $(function(){
        $('#deletepdf').click(function() {
            console.log('clicked')
            var r = confirm("Are you sure you want to delete all pdf files?")
            if(r == true){
                $.ajax({
                    url: 'delete.php',
                    //data:'id/name here',
                    method: 'GET',

                    success: function (response) {
                        if (response === 'deleted') {
                            alert('Deleted !!');

                        }
                    }

                });
                window.location.reload();
            }
        });
    });


</script>


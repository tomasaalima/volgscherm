<?php
    $filename;

        function uploadFile(){
            if(isset($_POST['action'])){
                $arquivo = $_FILES['arquive'];

                $arquivoNovo = explode('.', $arquivo['name']);

                if($arquivoNovo[sizeof($arquivoNovo)-1] != 'jpg'){
                    die('Tipo de arquivo errado');
                }else{
                    move_uploaded_file($arquivo['tmp_name'], 'uploads/'.$arquivo['name']);
                }
            }
            global $filename;
            $filename = $_FILES['arquive']['name'];

            rename("uploads/user-img.jpg", "uploads/last-user-img.jpg");

            rename("uploads/".$filename, "uploads/user-img.jpg");
      }
?>
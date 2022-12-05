<?php

        function uploadFileUser(){
            $filename = "";   
            if(isset($_POST['action'])){
                $arquivo = $_FILES['arquive'];

                $filename = $_FILES['arquive']['name'];
                
                $arquivoNovo = explode('.', $arquivo['name']);

                if($filename == ""){
                    echo "<span style='color: #F75448;''>Você esqueceu de selecionar o arquivo para: imagem de usuário</span>";
                    return null;
                }

                if($arquivoNovo[sizeof($arquivoNovo)-1] != 'jpg') {
                    echo "<span style='color: #F75448;''>O arquivo precisa contemplar a seguinte extensão: PNG</span>";
                    
                    
                    return null;

                }else{
                    move_uploaded_file($arquivo['tmp_name'], 'uploads/'.$arquivo['name']);
                }
                rename("uploads/".$filename, "uploads/user-img.jpg");
            }

            
        }

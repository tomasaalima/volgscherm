<?php
        //Recebe arquivo JPG enviado pelo usuário
        function uploadFileUser(){
            $filename = "";   
            if(isset($_POST['action'])){
                $arquivo = $_FILES['arquive'];

                $filename = $_FILES['arquive']['name'];
                
                //Obtém a capacidade de verificar a extensão do arquivo
                $arquivoNovo = explode('.', $arquivo['name']);

                //verifica inserção do arquivo
                if($filename == ""){
                    echo "<span style='color: #F75448;''>Você esqueceu de selecionar o arquivo para: imagem de usuário</span>";
                    return null;
                }

                //Permite apenas arquivos .JPG
                if($arquivoNovo[sizeof($arquivoNovo)-1] != 'jpg') {
                    echo "<span style='color: #F75448;''>O arquivo precisa contemplar a seguinte extensão: PNG</span>";

                    return null;

                }else{
                    move_uploaded_file($arquivo['tmp_name'], 'uploads/'.$arquivo['name']);
                }

                //Renomeia o arquivo
                rename("uploads/".$filename, "uploads/user-img.jpg");
            }

            
        }

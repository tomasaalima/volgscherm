<?php
//Contenção do alerta
$SweetAlert = false;

//Parâmetros para SweetAlerts
$message = "";
$icon = "";
$title = "";

//Recebe arquivo JPG enviado pelo usuário
function uploadFileUser()
{
    global $message, $icon, $title, $SweetAlert;

    $filename = "";
    if (isset($_POST['action'])) {
        $arquivo = $_FILES['arquive'];

        $filename = $_FILES['arquive']['name'];

        //Obtém a capacidade de verificar a extensão do arquivo
        $arquivoNovo = explode('.', $arquivo['name']);

        //verifica inserção do arquivo
        if ($filename == "") {
            $message = "Você esqueceu de selecionar o arquivo para: imagem de usuário";
            $icon = "error";
            $title = "Selecione-o clicando no botão 'Selecionar Arquivo'";

            //Autorização do alerta
            $SweetAlert = True;

            return null;
        }

        //Permite apenas arquivos .JPG
        if ($arquivoNovo[sizeof($arquivoNovo) - 1] != 'jpg') {
            $message = "O arquivo precisa contemplar a seguinte extensão: PNG";
            $icon = "error";
            $title = "tente uma imagem válida";

            //Autorização do alerta
            $SweetAlert = True;
            
            return null;
        } else {
            move_uploaded_file($arquivo['tmp_name'], 'uploads/' . $arquivo['name']);
        }

        //Renomeia o arquivo
        rename("uploads/" . $filename, "uploads/user-img.jpg");
    }
}

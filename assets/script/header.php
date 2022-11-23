<?php header("Content-type: text/html; charset=utf-8");

function importHeader(){
    echo "
<header>
    <div class='header-logo'>
        <img src='uploads/logo-exemple.png' alt='logo da empresa'>
    </div>
    <div class='header-alert'>
        <div>
            <div style='background-color: rgba(255, 0, 0, 0.7);'>
                <strong class='alert'>!!</strong>
                <span class='badge'>5</span>
            </div>
        </div>
        <div>
            <div style='background-color: rgba(0, 132, 255, 0.7);'>
                <strong class='alert'>U</strong>
                <span class='badge'>5</span>
            </div>
        </div>
        <div>
            <div style='background-color: rgba(208, 255, 0, 0.7);'>
                <strong class='alert'>V</strong>
                <span class='badge'>5</span>
            </div>
        </div>
        <div>
            <div style='background-color: rgba(255, 136, 0, 0.7);'>
                <strong class='alert'>W</strong>
                <span class='badge'>5</span>
            </div>
        </div>
        <div>
            <div style='background-color: rgba(133, 125, 125, 0.7);'>
                <strong class='alert'>?</strong>
                <span class='badge'>5</span>
            </div>
        </div>
    </div>
    <div class='header-user'>
        <div class='user-image'>
            <img class='user-img' src='uploads/user-img.jpg' alt='imagem do usuário'>
        </div>
        <div class='line'>
            <hr>
        </div>
        <div class='triple-line-menu'>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</header>";
}
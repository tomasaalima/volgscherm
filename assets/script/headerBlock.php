<header>
    <div class='header-logo'>
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
        <i id="burguer" class="material-symbols-outlined" onclick="openMenu()">menu</i>
        <script>
            function openMenu(){
                if(menu.style.display == 'block'){
                    document.getElementById('burguer').innerHTML= 'menu';
                    menu.style.display = 'none';
                }else{
                    document.getElementById('burguer').innerHTML= 'close';
                    menu.style.display = 'block';
                }
            }
        </script>
        </div>
        
    </div>
</header>
<nav id="menu-nav">
        <menu id="menu">
            <ul>
                <li>
                    <a href="systemEdit.php">
                    <i class="material-symbols-outlined">settings</i>
                    Configurações 
                    </a>
                </li>
                <li>
                    <a href="userLogout.php">
                    <i class="material-symbols-outlined">logout</i>
                    Logout 
                    </a>
                </li>
            </ul>
        </menu>
</nav>
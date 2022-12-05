  
    function setTheme(id) {

        let theme = document.getElementById(id);
        theme.classList.add("actual-theme");
    
        switch (id) {
            case '01': {
                document.documentElement.style.setProperty('--palette-A', '#1D1E26');
                document.documentElement.style.setProperty('--palette-B', '#202126');
                document.documentElement.style.setProperty('--palette-C', '#737272');
                document.documentElement.style.setProperty('--palette-D', '#889ABF');
                document.documentElement.style.setProperty('--palette-E', '#FFFFFF09');
                break;
            }
            case '02': {
                document.documentElement.style.setProperty('--palette-A', '#ffffff');
                document.documentElement.style.setProperty('--palette-B', '#EBE8E7');
                document.documentElement.style.setProperty('--palette-C', '#9DFFEC');
                document.documentElement.style.setProperty('--palette-D', '#2D73EB');
                document.documentElement.style.setProperty('--palette-E', '#1D1E2609');
                break;
            }
            case '03': {
                document.documentElement.style.setProperty('--palette-A', '#224D59');
                document.documentElement.style.setProperty('--palette-B', '#3A8499');
                document.documentElement.style.setProperty('--palette-C', '#58C6E5');
                document.documentElement.style.setProperty('--palette-D', '#49A5BF');
                document.documentElement.style.setProperty('--palette-E', '#FFFFFF09');
                break;
            }
        }
        }
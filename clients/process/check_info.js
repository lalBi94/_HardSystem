function checkeur_login(){ //verifie le form de eClientLogin
    const src_pseudo = document.getElementById("init-pseudo");
    
    if(src_pseudo.value === ""){
        alert('Aucun champs ne doit etre vide !');
        return false;
    }

    return true;
}

function register_checker(){
    const src_nom = document.getElementById("init-nom");
    const src_prenom = document.getElementById("init-prenom");
    const src_email = document.getElementById("init-email");
    const src_pseudo = document.getElementById("init-pseudo");
    const src_cgu = document.getElementById("cgu");

    if(src_pseudo.value === "" || src_email.value === "" || src_prenom.value === "" || src_nom.value === ""){
        alert('Aucun champs ne doit etre vide !');
        return false;
    }
    
    if(src_cgu.checked === true){
        return true;
    } else{
        alert('Vous devez accepter les CGU !');
        return false;
    }

    return true;
}
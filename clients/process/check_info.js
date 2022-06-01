function checkeur_login(){ //verifie le form de eClientLogin
    const src_pseudo = document.getElementById("init-pseudo");
    
    if(src_pseudo.value === ""){
        alert('Aucun champs ne doit etre vide !');
        return false;
    }

    return true;
}

function checkeur_register(){ //verifie le form de eClientRegister
    const src_nom = document.getElementById("init-nom");
    const src_prenom = document.getElementById("init-prenom");
    const src_email = document.getElementById("init-email");
    const src_pseudo = document.getElementById("init-pseudo");
    const src_mdp = document.getElementById("init-mdp");
    const src_mdpconf = document.getElementById("init-mdpconf");
    const src_cgu = document.getElementById("init-cgu");

    if(src_nom.value === "" || src_prenom.value === "" || src_email.value === "" || src_pseudo.value === "" || src_mdp.value === "" || src_mdpconf.value === ""){
        alert('Aucun champs ne doit etre vide !');
        return false;
    }

    if(src_mdp != src_mdpconf){
        alert('Les mots de passes doivent correspondre !');
        return false;
    }

    if(!src_cgu.checked){
        alert('Vous devez accepter les CGU !');
        return false;
    }

    return false;
}
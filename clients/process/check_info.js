function checkeur_login(){
    const src_pseudo = document.getElementById("init-pseudo");
    
    if(src_pseudo.value === ""){
        alert('Aucun champs ne doit etre vide !');
        return false;
    }

    return true;
}
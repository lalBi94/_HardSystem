function check(){
    const src_qte = document.getElementById("qtein");
    const src_client = document.getElementById("clientin");
    const src_cgu = document.getElementById("cgu");

    if(src_qte.value === "" || src_client.value === ""){
        alert("Aucun champs ne doit etre vide !");
        return false;
    }
    
    if(src_cgu.checked){
        return true;
    } else{
        alert("Vous devez accepter les cgu !");
        return false;
    }

    return false;
}
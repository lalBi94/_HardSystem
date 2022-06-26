function cardchecker(){
    const src_nbcarte1 = document.getElementById("nbcarte-1");
    const src_nbcarte2 = document.getElementById("nbcarte-2");
    const src_nbcarte3 = document.getElementById("nbcarte-3");
    const src_nbcarte4 = document.getElementById("nbcarte-4");
    const src_nbcarte5 = document.getElementById("nbcarte-5");
    const src_cvv = document.getElementById("cvv");

    let sizeofnbcart1 = src_nbcarte1.value.length;
    let sizeofnbcart2 = src_nbcarte2.value.length;
    let sizeofnbcart3 = src_nbcarte3.value.length;
    let sizeofnbcart4 = src_nbcarte4.value.length;
    let sizeofnbcart5 = src_nbcarte5.value.length;

    let sizeofcvv = src_cvv.value.length;

    if((sizeofnbcart1 == 4 && sizeofnbcart2 && 4 && sizeofnbcart3 == 4 && sizeofnbcart4 == 4 && sizeofnbcart5 == 4) 
    && (Number.isInteger(sizeofnbcart1) && Number.isInteger(sizeofnbcart2) && Number.isInteger(sizeofnbcart3) && Number.isInteger(sizeofnbcart4) && Number.isInteger(sizeofnbcart5)) 
    && (sizeofcvv == 3 && sizeofcvv == 4)){
        return true;
    }

    alert("Verifiez vos informations bancaire.");
    return false;
}
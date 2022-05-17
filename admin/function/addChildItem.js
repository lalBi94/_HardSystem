let i = 1;
let j = 1;

function addChildItem(){
    const elem_src = document.getElementById("options");
    const qte_src = document.getElementById("qte"); 

    const input = document.createElement('input');
    const input2 = document.createElement('input');

    const br = document.createElement('br');
    const br2 = document.createElement('br');

    const p = document.createElement('p');
    const p2 = document.createElement('p');

    p.textContent = "E."+i+" ";
    p2.textContent = "Pour E."+i+" ";

    elem_src.appendChild(p);
    p.appendChild(input);
    input.setAttribute('class', 'fields-box-email');
    input.setAttribute('type', 'text');
    input.setAttribute('name', 'option-'+i);

    qte_src.appendChild(p2);
    p2.appendChild(input2);
    input2.setAttribute('class', 'fields-box-email');
    input2.setAttribute('type', 'number');
    input2.setAttribute('name', 'for-'+i);

    elem_src.appendChild(br);
    qte_src.appendChild(br2);

    if(i === 5){
        const btn_src = document.getElementById("btn-add-elem");
        
        btn_src.style.backgroundColor = "red";
        btn_src.disabled = true;
    }

    console.log("i = "+i);
    i++;
}

function addDesc(){
    const desc_src = document.getElementById("desc");
    const input3 = document.createElement("input");
    const p3 = document.createElement("p");
    const br3 = document.createElement("br");

    p3.textContent = "D."+j+" ";
    
    desc_src.appendChild(p3);
    p3.appendChild(input3);
    input3.setAttribute('class', 'fields-box-email');
    input3.setAttribute('type', 'text');
    input3.setAttribute('name', 'desc-'+j);
    
    desc_src.appendChild(br3);
    console.log("j= "+j);

    if(j === 5){
        const btn_src = document.getElementById("btn-add-desc");
        
        btn_src.style.backgroundColor = "red";
        btn_src.disabled = true;
    }

    j++;
}
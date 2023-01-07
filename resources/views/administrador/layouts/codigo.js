let form1=document.querySelector(".form1");
let input=document.querySelector(".input");
let button=document.querySelector(".button");
let parrafo=document.querySelector(".parrafo");
let div=document.querySelector(".div");
/* console.log(form1);
console.log(input);
console.log(button);
console.log(parrafo); */

button.addEventListener("click",(e)=>{
    let start=e.target.selectionStart;
    let end=e.target.selectionEnd;
    let textoCompleto=input.value;
    div.innerHTML=textoCompleto.substring(start,end);
    parrafo.innerHTML=textoCompleto;
    console.log(textoCompleto);
    console.log(input.value);
});












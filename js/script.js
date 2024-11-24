const $portafolio = document.querySelector(".sec-portfolio-js");
const $modalImgP = document.querySelector(".img-modal-js");

$portafolio.addEventListener("click", (e)=>{
 console.log(e.target);
 if(e.target.classList.contains("img-btn-modal-js")){
    
    console.log(e.target.attributes[0].nodeValue);
    //src
    let url = e.target.attributes[0].nodeValue;
    //add modal
    $modalImgP.src = url;
}
});
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("image");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slides[slideIndex-1].style.display = "block";  
}


var commentToggle = document.getElementsByClassName("commentToggle");
var commentText = document.getElementsByClassName("commentText");
function COMMENT(n){
    commentText[n].classList.toggle("active");
    commentToggle[n].classList.toggle("active");
    if(commentToggle[n].innerText == "-"){
        commentToggle[n].innerText = "+";
    }else{
        commentToggle[n].innerText = "-";
    }
}
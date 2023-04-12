let menu = document.getElementsByClassName("menu");
let menuBar = document.getElementsByClassName("menu-bar")[0]

menuBar.addEventListener("click",()=>{
    if(menu[0].classList.contains("menu-add")){
        menu[0].classList.add("menu-remove")
        menu[0].classList.remove("menu-add")
    }else{
        menu[0].classList.add("menu-add")
        menu[0].classList.remove("menu-remove")
    }
    
})


// let header = document.getElementsByClassName("header")[0];
// let HeaderPosition = header.getBoundingClientRect().top;
// window.addEventListener("scroll", e => {
//   let scrollPos = window.scrollY;
//   if (scrollPos > HeaderPosition) {
//     header.classList.add('sticky-bar');
//   } else {
//     header.classList.remove('sticky-bar');
//   }
// });


window.onscroll = function() {myFunction()};

var header = document.getElementsByClassName("header")[0];
function myFunction() {
  if (pageYOffset > 150) {
    header.classList.add("sticky-bar");
  } else {
    header.classList.remove("sticky-bar");
  }
}



$('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    autoplay:true,
    nav:false,
    navText:[`<button class="btn btn-success slide-btn"><</button>`,`<button class="btn btn-success slide-btn">></button>`],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})



let video = document.getElementsByClassName("video-player")[0];
let videoFile = document.getElementsByClassName("video-file")[0];
let closeBtn = document.getElementsByClassName("video-btn-close")[0];
let videoPlayBtn = document.getElementsByClassName("video-play-btn")[0];
let campusVideoText = document.getElementsByClassName("campus-video-text")[0];


videoPlayBtn.addEventListener("click",()=>{
    video.style.display = "block";
    campusVideoText.style.display = "none";
    videoFile.currentTime = 0;
    videoFile.play()
})

closeBtn.addEventListener("click",()=>{
    video.style.display = "none";
    campusVideoText.style.display = "block";
    videoFile.pause()
})
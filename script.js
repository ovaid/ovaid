$(document).ready(function(){
    $(window).scroll(function(){
        // sticky navbar on scroll script
        if(this.scrollY > 20){
            $('.navbar').addClass("sticky");
        }else{
            $('.navbar').removeClass("sticky");
        }
        
        // scroll-up button show/hide script
        if(this.scrollY > 500){
            $('.scroll-up-btn').addClass("show");
        }else{
            $('.scroll-up-btn').removeClass("show");
        }
    });

    // slide-up script
    $('.scroll-up-btn').click(function(){
        $('html').animate({scrollTop: 0});
        // removing smooth scroll on slide-up button click
        $('html').css("scrollBehavior", "auto");
    });

    $('.navbar .menu li a').click(function(){
        // applying again smooth scroll on menu items click
        $('html').css("scrollBehavior", "smooth");
    });

    // toggle menu/navbar script
    $('.menu-btn').click(function(){
        $('.navbar .menu').toggleClass("active");
        $('.menu-btn i').toggleClass("active");
    });

    // typing text animation script
    var typed = new Typed(".typing", {
        strings: ["Software Engineer","Front End Developer", "Back End Developer", "Designer", "Tutor", "Cricketer"],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
    });
    var typed = new Typed(".typing-3", {
        strings: ["Connect with me on :)"],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
    });

    var typed = new Typed(".typing-2", {
        strings: ["Software Engineer","Front End Developer", "Back End Developer", "Designer", "Tutor", "Cricketer"],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
    });

    // owl carousel script
    $('.carousel').owlCarousel({
        margin: 20,
        loop: true,
        autoplay: true,
        autoplayTimeOut: 2000,
        autoplayHoverPause: true,
        responsive: {
            0:{
                items: 1,
                nav: false
            },
            600:{
                items: 2,
                nav: false
            },
            1000:{
                items: 3,
                nav: false
            }
        }
    });
});



// Select the theme toggle button
const themeToggle = document.getElementById('theme-toggle');
const body = document.getElementById('body');
const home = document.getElementById('home');
themeToggle.addEventListener('click', function() {
    document.body.classList.toggle('dark-mode');
    if (document.body.classList.contains('dark-mode')) {
        document.body.style.backgroundColor = "black";
        document.body.style.color = "white";

        home.style.backgroundImage = "url('./images/zoltan-tasi-KHD_FA43aMw-unsplash.jpg')";
        moonIcon.classList.remove('fa-sun');
        moonIcon.classList.add('fa-moon');
    } else {
        document.body.style.backgroundColor = "";
        document.body.style.color = "";
        home.style.backgroundColor = ""; 
        home.style.backgroundImage = "";
        moonIcon.classList.remove('fa-moon');
        moonIcon.classList.add('fa-sun');
    }
});


document.getElementById('downloadLink').addEventListener('click', function() {
    var fileUrl = './images/courtnie-tosana-brqqSBSXPac-unsplash.jpg';
    window.open(fileUrl, '_blank');
    var notification = document.getElementById('notification');
    notification.style.display = 'block';
    setTimeout(function() {
        notification.style.display = 'none';
    }, 2000); 
});




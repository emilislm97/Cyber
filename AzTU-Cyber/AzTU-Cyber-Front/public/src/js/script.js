// Sticky Navbar
window.onscroll = function () {
  myFunction();
};


const navbar = document.querySelector(".header-container-second");
const sticky = 70; //70

function myFunction() {
  if (window.pageYOffset > sticky) {
    navbar.classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
  }
}

// MAIN PAGE SLIDERS

// MAIN PAGE SLIDERS

//1
const common_info_swiper = new Swiper(".common-info_swiper", {
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
        clickable: true,
    },
    grabCursor: true,
    mousewheel: true,
    // direction: "vertical",
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    // loop: true,
});
//2
const authors__swiper = new Swiper(".authors__swiper", {
  centeredSlides: true,
  pagination: {
    el: ".swiper-pagination",
    dynamicBullets: true,
  },

  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  direction: "vertical",
});

// Header
const darkLightMode = document.querySelector(".dark-light-mode");

function changeTheme(themeVal) {
  document.documentElement.setAttribute("data-theme", themeVal);
}

darkLightMode.addEventListener("click", function () {
  const darkLightIcon = document.querySelector(".dark-light-mode i");

  //
  darkLightMode.classList.toggle("active");
  //
  if (darkLightMode.classList.contains("active")) {
    darkLightIcon.className = "far fa-sun";
    changeTheme("dark");
  } else {
    darkLightIcon.className = "far fa-moon";
    changeTheme("light");
  }
});



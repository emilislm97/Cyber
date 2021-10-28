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
    darkLightIcon.className = "far fa-moon";
    changeTheme("dark");
  } else {
    darkLightIcon.className = "far fa-sun";
    changeTheme("light");
  }
});



function GetURL(x) {
    let url_string = location.href;
    let url = new URL(url_string);
    let c = url.searchParams.get(x);
    return c;
}
onload = function () {
    if (GetURL('token') && GetURL("email")){
        EmailVerify();
    }
}


function EmailVerify() {
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    let token=GetURL('token');
    let email=GetURL("email");
    $.ajax({
        type: "POST",
        url: "/verify",
        data: {_token: CSRF_TOKEN, email:email, token:token },
        success: function (data) {
        },
        error: function () {
            console.log('Əməliyyat uğursuz oldu...');
        }
    })
}

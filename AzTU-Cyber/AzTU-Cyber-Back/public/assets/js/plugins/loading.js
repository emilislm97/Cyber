$(document).ready(function() {
    $(".submit").click(function() {
        $(".submit").addClass("loading");
        if (document.getElementsByClassName('error')[0]){
            for (let b=0;b<document.getElementsByClassName('error').length;b++){
                if (document.getElementsByClassName('error')[b].innerHTML !== ''){
                    $(".submit").removeClass("loading");
                }
            }
        }
    })
});

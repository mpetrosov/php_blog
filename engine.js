function loadCategoryContent(event) {
    event.preventDefault();
    var url = event.srcElement.href;
    var request = new XMLHttpRequest();
    request.open('GET', url, false);  // `false` makes the request synchronous
    request.send(null);
    if (request.status === 200) {
        document.getElementById('right').innerHTML = request.responseText;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    

    var categoryLinks = document.getElementsByClassName('category-link');
    for (var i = 0; i < categoryLinks.length; i++) {
        categoryLinks[i].addEventListener('click', loadCategoryContent, false);
    }

}, false);




jQuery(function(){
    $('#log-in').click(function(){
        $(this).text(
            // "password recovery" ? "sign up" : "password recovery"         
            
         );
        $('.login-form').removeClass('hidden');
        $('.register-form').addClass('hidden');
       // $('.pwdrecov-form').removeClass('hidden');
    });
    
    $('#sign-up').click(function () {
        $(this).text(
        //    "sign up" ? "login" : "sign up"         
           
        );

        $('.login-form').addClass('hidden');
        $('.register-form').removeClass('hidden');
       // $('.pwdrecov-form').addClass('hidden');
       
    });

        // $('#pwd-rec').click(function(){
        //     $(this).text(
        //         // "password recovery" ? "sign up" : "password recovery"         
                
        //      );
        //     $('.login-form').removeClass('hidden');
        //     $('.register-form').addClass('hidden');
        //     $('.pwdrecov-form').addClass('hidden');
        // });

});



/**
 * Application JS
 */
(function() {


    $('.login').on('click', function() {
        $('.overlay').show();
        $('.login-div').show();
        return false;
    });

    $('.register').on('click', function(){
        $('.overlay').show();
        $('.register-div').show();
        return false;  
    });

    $('.logout').on('click', function(){
        $('.overlay').show();
        $('.logout-div').show();
        return false;  
    });
    
    $('.close').on('click', function(){
        $('.overlay').css('display','none');
        $('.register-div').hide();
        $('.login-div').hide();
        return false; 
     });

    $('#admin-tab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    })

})();
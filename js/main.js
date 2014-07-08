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

    // event control in inline_item page
    $("#inline-item-list ul").on("click", "button", function() {
        var inline_item_id = $(this).parent().parent().find(".hidden").val();
        
        $(this).parent().parent().parent().parent().parent().remove();
            
        $.ajax({


            url: "./deleteItem.php",
            type: "POST",
            dataType: "json",
            cache: false,
            data: {
                inline_item_id: inline_item_id
            },
            success: function(data) {
                // location.reload();
                1;
            },
            error: function(a, b, c) {
                console.log(b);
                console.log(c);
            }
        })
    })


})();
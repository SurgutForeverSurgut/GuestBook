$( document ).ready(function() {
    
    $('#add').on('click', function(){
        const data = $('#form').serializeArray();
        $.ajax({
            url: '/book',
            type: 'POST',
            data: data,
            success: function(res){
                $(`.error`).hide();
                res = JSON.parse(res);
                if(res.error === true){
                    for (const [key, value] of Object.entries(res.errors)) {
                        let errorBlock = $(`#${key}-error`);
                        errorBlock.html(value + '<br>');
                        errorBlock.show();
                    }
                    return;
                }
                clear();
                getTable();
            },
            error: function(e){
                alert(e);
                
            }
        });
        
    })

    function getTable(){
        $.ajax({
            url: '/table',
            type: 'GET',
            success: function(res){
                $('#table').html(res);
            },
            error: function(e){
                alert(e);
            }
        });
    }

    function clear(){
        $('.input').val('');
    }

});
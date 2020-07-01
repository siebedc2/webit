$('.delete-product-btn').click(function(e){
    e.preventDefault();
    var product_id = $(e.target).prev().html();
    var product = $(e.target).parent().parent();

    $('#confirm').modal({ backdrop: 'static', keyboard: false }).on('click', '#delete-btn', function(){
        $.ajax({
            method: "POST",
            url: '/admindashboard/products/delete',
            data: {
                product_id: product_id
            },
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        })

        .done(function (response) {

            console.log(response);

            if (response.message == "success") {
                jQuery('#confirm').modal('hide');
                $(product).fadeOut(500);
            } 

        });
    });
});


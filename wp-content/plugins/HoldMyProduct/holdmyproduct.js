jQuery(document).ready(function($) {
    $('#hmp_reserve_product').on('click', function() {
        var productId = $(this).data('productid');
        var isReserved = $('#rez_check').is(':checked');

        // if (!isReserved) {
        //     alert('Please check the reservation box.');
        //     return;
        // }

        $.ajax({
            url: holdmyproduct_ajax.ajax_url,
            method: 'POST',
            data: {
                action: 'holdmyproduct_reserve',
                product_id: productId,
                security: holdmyproduct_ajax.nonce
            },
            success: function(response) {
                if (response.success) {
                    alert('Reservation successful! Stock updated.');
                    // Opțional: dezactivează butonul sau checkbox-ul
                    $('#hmp_reserve_product').prop('disabled', true);

                    location.reload();


                } else {
                    alert('Error: ' + response.data);
                }
            },
            error: function() {
                alert('AJAX request failed.');
            }
        });
    });
});

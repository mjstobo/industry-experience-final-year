$(function() {
    $('.ajax-button').click(function(e){
        var targetUrl = $(this).data('url');
        var variable = $('.ajax-scan').val();

        $.ajax({
    type: 'get',
    url: targetUrl + '?barcode=' + variable,
    beforeSend: function(xhr) {
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    },
    success: function(response) {
        if (response.error) {
            alert(response.error);
        } else {
           $('#target').html(response.data.content);
        }
    },
    error: function(e) {
        alert("An error occurred");
        console.log(e);
    }
});
    });
        });
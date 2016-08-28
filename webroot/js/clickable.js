$(function () {
    $("#clickable").dataTable();
    $(document).on('click', 'tbody tr',function(){
        window.location.href = $(this).attr('href');
    });
});
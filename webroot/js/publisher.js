
$(document).ready(function(){
    $("#publisher-select, #publisher-enter").css("display","none");
    $(".publisher_type").click(function(){
        if ($('input[name=option]:checked').val() == "New Publisher") {
            $("#publisher-enter").slideDown("fast"); //Slide Down Effect
            $("#publisher-select").slideUp("fast"); //Slide Down Effect


        }
        if ($('input[name=option]:checked').val() == "Existing Publisher") {
            $("#publisher-select").slideDown("fast");
            $("#publisher-enter").slideUp("fast");

        }
        if ($('input[name=option]:checked').val() == "None"){
            $("#publisher-enter").slideUp("fast");
            $("#publisher-select").slideUp("fast");
        }
    });
    var showTop = $.cookie('showTop');
    if (showTop == 'expanded') {
        $("#publisher-select").show("fast");
        $('input[name=option]:checked');
    } else {
        $("#publisher-enter").hide("fast");
        $('input[name=option]:checked');
    }

});
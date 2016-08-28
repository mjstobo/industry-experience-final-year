/**
 * Created by matthewstobo on 17/08/15.
 */
$(document).ready(function(){
    $("#wizard, #existing-item-form").css("display","none");
    $(".item_type").click(function(){
        if ($('input[name=option]:checked').val() == "New Item") {
            $("#wizard").slideDown("fast"); //Slide Down Effect
            $("#existing-item-form").slideUp("fast"); //Slide Down Effect
            $.cookie('showTop', 'expanded'); //Add cookie 'ShowTop'
        }
        if ($('input[name=option]:checked').val() == "Existing Item") {
            $("#existing-item-form").slideDown("fast");
            $("#wizard").slideUp("fast");
            $.cookie('showTop', 'expanded'); //Add cookie 'ShowTop'
        }
        if ($('input[name=option]:checked').val() == "None"){
            $("#existing-item-form").slideUp("fast");
            $("#wizard").slideUp("fast");
            $.cookie('showTop', 'collapsed'); //Add cookie 'ShowTop'
        }
    });
    var showTop = $.cookie('showTop');
    if (showTop == 'expanded') {
        $("#wizard").show("fast");
        $('input[name=option]:checked');
    } else {
        $("#wizard").hide("fast");
        $('input[name=option]:checked');
    }

});
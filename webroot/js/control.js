
$(document).ready(function(){
    $("#individual_form, #organisation_form").css("display","none");
    $(".membership_type").click(function(){
        if ($('input[name=option]:checked').val() == "Individual") {
            $("#individual_form").slideDown("fast"); //Slide Down Effect
            $("#organisation_form").slideUp("fast"); //Slide Down Effect
            $.cookie('showTop', 'expanded'); //Add cookie 'ShowTop'
        }
        if ($('input[name=option]:checked').val() == "Organisation") {
            $("#organisation_form").slideDown("fast");
            $("#individual_form").slideUp("fast");
            $.cookie('showTop', 'expanded'); //Add cookie 'ShowTop'
        }
        if ($('input[name=option]:checked').val() == "None"){
            $("#organisation_form").slideUp("fast");
            $("#individual_form").slideUp("fast");
            $.cookie('showTop', 'collapsed'); //Add cookie 'ShowTop'
        }
     });
        var showTop = $.cookie('showTop');
        if (showTop == 'expanded') {
        $("#individual_form").show("fast");
        $('input[name=option]:checked');
      } else {
        $("#individial_form").hide("fast");
        $('input[name=option]:checked');
      } 
          
});
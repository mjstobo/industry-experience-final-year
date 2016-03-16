<?php $fname = $this->request->session()->read('Auth.User.given_name');?>
<?php $lname = $this->request->session()->read('Auth.User.family_name');?>





<h3><?php echo ('Welcome'." ".$fname." ".$lname); ?> </h3>

<br>
<h1>Welcome to EDV Membership</h1>

Members of EDV are part of a passionate community making a powerful impact on eating disorders in Victoria. You are helping
us advocate for improved public health care services as well as tackle theway body image and eating disorders are understood
in the community. Your membership helps us to run our front line services such as Helpline, website, online forum, family and
recovery support groups, as well as our education programs. <br><br><br>


<h1>Member Benefits</h1><br>

<ul>
    <li>Subscription to our member-only newsletter Inside Out.</li><br>
    <li>Regular email updates listing key events and opportunities to participate in relevant research</li><br>
    <li>Member-only access to our extensive library of books, videos and DVDs on eating disorders, self-esteem, self-help and related
    mental health and well-being issues</li><br>
    <li>We welcome your active participation in EDV at our AGM, and if you would like to be involved in any other ways, please don’t
    hesitate to contact us on 1300 550 236.</li><br>
</ul>






<?php

    if($this->request->session()->read('Auth.User')){
} else {
echo $this->Html->link(
'Register as Member',
'/users/add',
['class' => 'button']
);
}
?>
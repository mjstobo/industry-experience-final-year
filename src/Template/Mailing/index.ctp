<h3><?php echo ('Mailing List Subscriptions'); ?> </h3>
<div>

    <h4> Mailing List</h4>
    <p>Status: <?php echo $firstList; ?> <p> <?php
        if($firstBool){
            echo $this->Html->link(
                'Unsubscribe',
                ['controller' => 'mailing', 'action' => 'unsubscribe','listid' => 'firstlist', '_full' => true]);
        } else if(!$firstBool){
            echo $this->Html->link(
                'Subscribe',
                ['controller' => 'mailing', 'action' => 'subscribe','listid' => 'firstlist', '_full' => true]);
        }

        ?></p>
</div>

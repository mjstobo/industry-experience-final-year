<h3><?php echo ('Mailing List Subscriptions'); ?> </h3>
<div>

    <h4> Test List #1</h4>
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

    <h4> Test List #2</h4>
    <p>Status: <?php echo $secondList;?> <p> <?php
        if($secondBool){
            echo $this->Html->link(
                'Unsubscribe',
                ['controller' => 'mailing', 'action' => 'unsubscribe','listid' => 'secondlist', '_full' => true]);
        } else if(!$secondBool){
            echo $this->Html->link(
                'Subscribe',
                ['controller' => 'mailing', 'action' => 'subscribe','listid' => 'secondlist', '_full' => true]);
        }
        ?>
       </p>
</div>



<div class="form_wizard wizard_horizontal">
            <ul class="wizard_steps">
                <li>
                    <a  class="disabled">
                        <span class="step_no">1</span>
                        <span class="step_descr">
                Step 1<br />
                <small>Item Details</small>
            </span>
                    </a>
                </li>
                <li>
                    <a class="disabled">
                        <span class="step_no">2</span>
                        <span class="step_descr">
                Step 2<br />
                <small>Author Details</small>
            </span>
                    </a>
                </li>
                <li>
                    <a class="disabled">
                        <span class="step_no">3</span>
                        <span class="step_descr">
                Step 3<br />
                <small>Subject details</small>
            </span>
                    </a>
                </li>
                <li>
                    <a>
                        <span class="step_no">4</span>
                        <span class="step_descr">
                Step 4<br />
                <small>Summary</small>
            </span>
                    </a>
                </li>
            </ul>
</div>

<br>
<center>
    <table>
        <tr>
            <td width="100px"><b>Item ID: </b></td>
            <td><?= $items->id ?></td>
        </tr>
        <tr>
            <td><b>ISBN: </b></td>
            <td><?= $items->isbn ?></td>
        </td>
        <tr>
            <td><b>Call No:</b></td>
            <td><?= $items->call_number ?></td>
        </tr>
        <tr>
            <td><b>Title: </b></td>
            <td><?= $items->title ?></td>
        </tr>
        <tr>
            <td><b>Author: </b></td>
            <td><?php foreach ($items->authors as $author) : ?>
                    <?= h($author->author_name) ?>;
                <?php endforeach; ?>
            </td>
        </tr>
        <tr>
            <td><b>Publisher: </b></td>
            <td><?= $items->publisher->publisher_name ?></td>
        </tr>
        <tr>
            <td><b>Subject: </b></td>
            <td>
                <?php foreach ($items->subjects as $subject) : ?>
                   <?= h($subject->subject_name) ?>;
                <?php endforeach; ?>
            </td>
        </tr>
        <tr>
            <td><b>Year: </b></td>
            <td><?= $items->year->year_number ?></td>
        </tr>
    </table>
    <br><br><br>



    <?= $this->Html->link(__('Add Copy'), ['controller'=>'items','action'=>'addCopy',$items->id],['class'=>"button"]) ?>

</center>










<!-- Blog Comments -->
<?php make_comment(); ?>
<!-- Posted Comments -->
<?php display_comment(); ?>


<!-- Comments Form -->
<div class="well comment_form">
    <h4>Leave a Comment:</h4>
    <form role="form" method="post" action="">
<!--
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name">
        </div>
-->
        <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Email">
        </div>

        <div class="form-group">
            <textarea class="form-control" rows="3" name="comment" placeholder="Излей душата си тук! :) ........"></textarea>
        </div>
        <button type="comment" class="btn btn-primary">Submit</button>
    </form>
</div>


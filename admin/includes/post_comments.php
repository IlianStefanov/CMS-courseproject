<div class="table-responsive">
<table class="table table-sm table-inverse">
    <thead>
        <tr>
            <th>ID</th>
            <th>Post id </th>
            <th>Author</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Status</th>
            <th>Date</th>
            <th>In Response</th>
            <th>Delete</th>
            <th>Approve</th>
            <th>Disapprove</th>
        </tr>
    </thead>

    <tbody>
        <?php approve_comment(); ?>
        <?php unapprove_comment(); ?>
        <?php delete_comment(); ?>
        <?php list_all_comments_specific_post(); ?> 
    </tbody>
</table>    
</div>
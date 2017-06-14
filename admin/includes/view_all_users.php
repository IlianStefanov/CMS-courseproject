<div class="table-responsive">
<table class="table table-sm table-inverse">
    <thead>
        <tr>
            <th>user id</th>
            <th>Username</th>
            <th>Password</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Role</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody> 
            <?php delete_user(); ?>
            <?php list_all_users_admin(); ?> 
    </tbody>
</table>    
</div>

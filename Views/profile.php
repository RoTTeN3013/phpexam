<div class="container-fluid d-flex justify-content-center align-items-start">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Felhasználó azonosító</th>
                <th>Felhasználónév</th>
                <th>Név</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['fullname']; ?></td>
                <td><?php echo $user['email']; ?></td>
            </tr>
        </tbody>
    </table>
</div>
<div class="container-fluid d-flex justify-content-center align-items-start">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Felhasználó azonosító</th>
                <th>Felhasználónév</th>
                <th>Név</th>
                <th>Email</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['fullname']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal">
                        <i class="fa fa-pen"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
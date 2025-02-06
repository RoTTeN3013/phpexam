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
            <?php if (isset($users)) : ?>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['fullname']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td>
                            <button class="btn btn-danger delete_btn" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                data-id="<?php echo $user['id']; ?>"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>
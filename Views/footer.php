</div>

<div class="footer d-flex justify-content-center align-items-center">
    <p>MVC EXAM - Zilahi Márk</p>
</div>



<!-- Login -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bejelentkezés</h5>
            </div>
            <div class="modal-body">
                <form action="/login" method="POST">
                    <div class="form-group">
                        <label for="" class="control-label">Felhasználónév</label>
                        <input type="text" class="form-control" name="username" value="">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Jelszó</label>
                        <input type="password" class="form-control" name="password" value="">
                    </div>
                    <div class="mt-3 d-flex gap-1">
                        <button type="submit" class="btn btn-primary">Bejelentkezés</button>
                        <button type="button" class="btn btn-secondary prevent_btn"
                            data-bs-dismiss="modal">Bezárás</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Register -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Regisztráció</h5>
            </div>
            <div class="modal-body">
                <form action="/register" method="POST">
                    <div class="form-group">
                        <label for="" class="control-label">Vezetéknév</label>
                        <input type="password" class="form-control" name="reg_last_name" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Keresztnév</label>
                        <input type="password" class="form-control" name="reg_first_name" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Felhasználónév</label>
                        <input type="text" class="form-control" name="reg_username" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Email</label>
                        <input type="text" class="form-control" name="reg_email" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Jelszó</label>
                        <input type="password" class="form-control" name="reg_password" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Jelszó ismét</label>
                        <input type="password" class="form-control" name="reg_password_confirm" value="" required>
                    </div>
                    <div class="mt-3 d-flex gap-1">
                        <button type="submit" class="btn btn-primary">Regisztráció</button>
                        <button type="button" class="btn btn-secondary prevent_btn"
                            data-bs-dismiss="modal">Bezárás</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Felhasználó törlése -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Felhasználó törlése</h5>
            </div>
            <div class="modal-body">
                <form action="/delete-user" method="POST">
                    Biztosan törlöd a felhasználót?
                    <input type="hidden" name="delete_id" id="delete_id" value="">
                    <div class="mt-3 d-flex gap-1">
                        <button type="submit" class="btn btn-danger">Törlés</button>
                        <button type="button" class="btn btn-secondary prevent_btn"
                            data-bs-dismiss="modal">Bezárás</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Felhasználók editálása -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Adataid szerkesztése</h5>
            </div>
            <div class="modal-body">
                <form action="/edit-profile" method="POST">
                    <div class="form-group">
                        <label for="" class="control-label">Vezetéknév</label>
                        <input type="password" class="form-control" name="mod_last_name" value="">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Keresztnév</label>
                        <input type="password" class="form-control" name="mod_first_name" value="">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Felhasználónév</label>
                        <input type="text" class="form-control" name="mod_username" value="">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Email</label>
                        <input type="text" class="form-control" name="mod_email" value="">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Jelszó</label>
                        <input type="password" class="form-control" name="mod_password" value="">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Jelszó ismét</label>
                        <input type="password" class="form-control" name="mod_password_confirm" value="">
                    </div>
                    <div class="mt-3 d-flex gap-1">
                        <button type="submit" class="btn btn-primary">Módosítás</button>
                        <button type="button" class="btn btn-secondary prevent_btn"
                            data-bs-dismiss="modal">Bezárás</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JavaScript (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- jQuery  -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

</body>

</html>

<script>
    $(".prevent_btn").click(function(e) {
        e.preventDefualt();
    });

    //ID kinyerése a gomb data-id attr - ból
    $(".delete_btn").click(function() {
        document.getElementById("delete_id").value = $(this).attr("data-id");
    });
</script>
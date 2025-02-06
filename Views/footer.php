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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezárás</button>
                <button type="button" class="btn btn-primary">Bejelentkezés</button>
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
                    <button type="submit" class="btn btn-primary">Regisztráció</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Bezárás</button>
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
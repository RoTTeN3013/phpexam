<div class="footer d-flex justify-content-center align-items-center">
    <p>MVC EXAM - Zilahi Márk</p>
</div>



<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bejelentkezés</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Bezárás</button>
                <button type="button" class="btn btn-primary">Bejelentkezés</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JavaScript (CDN) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
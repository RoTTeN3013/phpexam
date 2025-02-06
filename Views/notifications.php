<div class="notification-container d-flex flex-column align-items-end justify-content-center">
    <?php if (isset($_SESSION['errors'])) : ?>
    <?php foreach ($_SESSION['errors'] as $error) : ?>
    <div class="message-holder red d-flex align-items-center justify-content-center">
        <p class="p-0 m-0"><?php echo $error; ?></p>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
    <?php if (isset($_SESSION['success'])) : ?>
    <div class="message-holder green d-flex align-items-center justify-content-center">
        <p class="p-0 m-0"><?php echo $_SESSION['success']; ?></p>
    </div>
    <?php endif; ?>
</div>
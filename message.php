<?php
if (isset($_SESSION['message'])) :
?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong><?= $_SESSION['message']; ?></strong>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php
    unset($_SESSION['message']);
endif;
?>

<?php
if (isset($_SESSION['time'])) :
?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong><?= $_SESSION['time']; ?></strong>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php
    unset($_SESSION['time']);
endif;
?>

<?php
if (isset($_SESSION['memory'])) :
?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong><?= $_SESSION['memory']; ?></strong>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php
    unset($_SESSION['memory']);
endif;
?>
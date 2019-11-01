<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Arcképed megadása</title>
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/fonts/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../../assets/css/floating-labels.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../../../assets/css/fileinput.min.css">
    <link rel="stylesheet" href="../../../assets/css/profiledata.css">
    <script src="../../../assets/js/populate-select.js" defer></script>
</head>
<body>
<form class="form-signin">
    <div class="kv-avatar">
        <div class="file-loading">
            <input id="avatar" name="avatar" type="file" required>
        </div>
    </div>
    <div class="kv-avatar-hint">
        <small>A választott fajlnak 1500 KB-nal kisebbenek kell lennie</small>
    </div>
    <div>
        <p class="mt-5 mb-3 text-muted text-center">&copy; 2019 Ambulánc</p>
    </div>
</form>

<div id="kv-avatar-errors" class="center-block" style="width:800px;display:none"></div>

<script src="../../../assets/js/jquery-3.4.1.min.js"></script>
<script src="../../../assets/js/popper.min.js"></script>
<script src="../../../assets/js/bootstrap.min.js"></script>
<script src="../../../assets/js/populate-select.js"></script>
<script src="../../../assets/js/bootstrap-select.min.js"></script>
<script src="../../../assets/js/defaults-hu_HU.min.js"></script>
<script src="../../../assets/js/piexif.min.js"></script>
<script src="../../../assets/js/purify.min.js"></script>
<script src="../../../assets/js/fileinput.min.js"></script>
<script src="../../../assets/js/theme.min.js"></script>
<script src="../../../assets/js/hu.js"></script>
<script>
$(document).ready(function() {
    $("#avatar").fileinput({
        theme: "fas",
        language: 'hu',
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        showBrowse: false,
        browseOnZoneClick: true,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="fas fa-folder-open"></i>',
        removeIcon: '<i class="fas fa-trash-alt"></i>',
        removeTitle: 'Törlés',
        elErrorContainer: '#kv-avatar-errors',
        msgErrorClass: 'alert alert-block alert-danger',
        defaultPreviewContent: '<img src="../../../assets/images/avatar.png" alt="Avatar"><h6 class="text-muted">Válassz ki egy fájlt!</h6>',
        layoutTemplates: {main2: '{preview} {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"],
        uploadClass: "btn btn-primary",
        uploadLabel: "Adminisztratori jovahagyas kerese",
        uploadIcon: "<i class=\"fas fa-user-check\"></i>"
        uploadUrl: "../../../core/userprofile/add/profilepicture.php",
        uploadAsync: false,
        initialPreviewAsData: true
    });
});
</script>
</body>
</html>
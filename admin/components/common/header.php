<?php
if (isset($_SESSION['admin_img'])) {

    $src = $_SESSION['admin_img'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/main.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="col col-md-12 col-lg-12 col-xl-12 col-xxl-12 pl-0 pr-0 collapse width show" id="sidebar">

        <!-- Main Wrapper -->
        <div class=" my-container active-cont">
            <!-- Top Nav -->
            <nav class="navbar top-navbar navbar-light ps-5 pe-4  navigationn   w-100">
                <a class="btn border-0" id="menu-btn"><i class="fa-solid fa-list ms-3 " style="color: #1c1e22;"></i></i></a>





                <div class=" ms-auto me-2 mb-2">
                    <a href="../../pages/adminprofile/index.php">
                        <img class="user" src="<?php if (isset($src)) {
                                                    echo $src;
                                                } ?>" alt="Admin Profile">
                    </a>

                </div>
                <form action="" method="post">
                    <button class="ms-2 logout" type="submit" name="logout">
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>

            </nav>
        </div>
    </div>

    <script src="../../js/sidebar.js"></script>
</body>

</html>

<?php
if (isset($_POST['logout'])) {
    unset($_SESSION['username']);
}

// if (!isset($_SESSION['username'])) {
//     header('location:../../');
// }

?>
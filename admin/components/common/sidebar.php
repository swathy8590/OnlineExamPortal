<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="side-navbar active-nav d-flex  flex-wrap flex-column position-absolute   " id="sidebar">
        <div class="logo">Test Your <span> Skill</span></div>
        <ul class="nav flex-column w-100 mt-1 ">
            <li>
                <a href="../../pages/dashbord" class="nav-link  ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="21" height="21">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h7v7H3zM14 3h7v7h-7zM3 14h7v7H3zM14 14h7v7h-7z" />
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>


                <a href="#menu3" class="nav-link" data-bs-toggle="collapse" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="21" height="21">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7.5A4.5 4.5 0 017.5 3h9A4.5 4.5 0 0121 7.5v9a4.5 4.5 0 01-4.5 4.5h-9A4.5 4.5 0 013 16.5v-9zM12 13.5h.01M12 9a1.5 1.5 0 00-1.5 1.5h3a1.5 1.5 0 00-1.5-1.5z" />
                    </svg>
                    Questions
                </a>
                <div class="collapse" id="menu3">
                    <a href="../../pages/questions/index.php" class="dropdown-item">View Question</a>
                    <a href="../../pages/questions/add.php" class="dropdown-item">Add Question</a>
                </div>
            </li>
            <li>
                <a href="#menu2" class="nav-link" data-bs-toggle="collapse" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="21" height="21">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v15m0 0H5.5A2.5 2.5 0 013 18.5v-13A2.5 2.5 0 015.5 3h13A2.5 2.5 0 0121 5.5V19m-9 2h6.5A2.5 2.5 0 0020 18.5v-13A2.5 2.5 0 0017.5 3H11" />
                    </svg>
                    Subjects
                </a>
                <div class="collapse" id="menu2">
                    <a href="../../pages/subject/index.php" class="dropdown-item">View Subjects</a>
                    <a href="../../pages/subject/add.php" class="dropdown-item">Add Subjects</a>
                </div>
            </li>
            <li>
                <a href="#menu1" class="nav-link" data-bs-toggle="collapse" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="21" height="21">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14.5V12m0 0L3.633 8.2a1 1 0 01-.513-.87V6.5A1 1 0 014.12 5.8L12 3l7.88 2.8a1 1 0 01.513.7v.8a1 1 0 01-.513.87L12 12zm0 0v2.5m0 4.5v2" />
                    </svg>
                    Class
                </a>
                <div class="collapse" id="menu1">
                    <a href="../../pages/class/index.php" class="dropdown-item">View Class</a>
                    <a href="../../pages/class/add.php" class="dropdown-item">Add Class</a>
                </div>
            </li>
            <li>
                <a href="#menu4" class="nav-link" data-bs-toggle="collapse" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="21" height="21">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A10 10 0 0112 15a10 10 0 016.879 2.804M12 12a4 4 0 100-8 4 4 0 000 8z" />
                    </svg>
                    User
                </a>
                <div class="collapse" id="menu4">
                    <a href="../../pages/user/index.php" class="dropdown-item">View User</a>
                    <a href="../../pages/user/add.php" class="dropdown-item">Add User</a>
                </div>
            </li>
        </ul>

        <!-- <span href="#" class="nav-link h4 w-100 mb-5">
            <a href="" class="me-3"><i class="fa-brands fa-square-instagram"></i></a>
            <a href=""><i class="fa-brands fa-twitter"></i></a>
            <a href=""><i class="fa-brands fa-facebook"></i></a>
        </span> -->


    </div>

    <?php require("header.php"); ?>
    <script src="../../js/sidebar.js"></script>
</body>

</html>
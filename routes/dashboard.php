<?php
session_start();
if (!isset($_SESSION['userData'])) {
    header("location: ../");
}
$userData = $_SESSION['userData'];
$grpData = $_SESSION['grpData'];
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.min.css" rel="stylesheet" />
    <title>MDB || DASHBOARD</title>
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
    <header>
        <!-- Navbar -->
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
            <!-- Container wrapper -->
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand me-2" href="https://mdbgo.com/">
                    <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="16" alt="MDB Logo" loading="lazy" style="margin-top: -1px;" />
                </a>

                <!-- Toggle button -->
                <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarButtonsExample">
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    </ul>
                    <!-- Left links -->

                    <div class="d-flex align-items-center">
                        <button data-mdb-ripple-init type="button" class="btn btn-link px-3 me-2">
                            <a href="../index.html">Home</a>

                        </button>

                        <button data-mdb-ripple-init type="button" class="btn btn-primary me-3">
                            <a href="../api/logout.php" style="color: white;">LogOut</a>

                        </button>

                    </div>
                </div>
                <!-- Collapsible wrapper -->
            </div>
            <!-- Container wrapper -->
        </nav>
        <!-- Navbar -->


        <!-- Background image -->
        <div id="intro-example" class="p-5 text-center bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/041.webp'); height: 40vh;">
            <div class="mask" style="background-color: rgba(0, 0, 0, 0.7); ">
                <div class="d-flex justify-content-center align-items-center h-100">
                    <div class="text-white">
                        <h1>Voting Panel</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Background image -->
    </header>
    <main>
        <div class="dashboard">
            <div class="profile">
                <h2>User Profile</h2>
                <div class="user-img">
                    <img src="../files/<?php echo $userData["photo"] ?>" alt="User Img">
                </div>
                <div>
                    <p>Name : <?php echo $userData['name'] ?> </p>
                    <p>Email : <?php echo $userData['email'] ?> </p>
                    <p>Mobile : <?php echo $userData['mobile'] ?> </p>
                    <p>Status : <?php if ($userData['status'] == 0) {
                                    echo '<span style="color:red; font-weight:600; ">Not Voted</span>';
                                } else {
                                    echo '<span style="color:green;font-weight:600;">Voted</span>';
                                } ?> </p>
                </div>
            </div>
            <div class="vote-system">
                <?php
                if ($_SESSION['grpData']) {
                    for ($i = 0; $i < count($grpData); $i++) {
                ?>
                        <div class="candidate-list">
                            <div>
                                <p>Part Name : <?php echo $grpData[$i]['name'] ?> </p>
                                <p>Total Vote : <?php echo $grpData[$i]['votes'] ?> </p>

                                <form action="../api/vote.php" method="post">
                                    <input name="gvote" value="<?php echo $grpData[$i]['votes'] ?>" hidden>
                                    <input name="gid" value="<?php echo $grpData[$i]['id'] ?>" hidden>
                                    <?php
                                    if ($userData['status'] === 0) {
                                    ?>
                                        <button class="v-btn" type="submit" style="background: blue;">Vote</button>
                                    <?php

                                    } else {
                                    ?>
                                        <button disabled class="v-btn" type="submit" style="background:rgba(0,200,0,0.7); cursor:not-allowed">Voted</button>
                                    <?php
                                    }
                                    ?>

                                </form>
                            </div>
                            <div class="user-img">
                                <img src="../files/<?php echo $grpData[$i]['photo'] ?>" alt="">
                            </div>
                        </div>
                <?php
                    }
                }
                ?>

            </div>
        </div>
    </main>
    <!-- Footer -->
    <footer class="text-center text-white" style="background-color: #0a4275;">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <section class="mb-4">
                <!-- Facebook -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="#!" role="button"><i class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #55acee;" href="#!" role="button"><i class="fab fa-twitter"></i></a>

                <!-- Google -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #dd4b39;" href="#!" role="button"><i class="fab fa-google"></i></a>

                <!-- Instagram -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="#!" role="button"><i class="fab fa-instagram"></i></a>

                <!-- Linkedin -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="#!" role="button"><i class="fab fa-linkedin-in"></i></a>
                <!-- Github -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #333333;" href="#!" role="button"><i class="fab fa-github"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2024 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->


    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.2.0/mdb.umd.min.js"></script>
</body>

</html>
<?php
    session_start();
    require "database.php";

    $sqlfechStatus = "SELECT * FROM `status` LEFT JOIN user ON status.user_id = user.id ORDER BY status.created_at DESC;";
    $sqlresultStatus = $mysqli->query($sqlfechStatus);

    $sqlfechPengalaman = "SELECT * FROM `pengalaman` LEFT JOIN user ON pengalaman.user_id = user.id ORDER BY pengalaman.created_at DESC;";
    $sqlresultPengalaman = $mysqli->query($sqlfechPengalaman);

    $sqlfechPendidikan = "SELECT * FROM `pendidikan` LEFT JOIN user ON pendidikan.user_id = user.id ORDER BY pendidikan.created_at DESC;";
    $sqlresultPendidikan = $mysqli->query($sqlfechPendidikan);

    $sqlfechSkill = "SELECT * FROM `skill` LEFT JOIN user ON skill.user_id = user.id ORDER BY skill.created_at DESC;";
    $sqlresultSkill = $mysqli->query($sqlfechSkill);

    $sqlfechAwards = "SELECT * FROM `award` LEFT JOIN user ON award.user_id = user.id ORDER BY award.created_at DESC;";
    $sqlresultAwards = $mysqli->query($sqlfechAwards);

    // var_dump($sqlresultStatus->fetch_assoc());
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Alumni Teknik Elektro</title>
    <link rel="icon" type="image/x-icon" href="profile/assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="profile/css/styles.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">Kerta Hendrawan</span>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="profile/assets/img/gojo.jpg" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Profile</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Experience</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Skills</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards">Awards</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#chatting">Chatting</a></li>
            </ul>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- About-->
        <section class="resume-section" id="about">
            <div class="resume-section-content">
                <h1 class="mb-0">
                    Gojo
                    <span class="text-primary">Sotaru</span>
                </h1>
                <div class="subheading mb-5">
                    Alumni Teknik Elektro·
                    <a href="mailto:name@email.com">gojosotaro@email.com</a>
                </div>
                <p class="lead mb-5">Daijoubu desho datte kimi yowai mo!!!!</p>
                <div class="social-icons">
                    <a class="social-icon" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    <a class="social-icon" href="#!"><i class="fab fa-github"></i></a>
                    <a class="social-icon" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="social-icon" href="#!"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Experience-->
        <section class="resume-section" id="experience">
            <div class="resume-section-content">
                <h2 class="mb-5">Pengalaman</h2>
               
                <?php
                    if ($sqlresultPengalaman->num_rows > 0) {
                        // ada data
                        // Perulangan
                        while($rowpengalaman = $sqlresultPengalaman->fetch_assoc()) {
                        echo "  <div class='d-flex flex-column flex-md-row justify-content-between mb-5'>
                                    <div class='flex-grow-1'>
                                        <h3 class= 'mb-0'>$rowpengalaman[profesi]</h3>
                                        <div class='subheading mb-3'>$rowpengalaman[bidang]</div>
                                            <p>$rowpengalaman[deskripsi]</p>
                                        </div>
                                    <div class='flex-shrink-0'><span class='text-primary'>$rowpengalaman[tanggal]</span></div>
                                </div>
                                " ;}
                        } else {
                            // Tidak ada data
                            echo "<center>Tidak ada status sayang</center>";
                        }
                ?>
                
                
            </div>
        </section>
        <hr class="m-0" />
        <!-- Education-->
        <section class="resume-section" id="education">
            <div class="resume-section-content">
                <h2 class="mb-5">Pendidikan</h2>
                
                <?php
                    if ($sqlresultPendidikan->num_rows > 0) {
                        // ada data
                        // Perulangan
                        while($rowpendidikan = $sqlresultPendidikan->fetch_assoc()) {
                        echo " <div class='d-flex flex-column flex-md-row justify-content-between mb-5'>
                                    <div class='flex-grow-1'>
                                        <h3 class='mb-0'>$rowpendidikan[universitas]</h3>
                                            <div class='subheading mb-3'>$rowpendidikan[jurusan]</div>
                                            <div>$rowpendidikan[prodi]</div>
                                        <p>IPK: $rowpendidikan[ipk]</p>
                                    </div>
                                    <div class='flex-shrink-0'><span class='text-primary'>$rowpendidikan[tanggal_lulus]</span></div>
                                </div>
                                " ;}
                        } else {
                            // Tidak ada data
                            echo "<center>Tidak ada status sayang</center>";
                        }
                ?>

            </div>
        </section>
        <hr class="m-0" />
        <!-- Skills-->
        <section class="resume-section" id="skills">
            <div class="resume-section-content">
                <h2 class="mb-5">Skill</h2>
                <div class="subheading mb-3">Bahasa Pemrograman yang dikuasai</div>
                <?php
                       if ($sqlresultSkill->num_rows > 0) {
                        // ada data
                        // Perulangan
                        while($rowskill = $sqlresultSkill->fetch_assoc()) {
                        echo "  <ul class='fa-ul mb-0'>
                                    <li>
                                        <span class='fa-li'><i class='fas fa-check'></i></span>$rowskill[bahasa_pemrograman]
                                    </li>
                                </ul>
                                " ;}
                        } else {
                            // Tidak ada data
                            echo "<center>Tidak ada status sayang</center>";
                        }
                ?>
                
            </div>
        </section>
        <hr class="m-0" />
        
        <!-- Awards-->
        <section class="resume-section" id="awards">
            <div class="resume-section-content">
                <h2 class="mb-5">Penghargaan dan Sertifikat</h2>
                <?php
                       if ($sqlresultAwards->num_rows > 0) {
                        // ada data
                        // Perulangan
                        while($rowawards = $sqlresultAwards->fetch_assoc()) {
                        echo "  <ul class='fa-ul mb-0'>
                                    <li>
                                    <span class='fa-li'><i class='fas fa-trophy text-warning'></i></span>$rowawards[sertifikat]
                                    </li>
                                </ul>
                                " ;}
                        } else {
                            // Tidak ada data
                            echo "<center>Tidak ada status sayang</center>";
                        }
                ?>
               
            </div>
        </section>
        <section class="resume-section" id="chatting">
            <div class="resume-section-content">
                <h2 class="mb-5">Go to the room chating and sharing</h2>
                <div class="btn-group" role="group" aria-label="Basic outlined example">
                    
                <a href="pagechat/chat.php" class="btn btn-primary btn-user btn-block-1">
                Go!
                 </a>
                    
                </div>
        </section>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="profile/js/scripts.js"></script>
</body>

</html>
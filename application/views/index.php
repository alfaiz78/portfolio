<?php ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>AZ Portfolio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url('assets/admin/images/favicon.ico'); ?>" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/open-iconic-bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/animate.css'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.theme.default.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/magnific-popup.css'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/aos.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/ionicons.min.css'); ?>">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/flaticon.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/icomoon.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <!-- Modified Loader -->
    <style>
        #ftco-loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .loader-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .loader-icon {
            width: 60px;
            height: 60px;
            background: #F96D00;
            border-radius: 50%;
            position: relative;
            animation: pulse 1.5s infinite ease-in-out;
        }

        .loader-text {
            margin-top: 20px;
            font-family: 'Arial', sans-serif;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* Pulsing animation */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
            }
        }

        /* Circular SVG animation (optional addition) */
        .circular {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .path-bg {
            stroke: #eeeeee;
            stroke-width: 4;
        }

        .path {
            stroke: #F96D00;
            stroke-width: 4;
            stroke-dasharray: 1, 150;
            stroke-dashoffset: 0;
            animation: dash 1.5s ease-in-out infinite;
        }

        @keyframes dash {
            0% {
                stroke-dasharray: 1, 150;
                stroke-dashoffset: 0;
            }

            50% {
                stroke-dasharray: 90, 150;
                stroke-dashoffset: -35;
            }

            100% {
                stroke-dasharray: 90, 150;
                stroke-dashoffset: -125;
            }
        }
    </style>



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
        <div class="container">
        <?php foreach ($footer as $foter): ?>
            <a class="navbar-brand" href="index"><?php echo htmlspecialchars($foter->title); ?></a>
            <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
                data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <?php endforeach; ?>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav nav ml-auto">
                <?php foreach ($navbar as $nav): ?>
                    <!-- Navigation Links -->
                    <li class="nav-item"><a href="<?php echo $nav->link; ?>" class="nav-link"><span><?php echo $nav->title; ?></span></a></li>
                    <!-- <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
                    <li class="nav-item"><a href="#resume-section" class="nav-link"><span>Resume</span></a></li>
                    <li class="nav-item"><a href="#services-section" class="nav-link"><span>Services</span></a></li>
                    <li class="nav-item"><a href="#skills-section" class="nav-link"><span>Skills</span></a></li>
                    <li class="nav-item"><a href="#projects-section" class="nav-link"><span>Projects</span></a></li>
                    <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li> -->
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Home Section with Slider -->
    <section id="home-section" class="hero">
        <div class="home-slider owl-carousel">
            <!-- Slide 1 -->
            <?php if (!empty($sliders)): ?>
                <?php foreach ($sliders as $slider): ?>
                    <div class="slider-item">
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end"
                                data-scrollax-parent="true">
                                <div class="one-third js-fullheight order-md-last img"
                                    style="background-image:url(<?php echo base_url('assets/uploads/sliders/' . $slider->image); ?>);">
                                    <div class="overlay"></div>
                                </div>
                                <div class="one-forth d-flex align-items-center ftco-animate"
                                    data-scrollax=" properties: { translateY: '70%' }">
                                    <div class="text">
                                        <span class="subheading"><?php echo $slider->title; ?></span>
                                        <h1 class="mb-4 mt-3"><?php echo $slider->subtitle; ?></h1>
                                        <h2 class="mb-4"><?php echo $slider->description; ?></h2>
                                        <p><a href="#contact-section" class="btn btn-primary py-3 px-4">Hire me</a> <a href=""
                                                class="btn btn-white btn-outline-white py-3 px-4">My works</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">No sliders found.</td>
                </tr>
            <?php endif; ?>

            <!-- Slide 2 -->

        </div>
    </section>

    <!-- About Section -->
    <section class="ftco-about img ftco-section ftco-no-pb" id="about-section">

        <?php if (!empty($abouts)): ?>
            <?php foreach ($abouts as $abouts): ?>
                <div class="container">
                    <div class="row d-flex">
                        <div class="col-md-6 col-lg-5 d-flex">
                            <div class="img-about img d-flex align-items-stretch">
                                <div class="overlay"></div>
                                <div class="img d-flex align-self-stretch align-items-center"
                                    style="background-image:url(<?php echo base_url('assets/uploads/abouts/' . $abouts->image); ?>);">
                                    <img src="" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-7 pl-lg-5 pb-5">
                            <div class="row justify-content-start pb-3">
                                <div class="col-md-12 heading-section ftco-animate">
                                    <h1 class="big"><?php echo $abouts->bg_title ?></h1>
                                    <h2 class="mb-4"><?php echo $abouts->title ?></h2>
                                    <p><?php echo $abouts->description ?></p>

                                    <ul class="about-info mt-4 px-md-0 px-2">
                                        <?php for ($i = 1; $i <= 6; $i++): ?>
                                            <li class="d-flex">
                                                <span><?php echo $abouts->{"heading$i"}; ?></span>
                                                <span><?php echo $abouts->{"title$i"}; ?></span>
                                            </li>
                                        <?php endfor; ?>
                                    </ul>

                                </div>
                            </div>
                            <div class="counter-wrap ftco-animate d-flex mt-md-3">
                                <div class="text">
                                    <p class="mb-4">
                                        <span class="number" data-number="<?php echo $abouts->subdigit ?>">0</span>
                                        <span><?php echo $abouts->subtitle ?></span>
                                    </p>
                                    <p><a href="<?php echo site_url('download-cv/' . urlencode($abouts->cv)); ?>"
                                            class="btn btn-primary py-3 px-3">Download CV</a></p>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center">No about found.</td>
            </tr>
        <?php endif; ?>
    </section>

    <!-- Resume Section -->
    <section class="ftco-section ftco-no-pb" id="resume-section">
        <div class="container">
            <?php if (!empty($hresumes)): ?>
                <?php foreach ($hresumes as $hresume): ?>
                    <div class="row justify-content-center pb-5">
                        <div class="col-md-10 heading-section text-center ftco-animate">
                            <h1 class="big big-2"><?php echo $hresume->bg_title ?></h1>
                            <h2 class="mb-4"><?php echo $hresume->title ?></h2>
                            <p><?php echo $hresume->description ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No about found.</td>
                    </tr>
                <?php endif; ?>
            </div>

            <div class="row">
                <!-- Left Column -->
                <?php if (!empty($resumes)): ?>
                    <?php foreach ($resumes as $resume): ?>
                        <div class="col-md-6">
                            <div class="resume-wrap ftco-animate">
                                <span class="date"><?php echo $resume->year; ?></span>
                                <h2><?php echo $resume->work; ?></h2>
                                <span class="position"><?php echo $resume->u_name; ?></span>
                                <p class="mt-4"><?php echo $resume->description; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-md-12 text-center">
                        <p>No resume found.</p>
                    </div>
                <?php endif; ?>
            </div>
    </section>

    <!-- Services Section -->
    <section class="ftco-section" id="services-section">
        <div class="container">
            <?php if (!empty($hservices)): ?>
                <?php foreach ($hservices as $hservice): ?>
                    <div class="row justify-content-center pb-5">
                        <div class="col-md-10 heading-section text-center ftco-animate">
                            <h1 class="big big-2"><?php echo $hservice->bg_title; ?></h1>
                            <h2 class="mb-4"><?php echo $hservice->title; ?></h2>
                            <p><?php echo $hservice->description; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-md-12 text-center">
                    <p>No resume found.</p>
                </div>
            <?php endif; ?>


            <div class="row">
                <?php if (!empty($services)): ?>
                    <?php foreach ($services as $service): ?>
                        <!-- Service 1 -->
                        <div class="col-md-4 text-center d-flex ftco-animate">
                            <div class="services-1">
                                <span class="icon">
                                    <i class="<?php echo $service->icon; ?>"></i>
                                </span>
                                <div class="desc">
                                    <h3 class="mb-5"><?php echo $service->title; ?></h3>
                                    <p><?php echo $service->description; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-md-12 text-center">
                        <p>No resume found.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section class="ftco-section ftco-no-pb" id="skills-section">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <?php if (!empty($hskills)): ?>
                    <?php foreach ($hskills as $hskill): ?>
                        <div class="col-md-10 heading-section text-center ftco-animate">
                            <h1 class="big big-2"><?php echo $hskill->bg_title; ?></h1>
                            <h2 class="mb-4"><?php echo $hskill->title; ?></h2>
                            <p><?php echo $hskill->description; ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No hading found.</td>
                    </tr>
                <?php endif; ?>
            </div>


            <div class="row">
                <?php if (!empty($skills)): ?>
                    <?php foreach ($skills as $skill): ?>
                        <!-- Skill 1 -->
                        <div class="col-md-6 animate-box">
                            <div class="progress-wrap">
                                <h3><?php echo $skill->title; ?></h3>
                                <div class="progress">
                                    <div class="progress-bar color-1" role="progressbar"
                                        aria-valuenow="<?php echo $skill->value; ?>" aria-valuemin="0" aria-valuemax="100"
                                        style="width:<?php echo $skill->value; ?>%">
                                        <span><?php echo $skill->value; ?>%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center">No skill found.</td>
                    </tr>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter">
        <div class="container">
            <!-- Check if there are skills -->
            <?php if (!empty($sskills)): ?>
                <div class="row d-md-flex align-items-center">
                    <!-- Loop through each skill -->
                    <?php foreach ($sskills as $skill): ?>
                        <div class="col-3 d-flex justify-content-center counter-wrap ftco-animate">
                            <div class="block-18 mb-4">
                                <div class="text">
                                    <strong class="number" data-number="<?php echo $skill->title; ?>">0</strong>
                                    <span><?php echo $skill->subtitle; ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="row d-md-flex align-items-center">
                    <div class="col-12 text-center">
                        <p>No skills found.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>




    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
        <div class="container">
            <?php if (!empty($hcontacts)): ?>
                <?php foreach ($hcontacts as $hcontact): ?>
                    <div class="row justify-content-center mb-5 pb-3">
                        <div class="col-md-7 heading-section text-center ftco-animate">
                            <h1 class="big big-2"><?php echo $hcontact->bg_title; ?></h1>
                            <h2 class="mb-4"><?php echo $hcontact->title; ?></h2>
                            <p><?php echo $hcontact->description; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-md-12 text-center">
                    <p>No hadding not found.</p>
                </div>
            <?php endif; ?>

            <div class="row d-flex contact-info mb-5">
                <?php if (!empty($contacts)): ?>
                    <?php foreach ($contacts as $contact): ?>
                        <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                            <div class="align-self-stretch box p-4 text-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="<?php echo $contact->icon; ?>"></span>
                                </div>
                                <h3 class="mb-4"><?php echo $contact->title; ?></h3>
                                <p><?php echo $contact->subtitle; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-md-12 text-center">
                        <p>No hadding not found.</p>
                    </div>
                <?php endif; ?>

            </div>

            <div class="order-md-last d-flex">
                <!-- Display flash messages -->
                <?php if ($this->session->flashdata('error')): ?>
                    <p style="color:red;">
                        <?php echo $this->session->flashdata('error'); ?>
                    </p>
                <?php endif; ?>

                <?php if ($this->session->flashdata('success')): ?>
                    <p style="color:green;">
                        <?php echo $this->session->flashdata('success'); ?>
                    </p>
                <?php endif; ?>
            </div>


            <div class="row no-gutters block-9">
                <div class="col-md-6 order-md-last d-flex">
                    <form method="post" class="bg-light p-4 p-md-5 contact-form"
                        action="<?php echo site_url('admin/send_email'); ?>">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="to_email" class="form-control" placeholder="You Email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                        </div>
                        <div class="form-group">
                            <textarea name="message" cols="30" rows="7" class="form-control" placeholder="Message"
                                required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                        </div>
                    </form>
                </div>
                <?php foreach ($hcontacts as $contact): ?>
                    <div class="col-md-6 d-flex">
                        <div class="img"
                            style="background-image: url(<?= base_url('assets/uploads/contacts/' . $contact->image); ?>); ">

                        </div>
                    </div>
                <?php endforeach; ?>


            </div>
        </div>
    </section>


    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                    <?php foreach ($footer as $foter): ?>
                        <h2 class="ftco-heading-2"><?php echo htmlspecialchars($foter->title); ?></h2>
                        <p><?php echo htmlspecialchars($foter->subtitle); ?></p>
                            <?php endforeach; ?>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <?php foreach ($links as $link): ?>
                            <li class="ftco-animate"><a href="<?php echo htmlspecialchars($link->link); ?>"><span class="<?php echo htmlspecialchars($link->icon); ?>"></span></a></li>
                           
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Links</h2>
                        <ul class="list-unstyled">
                        <?php foreach ($navbar as $nav): ?>
                            <li><a href="<?php echo $nav->link; ?>"><span class="icon-long-arrow-right mr-2"></span><?php echo $nav->title; ?></a></li>

                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Services</h2>
                        <?php foreach ($services as $service): ?>
                            <ul class="list-unstyled">
                                <li><a href="#"><span
                                            class="icon-long-arrow-right mr-2"></span><?php echo $service->title; ?></a>
                                </li>
                            </ul>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <?php
                            // Limit to the first three contacts
                            $limited_contacts = array_slice($contacts, 0, 3);
                            foreach ($limited_contacts as $contact): ?>
                                <ul>
                                    <li><span class="icon icon-map-marker"></span><span
                                            class="text"><?php echo htmlspecialchars($contact->subtitle); ?></span>
                                    </li>
                                </ul>
                            <?php endforeach; ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | Crafted with care and creativity <i
                            class="icon-heart color-danger" aria-hidden="true"></i> by <a href="#"
                            target="_blank">ALFAIZ SHAIKH</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>




    <div id="ftco-loader" class="show fullscreen">
        <div class="loader-container">
            <div class="loader-icon"></div>
            <div class="loader-text">Loading...</div>
            <svg class="circular" width="48px" height="48px">
                <circle class="path-bg" cx="24" cy="24" r="22" fill="none" />
                <circle class="path" cx="24" cy="24" r="22" fill="none" />
            </svg>
        </div>
    </div>


    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery-migrate-3.0.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.easing.1.3.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.waypoints.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.stellar.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/owl.carousel.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.magnific-popup.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/aos.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.animateNumber.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/scrollax.min.js'); ?>"></script>

    <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>



</body>

</html>
<!-- Jumbotron -->
<section class="home2" id="home">
    <div class="background-banner container">
        <div class="row justify-content-center">
            <div class="col-md-5 about-text text-center" data-aos="fade-right" data-aos-duration="1300" data-aos-delay="500">
                <h2>Blog</h2>
            </div>
        </div>
    </div>
    <!-- <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
            </g>
        </svg> -->
</section>
<!-- End Jumbotron -->

<!-- Blog -->
<section class="blog py-5" id="blog">
    <div class="container">
        <div class="row text-content2">
            <div class="col text-center mb-5">
                <h2>Recent Blog Posts</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php

            $query = "SELECT * FROM blog, user ORDER BY id DESC";
            $result = mysqli_query($koneksi2, $query);

            if (!$result) {
                die("Query Error: " . mysqli_errno($koneksi2) .
                    " - " . mysqli_error($koneksi2));
            }
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>

                <div class="card col-xl-4 col-md-5">
                    <a href="blog.php?page=blog-details&id=<?php echo $row['id']; ?>">
                        <img src="assets/img/blog/<?php echo $row['blog_image']; ?>" class="card-img-top" alt="...">
                        <div class="card-body">

                            <h5 class="card-title"><?php echo $row['blog_heading']; ?></h5>
                            <p class="card-text"><?php echo substr($row['blog_text'], 0, 70); ?>...</p>

                            <div class="author">
                                <img src="assets/img/user/<?php echo $row['profile_image']; ?>" alt="" class="img-fluid float-start">
                                <p class="author-name fw-semibold m-0"><?php echo $row['fullname']; ?></p>
                                <p class="time fw-light"><time datetime="<?php echo date('Y-m-d', strtotime($row['blog_date'])); ?>"><?php echo date('M d Y', strtotime($row['blog_date'])); ?></time></p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
                $no++;
            }
            ?>


        </div>
    </div>
</section>
<!-- End blog -->
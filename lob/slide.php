  <!-- / Top banner -->
  <section class="vh-75 vh-lg-60 container-fluid rounded overflow-hidden" data-aos="fade-in">
            <!-- Swiper Info -->
            <div class="swiper-container overflow-hidden rounded h-100 bg-light" data-swiper data-options='{
              "spaceBetween": 0,
              "slidesPerView": 1,
              "effect": "fade",
              "speed": 1000,
              "loop": true,
              "parallax": true,
              "observer": true,
              "observeParents": true,
              "lazy": {
                "loadPrevNext": true
                },
                "autoplay": {
                  "delay": 5000,
                  "disableOnInteraction": false
              },
              "pagination": {
                "el": ".swiper-pagination",
                "clickable": true
                }
              }'>
              <div class="swiper-wrapper">
            
                <!-- Slide-->
                <?php
                $sql_user = "SELECT * FROM `banner` WHERE status = 1";
                $re = mysqli_query($con , $sql_user);
                while($row_user = mysqli_fetch_assoc($re)){
                  ?>
              <div class="swiper-slide position-relative h-100 w-100">
                  <div class="w-100 h-100 overflow-hidden position-absolute z-index-1 top-0 start-0 end-0 bottom-0">
                    <div class="w-100 h-100 bg-img-cover bg-pos-center-center overflow-hidden" data-swiper-parallax="-100"
                      style=" will-change: transform; background-image: url(./banner/<?=$row_user['pic']?>)">
                    </div>
                  </div>
                  <div
                    class="container position-relative z-index-10 d-flex h-100 align-items-start flex-column justify-content-center">
                    <p class="title-small text-white opacity-75 mb-0" data-swiper-parallax="-100" style="font-family: 'Thasadith', sans-serif; ">BPM</p>
                    <h2 class="display-3 tracking-wide fw-bold text-uppercase tracking-wide text-white" data-swiper-parallax="100">
                      <span class="text-outline-light"><?=$row_user['topic']?></span> </h2>
                    <div data-swiper-parallax-y="-25">
                      <a href="./category.php?val=Man" class="btn btn-psuedo text-white" role="button"><?=$row_user['namebtn']?></a>
                    </div>
                  </div>
                </div>
                  <?php
                }
                
                ?>
              
              </div>
            
              <div class="swiper-pagination swiper-pagination-bullet-light"></div>
            
            </div>
            <!-- / Swiper Info-->        </section>
        <!--/ Top Banner-->

  
            <div data-aos="fade-in">
              <h3 class="title-small text-muted text-center mb-3 mt-5" style="font-family: 'Thasadith', sans-serif; ">
               มีดแนะนำ
            </h3>
            <div class="overflow-hidden">
              <div class="swiper-container swiper-overflow-visible"
                data-swiper
                data-options='{
                    "spaceBetween": 20,
                    "loop": true,
                    "autoplay": {
                      "delay": 5000,
                      "disableOnInteraction": false
                    },
                    "breakpoints": {
                      "400": {
                        "slidesPerView": 2
                      },
                      "600": {
                        "slidesPerView": 3
                      },       
                      "999": {
                        "slidesPerView": 5
                      },
                      "1024": {
                        "slidesPerView": 6
                      }
                    }
                  }'>
                <div class="swiper-wrapper mb-5">
                  <?php
                $sql_ss = "SELECT * FROM `product_ssd` WHERE status = 1 ORDER BY RAND()";
                $ress = mysqli_query($con , $sql_ss);
                while($row_users = mysqli_fetch_assoc($ress)){
                  ?>
                  <div class="swiper-slide flex-column">
                    <picture>
                      <img
                        class="rounded shadow-sm img-fluid"
                        data-zoomable
                        src="all_res/<?=$row_users['path']?>"
                        title=""
                        alt="">
                    </picture>
                  </div>
                <?php
                }
                ?>
                </div>
              </div>
            </div>
            </div>
<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url()?>assets/images/login.jpeg');" data-stellar-background-ratio="0.5"></section>
      <div class="overlay"></div>
      <div class="limiter">
          <div class="container-login100" >
            <div class="wrap-login100 p-t-190 p-b-30">
              
                    <section class="cards" style="position: absolute;top:25%;margin-left: 25%;margin-right: 25%;">
                            
                        <article class="card card--1">
                            <a data-href="<?php echo base_url() ?>Login/signupMahasiswa">
                                <div class="card__img"></div>
                                    <div class="card_link">
                                        <div class="card__img--hover"></div>
                                    </div>
                                <div class="card__info">
                                    <h3 class="card__title font1">I'm a Student</h3>
                                </div>
                            </a>
                        </article>
                        <script type="text/javascript">
                            var anchors = document.querySelectorAll('a[data-href]');

                            for (var i=0; i<anchors.length; ++i) {
                            var anchor = anchors[i];
                            var href = anchor.getAttribute('data-href');
                            anchor.addEventListener('click', function() {
                                window.location = href;
                            });
                            }
                        </script>
                              
                            <article class="card card--2">
                                <a href="<?php echo base_url() ?>Login/signupDosen">
                                    <div class="card__img"></div>
                                            <div class="card__img--hover"></div>
                                    <div class="card__info">
                                        <h3 class="card__title font1">I'm a Lecturer</h3>
                                    </div>
                                </a>
                            </article>  

                            <article class="card card--2">
                                <a href="<?php echo base_url() ?>Login/signupKaprodi"">
                                    <div class="card__img"></div>
                                            <div class="card__img--hover"></div>
                                    <div class="card__info">
                                        <h3 class="card__title font1">I'm a Head Department</h3>
                                    </div>
                                </a>
                            </article>  
                    </section>

            </div>
          </div>
        </div>
      
    </section>
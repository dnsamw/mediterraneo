<?php

/**
 * Theme front page
 * 
 * @package Mediterraneo
 */

get_header();
?>

<!-- Main Slider -->
<section class="section main-slider">
    <!-- <div class="textOverlay">
        <h1>Benvenuto!</h1>
    </div> -->
    <div class="slider">
        <div class="slide">
            <input type="radio" name="radio-btn" id="radio1" />
            <input type="radio" name="radio-btn" id="radio2" />
            <input type="radio" name="radio-btn" id="radio3" />
            <!-- <input type="radio" name="radio-btn" id="radio4" /> -->

            <?php

            $image_ids = get_option('slider_imgs');
            // Filtering the array
            $result_img_ids_array = array_filter(explode(",", $image_ids), "myFilter");

            function myFilter($var)
            {
                return ($var !== NULL && $var !== FALSE && $var !== "");
            }

            foreach ($result_img_ids_array as $i => &$id) {
                $url = wp_get_attachment_image_url($id, 'full');
                if ($url) {
            ?>
                    <?php if ($i == 0) : ?>
                        <div class="st first">
                            <img id="<?php echo $i; ?>" src="<?php echo $url; ?>" alt="" />
                        </div>

                    <?php else : ?>
                        <div class="st">
                            <img id="<?php echo $i; ?>" src="<?php echo $url; ?>" alt="" />
                        </div>
                    <?php endif; ?>
            <?php
                } else {
                    unset($image_ids[$i]);
                }
            }

            ?>


            <!-- <div class=" st">
                        <img src="./images/pasta.jpg" alt="" />
                    </div> -->

            <div class="nav-auto">
                <div class="a-b1"></div>
                <div class="a-b2"></div>
                <div class="a-b3"></div>
                <!-- <div class="a-b4"></div> -->
            </div>
        </div>

        <div class="nav-m">
            <label for="radio1" class="m-btn"></label>
            <label for="radio2" class="m-btn"></label>
            <label for="radio3" class="m-btn"></label>
            <!-- <label for="radio4" class="m-btn"></label> -->
        </div>
    </div>
</section>

<section class="greeting container-primary">
    <div class="grreting-title">
        <h2>Benvenuto!</h2>
        <p>
            It takes more than exquisite cooking to make a memorable meal. We at
            Mediterraneo believe an intimate atmosphere in the right location,
            personal and attentive service and great company are what separates a
            delicious dinner from an unforgettable experience.
        </p>
    </div>
</section>
<!-- Dishes Slider -->
<section class="dishes product">
    <h2 class="product-category">best selling dishes</h2>
    <button class="pre-btn"><img src="<?php bloginfo('template_url'); ?>/assets/images/arrow.png" alt="" /></button>
    <button class="nxt-btn"><img src="<?php bloginfo('template_url'); ?>/assets/images/arrow.png" alt="" /></button>
    <div class="product-container">
        <div class="product-card">
            <div class="product-image">
                <span class="discount-tag">50% off</span>
                <img src="<?php bloginfo('template_url'); ?>/assets/images/bologne.jpg" class="product-thumb" alt="" />
                <button class="card-btn">add to wishlist</button>
            </div>
            <div class="product-info">
                <h2 class="product-brand">brand</h2>
                <p class="product-short-description">
                    a short line about the cloth..
                </p>
                <span class="price">$20</span><span class="actual-price">$40</span>
            </div>
        </div>
        <div class="product-card">
            <div class="product-image">
                <span class="discount-tag">50% off</span>
                <img src="<?php bloginfo('template_url'); ?>/assets/images/casarecce.jpg" class="product-thumb" alt="" />
                <button class="card-btn">add to wishlist</button>
            </div>
            <div class="product-info">
                <h2 class="product-brand">brand</h2>
                <p class="product-short-description">
                    a short line about the cloth..
                </p>
                <span class="price">$20</span><span class="actual-price">$40</span>
            </div>
        </div>
        <div class="product-card">
            <div class="product-image">
                <span class="discount-tag">50% off</span>
                <img src="<?php bloginfo('template_url'); ?>/assets/images/lasagne.jpg" class="product-thumb" alt="" />
                <button class="card-btn">add to wishlist</button>
            </div>
            <div class="product-info">
                <h2 class="product-brand">brand</h2>
                <p class="product-short-description">
                    a short line about the cloth..
                </p>
                <span class="price">$20</span><span class="actual-price">$40</span>
            </div>
        </div>
        <div class="product-card">
            <div class="product-image">
                <span class="discount-tag">50% off</span>
                <img src="<?php bloginfo('template_url'); ?>/assets/images/pasta.jpg" class="product-thumb" alt="" />
                <button class="card-btn">add to wishlist</button>
            </div>
            <div class="product-info">
                <h2 class="product-brand">brand</h2>
                <p class="product-short-description">
                    a short line about the cloth..
                </p>
                <span class="price">$20</span><span class="actual-price">$40</span>
            </div>
        </div>
        <div class="product-card">
            <div class="product-image">
                <span class="discount-tag">50% off</span>
                <img src="<?php bloginfo('template_url'); ?>/assets/images/pizza.jpg" class="product-thumb" alt="" />
                <button class="card-btn">add to wishlist</button>
            </div>
            <div class="product-info">
                <h2 class="product-brand">brand</h2>
                <p class="product-short-description">
                    a short line about the cloth..
                </p>
                <span class="price">$20</span><span class="actual-price">$40</span>
            </div>
        </div>
        <div class="product-card">
            <div class="product-image">
                <span class="discount-tag">50% off</span>
                <img src="<?php bloginfo('template_url'); ?>/assets/images/bologne.jpg" class="product-thumb" alt="" />
                <button class="card-btn">add to wishlist</button>
            </div>
            <div class="product-info">
                <h2 class="product-brand">brand</h2>
                <p class="product-short-description">
                    a short line about the cloth..
                </p>
                <span class="price">$20</span><span class="actual-price">$40</span>
            </div>
        </div>
        <div class="product-card">
            <div class="product-image">
                <span class="discount-tag">50% off</span>
                <img src="<?php bloginfo('template_url'); ?>/assets/images/casarecce.jpg" class="product-thumb" alt="" />
                <button class="card-btn">add to wishlist</button>
            </div>
            <div class="product-info">
                <h2 class="product-brand">brand</h2>
                <p class="product-short-description">
                    a short line about the cloth..
                </p>
                <span class="price">$20</span><span class="actual-price">$40</span>
            </div>
        </div>
        <div class="product-card">
            <div class="product-image">
                <span class="discount-tag">50% off</span>
                <img src="<?php bloginfo('template_url'); ?>/assets/images/lasagne.jpg" class="product-thumb" alt="" />
                <button class="card-btn">add to wishlist</button>
            </div>
            <div class="product-info">
                <h2 class="product-brand">brand</h2>
                <p class="product-short-description">
                    a short line about the cloth..
                </p>
                <span class="price">$20</span><span class="actual-price">$40</span>
            </div>
        </div>
        <div class="product-card">
            <div class="product-image">
                <span class="discount-tag">50% off</span>
                <img src="<?php bloginfo('template_url'); ?>/assets/images/pasta.jpg" class="product-thumb" alt="" />
                <button class="card-btn">add to wishlist</button>
            </div>
            <div class="product-info">
                <h2 class="product-brand">brand</h2>
                <p class="product-short-description">
                    a short line about the cloth..
                </p>
                <span class="price">$20</span><span class="actual-price">$40</span>
            </div>
        </div>
        <div class="product-card">
            <div class="product-image">
                <span class="discount-tag">50% off</span>
                <img src="<?php bloginfo('template_url'); ?>/assets/images/pizza.jpg" class="product-thumb" alt="" />
                <button class="card-btn">add to wishlist</button>
            </div>
            <div class="product-info">
                <h2 class="product-brand">brand</h2>
                <p class="product-short-description">
                    a short line about the cloth..
                </p>
                <span class="price">$20</span><span class="actual-price">$40</span>
            </div>
        </div>
    </div>
</section>

<!-- Menu List -->
<section class="menu-list">
    <h2>Menu List</h2>
    <ol class="toc-list" role="list">
        </li>
        <li>
            <a href="#PASTA">
                <span class="title main-title">1. PASTA<span aria-hidden="true"></span></span>
                <span data-href="#Promise-Basics" class="page">
            </a>
            <a href="#SPEGHATTI">
                <span class="title sub-title">SPEGHATTI<span aria-hidden="true"></span></span>
                <span data-href="#Promise-Basics" class="page">
            </a>
            <ol role="list">
                <li>
                    <a href="#Alla-Bologsnes">
                        <span class="title">alla Bolognes - traditional meat sauce<span class="leaders" aria-hidden="true"></span></span>
                        <span data-href="#Alla-Bologsnes" class="page"><span class="visually-hidden">Page&nbsp;</span>£ 8.25</span>
                    </a>
                </li>

                <li>
                    <a href="#Alla-Carbonara">
                        <span class="title">alla Carbonara - rich cramy sauce with bacon, egg and permesan cheese<span class="leaders" aria-hidden="true"></span></span>
                        <span data-href="#Alla-Carbonara" class="page"><span class="visually-hidden">Page&nbsp;</span>£ 8.95</span>
                    </a>
                </li>

                <li>
                    <a href="#Alla-Pescarota">
                        <span class="title">alla Pescarota - king prawns [on shell] prawns,mussels, calamari,garlic,tomato and white wine<span class="leaders" aria-hidden="true"></span></span>
                        <span data-href="#Alla-Pescarota" class="page"><span class="visually-hidden">Page&nbsp;</span>£ 12.50</span>
                    </a>
                </li>
            </ol>
        </li>
    </ol>
</section>

<!-- About Us -->
<section class="about container-primary">
    <h2>About Us</h2>
    <p>Wine & Dine Through Toronto is a publishing company in Canada that provides great and relevant content about premium wine and dining experiences. We’re here to guide you to great restaurants all over Toronto where you can taste all sorts of culinary masterpieces, from extraordinary comfort foods to world-class cuisines, in beautiful locations and spots that overlook views and have amazing ambience. We also review alcoholic drinks that can be highly appropriate for any occasion you’ll be having. In addition to these, we also deliver timely news and events to our avid audiences.</p>
</section>

<!-- Testimonials -->
<section class="testimonials">
    <h2>Testimonials</h2>
    <div class="slide-container swiper">
        <div class="slide-content">
            <div class="card-wrapper swiper-wrapper">
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>

                        <div class="card-image">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/profile1.jpg" alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h3 class="name">David Dell</h3>
                        <p class="description">The lorem text the section that contains header with having open functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>

                        <button class="button">View More</button>
                    </div>
                </div>
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>

                        <div class="card-image">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/profile2.jpg" alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h3 class="name">David Dell</h3>
                        <p class="description">The lorem text the section that contains header with having open functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>

                        <button class="button">View More</button>
                    </div>
                </div>
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>

                        <div class="card-image">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/profile3.jpg" alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h3 class="name">David Dell</h3>
                        <p class="description">The lorem text the section that contains header with having open functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>

                        <button class="button">View More</button>
                    </div>
                </div>
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>

                        <div class="card-image">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/profile4.jpg" alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h3 class="name">David Dell</h3>
                        <p class="description">The lorem text the section that contains header with having open functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>

                        <button class="button">View More</button>
                    </div>
                </div>
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>

                        <div class="card-image">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/profile5.jpg" alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h3 class="name">David Dell</h3>
                        <p class="description">The lorem text the section that contains header with having open functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>

                        <button class="button">View More</button>
                    </div>
                </div>
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>

                        <div class="card-image">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/profile6.jpg" alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h3 class="name">David Dell</h3>
                        <p class="description">The lorem text the section that contains header with having open functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>

                        <button class="button">View More</button>
                    </div>
                </div>
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>

                        <div class="card-image">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/profile7.jpg" alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h3 class="name">David Dell</h3>
                        <p class="description">The lorem text the section that contains header with having open functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>

                        <button class="button">View More</button>
                    </div>
                </div>
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>

                        <div class="card-image">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/profile8.jpg" alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h3 class="name">David Dell</h3>
                        <p class="description">The lorem text the section that contains header with having open functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>

                        <button class="button">View More</button>
                    </div>
                </div>
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>

                        <div class="card-image">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/profile9.jpg" alt="" class="card-img">
                        </div>
                    </div>

                    <div class="card-content">
                        <h3 class="name">David Dell</h3>
                        <p class="description">The lorem text the section that contains header with having open functionality. Lorem dolor sit amet consectetur adipisicing elit.</p>

                        <button class="button">View More</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- Address and contacts -->
<section class="contacts" id="ContactUs">
    <div class="container">
        <div class="contactInfo">
            <div>
                <h2>Contact Us</h2>
                <ul class="info">
                    <li>
                        <span><img src="<?php bloginfo('template_url'); ?>/assets/images/location.png" alt="" /></span>
                        <span>
                            Mediterraneo, <br />
                            112 King's Cross Road, <br />
                            London WC1X 9DS, UK
                        </span>
                    </li>

                    <li>
                        <span><img src="<?php bloginfo('template_url'); ?>/assets/images/mail.png" alt="" /></span>
                        <span> info@mediterraneo.co.uk </span>
                    </li>

                    <li>
                        <span><img src="<?php bloginfo('template_url'); ?>/assets/images/call.png" alt="" /></span>
                        <span>020 7837 5108</span>
                    </li>
                </ul>
            </div>
            <ul class="sci">
                <li>
                    <a href="<?php echo get_option("tiktok_page") ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/tiktok.png" alt="" /></a>
                </li>
                <li>
                    <a href="<?php echo get_option("ig_page") ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/instagram.png" alt="" /></a>
                </li>
                <li>
                    <a href="<?php echo get_option("fb_page") ?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/facebook.png" alt="" /></a>
                </li>
            </ul>
        </div>
        <div class="contactForm">
            <h2>Send a message</h2>
            <div class="formBox">
                <div class="inputBox w50">
                    <input type="text" required />
                    <span>First Name</span>
                </div>

                <div class="inputBox w50">
                    <input type="text" required />
                    <span>Last Name</span>
                </div>

                <div class="inputBox w50">
                    <input type="text" required />
                    <span>Email Address</span>
                </div>

                <div class="inputBox w50">
                    <input type="text" required />
                    <span>Mobile Number</span>
                </div>

                <div class="inputBox w100">
                    <textarea required></textarea>
                    <span>Your message..</span>
                </div>

                <div class="inputBox w100">
                    <input type="submit" value="send" />
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Google Map -->
<section class="map">
    <h2>Location</h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.080326133405!2d-0.11831328476371321!3d51.53008651686598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761b474933b001%3A0x4e0cb75499673029!2sMediterraneo%2C%20112%20King&#39;s%20Cross%20Rd%2C%20London%20WC1X%209DS%2C%20UK!5e0!3m2!1sen!2slk!4v1663068141588!5m2!1sen!2slk" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<?php
get_footer();
?>
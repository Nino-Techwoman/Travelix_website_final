<?php


// Navbar top
if (!function_exists('renderTopNav')) {
    function renderTopNav($contactNumber, $socialLinks, $authLinks) {
        echo '<div class="top_nav">
            <div class="container top_nav1">
                <div class="row top_nav2">
                    <div class="col d-flex flex-row top_nav3">
                        <div class="number_div">'.htmlspecialchars($contactNumber).'</div>
                        <div class="icon_div">';
        foreach($socialLinks as $icon => $url){
            echo '<a href="'.htmlspecialchars($url).'"><i class="fa-brands fa-'.$icon.'"></i></a>';
        }
        echo '</div>
                        <div class="ml-auto login-register_div">
                            <a class="login" href="'.htmlspecialchars($authLinks['login']).'">LOGIN</a> I 
                            <a class="register" href="'.htmlspecialchars($authLinks['register']).'">REGISTER</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
}




// Navbar Bottom
if (!function_exists('renderNavbar')) {
    function renderNavbar($brandLogo, $brandName, $menuItems, $modalMenuItems) {
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container bottom_nav1">
                    <div class="row bottom_nav2">
                        <div class="col d-flex flex-row align-items-center justify-content-space-between bottom_nav3">
                            <a class="navbar-brand" href="#">
                                <img src="'.htmlspecialchars($brandLogo).'" alt=""> '.htmlspecialchars($brandName).'
                            </a>

                            <!-- Responsive menu button -->
                            <div class="ml-auto navbar-right-div-responsive">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav">';

        // loop of menu
        foreach($menuItems as $name => $item){
            $link  = $item['link']  ?? '#';
            $class = $item['class'] ?? 'nav-link-border';
            echo '<li class="nav-item">
                    <a class="nav-link" href="'.htmlspecialchars($link).'">'.htmlspecialchars($name).'</a>
                    <div class="'.htmlspecialchars($class).'"></div>
                </li>';
        }

        echo '          </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>';

        // Modal menu
        echo '<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="menu trans_500 active">
                                <div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="menu_close_container">
                                        <div class="menu_close"></div>
                                    </div>
                                    <div class="logo menu_logo">
                                        <a href="#">
                                            <img src="'.htmlspecialchars($brandLogo).'" alt="">
                                        </a>
                                    </div>
                                    <ul class="modal_ul">';
        foreach($modalMenuItems as $name => $link){
            echo '<li class="menu_item"><a href="'.htmlspecialchars($link).'">'.htmlspecialchars($name).'</a></li>';
        }
        echo '                  </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
    }
}



// Carousel
if (!function_exists('renderCarousel')) {
    function renderCarousel($items) {
        echo '<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <div class="slaider_background-color">
                <ol class="carousel-indicators">';
        foreach ($items as $index => $item) {
            $active = $index === 0 ? ' class="active"' : '';
            echo '<li class="indic" data-target="#carouselExampleCaptions" data-slide-to="'.$index.'"'.$active.'></li>';
        }
        echo '</ol><div class="carousel-inner">';
        foreach ($items as $index => $item) {
            $active = $index === 0 ? ' active' : '';
            echo '<div class="carousel-item'.$active.'">
                        <img src="'.htmlspecialchars($item['img']).'" class="" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h1>'.htmlspecialchars($item['h1']).'</h1>
                            <h2>'.htmlspecialchars($item['h2']).'</h2>
                            <div class="text_div"><a href="'.htmlspecialchars($item['link']).'">EXPLORE NOW
                                <div class="div1"></div>
                                <div class="div2"></div>
                                <div class="div3"></div>
                            </a>
                            </div>
                        </div>
                    </div>';
        }
        echo '</div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>';
    }
}




// Render Search Section
if (!function_exists('renderSearchSection')) {
    function renderSearchSection($data) {
        echo '<div class="search">
                <div class="search1">
                    <div class="search2">
                        <div class="search3">
                            <div class="top_search">
                                <div class="top_search2">';
        foreach ($data['categories'] as $cat) {
            $class = htmlspecialchars(str_replace(' ', '_', strtolower($cat['name'])));
            echo '<div class="' . $class . '">
                    <img class="' . $class . '_white" src="' . htmlspecialchars($cat['icon_white']) . '" alt="">
                    <img class="' . $class . '_orange" src="' . htmlspecialchars($cat['icon_orange']) . '" alt="">
                    <span>' . htmlspecialchars($cat['name']) . '</span>
                </div>';
        }

        echo '          </div>
                        </div>';

        // Search Form
        $placeholders = $data['placeholders'];
        $adultsOptions = $data['adultsOptions'];
        $childrenOptions = $data['childrenOptions'];

        echo '<form class="search3_form" action="">
                <div class="destination">' . htmlspecialchars($placeholders['destination']) . '
                    <input type="text" name="destination" placeholder="' . htmlspecialchars($placeholders['destination']) . '">
                </div>
                <div class="check_in">check in
                    <input type="datetime" name="check_in" placeholder="' . htmlspecialchars($placeholders['check_in']) . '">
                </div>
                <div class="check_out">check out
                    <input type="datetime" name="check_out" placeholder="' . htmlspecialchars($placeholders['check_out']) . '">
                </div>
                <div class="adults">ADULTS
                    <select name="adults">';
        foreach ($adultsOptions as $opt) {
            echo '<option value="' . htmlspecialchars($opt) . '">' . htmlspecialchars($opt) . '</option>';
        }
        echo '      </select>
                </div>
                <div class="children">CHILDREN
                    <select name="children">';
        foreach ($childrenOptions as $opt) {
            echo '<option value="' . htmlspecialchars($opt) . '">' . htmlspecialchars($opt) . '</option>';
        }
        echo '      </select>
                </div>
                <div class="text_div two"><a href="#">Search
                        <div class="div1"></div>
                        <div class="div2"></div>
                        <div class="div3"></div>
                    </a>
                </div>
            </form>';

        echo '        </div>
                    </div>
                </div>
            </div>';
    }
}




// about
if (!function_exists('renderAboutSection')) {
    function renderAboutSection($about) {
        echo '<div class="about_div_text_content" style="display: flex; flex-direction: column; align-items: center;">';
            echo '<img
                    src="' . htmlspecialchars($about['image']) . '"
                    class="img-fluid w-50 h-auto"
                >';
            echo '<div class="container about_container">
                    <div class="row about_row">
                        <div class="col-lg-9 about_text_col text-center">';
                            echo '<div class="about_text_content"><h2>' . htmlspecialchars($about['title']) . '</h2>';
                                foreach ($about['paragraphs'] as $p) {
                                    echo'<p>' . htmlspecialchars($p) . '</p>';
                                }
        echo '</div></div></div></div></div>';
    }
}




// Best Tours
if (!function_exists('renderBestTours')) {
    function renderBestTours($tours) {
        echo '<div class="container-fruid best_tour">
                    <div class="container best_tour1">
                        <div class="row">
                            <div class="col">
                                <div class="best_tour-h">
                                    <div class="best_tour-h1">
                                        <h2>We have the best tours</h2>
                                    </div>
                                </div>
                                <div class="best_tour-p">
                                    <div class="best_tour-p1">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eu convallis tortor. Suspendisse potenti. In faucibus massa arcu, vitae cursus mi hendrerit nec.</p>
                                    </div>
                                </div>
                                <div class="col-lg-10 best_tour-items">';

        foreach ($tours as $tour) {
            echo '<div class="best_tour-items-smdiv">
                        <div class="best_tour-items-smdiv1">
                            <div class="best_tour-items-smdiv1-'.htmlspecialchars($tour['id']).'">
                                <div class="best_tour-items-smdiv1-'.htmlspecialchars($tour['id']).'-1">
                                    <div class="d-flex flex-column align-items-center justify-content-around best_tour-items-smdiv2">
                                        <div class="best_tour-date">' . htmlspecialchars($tour['date']) . '</div>
                                        <div class="centre-div">
                                            <h1>' . htmlspecialchars($tour['location']) . '</h1>
                                            <div class="from_price">From $' . htmlspecialchars($tour['price']) . '</div>
                                            <div class="stars">';
            for ($i = 0; $i < $tour['stars']; $i++) {
                echo '<i class="fa fa-star"></i>';
            }
            echo              '</div>
                                        </div>
                                        <div class="text_div two three">
                                            <a href="#">See more
                                                <div class="div1"></div>
                                                <div class="div2"></div>
                                                <div class="div3"></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        }

        echo '      </div>
                        </div>
                    </div>
                </div>
            </div>';
    }
}




// Maldives Deluxe Section
if (!function_exists('renderMaldivesDeluxe')) {
    function renderMaldivesDeluxe($packages) {
        echo '<div class="maldives_deluxe">
                <div class="background-maldives"></div>
                <div class="maldives_deluxe1">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="maldives-slider">
                                    <div class="maldives-slider2">
                                        <div class="maldives-slider3">
                                            <div class="sajid owl-carousel owl-theme">';
        // Loop through packages
        foreach ($packages as $package) {
            echo '<div class="item">
                    <div class="maldives_deluxe-title">' . htmlspecialchars($package['title']) . '</div>
                    <div class="maldives_deluxe-stars">';
            // Stars
            for ($i = 0; $i < $package['stars']; $i++) {
                echo '<i class="fa fa-star"></i>';
            }
            echo '</div>
                  <p class="maldives_deluxe-p">' . htmlspecialchars($package['description']) . '</p>
                  <div class="text_div two three five">
                      <a href="#">book now
                          <div class="div1"></div>
                          <div class="div2"></div>
                          <div class="div3"></div>
                      </a>
                  </div>
                  </div>'; // end .item
        }
        echo '          </div> <!-- .sajid owl-carousel -->
                        </div> <!-- .maldives-slider3 -->
                    </div> <!-- .maldives-slider2 -->
                </div> <!-- .maldives-slider -->
            </div> <!-- .col -->
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .maldives_deluxe1 -->
</div> <!-- .maldives_deluxe -->';
    }
}




// Best Offers Section
if (!function_exists('renderBestOffers')) {
    function renderBestOffers($offers) {
        echo '<div class="container-fruid">
                <div class="container">
                    <div class="best_offers-text">
                        <div class="col best_offers-text1">
                            <h2>THE BEST OFFERS WITH ROOMS</h2>
                        </div>
                    </div>
                    <div class="best_offers-items">
                        <div class="best_offers-items1">';
        // Loop through offers
        foreach ($offers as $offer) {
            echo '<div class="offers">
                    <div class="offers1">
                        <div class="background-image ' . htmlspecialchars($offer['image_class']) . '"></div>
                        <div class="background-image-text ' . htmlspecialchars($offer['text_class']) . '">
                            <a href="#">' . htmlspecialchars($offer['title']) . '</a>
                        </div>
                    </div> <!-- .offers1 -->
                    <div class="offers2">
                        <div class="offers2-1">
                            <div class="offers-price">' . htmlspecialchars($offer['price']) . '
                                <span>pre night</span>
                            </div>
                            <div class="offers_rating">';
            // Stars
            for ($i = 0; $i < $offer['stars']; $i++) {
                echo '<i class="fa fa-star"></i>';
            }
            echo '</div> <!-- .offers_rating -->
                        <div class="offers_p">
                            <p>' . htmlspecialchars($offer['description']) . '</p>
                        </div>
                        <div class="offers-icon">
                            <ul class="offers-icon-ul">';
            foreach ($offer['icons'] as $icon) {
                echo '<li><img src="' . htmlspecialchars($icon) . '" alt=""></li>';
            }
            echo '      </ul>
                        </div> <!-- .offers-icon -->
                        <div class="read-more">
                            <a href="#">read more</a>
                        </div>
                        </div> <!-- .offers2-1 -->
                    </div> <!-- .offers2 -->
                </div> <!-- .offers -->';
        }
        echo '          </div> <!-- .best_offers-items1 -->
                    </div> <!-- .best_offers-items -->
                </div> <!-- .container -->
            </div> <!-- .container-fruid -->';
    }
}




// Our Clients Section
if (!function_exists('renderOurClients')) {
    function renderOurClients($clients) {
        echo '<div class="container-fruid our-clients">
                    <div class="container our-clients1">
                        <div class="best_offers-text">
                            <div class="col best_offers-text1">
                                <h2>WHAT OUR CLIENTS SAY ABOUT US</h2>
                            </div>
                        </div>
                        <div class="our-clients-items">
                            <div class="our-clients-items1">
                                <div class="our-clients-items2">
                                    <div class="owl-carousel owl-theme">';
        foreach ($clients as $client) {
            echo '<div class="item">
                        <img src="' . htmlspecialchars($client['image']) . '" alt="">
                        <div class="our-clients-icon_div">
                            <img src="' . htmlspecialchars($client['icon']) . '" alt="">
                        </div>
                        <div class="our-clients-item-text_div">
                            <div class="our-clients-item-text-content">
                                <div class="our-clients-item-text-content-smdiv">
                                    <div class="our-clients-item-text-content-smdiv-name">' . htmlspecialchars($client['name']) . '</div>
                                    <div class="our-clients-item-text-content-smdiv-date">' . htmlspecialchars($client['date']) . '</div>
                                </div>
                                <div class="our-clients-item-text-content-smdiv-holiday">"' . htmlspecialchars($client['holiday']) . '"</div>
                                <p class="our-clients-item-text-content-smdiv-p">' . htmlspecialchars($client['comment']) . '</p>
                            </div>
                        </div>
                    </div>';
        }
        echo '        </div>
                        </div>
                    </div>
                </div>
            </div>';
    }
}




// Trending Now Section
if (!function_exists('renderTrendingNow')) {
    function renderTrendingNow($trendingItems) {
        echo '<div class="trending">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <h2 class="section_title">trending now</h2>
                            </div>
                        </div>
                        <div class="row trending_container">';
        foreach ($trendingItems as $item) {
            echo '<div class="col-lg-3 col-sm-6">
                        <div class="trending_item clearfix">
                            <div class="trending_image">
                                <img src="' . htmlspecialchars($item['image']) . '" alt="">
                            </div>
                            <div class="trending_content">
                                <div class="trending_title">
                                    <a href="#">' . htmlspecialchars($item['title']) . '</a>
                                </div>
                                <div class="trending_price">' . htmlspecialchars($item['price']) . '</div>
                                <div class="trending_location">' . htmlspecialchars($item['location']) . '</div>
                            </div>
                        </div>
                    </div>';
        }
        echo '    </div>
                    </div>
                </div>';
    }
}




// Contact Form Section
if (!function_exists('renderContactForm')) {
    function renderContactForm($data) {
        echo '
        <div class="container-fruid touch">
            <div class="touch-background">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-7">
                            <div class="form-container">
                                <div class="touch-text">' . htmlspecialchars($data['title']) . '</div>
                                <div class="contact-form">
                                    <form id="contactForm" action="./components/get_in_touch.php" method="POST">
                                        <div class="input1and2">';
                                            foreach ($data['inputs'] as $input) {
                                                echo '
                                                <div class="form-group">
                                                    <label for="' . htmlspecialchars($input['id']) . '"></label>
                                                    <input type="' . htmlspecialchars($input['type']) . '"
                                                        class="form-control"
                                                        id="' . htmlspecialchars($input['id']) . '"
                                                        name="' . htmlspecialchars($input['name']) . '"
                                                        placeholder="' . htmlspecialchars($input['placeholder']) . '"
                                                    >
                                                </div>';
                                            }
        echo '                          </div>
                                        <div class="form-group">
                                            <label for="' . htmlspecialchars($data['textarea']['id']) . '"></label>
                                            <textarea class="form-control"
                                                    id="' . htmlspecialchars($data['textarea']['id']) . '"
                                                    name="' . htmlspecialchars($data['textarea']['name']) . '"
                                                    rows="' . htmlspecialchars($data['textarea']['rows']) . '"
                                                    placeholder="' . htmlspecialchars($data['textarea']['placeholder']) . '"
                                            ></textarea>
                                        </div>
                                        <div class="text_div two four">
                                            <a href="' . htmlspecialchars($data['button']['href']) . '" id="contactSubmit">'
                                                . htmlspecialchars($data['button']['text']);
                                                foreach ($data['button']['divs'] as $div) {
                                                    echo '<div class="' . htmlspecialchars($div) . '"></div>';
                                                }
        echo '                              </a>
                                        </div>
                                        <div class="text_div" style="margin: 7px">
                                            <a href="' . htmlspecialchars($data['button']['href']) . '">
                                                Show result
                                            </a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
}




// Footer Section
if (!function_exists('renderFooter')) {
    function renderFooter($footerData) {
        echo '<footer>
            <div class="container">
                <div class="row">
                    <!-- Logo & About -->
                    <div class="col-lg-3 footer_column">
                        <div class="footer_col">
                            <div class="footer_content footer_smdiv">
                                <div class="logo_container footer_logo">
                                    <a href="#"><img src="' . $footerData['logo']['image'] . '" alt=""></a>
                                    ' . htmlspecialchars($footerData['logo']['text']) . '
                                </div>
                                <p class="footer_p">' . nl2br(htmlspecialchars($footerData['about'])) . '</p>
                                <ul class="footer_icon">';
                                    foreach ($footerData['socials'] as $social) {
                                        echo '<li><a href="' . $social['link'] . '"><i class="' . $social['icon'] . '"></i></a></li>';
                                    }
        echo '                  </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Blog Posts -->
                    <div class="col-lg-3 footer_column">
                        <div class="footer_col">
                            <div class="footer_content footer_smdiv">
                                <div class="footer_title">BLOG POSTS</div>
                                <div class="footer_content footer-photo">';
                                    foreach ($footerData['blogPosts'] as $post) {
                                        echo '<div class="footer-photo-items">
                                                <div class="footer-photo-items-image">
                                                    <img src="' . $post['image'] . '" alt="">
                                                </div>
                                                <div class="footer-photo-items-content">
                                                    <div class="footer-photo-items-content-title">
                                                        <a href="' . $post['link'] . '">' . htmlspecialchars($post['title']) . '</a>
                                                    </div>
                                                    <div class="footer-photo-items-content-date">' . htmlspecialchars($post['date']) . '</div>
                                                </div>
                                            </div>';
                                    }
        echo '                  </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tags -->
                    <div class="col-lg-3 footer_column">
                        <div class="footer_col">
                            <div class="footer_content footer_smdiv">
                                <div class="footer_title">TAGS</div>
                                <div class="tags-list">
                                    <ul>';
                                        foreach ($footerData['tags'] as $tag) {
                                            echo '<li class="tags-items"><a href="#">' . htmlspecialchars($tag) . '</a></li>';
                                        }
        echo '                          </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-lg-3 footer_column">
                        <div class="footer_col">
                            <div class="footer_content footer_smdiv">
                                <div class="footer_title">CONTACT INFO</div>
                                <div class="footer_content contact-info">
                                    <ul>';
                                        foreach ($footerData['contact'] as $contact) {
                                            echo '<li class="d-flex contact-info-items flex-row">
                                                    <div class="d-flex">
                                                        <div class="contact-info-items-image"><img src="' . $contact['icon'] . '" alt=""></div>
                                                        <div class="contact-info-items-text">' . $contact['text'] . '</div>
                                                    </div>
                                                </li>';
                                        }
        echo '                          </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </footer>

        <!-- Footer Bottom -->
        <div class="footer_bottomdiv">
            <div class="container">
                <div class="row footerlast">
                    <div class="col-lg-3">
                        <div class="footer_bottomdiv-content d-flex flex-row align-items-center">
                            <div class="footer_bottomdiv-content-text">
                                ' . $footerData['bottom']['text'] . '
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="foot_nav d-flex flex-row align-items-center justify-content-lg-end">
                            <div class="footer-navigation">
                                <ul class="footer-navigation-list">';
                                    foreach ($footerData['bottom']['links'] as $link) {
                                        echo '<li class="footer-navigation-item"><a class="last-footer-text" href="' . $link['href'] . '">' . htmlspecialchars($link['title']) . '</a></li>';
                                    }
        echo '                      </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
}



?>

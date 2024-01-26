@include('components.header')

<body>

    @include('components.menu')

    <main>

        <section class="hero section">
            <div class="container container--hero d-lg-flex align-items-center justify-content-between">
                <div class="hero_main">
                    <h1 class="hero_main-title" data-aos="fade-up">Hosteller — amazing hostel for
                        the free spirited traveler</h1>
                    <div class="hero_main-content d-flex"><span class="line" data-aos="fade-up"
                            data-aos-delay="50"></span>
                        <p class="text" data-aos="fade-up" data-aos-delay="100">Egestas pretium aenean
                            pharetra magna ac. Et tortor consequat id porta
                            nibh venenatis cras sed. Vel turpis nunc eget
                            lorem dolor sed</p>
                    </div>
                    <form class="booking" action="#" method="post" autocomplete="off" data-type="booking"
                        data-aos="fade-up">
                        <div class="item-wrapper d-sm-flex flex-wrap flex-lg-nowrap align-items-lg-center">
                            <div class="booking_group d-flex flex-column"><label class="booking_group-label h5"
                                    for="checkIn">Check-in</label>
                                <div class="booking_group-wrapper"><i class="icon-calendar icon"></i>
                                    <input class="booking_group-field field required" data-type="date" data-start="true"
                                        type="text" id="checkIn" value="Add date" readonly="readonly"> <i
                                        class="icon-chevron_down icon"></i></div>
                            </div>
                            <div class="booking_group d-flex flex-column"><label class="booking_group-label h5"
                                    for="checkOut">Check-out</label>
                                <div class="booking_group-wrapper"><i class="icon-calendar icon"></i>
                                    <input class="booking_group-field field required" data-type="date" data-end="true"
                                        type="text" id="checkOut" value="Add date" readonly="readonly"> <i
                                        class="icon-chevron_down icon"></i></div>
                            </div>
                            <div class="booking_group d-flex flex-column"><span
                                    class="booking_group-label h5">Guests</span>
                                <div class="booking_group-wrapper booking_group-wrapper--guests"><i
                                        class="icon-user icon"></i>
                                    <div class="booking_group-field dropdown-toggle" role="presentation" id="guests"
                                        data-bs-toggle="collapse" data-bs-target="#bookingDropdown"></div>
                                    <div class="booking_group-dropdown collapse" id="bookingDropdown">
                                        <div class="content">
                                            <div
                                                class="booking_group-dropdown_wrapper d-flex align-items-center justify-content-between">
                                                <label class="label h5" for="adults">Adults</label>
                                                <div class="main d-flex align-items-center justify-content-between"><a
                                                        class="qty_minus qty-changer d-flex align-items-center justify-content-center"
                                                        href="#" data-disabled="true"></a>
                                                    <input class="field required" id="adults" type="text" value="1"> <a
                                                        class="qty_plus qty-changer d-flex align-items-center justify-content-center"
                                                        href="#" data-disabled>+</a></div>
                                            </div>
                                            <div
                                                class="booking_group-dropdown_wrapper d-flex align-items-center justify-content-between">
                                                <label class="label h5" for="children">Children</label>
                                                <div class="main d-flex align-items-center justify-content-between"><a
                                                        class="qty_minus qty-changer d-flex align-items-center justify-content-center"
                                                        href="#" data-disabled></a>
                                                    <input class="field required" id="children" type="text" value="0">
                                                    <a class="qty_plus qty-changer d-flex align-items-center justify-content-center"
                                                        href="#" data-disabled>+</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><button class="booking_btn btn theme-element theme-element--accent"
                                type="submit">Search</button>
                        </div>
                    </form>
                </div>
                <div class="hero_media" data-aos="zoom-in">
                    <picture>
                        <source data-srcset="{{ asset('assets/frontend/img/index/hero.webp') }}" srcset="{{ asset('assets/frontend/img/index/hero.webp') }}"><img class="lazy"
                            src="{{ asset('assets/frontend/img/index/hero.webp') }}" alt="media"></picture>
                </div>
            </div>
        </section>

        <section class="hero section">
            <div class="container container--hero d-lg-flex align-items-center justify-content-between">
                <div class="hero_main">
                    <h1 class="hero_main-title" data-aos="fade-up">
                        Relax and Recharge in Our Tranquil Room Getaways
                    </h1>
                    <div class="hero_main-content d-flex"><span class="line" data-aos="fade-up"
                            data-aos-delay="50"></span>
                        <p class="text" data-aos="fade-up" data-aos-delay="100">
                            Discover comfort in our stylish rooms. Affordable rates, prime locations, and impeccable
                            service. Your perfect stay awaits.
                            Book now for a memorable experience with us!
                        </p>
                    </div>
                    <!-- <form class="booking" action="#" method="post" autocomplete="off" data-type="booking"
                        data-aos="fade-up">
                        <div class="item-wrapper d-sm-flex flex-wrap flex-lg-nowrap align-items-lg-center">
                            <div class="booking_group d-flex flex-column"><label class="booking_group-label h5"
                                    for="checkIn">Check-in</label>
                                <div class="booking_group-wrapper"><i class="icon-calendar icon"></i> <input
                                        class="booking_group-field field required" data-type="date" data-start="true"
                                        type="text" id="checkIn" value="Add date" readonly="readonly"> <i
                                        class="icon-chevron_down icon"></i></div>
                            </div>
                            <div class="booking_group d-flex flex-column"><label class="booking_group-label h5"
                                    for="checkOut">Check-out</label>
                                <div class="booking_group-wrapper"><i class="icon-calendar icon"></i> <input
                                        class="booking_group-field field required" data-type="date" data-end="true"
                                        type="text" id="checkOut" value="Add date" readonly="readonly"> <i
                                        class="icon-chevron_down icon"></i></div>
                            </div>
                            <div class="booking_group d-flex flex-column"><span
                                    class="booking_group-label h5">Guests</span>
                                <div class="booking_group-wrapper booking_group-wrapper--guests"><i
                                        class="icon-user icon"></i>
                                    <div class="booking_group-field dropdown-toggle" role="presentation" id="guests"
                                        data-bs-toggle="collapse" data-bs-target="#bookingDropdown"></div>
                                    <div class="booking_group-dropdown collapse" id="bookingDropdown">
                                        <div class="content">
                                            <div
                                                class="booking_group-dropdown_wrapper d-flex align-items-center justify-content-between">
                                                <label class="label h5" for="adults">Adults</label>
                                                <div class="main d-flex align-items-center justify-content-between"><a
                                                        class="qty_minus qty-changer d-flex align-items-center justify-content-center"
                                                        href="#" data-disabled="true"></a> <input class="field required"
                                                        id="adults" type="text" value="1"> <a
                                                        class="qty_plus qty-changer d-flex align-items-center justify-content-center"
                                                        href="#" data-disabled="">+</a></div>
                                            </div>
                                            <div
                                                class="booking_group-dropdown_wrapper d-flex align-items-center justify-content-between">
                                                <label class="label h5" for="children">Children</label>
                                                <div class="main d-flex align-items-center justify-content-between"><a
                                                        class="qty_minus qty-changer d-flex align-items-center justify-content-center"
                                                        href="#" data-disabled=""></a> <input class="field required"
                                                        id="children" type="text" value="0"> <a
                                                        class="qty_plus qty-changer d-flex align-items-center justify-content-center"
                                                        href="#" data-disabled="">+</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><button class="booking_btn btn theme-element theme-element--accent"
                                type="submit">Search</button>
                        </div>
                    </form> -->
                </div>
                <div class="hero_media" data-aos="zoom-in" style="height: 500px; margin-right: 150px;" >
                    <picture>
                        <img class="lazy" data-src="img/index/hero.jpg" src="{{ asset('assets/frontend/img/index/hero.jpg') }}" alt="media">
                    </picture>
                </div>
            </div>
        </section>

        <section class="rooms section--blockbg section--nopb">
            <div class="block"></div>
            <div class="container">
                <div class="rooms_header d-sm-flex justify-content-between align-items-center">
                    <h2 class="rooms_header-title" data-aos="fade-right">Modern rooms</h2>
                    <div class="wrapper" data-aos="fade-left"><a class="btn theme-element theme-element--light"
                            href="rooms.html">View all rooms</a></div>
                </div>
                <ul class="rooms_list d-md-flex flex-wrap">

                    <li class="rooms_list-item col-md-6 col-xl-4" data-order="1" data-aos="fade-up">
                        <div class="item-wrapper d-md-flex flex-column">
                            <div class="media">
                                <picture>
                                    <img class="lazy" data-src="img/rooms/02.jpg" src="img/rooms/02.jpg" alt="media">
                                </picture>
                            </div>
                            <div class="main d-md-flex flex-column justify-content-between flex-grow-1">
                                <a class="main_title h4" href="javascript:void(0)" data-shave="true">Standard AC</a>
                                <div class="main_amenities">
                                    <span class="main_amenities-item d-inline-flex align-items-center">
                                        <i class="icon-user icon"></i> 2 Sleeps
                                    </span><br>
                                    <span class="main_amenities-item d-inline-flex align-items-center">
                                        <i  class="icon-twin_bed icon"></i>1 Bed
                                    </span><br>
                                    <span class="main_amenities-item d-inline-flex align-items-center">
                                        <i  class="icon-twin_bed icon"></i> 1 Extra Bed
                                    </span>
                                </div>
                                <a class="link link--arrow d-inline-flex align-items-center" href="rooms.html">See availability
                                    <i class="icon-arrow_right icon"></i>
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="rooms_list-item col-md-6 col-xl-4" data-order="2" data-aos="fade-up" data-aos-delay="50">
                        <div class="item-wrapper d-md-flex flex-column">
                            <div class="media">
                                <picture>
                                    <img class="lazy" data-src="img/rooms/03.jpg" src="img/rooms/03.jpg" alt="media">
                                </picture>
                                <!-- <span class="media_label media_label--pricing"><span
                                        class="price h4">$35</span> / 1 night</span> -->
                            </div>
                            <div class="main d-md-flex flex-column justify-content-between flex-grow-1">
                                <a class="main_title h4" href="javascript:void(0)" data-shave="true">Deluxe AC</a>
                                <div class="main_amenities">
                                    <span class="main_amenities-item d-inline-flex align-items-center">
                                        <i class="icon-user icon"></i> 2 Sleeps
                                    </span><br>
                                    <span class="main_amenities-item d-inline-flex align-items-center">
                                        <i class="icon-twin_bed icon"></i> 1 Bed
                                    </span><br>
                                    <span class="main_amenities-item d-inline-flex align-items-center">
                                        <i class="icon-twin_bed icon"></i> 1 Extra Bed
                                    </span>
                                </div>
                                <a class="link link--arrow d-inline-flex align-items-center" href="rooms.html">See availability
                                    <i class="icon-arrow_right icon"></i>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="rooms_list-item col-md-6 col-xl-4" data-order="3" data-aos="fade-up"
                        data-aos-delay="100">
                        <div class="card accent">
                            <h3 class="title">Charming Spaces, Better Rates</h3>
                            <p class="text">Experience bliss in our charming spaces with budget-conscious rates.</p>
                            <div class="content">
                                <p class="text">Cool vibes in our Classic AC rooms – where relaxation meets style.</p>
                                <p class="text">Affordable group rooms for shared laughter and unforgettable moments.
                                </p>
                            </div><a class="btn theme-element theme-element--light" href="rooms.html">Choose room</a>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <section class="about section">
            <div class="container container--about d-xl-flex align-items-center">
                <div class="about_main">
                    <h2 class="about_main-header" data-aos="fade-up">We have everything you need</h2>
                    <p class="about_main-text" data-aos="fade-up">
                        Enjoy the perfect blend of comfort and affordability. Our well-appointed rooms offer everything
                        you desire for an unforgettable stay.
                    </p>
                    <ul class="about_main-list d-sm-flex flex-wrap">
                        <li class="about_main-list_item d-flex flex-column flex-sm-row align-items-center"
                            data-aos="fade-up" data-order="1"><span class="icon"><svg width="60" height="60"
                                    viewbox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5 18.8178L6.08615 20C20.1515 8.74369 40.8485 8.74369 54.9138 20L56 18.8178C41.3088 7.06075 19.6912 7.06075 5 18.8178Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M11 27.8499L12.212 29C22.595 19.1685 39.4049 19.1685 49.788 29L51 27.8499C39.9476 17.3834 22.0525 17.3834 11 27.8499Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M18 36.5799L19.263 38C25.1969 31.3432 34.8031 31.3432 40.737 38L42 36.5799C35.3681 29.14 24.6319 29.14 18 36.5799Z"
                                        fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M27.3176 43.3159C29.0767 41.5614 31.9234 41.5614 33.6824 43.3159C35.4392 45.0737 35.4392 47.9232 33.6824 49.6812C31.9253 51.4393 29.076 51.4396 27.3184 49.682C25.5608 47.9243 25.5605 45.0741 27.3176 43.3159ZM28.5906 48.4085C29.645 49.4633 31.3553 49.4639 32.4105 48.4098C33.4632 47.354 33.4632 45.646 32.4105 44.5902C31.3558 43.5366 29.6465 43.5366 28.5918 44.5902C27.5366 45.6442 27.536 47.3537 28.5906 48.4085Z"
                                        fill="currentColor"></path>
                                </svg></span>
                            <p class="text">Free available high speed WiFi</p>
                        </li>
                        <li class="about_main-list_item d-flex flex-column flex-sm-row align-items-center"
                            data-order="2" data-aos="fade-up" data-aos-delay="50"><span class="icon"><svg width="60"
                                    height="60" viewbox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M13 21.6667C13 12.4769 20.8507 5 30.5 5C40.1493 5 48 12.4769 48 21.6666C48 24.4254 47.2758 27.1608 45.9043 29.5788L31.457 54.4629C31.2647 54.7945 30.8984 55 30.5 55C30.1016 55 29.7353 54.7945 29.543 54.4629L15.101 29.587C13.7242 27.1608 13 24.4255 13 21.6667ZM30.5 51.8059L43.9849 28.5789C45.1791 26.4742 45.8124 24.0806 45.8124 21.6667C45.8124 13.6254 38.9434 7.0834 30.5 7.0834C22.0566 7.0834 15.1876 13.6253 15.1876 21.6667C15.1876 24.0807 15.8209 26.4742 17.0204 28.5881L30.5 51.8059Z"
                                        fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M22 21.1764C22 16.5815 25.8132 12.8431 30.5 12.8431C35.1868 12.8431 39 16.5816 39 21.1765C39 25.7714 35.1868 29.5098 30.5 29.5098C25.8132 29.5098 22 25.7714 22 21.1764ZM24.125 21.1765C24.125 24.623 26.9846 27.4265 30.5 27.4265C34.0154 27.4265 36.875 24.6229 36.875 21.1765C36.875 17.73 34.0154 14.9265 30.5 14.9265C26.9846 14.9265 24.125 17.73 24.125 21.1765Z"
                                        fill="currentColor"></path>
                                </svg></span>
                            <p class="text">Сonvenient location in the center</p>
                        </li>
                        <li class="about_main-list_item d-flex flex-column flex-sm-row align-items-center"
                            data-order="3" data-aos="fade-up" data-aos-delay="100"><span class="icon"><svg width="60"
                                    height="60" viewbox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M51.0582 15.7004H39.1938V13.5973C39.1941 12.907 38.9272 12.2452 38.4523 11.7585C37.9846 11.2768 37.3517 11.0043 36.6905 11H23.3095C22.6661 11.0003 22.0473 11.2554 21.5812 11.7125L21.531 11.7643C21.0561 12.251 20.7892 12.9128 20.7895 13.6031V15.7004H8.94179C6.7674 15.7068 5.00613 17.522 5 19.763V44.9374C5.00613 47.1784 6.7674 48.9937 8.94179 49V48.9943H51.0582C53.2305 48.9879 54.9908 47.1763 55 44.9374V19.763C54.9939 17.522 53.2326 15.7068 51.0582 15.7004ZM22.4286 13.5973C22.4296 13.3509 22.5259 13.1152 22.6963 12.9422L22.7241 12.9135C22.8846 12.7628 23.0925 12.677 23.3095 12.6722H36.6905C36.9287 12.6717 37.1574 12.7688 37.326 12.9422C37.4964 13.1152 37.5927 13.3509 37.5937 13.5973V15.6947H22.4286V13.5973ZM8.94179 47.3221H11.5065V17.3554H8.94179C7.65681 17.3617 6.61937 18.4387 6.62244 19.763V44.9374C6.63163 46.2527 7.66559 47.3158 8.94179 47.3221ZM16.3403 47.3221H13.1289L13.1345 35.7549H16.3403V47.3221ZM13.1289 34.031H16.3403V30.5832H13.1345L13.1289 34.031ZM16.3403 28.9341H13.1289L13.1345 17.3669H16.3403V28.9341ZM17.9628 47.3221H42.0372V17.3669H17.9683L17.9628 47.3221ZM46.8711 47.3221H43.6597V35.7434H46.8711V47.3221ZM43.6597 34.0195H46.8711V30.5718H43.6597V34.0195ZM46.8711 28.9341H43.6597V17.3554H46.8711V28.9341ZM51.0582 47.3278C52.3366 47.3215 53.3714 46.255 53.3776 44.9374V19.7458C53.3714 18.4282 52.3366 17.3617 51.0582 17.3554H48.4935V47.3278H51.0582Z"
                                        fill="currentColor"></path>
                                </svg></span>
                            <p class="text">Free storage of luggage of any size</p>
                        </li>
                        <li class="about_main-list_item d-flex flex-column flex-sm-row align-items-center"
                            data-order="4" data-aos="fade-up" data-aos-delay="150"><span class="icon"><svg width="60"
                                    height="60" viewbox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M23.8125 17.6466H32.3944C36.9672 17.6466 40.6875 21.3669 40.6875 25.9395V26.2285C40.6875 30.8012 36.9672 34.5215 32.3944 34.5215H26.625V42.3535H23.8125V17.6466ZM32.3944 31.7091C35.4164 31.7091 37.875 29.2505 37.875 26.2286V25.9396C37.875 22.9177 35.4164 20.4591 32.3944 20.4591H26.625V31.7091H32.3944Z"
                                        fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M30 6C36.4106 6 42.4375 8.49638 46.9706 13.0294C51.5035 17.5625 54 23.5895 54 30C54 36.4105 51.5035 42.4375 46.9706 46.9706C42.4375 51.5036 36.4106 54 30 54C23.5894 54 17.5625 51.5035 13.0295 46.9705C8.49647 42.4375 6 36.4105 6 30C6 23.5895 8.49647 17.5625 13.0294 13.0294C17.5625 8.49638 23.5894 6 30 6ZM30 51.1875C35.6593 51.1875 40.98 48.9836 44.9819 44.9819C48.9836 40.98 51.1875 35.6593 51.1875 30C51.1875 24.3407 48.9836 19.02 44.9819 15.0181C40.98 11.0164 35.6593 8.8125 30 8.8125C24.3406 8.8125 19.02 11.0164 15.0182 15.0181C11.0164 19.02 8.8125 24.3407 8.8125 30C8.8125 35.6593 11.0164 40.98 15.0182 44.9818C19.02 48.9836 24.3406 51.1875 30 51.1875Z"
                                        fill="currentColor"></path>
                                </svg></span>
                            <p class="text">Parking place allocated to you</p>
                        </li>
                    </ul>
                    <div class="about_main-action d-flex flex-column-reverse flex-sm-row align-items-center">
                        <div class="wrapper" data-aos="fade-left">
                            <a class="about_main-action_item btn theme-element theme-element--accent" href="rooms.html">Book now
                            </a>
                        </div>
                        <div class="wrapper" data-aos="fade-left" data-aos-delay="50">
                            <a class="about_main-action_item link link--arrow" href="about.html">More about
                                <i class="icon-arrow_right icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="about_media" data-aos="zoom-in">
                    <picture>
                        <source data-srcset="img/index/about.webp" srcset="img/index/about.webp">
                        <img class="lazy" data-src="img/index/about.jpg" src="img/index/about.jpg" alt="media">
                    </picture>
                </div>
            </div>
        </section>

        <div class="rating">
            <div class="container">
                <ul class="rating_list d-flex flex-wrap">
                    <li class="rating_list-item col-12 col-sm-6 col-xl-3" data-order="1" data-aos="zoom-in">
                        <div class="main d-flex flex-column"><span class="main_rating"><span class="level h2">8.3</span>
                                <sup class="h4">/10</sup> </span><span class="main_reviews">1398 comments</span></div>
                        <div class="media"><svg width="193" height="32" viewbox="0 0 193 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M166.088 7.43665C166.124 7.39437 166.172 7.40318 166.219 7.40318C167.075 7.41727 167.934 7.3556 168.787 7.44723C169.634 7.53885 170.504 7.99872 170.726 9.01361C170.753 9.13343 170.796 9.24972 170.823 9.36953C170.851 9.49111 170.882 9.57392 171.025 9.42239C171.504 8.90966 172.004 8.41807 172.606 8.03925C173.425 7.52475 174.301 7.18469 175.274 7.05783C175.946 6.96973 176.611 6.98735 177.267 7.09131C178.937 7.35737 180.206 8.20311 180.996 9.69902C181.186 10.0585 181.204 10.0655 181.448 9.75012C182.138 8.85504 182.998 8.16787 184.027 7.68509C184.715 7.36265 185.437 7.16531 186.195 7.06135C186.889 6.96621 187.579 6.98735 188.26 7.08602C190.267 7.37322 191.715 8.38107 192.448 10.2963C192.738 11.054 192.875 11.8363 192.962 12.6327C192.966 12.6697 192.962 12.7102 193 12.7366C193 16.8227 193 20.9069 193 24.9929C192.142 24.9911 191.285 25.007 190.428 24.9823C189.735 24.9629 189.075 24.8114 188.599 24.2546C188.251 23.8511 188.097 23.3648 188.095 22.8468C188.082 20.1862 188.084 17.5257 188.082 14.8633C188.082 14.2061 188.054 13.5507 187.903 12.9076C187.724 12.1446 187.26 11.572 186.28 11.5191C184.801 11.4398 183.771 12.1411 182.996 13.2987C182.534 13.9876 182.306 14.7647 182.129 15.5628C181.993 16.1707 181.953 16.7839 181.953 17.4023C181.955 19.8462 181.95 22.2918 181.961 24.7356C181.961 24.9559 181.894 24.9982 181.686 24.9964C180.222 24.9876 178.76 24.9894 177.296 24.9964C177.102 24.9982 177.027 24.97 177.029 24.7497C177.038 21.3844 177.041 18.0208 177.032 14.6554C177.03 13.9788 176.975 13.3022 176.695 12.6662C176.294 11.7535 175.522 11.4504 174.588 11.5068C173.556 11.5685 172.814 12.1182 172.228 12.9023C171.695 13.6159 171.373 14.4211 171.168 15.2809C170.978 16.0826 170.912 16.8931 170.912 17.7142C170.918 20.0576 170.91 22.401 170.919 24.7462C170.919 24.9541 170.866 24.9999 170.659 24.9999C169.197 24.9911 167.733 24.9911 166.269 24.9999C166.073 25.0017 166 24.9665 166 24.7515C166.009 22.586 166.005 20.4206 166.007 18.2534C166.007 18.1776 165.987 18.0983 166.034 18.0261C166.066 18.056 166.065 18.0948 166.065 18.1336C166.065 20.3519 166.065 22.5702 166.061 24.7885C166.059 24.8202 166.111 24.7903 166.081 24.7938C166.073 24.7956 166.07 24.792 166.068 24.7832C166.061 24.7145 166.065 24.6458 166.065 24.5771C166.065 18.9564 166.065 13.3375 166.065 7.71681C166.065 7.6199 166.043 7.52475 166.088 7.43665Z"
                                    fill="#0094D0"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M78.4511 0C78.808 0.115261 79.1721 0.199906 79.5038 0.392608C80.5744 1.01574 81.1675 2.271 80.9584 3.49745C80.7511 4.71129 79.8066 5.69101 78.6098 5.93594C76.9407 6.27632 75.3689 5.22997 75.0517 3.51726C74.7471 1.87659 75.8213 0.367394 77.4201 0.0450238C77.4652 0.036019 77.5175 0.0450238 77.5481 0C77.8491 0 78.1501 0 78.4511 0Z"
                                    fill="#00327C"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M74 25C72.4448 24.9636 70.9343 25.0467 69.4272 24.955C68.5842 24.903 67.9442 24.4839 67.5004 23.7687C67.0152 22.9842 66.623 22.146 66.1895 21.3321C65.651 20.3242 65.1177 19.3146 64.5964 18.298C64.4484 18.0088 64.2265 17.8737 63.9237 17.8356C63.7069 17.8079 63.4884 17.7889 63.2682 17.7958C62.9207 17.8045 62.9637 17.7421 62.9637 18.0919C62.962 20.1372 62.9637 22.1824 62.9637 24.2276C62.9637 24.4181 62.9568 24.6086 62.9655 24.7974C62.9723 24.9394 62.9379 24.9965 62.7797 24.9948C61.2468 24.9879 59.7122 24.9896 58.1793 24.9948C58.0365 24.9948 57.9953 24.9532 58.0004 24.8164C58.009 24.5965 58.0039 24.3748 58.0039 24.1549C58.0039 16.5368 58.0039 8.91698 58.0039 1.2989C58.0039 0.959472 57.9695 1.00103 58.2894 1.0045C59.1875 1.01489 60.0872 0.971594 60.9836 1.0374C62.0158 1.1136 62.6317 1.57945 62.8622 2.47997C62.9396 2.78303 62.9586 3.09475 62.9586 3.40647C62.9603 6.66048 62.9603 9.91448 62.9603 13.1685C62.9603 13.4767 62.9603 13.4802 63.2786 13.4767C63.5349 13.4733 63.7912 13.4681 64.0476 13.449C64.4605 13.4179 64.7787 13.2464 65.0144 12.8758C66.0828 11.1873 67.1701 9.51098 68.247 7.8277C68.321 7.71167 68.3933 7.66144 68.5326 7.66318C70.2857 7.66837 72.037 7.66664 73.7901 7.66664C73.8262 7.66664 73.8606 7.6701 73.9329 7.67357C73.7936 7.88484 73.6714 8.07361 73.5475 8.25891C72.1437 10.3613 70.7382 12.4637 69.3326 14.566C69.1089 14.9003 68.8595 15.2155 68.5756 15.5012C68.5189 15.5583 68.4604 15.6016 68.5447 15.683C69.1898 16.3186 69.5356 17.1481 69.9296 17.9361C71.022 20.1198 72.3123 22.1859 73.5665 24.2761C73.7041 24.5012 73.8383 24.7281 74 25Z"
                                    fill="#00327C"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M89.0433 9.38376C89.3416 9.11115 89.604 8.82271 89.9077 8.57824C91.144 7.57926 92.5691 7.07976 94.1594 7.01117C95.2538 6.96368 96.332 7.06042 97.3671 7.44031C99.0186 8.04709 100.043 9.22723 100.571 10.8488C100.862 11.7458 100.976 12.6692 100.979 13.6066C100.985 15.244 100.979 16.8814 100.981 18.5189C100.985 20.5802 100.994 22.6414 100.999 24.7027C100.999 25.0369 101.035 24.9947 100.692 24.9912C99.8165 24.9806 98.9395 25.0228 98.0662 24.9613C96.704 24.8645 95.9007 24.0696 95.8432 22.7311C95.7875 21.4349 95.8253 20.1369 95.8217 18.8407C95.8163 17.3809 95.8271 15.9211 95.8181 14.4614C95.8163 14.0234 95.7768 13.5855 95.6635 13.1563C95.412 12.1978 94.7884 11.7317 93.7767 11.6983C91.7658 11.6332 89.9634 12.7677 89.365 15.0998C89.2194 15.6644 89.1493 16.2377 89.1475 16.8164C89.1421 19.4493 89.1421 22.0839 89.1493 24.7168C89.1493 24.9331 89.1062 25.0017 88.869 25C87.3307 24.9877 85.7925 24.9894 84.2524 24.9982C84.0511 25 84.0098 24.9419 84.0098 24.7537C84.0134 19.6339 84.0098 14.5141 84.008 9.39432C84.008 8.78402 84.0026 8.17372 84.0008 7.56519C84.0008 7.47197 83.9811 7.38403 84.1356 7.38931C85.0503 7.41569 85.9668 7.3383 86.8779 7.43152C87.8788 7.53529 88.7522 8.03302 88.9858 9.22372C88.9966 9.26944 89.0199 9.31693 89.0433 9.38376Z"
                                    fill="#00327C"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M144.054 11.9134C144.054 12.3226 144.048 12.7318 144.057 13.1409C144.061 13.2842 144.029 13.3395 143.866 13.3395C143.06 13.3326 142.253 13.3567 141.449 13.3308C140.582 13.3032 139.922 12.8681 139.672 11.9652C139.573 11.6112 139.25 11.4559 138.93 11.3454C137.245 10.7687 135.189 11.2987 134.042 12.6472C133.548 13.2273 133.23 13.8937 133.052 14.6326C132.856 15.4424 132.826 16.2538 132.99 17.0636C133.285 18.5156 134.09 19.605 135.47 20.2542C136.504 20.741 137.603 20.8688 138.722 20.6961C139.839 20.5218 140.836 20.0401 141.742 19.3771C142.132 19.0922 142.506 18.7935 142.823 18.4344C142.906 18.3395 142.949 18.3222 143.023 18.443C143.665 19.491 144.313 20.5356 144.959 21.5818C145.035 21.7044 144.999 21.7925 144.904 21.8978C144.302 22.5677 143.586 23.0995 142.815 23.5673C141.968 24.0818 141.053 24.4548 140.09 24.693C138.758 25.0228 137.406 25.0746 136.04 24.9071C134.589 24.7293 133.241 24.2804 132.02 23.5C130.416 22.4762 129.268 21.0881 128.598 19.3218C128.158 18.1651 127.966 16.9738 128.005 15.748C128.079 13.3619 128.912 11.278 130.671 9.59123C131.69 8.61402 132.893 7.93378 134.254 7.5056C135.247 7.1931 136.262 7.03599 137.302 7.00491C138.715 6.96348 140.088 7.18274 141.391 7.71796C142.352 8.11333 143.201 8.67272 143.709 9.61194C143.949 10.0539 144.064 10.5253 144.055 11.026C144.05 11.3212 144.055 11.6182 144.055 11.9134C144.055 11.9134 144.055 11.9134 144.054 11.9134Z"
                                    fill="#0094D0"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M76.0027 16.0045C76.0027 13.0773 76.0027 10.1502 76.0027 7.22119C76.0027 7.1169 75.9677 7.00003 76.1512 7.00363C77.0637 7.0288 77.9778 6.96047 78.8885 7.03959C80.0998 7.14567 80.8392 7.91342 80.9615 9.16304C80.9843 9.39139 80.9948 9.61794 80.9948 9.84809C80.9948 14.8124 80.993 19.7749 81 24.7392C81 24.946 80.9563 25.0018 80.75 25C79.2538 24.9892 77.7576 24.9892 76.2614 25C76.0499 25.0018 76.0149 24.937 76.0149 24.7374C76.0219 21.8247 76.0184 18.9137 76.0184 16.0009C76.0131 16.0045 76.0079 16.0045 76.0027 16.0045Z"
                                    fill="#00327C"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M124.998 24.9982C123.412 25.0558 121.996 23.6971 122 22.0001C122.005 20.312 123.398 19.0109 124.982 19.0001C126.626 18.9875 128.005 20.393 128 22.0091C127.996 23.6125 126.649 25.0522 124.998 24.9982Z"
                                    fill="#0094D0"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M119.963 24C119.908 23.8627 119.933 23.7219 119.933 23.5828C119.931 18.1774 119.933 12.7719 119.933 7.36644C119.933 7.04197 119.933 7.04376 119.553 7.04376C118.701 7.04376 117.85 7.04197 117 7.04197C117.076 6.97779 117.17 7.00632 117.255 7.00632C118.088 7.00453 118.922 7.00988 119.755 7.00097C119.935 6.99919 120.002 7.02949 120 7.20243C119.992 12.6935 119.992 18.1845 119.988 23.6737C119.988 23.7825 119.971 23.8912 119.963 24Z"
                                    fill="#002F5F"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M166.069 7C166.069 12.9837 166.069 18.9674 166.069 25C166.03 24.8732 166.043 24.7844 166.043 24.7011C166.042 22.5308 166.042 20.3605 166.042 18.1902C166.042 18.087 166.039 17.9837 166.038 17.8804C166.037 15.7337 166.036 13.5851 166.035 11.4384C166.035 10.0707 166.035 8.7029 166.037 7.33514C166.037 7.22283 166.011 7.09601 166.069 7Z"
                                    fill="#0085A8"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M13.9001 12.6181C13.7813 12.5564 13.6658 12.4898 13.5457 12.4206C13.4898 12.3884 13.4329 12.3556 13.3742 12.3225L13.4281 12.2764C13.531 12.1883 13.6207 12.1115 13.7118 12.0372C14.1079 11.7155 14.4845 11.3728 14.7971 10.9693C15.7368 9.75356 16.0974 8.37432 16.0139 6.86986C15.8931 4.70968 14.8682 3.0939 12.9444 2.03643C11.5943 1.29376 10.1164 1.02591 8.58872 1.012C6.5761 0.992865 4.56526 0.999822 2.55264 1.01026C1.73551 1.01548 1.06582 1.34942 0.54712 1.97207C0.259349 2.31645 0.122569 2.72518 0 3.14086V25C0.0338374 24.9993 0.0676747 24.9981 0.101623 24.9968H0.101671L0.101837 24.9968C0.153363 24.9949 0.205146 24.993 0.257573 24.993L2.3518 24.9933H2.35196C4.44568 24.9936 6.53891 24.9939 8.63313 24.9913C9.83928 24.9896 11.0241 24.8278 12.1681 24.4434C13.8503 23.8782 15.2394 22.932 16.1223 21.3823C16.998 19.8465 17.1917 18.196 16.8222 16.4915C16.4509 14.7766 15.5041 13.4547 13.9001 12.6181ZM5.00578 8.65107H5.0115C5.0115 8.4399 5.00985 8.22856 5.0082 8.01716V8.01714C5.00452 7.54713 5.00085 7.07679 5.01531 6.6073C5.04771 5.61612 5.53175 5.09976 6.57225 5.0492C7.58036 5.00046 8.59608 4.95171 9.60038 5.09434C10.8505 5.27127 11.6699 6.01331 11.9101 7.18505C12.1216 8.21415 11.9787 9.1909 11.2812 10.0395C10.7209 10.7201 9.93578 10.9837 9.05535 10.9927C8.32471 11.001 7.59406 10.9998 6.86305 10.9986C6.31472 10.9977 5.76619 10.9969 5.21731 11C5.03818 11.0018 4.99816 10.9494 5.00006 10.7869C5.00864 10.2535 5.00757 9.72007 5.0065 9.18589C5.00614 9.00771 5.00578 8.82945 5.00578 8.65107ZM9.12004 20.9847C9.99905 20.9642 10.7791 20.6275 11.3411 19.8289C12.1345 18.701 12.2234 16.7391 11.5424 15.5046C10.9552 14.4498 10.0511 14.0383 8.98416 14.0102C8.41148 13.996 7.83721 13.9996 7.263 14.0032C7.00461 14.0049 6.74624 14.0065 6.48803 14.0065C5.54862 14.0065 5.03699 14.5451 5.0135 15.6C5.00077 16.1831 5.00401 16.7671 5.00724 17.3508C5.00869 17.6133 5.01015 17.8758 5.01015 18.1381H5.00344C5.00344 18.3158 5.0035 18.4935 5.00357 18.6711C5.00384 19.3812 5.00411 20.0904 5.00008 20.7996C4.9984 20.9436 5.02189 20.996 5.16615 20.996C5.63431 20.994 6.10289 20.9958 6.57159 20.9975C7.42127 21.0008 8.27135 21.004 9.12004 20.9847Z"
                                    fill="#00327C"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M117.762 7.42207C118.102 7.42322 118.442 7.42437 118.782 7.4167C118.957 7.41316 119.018 7.46799 118.995 7.63954C118.991 7.67179 118.992 7.70492 118.993 7.73769C118.993 7.75164 118.994 7.76553 118.994 7.77926V23.9848C118.994 24.0083 118.994 24.0317 118.993 24.055C118.993 24.1247 118.992 24.194 118.997 24.2642C118.891 26.2627 118.241 28.0295 116.822 29.4532C115.675 30.6046 114.27 31.2784 112.723 31.6693C112.14 31.8161 111.547 31.9186 110.946 31.9611C110.938 31.9614 110.931 31.9613 110.923 31.9613C110.886 31.9609 110.848 31.9606 110.823 32H108.946C108.802 31.9783 108.658 31.958 108.514 31.9376C108.246 31.8998 107.979 31.862 107.713 31.8161C106.286 31.5702 104.924 31.1228 103.647 30.4224C103.503 30.3428 103.472 30.2792 103.534 30.1235C103.734 29.6236 103.93 29.1205 104.126 28.6175C104.224 28.366 104.322 28.1144 104.42 27.8633C104.446 27.797 104.477 27.7332 104.508 27.6698C104.514 27.657 104.52 27.6443 104.526 27.6316C104.915 26.8322 105.485 26.5563 106.331 26.8074C106.478 26.8509 106.625 26.896 106.771 26.9411C107.316 27.1086 107.86 27.276 108.425 27.361C109.714 27.5538 110.995 27.5821 112.214 27.0161C113.335 26.4944 113.9 25.5659 114.03 24.342C114.063 24.029 114.079 23.7142 114.054 23.4029C114.007 23.3791 113.982 23.4029 113.959 23.4237C113.955 23.4276 113.951 23.4314 113.947 23.4348C112.908 24.3137 111.69 24.6904 110.364 24.7541C108.347 24.8514 106.516 24.3385 104.952 22.9979C103.696 21.9226 102.884 20.5449 102.448 18.9496C101.805 16.601 101.828 14.2505 102.686 11.962C103.73 9.17467 105.72 7.50159 108.646 7.09128C110.326 6.85429 111.957 7.06122 113.469 7.91898C113.863 8.14182 114.216 8.42479 114.56 8.7396C114.94 7.90306 115.566 7.45384 116.474 7.43969C116.63 7.4096 116.786 7.41418 116.942 7.41876C117.006 7.42064 117.07 7.42252 117.135 7.42201C117.344 7.42066 117.553 7.42137 117.762 7.42207ZM110.772 19.9995C112.133 19.9816 113.167 19.2172 113.636 17.8894C113.914 17.1017 113.99 16.2835 114 15.5065C113.995 14.8462 113.955 14.2433 113.816 13.6512C113.589 12.6841 113.155 11.864 112.267 11.3921C111.624 11.0512 110.928 10.9794 110.222 11.0046C108.876 11.0512 107.914 11.7169 107.417 13.0304C106.864 14.4927 106.881 15.982 107.35 17.4642C107.886 19.1562 109.07 20.0229 110.772 19.9995Z"
                                    fill="#00327C"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M162.948 11.5838C163.298 12.2464 163.568 12.9421 163.732 13.6707C163.957 14.6803 164.059 15.7056 163.966 16.7464C163.902 17.4525 163.79 18.1412 163.591 18.8212C163.283 19.8673 162.796 20.8162 162.131 21.6731C161.187 22.8857 159.992 23.767 158.575 24.3273C157.117 24.905 155.593 25.0993 154.033 24.9536C152.463 24.8061 151.002 24.3221 149.695 23.4218C148.486 22.5908 147.559 21.5049 146.916 20.1778C146.483 19.2826 146.208 18.3407 146.079 17.3484C146.022 16.9131 146.012 16.4827 146.002 16.0477L146.001 16.0057C145.974 14.198 146.416 12.5153 147.373 10.9853C148.225 9.62694 149.391 8.61384 150.823 7.91299C151.666 7.50185 152.555 7.2347 153.478 7.10459C154.336 6.98316 155.199 6.96581 156.069 7.06122C157.349 7.20174 158.551 7.55737 159.667 8.19229C161.085 8.99895 162.179 10.1318 162.948 11.5838ZM158.125 19.2854C158.759 18.3144 158.993 17.2086 158.994 15.855C159.026 15.3194 158.925 14.6217 158.704 13.964C158.134 12.288 157.081 11.2222 155.421 11.0291C154.262 10.8943 153.218 11.2222 152.36 12.1204C151.404 13.1205 151.054 14.4122 151.005 15.8167C150.97 16.7732 151.128 17.7023 151.508 18.5731C151.91 19.5003 152.522 20.2127 153.371 20.6298C154.212 21.0416 155.098 21.0962 155.996 20.8612C156.885 20.628 157.594 20.0997 158.125 19.2854Z"
                                    fill="#0094D0"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M43.9343 7.51265C46.4145 6.71131 48.8775 6.83273 51.2255 7.99483C53.6817 9.20898 55.1812 11.2262 55.76 13.9233C56.222 16.0776 56.0314 18.1815 55.0626 20.1657C53.8672 22.6148 51.8919 24.0996 49.2795 24.7396C48.522 24.9252 47.7525 25.005 46.9727 24.9998C44.9219 24.9859 43.0325 24.4534 41.3819 23.189C39.6574 21.8673 38.62 20.105 38.2026 17.9733C37.8402 16.1296 37.9519 14.3084 38.6355 12.5479C39.6128 10.0294 41.3922 8.33479 43.9343 7.51265ZM50.0218 19.4506C50.7449 18.4554 50.992 17.282 50.9985 16.0303C51.0101 15.4518 50.9541 14.8806 50.8042 14.3275C50.315 12.5119 49.2889 11.3148 47.5414 11.0474C45.9717 10.8073 44.5717 11.484 43.7383 12.9794C42.984 14.3312 42.8571 15.8139 43.1355 17.3384C43.5258 19.4706 44.9324 20.9114 46.7755 20.9951C48.0832 21.0533 49.1917 20.5949 50.0218 19.4506Z"
                                    fill="#00327C"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M24.6401 7.29891C26.9164 6.75058 29.1548 6.93972 31.266 8.00687C33.752 9.26489 35.2443 11.3176 35.7911 14.0558C36.2002 16.1016 36.0214 18.104 35.1395 20.0058C34.0254 22.409 32.1532 23.9256 29.6396 24.6474C28.7731 24.8973 27.8843 25.0049 26.98 24.9997C24.6521 24.9788 22.5546 24.3108 20.8079 22.7109C19.2864 21.3193 18.4199 19.5685 18.1207 17.5262C17.8491 15.673 18.021 13.8649 18.7878 12.1488C19.9414 9.56334 21.9271 7.95308 24.6401 7.29891ZM27.3429 20.9808C28.6808 20.8498 29.7146 20.1532 30.3507 18.8456C31.1248 17.2578 31.1873 15.5773 30.6416 13.8967C30.1189 12.2835 29.0818 11.2741 27.5204 11.0468C26.1364 10.8449 24.9366 11.2905 24.0277 12.5054C23.2716 13.5148 23.007 14.7115 23.002 15.9956C22.9938 16.3157 23.0102 16.634 23.0579 16.9504C23.0611 16.9716 23.0643 16.9927 23.0675 17.0139C23.0904 17.1655 23.1133 17.3169 23.145 17.4669C23.6052 19.6713 25.1831 21.1899 27.3429 20.9808Z"
                                    fill="#00327C"></path>
                            </svg></div>
                    </li>
                    <li class="rating_list-item col-12 col-sm-6 col-xl-3" data-order="2" data-aos="zoom-in">
                        <div class="main d-flex flex-column"><span class="main_rating"><span class="level h2">4.6</span>
                                <sup class="h4">/5</sup> </span><span class="main_reviews">460 notes</span></div>
                        <div class="media"><svg width="214" height="30" viewbox="0 0 214 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.89014 5.36132C10.8566 4.84764 22.1106 4.49395 19.027 20.8106L22.5244 20.5251C20.9927 10.4679 24.197 5.33943 34.2164 4.84764C17.5986 -4.38605 8.13648 5.19964 6.89014 5.36132Z"
                                    fill="#FAC415"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M22.3607 18.227C23.7388 21.9685 27.315 24.4679 31.2907 24.4679C36.5127 24.4679 40.8107 20.1555 40.8107 14.9159C40.8107 9.67546 36.5127 5.36304 31.2907 5.36304C30.1644 5.36304 29.0481 5.56346 27.9914 5.95504C23.0934 7.7723 20.552 13.3108 22.3607 18.227Z"
                                    fill="white"></path>
                                <path
                                    d="M10.1862 24.4316C15.4449 24.4316 19.7079 20.1543 19.7079 14.8779C19.7079 9.60155 15.4449 5.32422 10.1862 5.32422C4.92756 5.32422 0.664551 9.60155 0.664551 14.8779C0.664551 20.1543 4.92756 24.4316 10.1862 24.4316Z"
                                    fill="white"></path>
                                <path
                                    d="M10.0495 16.5503C11.0215 16.5503 11.8095 15.7597 11.8095 14.7845C11.8095 13.8092 11.0215 13.0186 10.0495 13.0186C9.07752 13.0186 8.28955 13.8092 8.28955 14.7845C8.28955 15.7597 9.07752 16.5503 10.0495 16.5503Z"
                                    fill="#EE6946"></path>
                                <path
                                    d="M31.2684 16.5496C32.24 16.5496 33.0276 15.7594 33.0276 14.7846C33.0276 13.8098 32.24 13.0195 31.2684 13.0195C30.2969 13.0195 29.5093 13.8098 29.5093 14.7846C29.5093 15.7594 30.2969 16.5496 31.2684 16.5496Z"
                                    fill="#00AF87"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M39.7895 8.58645C40.2326 7.05971 40.9368 5.62224 41.8717 4.33887L34.8058 4.33297C30.5808 1.67866 25.676 0.312761 20.6924 0.402025C15.5861 0.292551 10.5563 1.67613 6.21971 4.3835L-0.410645 4.38687C0.515927 5.66097 1.21673 7.08581 1.66155 8.59824C0.32457 10.4206 -0.397216 12.626 -0.397216 14.8896C-0.397216 20.7119 4.37748 25.5027 10.1803 25.5027C13.3922 25.5027 16.4355 24.034 18.4414 21.5161L20.6949 24.9014L22.9702 21.4875C24.9752 24.0559 28.0521 25.5582 31.3034 25.5582C37.1105 25.5582 41.8894 20.7633 41.8894 14.9368C41.8894 12.6488 41.1525 10.4206 39.7895 8.58645ZM30.9535 4.3035C25.5745 4.46013 21.1338 8.72118 20.7368 14.1056C20.3365 8.66897 15.8304 4.37845 10.3985 4.26224C13.6591 2.90308 17.1615 2.22013 20.6924 2.25381C24.2182 2.20076 27.7163 2.89887 30.9535 4.3035ZM10.1862 23.3561H10.1853C5.54912 23.3561 1.73457 19.5288 1.73457 14.877C1.73457 10.2243 5.54912 6.39697 10.1853 6.39697C14.8216 6.39697 18.6369 10.2243 18.6369 14.877V14.8787C18.6311 19.5279 14.8199 23.3511 10.1862 23.3561ZM34.2183 22.8753C29.8691 24.4837 24.9702 22.2193 23.3621 17.8563V17.8538C23.0172 16.914 22.8401 15.9212 22.8401 14.9199C22.8401 10.2673 26.6555 6.43992 31.2917 6.43992C35.9287 6.43992 39.7433 10.2673 39.7433 14.9199C39.7433 18.4627 37.5309 21.6483 34.2183 22.8753ZM10.0561 9.53718H10.0485C7.17902 9.53718 4.81894 11.906 4.81894 14.7843C4.81894 17.6635 7.17902 20.0315 10.0485 20.0315C12.9172 20.0315 15.2781 17.6635 15.2781 14.7843V14.7835C15.2731 11.9102 12.9197 9.5456 10.0561 9.53718ZM10.0561 18.2243H10.0494C8.16853 18.2243 6.62005 16.6715 6.62005 14.7843C6.62005 12.8972 8.16853 11.3443 10.0494 11.3443C11.9294 11.3443 13.477 12.8972 13.4779 14.7835C13.4737 16.6673 11.9327 18.2159 10.0561 18.2243ZM31.2682 9.53718H31.2657C28.3962 9.53718 26.0361 11.906 26.0361 14.7843C26.0361 17.6635 28.3962 20.0315 31.2657 20.0315C34.1344 20.0315 36.4953 17.6635 36.4953 14.7843V14.7835C36.4911 11.9077 34.1344 9.54224 31.2682 9.53718ZM31.2682 18.2243H31.2665C29.3857 18.2243 27.838 16.6715 27.838 14.7843C27.838 12.8972 29.3857 11.3443 31.2665 11.3443C33.1474 11.3443 34.695 12.8972 34.6958 14.7835C34.6933 16.6698 33.1474 18.221 31.2682 18.2243Z"
                                    fill="black"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M149.762 3.13982C149.762 4.26151 150.682 5.18361 151.8 5.18361C152.918 5.18361 153.838 4.26066 153.838 3.13898C153.838 2.01645 152.918 1.09351 151.8 1.09351C150.682 1.09519 149.762 2.01814 149.762 3.13982Z"
                                    fill="#00AF87"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M52.9405 2.99841L49.8527 4.0662V8.11336H46.4268V10.8266H49.7537V19.5365C49.7537 23.683 51.1628 25.3723 54.614 25.3723C55.4759 25.3748 56.3345 25.262 57.1671 25.0355L57.3022 24.9993L57.2636 22.1891L57.0261 22.2725C56.5091 22.4797 55.961 22.6001 55.4054 22.6287C53.7848 22.6287 53.1813 21.7091 53.1813 19.2393V10.8266H57.1352V8.11336H53.1813V2.91504L52.9405 2.99841ZM63.6279 10.8611V8.11336H60.4965V25.0759H63.9233V16.5614C63.9233 12.99 65.4164 11.0237 68.1265 11.0237C68.5445 11.0279 68.9607 11.0927 69.3602 11.2157L69.5852 11.2797L69.696 7.92893L68.223 7.81525C66.2289 7.82704 64.4219 9.02535 63.6279 10.8611ZM88.0914 7.71588C85.7901 7.6982 83.6424 8.89736 82.443 10.8679V8.11336H79.3108V31.987H82.7393V22.7298C83.9403 24.4131 85.9 25.3917 87.9622 25.3378C92.2962 25.3378 95.0961 21.7765 95.0961 16.2632C95.0961 11.1508 92.282 7.71588 88.0914 7.71588ZM87.138 22.5614C84.4263 22.5614 82.7393 20.2371 82.7393 16.494C82.7393 12.8898 84.5186 10.5605 87.2706 10.5605C89.9211 10.5605 91.5031 12.766 91.5031 16.4628C91.5031 20.2245 89.8304 22.5614 87.138 22.5614Z"
                                    fill="black"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M105.11 7.71581C103.172 7.68213 101.251 8.09644 99.4972 8.92507L99.3906 8.97476L99.4293 11.9103L99.6961 11.7604C101.063 10.9259 102.622 10.456 104.221 10.3954C106.702 10.3954 108.125 11.8236 108.125 14.3137V14.4594H106.166C100.523 14.4594 97.4175 16.5099 97.4175 20.232C97.4175 23.219 99.6575 25.3066 102.869 25.3066C105.028 25.3874 107.089 24.3786 108.355 22.6228V25.0758H111.455V14.8072C111.455 10.1015 109.322 7.71581 105.11 7.71581ZM108.125 17.9162C108.125 20.84 106.374 22.7255 103.659 22.7255L103.462 22.7331C102.025 22.7331 100.843 21.5474 100.843 20.1057L100.843 20.0644C100.843 18.0072 102.803 16.8754 106.363 16.8754H108.125V17.9162ZM126.018 0.013916V10.4156C124.829 8.67244 122.834 7.65265 120.729 7.71581C116.541 7.71581 113.728 11.1777 113.728 16.3289C113.728 21.6341 116.579 25.3377 120.664 25.3377C122.97 25.3958 125.132 24.1781 126.281 22.1714V25.0758H129.446V0.013916H126.018V0.013916ZM121.555 22.4939C118.943 22.4939 117.32 20.2084 117.32 16.5276C117.32 12.8426 118.957 10.4619 121.488 10.4619C124.325 10.4619 126.018 12.7297 126.018 16.5276C126.018 20.1529 124.265 22.4939 121.555 22.4939ZM144.765 8.11329L139.901 17.9028L135.41 8.11329H131.546L139.832 25.0758L148.344 8.11329H144.765ZM153.339 8.11329H150.091V25.0758H153.521V8.11329H153.339ZM157.54 12.4619C157.54 14.8501 159.175 16.1057 162.189 17.5828C164.092 18.5217 165.087 19.0733 165.087 20.3962C165.087 21.7495 163.863 22.6287 161.972 22.6287C160.473 22.5891 159.003 22.211 157.67 21.5204L157.418 21.3983L157.304 24.387L157.424 24.4358C158.831 24.9916 160.329 25.2754 161.841 25.2737C166.033 25.2737 168.743 23.2687 168.743 20.1647C168.743 17.576 167.027 16.2657 164.058 14.8737C161.88 13.8505 160.969 13.2484 160.969 12.1638C160.969 11.1289 161.982 10.4619 163.553 10.4619C164.975 10.4628 166.379 10.7844 167.661 11.4034L167.906 11.5204L168.061 8.59076L167.923 8.54865C166.57 8.13771 165.165 7.92465 163.751 7.91371C160.036 7.91371 157.54 9.74108 157.54 12.4619ZM179.435 7.71581C174.283 7.71581 171.082 11.1179 171.082 16.5941C171.082 22.0712 174.283 25.4733 179.435 25.4733C184.608 25.4733 187.824 22.0712 187.824 16.5941C187.824 11.1179 184.608 7.71581 179.435 7.71581ZM179.468 22.6615C176.623 22.6615 174.707 20.2084 174.707 16.5613C174.707 12.8939 176.623 10.4291 179.468 10.4291C182.362 10.4291 184.231 12.8341 184.231 16.5613C184.231 20.2666 182.362 22.6615 179.468 22.6615ZM194.149 10.8611V8.11329H191.018V25.0758H194.445V16.5613C194.445 12.9899 195.94 11.0236 198.647 11.0236C199.065 11.0278 199.481 11.0918 199.881 11.2156L200.107 11.2796L200.218 7.92886L198.745 7.81518C196.751 7.82781 194.943 9.02529 194.149 10.8611Z"
                                    fill="#00AF87"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M75.8066 8.1133H72.5577V25.0758H75.9879V8.1133H75.8066ZM72.2271 3.13982C72.2279 4.26235 73.1477 5.1853 74.2665 5.1853C75.3853 5.1853 76.3051 4.26151 76.3051 3.13898C76.3051 2.0173 75.3853 1.09351 74.2665 1.09351C73.1486 1.09519 72.2287 2.01814 72.2271 3.13982Z"
                                    fill="black"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M208.554 5.71578C209.113 6.28926 209.422 7.06315 209.411 7.86484C209.423 8.68673 209.094 9.47747 208.503 10.0459C207.928 10.6135 207.153 10.9343 206.346 10.9402C205.524 10.9402 204.737 10.6017 204.171 10.0038C203.609 9.43536 203.292 8.66652 203.291 7.86484C203.293 7.03368 203.628 6.23789 204.22 5.65599C204.784 5.09347 205.55 4.78021 206.346 4.78778C207.177 4.77852 207.977 5.11452 208.554 5.71578ZM204.608 6.05263C204.125 6.53094 203.854 7.18442 203.854 7.86484C203.865 9.2341 204.981 10.3592 206.346 10.3743C207.008 10.3735 207.644 10.1133 208.118 9.6501C209.085 8.68084 209.099 7.0901 208.151 6.10315C207.682 5.61473 207.032 5.34021 206.356 5.34442C205.702 5.33431 205.071 5.59031 204.608 6.05263ZM206.404 6.11073C207.37 6.11073 207.858 6.45768 207.858 7.08842C207.863 7.52126 207.564 7.90273 207.144 7.99957L207.89 9.48084H206.876L206.246 8.14273H205.975V9.48084H205.053V6.11073H206.404ZM205.975 7.59452H206.305C206.708 7.59452 206.909 7.45052 206.909 7.15663C206.909 6.82821 206.699 6.69347 206.255 6.69347H205.975V7.59452Z"
                                    fill="#00AF87" fill-opacity="0.5"></path>
                            </svg></div>
                    </li>
                    <li class="rating_list-item col-12 col-sm-6 col-xl-3" data-order="3" data-aos="zoom-in">
                        <div class="main d-flex flex-column"><span class="main_rating"><span class="level h2">4.9</span>
                                <sup class="h4">/5</sup> </span><span class="main_reviews">2389 notes</span></div>
                        <div class="media"><svg width="98" height="32" viewbox="0 0 98 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M94.5141 19.5423L97.2244 21.3491C96.3448 22.6448 94.2407 24.8677 90.6033 24.8677C86.0862 24.8677 82.7222 21.3729 82.7222 16.9271C82.7222 12.1961 86.1219 8.98657 90.2229 8.98657C94.3477 8.98657 96.3685 12.2674 97.0223 14.0386L97.3789 14.942L86.7519 19.3402C87.5602 20.9331 88.8202 21.7414 90.6033 21.7414C92.3864 21.7414 93.6226 20.8618 94.5141 19.5423ZM86.1813 16.6775L93.2779 13.7295C92.8856 12.7429 91.7207 12.0416 90.3299 12.0416C88.5587 12.0416 86.0981 13.6106 86.1813 16.6775Z"
                                    fill="#FF302F"></path>
                                <path d="M77.5991 0.891602H81.0226V24.1427H77.5991V0.891602Z" fill="#20B15A"></path>
                                <path
                                    d="M72.2024 9.60487H75.507V23.7267C75.507 29.587 72.0478 32.0001 67.9587 32.0001C64.1073 32.0001 61.7893 29.4087 60.9215 27.3047L63.9527 26.0447C64.4995 27.3404 65.819 28.8738 67.9587 28.8738C70.5857 28.8738 72.2024 27.2453 72.2024 24.2022V23.061H72.0835C71.2989 24.012 69.8012 24.8679 67.8992 24.8679C63.9289 24.8679 60.2915 21.4087 60.2915 16.9511C60.2915 12.4697 63.9289 8.97485 67.8992 8.97485C69.7893 8.97485 71.2989 9.81884 72.0835 10.746H72.2024V9.60487ZM72.4401 16.9511C72.4401 14.1457 70.5738 12.1012 68.1964 12.1012C65.7952 12.1012 63.7744 14.1457 63.7744 16.9511C63.7744 19.7208 65.7952 21.7297 68.1964 21.7297C70.5738 21.7416 72.4401 19.7208 72.4401 16.9511Z"
                                    fill="#3686F7"></path>
                                <path
                                    d="M41.4978 16.8914C41.4978 21.4679 37.9317 24.832 33.5573 24.832C29.1828 24.832 25.6167 21.4561 25.6167 16.8914C25.6167 12.2911 29.1828 8.93896 33.5573 8.93896C37.9317 8.93896 41.4978 12.2911 41.4978 16.8914ZM38.0268 16.8914C38.0268 14.0385 35.9585 12.0772 33.5573 12.0772C31.1561 12.0772 29.0877 14.0385 29.0877 16.8914C29.0877 19.7205 31.1561 21.7057 33.5573 21.7057C35.9585 21.7057 38.0268 19.7205 38.0268 16.8914Z"
                                    fill="#FF302F"></path>
                                <path
                                    d="M58.8411 16.9271C58.8411 21.5037 55.275 24.8677 50.9005 24.8677C46.5261 24.8677 42.96 21.5037 42.96 16.9271C42.96 12.3268 46.5261 8.98657 50.9005 8.98657C55.275 8.98657 58.8411 12.315 58.8411 16.9271ZM55.3582 16.9271C55.3582 14.0742 53.2898 12.1129 50.8886 12.1129C48.4874 12.1129 46.4191 14.0742 46.4191 16.9271C46.4191 19.7563 48.4874 21.7414 50.8886 21.7414C53.3017 21.7414 55.3582 19.7444 55.3582 16.9271Z"
                                    fill="#FFBA40"></path>
                                <path
                                    d="M12.5646 21.3848C7.58395 21.3848 3.68499 17.367 3.68499 12.3863C3.68499 7.40565 7.58395 3.38782 12.5646 3.38782C15.2511 3.38782 17.2125 4.44577 18.6627 5.80089L21.052 3.41159C19.0312 1.474 16.3328 0 12.5646 0C5.74146 0 0 5.56315 0 12.3863C0 19.2095 5.74146 24.7727 12.5646 24.7727C16.2496 24.7727 19.0312 23.5602 21.2065 21.3016C23.4413 19.0669 24.1308 15.9287 24.1308 13.3848C24.1308 12.5884 24.0357 11.7682 23.9287 11.162H12.5646V14.4666H20.6597C20.422 16.5349 19.7682 17.9495 18.8053 18.9123C17.6404 20.0892 15.7979 21.3848 12.5646 21.3848Z"
                                    fill="#3686F7"></path>
                            </svg></div>
                    </li>
                    <li class="rating_list-item col-12 col-sm-6 col-xl-3" data-order="4" data-aos="zoom-in">
                        <div class="main d-flex flex-column"><span class="main_rating"><span class="level h2">98%</span>
                            </span><span class="main_reviews">2389 recommendations</span></div>
                        <div class="media"><svg width="242" height="47" viewbox="0 0 242 47" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0.734694 6.42905C1.38776 6.42905 1.91837 6.93412 1.91837 7.55574L2 23.5625C2 23.7956 2.20408 23.9899 2.44898 23.9899H7.10204C7.34694 23.9899 7.55102 23.7956 7.55102 23.5625V16.9966C7.55102 16.2584 7.59184 15.598 7.83673 14.9764C8.32653 13.6166 9.42857 12.6453 11.1429 12.6453C12.3673 12.6453 12.9796 13.2669 12.9796 14.7432V21.348C12.9796 22.8243 13.9184 25 16.9796 25C19.1429 25 20 23.6402 20 22.9409C20 22.8094 19.9005 22.7201 19.7532 22.5879C19.3346 22.2122 18.5306 21.4906 18.5306 18.473V13.7331C18.5306 9.2652 15.9184 7.78885 12.5714 7.78885C10.3673 7.78885 8.44898 8.76014 7.5102 10.3142H7.42857C7.42857 10.3142 7.5102 9.77027 7.5102 8.95439V4.68074C7.5102 3.20439 6.2449 2 4.69388 2H0.44898C0.204082 2 0 2.19426 0 2.42736V6.00169C0 6.2348 0.204082 6.42905 0.44898 6.42905H0.734694ZM33 16.0603C33 18.5126 31.4022 20 29.5 20C27.6359 20 26 18.4724 26 16.0603C26 13.5678 27.6359 12 29.5 12C31.3641 12 33 13.5678 33 16.0603ZM29 8C34.0478 8 38 11.4239 38 16.5597C38 21.6159 34.0087 25 29 25C23.9913 25 20 21.6159 20 16.5597C20.0391 11.4239 24.0304 8 29 8ZM42.8777 19.1338C42.5069 18.8545 41.9714 18.9343 41.6831 19.2934L40.1589 21.4883C39.9117 21.8075 39.9529 22.2465 40.2825 22.5258C41.2711 23.3638 43.6192 25 47.1618 25C51.034 25 54 23.0047 54 19.7324C54 16.2136 50.4846 15.0588 47.9791 14.2357C46.5918 13.78 45.5141 13.4259 45.5141 12.8286C45.5141 12.3099 46.2144 12.0704 46.9971 12.0704C47.8209 12.0704 48.5212 12.3897 48.5212 12.8286C48.5212 13.2676 48.892 13.6268 49.3451 13.6268H52.5994C53.0525 13.6268 53.4233 13.2676 53.4233 12.8286V11.7113C53.4233 8.75822 49.6335 8 46.9147 8C43.372 8 40.0353 9.51643 40.0353 13.0282C40.0353 16.5224 43.7149 17.8919 46.1925 18.814C47.4499 19.282 48.3976 19.6348 48.3976 20.0915C48.3976 20.6502 47.9445 20.8897 47.1206 20.8897C45.3905 20.8897 43.7427 19.8122 42.8777 19.1338ZM56.3701 12.3206H55.7046C55.3132 12.3206 55 12.0153 55 11.6336V8.92366C55 8.54198 55.3132 8.23664 55.7046 8.23664H56.5267C56.9181 8.23664 57.2313 7.9313 57.2313 7.54962V4.68702C57.2313 4.30534 57.5445 4 57.9359 4H61.7331C62.1246 4 62.4377 4.30534 62.4377 4.68702V7.54962C62.4377 7.9313 62.7509 8.23664 63.1423 8.23664H65.0996C65.4911 8.23664 65.8043 8.54198 65.8043 8.92366V11.6336C65.8043 12.0153 65.4911 12.3206 65.0996 12.3206H63.1423C62.7509 12.3206 62.4377 12.626 62.4377 13.0076V17.3969C62.4377 19.1527 64.2776 19.3817 65.2954 19.3817C65.6868 19.3817 66 19.687 66 20.0687V23.2748C66 23.6183 65.726 23.9237 65.3737 23.9618C65.2647 23.9618 65.1472 23.9701 65.0214 23.9789C64.876 23.989 64.7194 24 64.5516 24C62.0071 24 57.1139 23.3511 57.1139 18.1221V13.0458C57.0356 12.626 56.7616 12.3206 56.3701 12.3206ZM76.9734 13.283C77.0866 13.6226 76.8224 13.9623 76.4826 13.9623V14H73.5003C73.1228 14 72.8963 13.5849 73.0473 13.2453C73.3871 12.4906 74.0288 12 75.1613 12C76.1051 12 76.7091 12.566 76.9734 13.283ZM75.4612 8C80.2732 8 83 11.3521 83 15.8615C83 16.1808 82.9599 16.6596 82.9198 17.0188C82.8797 17.2981 82.6792 17.4977 82.3985 17.4977H73.2957C72.8947 17.4977 72.6541 17.8967 72.8145 18.2559C73.416 19.7723 74.8596 20.4906 76.3835 20.4906C78.0276 20.4906 79.5514 19.6127 80.2732 19.1338C80.5138 18.9742 80.8747 19.0141 81.0351 19.2934L82.6792 22.0469C82.7995 22.2864 82.7594 22.5657 82.5589 22.7254C81.7168 23.4038 79.3509 25 75.9424 25C70.1278 25 67 20.8099 67 16.4601C67 11.7113 70.208 8 75.4612 8ZM84.5844 6.46996C85.2857 6.46996 85.8312 7.01413 85.8312 7.71378V21.1625C85.8312 22.7173 87.1169 24 88.6753 24H92.4156C92.7273 24 93 23.7279 93 23.417V20.1131C93 19.8021 92.7273 19.53 92.4156 19.53C91.7143 19.53 91.1688 18.9859 91.1688 18.2862V4.83746C91.1688 3.28269 89.8831 2 88.3247 2H84.5844C84.2727 2 84 2.27208 84 2.58304V5.88693C84 6.19788 84.2727 6.46996 84.5844 6.46996Z"
                                    fill="#86BC25"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M94.8721 7.61458C94.8721 6.92708 94.3145 6.39236 93.5975 6.39236C93.2788 6.39236 93 6.125 93 5.81944V2.57292C93 2.26736 93.2788 2 93.5975 2H97.4214C99.0147 2 100.329 3.26042 100.329 4.78819V7.88194C100.329 8.68403 100.249 9.21875 100.249 9.21875H100.329C100.329 9.21875 101.843 7.69097 104.711 7.69097C109.092 7.69097 112 11.0139 112 15.8646C112 20.7917 108.774 24 104.472 24C101.484 24 100.05 22.3958 100.05 22.3958H99.9706C99.9706 22.3958 100.01 22.7778 100.01 23.2743V23.6562H95.5094C95.1908 23.6562 94.9119 23.3889 94.9119 23.0833L94.8721 7.61458ZM103 20C104.613 20 106 18.5859 106 16.0808C106 13.6162 104.8 12 103 12C101.462 12 100 13.2121 100 16.0808C100.037 18.0202 101.012 20 103 20ZM126 16.0603C126 18.5126 124.402 20 122.5 20C120.636 20 119 18.5126 119 16.0603C119 13.5678 120.636 12 122.5 12C124.364 12 126 13.5678 126 16.0603ZM122.5 8C127.828 8 132 11.4239 132 16.5597C132 21.6159 127.787 25 122.5 25C117.213 25 113 21.6159 113 16.5597C113.041 11.4637 117.254 8 122.5 8ZM146 16.0603C146 18.5126 144.402 20 142.5 20C140.636 20 139 18.5126 139 16.0603C139 13.5678 140.598 12 142.5 12C144.364 12 146 13.5678 146 16.0603ZM142.5 8C147.828 8 152 11.4239 152 16.5597C152 21.6159 147.787 25 142.5 25C137.213 25 133 21.6159 133 16.5597C133.041 11.4637 137.254 8 142.5 8ZM186.602 12.6651C187.324 12.6651 187.886 13.2048 187.886 13.8988L187.926 23.4217C187.926 23.7301 188.207 24 188.528 24H192.781C193.102 24 193.383 23.7301 193.383 23.4217V18.0627C193.383 17.2145 193.463 16.5205 193.664 15.9422C194.466 13.5904 196.593 13.2048 197.877 13.2048H198.358C198.719 13.2434 199 12.9735 199 12.6265V8.07711C199 8.07711 198.679 8 198.358 8C195.951 8 193.864 9.77349 193.182 11.894H193.102C193.102 11.894 193.182 11.5855 193.182 11.0843V11.0458C193.182 9.50361 191.858 8.23133 190.253 8.23133H186.602C186.281 8.23133 186 8.5012 186 8.80964V12.0867C186 12.3952 186.281 12.6651 186.602 12.6651ZM201.683 19.2934C201.971 18.9343 202.507 18.8545 202.878 19.1338C203.743 19.8122 205.391 20.8897 207.121 20.8897C207.945 20.8897 208.398 20.6502 208.398 20.0915C208.398 19.6348 207.45 19.282 206.192 18.814C203.715 17.8919 200.035 16.5224 200.035 13.0282C200.035 9.51643 203.372 8 206.915 8C209.633 8 213.423 8.75822 213.423 11.7113V12.8286C213.423 13.2676 213.053 13.6268 212.599 13.6268H209.345C208.892 13.6268 208.521 13.2676 208.521 12.8286C208.521 12.3897 207.821 12.0704 206.997 12.0704C206.214 12.0704 205.514 12.3099 205.514 12.8286C205.514 13.4259 206.592 13.78 207.979 14.2357C210.485 15.0588 214 16.2136 214 19.7324C214 23.0047 211.034 25 207.162 25C203.619 25 201.271 23.3638 200.282 22.5258C199.953 22.2465 199.912 21.8075 200.159 21.4883L201.683 19.2934ZM178.973 13.283C179.087 13.6226 178.822 13.9623 178.483 13.9623V14H175.5C175.123 14 174.896 13.5849 175.047 13.2453C175.387 12.4906 176.029 12 177.161 12C178.105 12 178.709 12.566 178.973 13.283ZM177.443 8C182.267 8 185 11.3521 185 15.8615C185 16.1808 184.96 16.6596 184.92 17.0188C184.879 17.2981 184.678 17.4977 184.397 17.4977H175.312C174.91 17.4977 174.669 17.8967 174.83 18.2559C175.433 19.7723 176.88 20.4906 178.408 20.4906C180.056 20.4906 181.543 19.6127 182.307 19.1338C182.548 18.9742 182.91 19.0141 183.071 19.2934L184.719 22.0469C184.839 22.2864 184.799 22.5657 184.598 22.7254C183.754 23.4038 181.382 25 177.965 25C172.137 25 169.001 20.8099 169.001 16.4601C168.921 11.7113 172.177 8 177.443 8ZM165.87 16.9325L166.943 18.9882C168.284 21.6697 169.254 22.2472 169.71 22.5181C169.9 22.6312 170 22.6909 170 22.828C170 23.1383 169.339 25 166.943 25C164.507 25 163.309 23.7976 162.772 22.7892C161.491 19.7639 160.417 18.3676 160.417 18.3676C160.045 17.8077 159.571 17.8161 159.179 17.8231C159.136 17.8239 159.095 17.8246 159.054 17.8246H158.559V23.371C158.559 23.6813 158.27 23.9528 157.939 23.9528H153.561C153.23 23.9528 152.941 23.6813 152.941 23.371V7.7403C152.941 7.04216 152.363 6.46037 151.62 6.46037C151.289 6.46037 151 6.18887 151 5.87858V2.58179C151 2.2715 151.289 2 151.62 2H155.585C157.237 2 158.6 3.27993 158.6 4.83137V12.7825C158.6 13.0927 158.889 13.3642 159.22 13.3642H159.467C159.922 13.3642 160.5 13.3643 160.789 12.86L163.35 8.43845C163.433 8.24452 163.639 8.12816 163.887 8.12816H168.554C169.05 8.12816 169.339 8.63238 169.091 9.02024L165.828 14.2175C165.209 15.226 164.589 15.5363 164.589 15.5363V15.6138C164.589 15.6138 165.291 15.8465 165.87 16.9325Z"
                                    fill="black"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M234.207 7.82338C236.3 7.14086 237.467 4.89254 236.823 2.80481C236.139 0.67694 233.926 -0.487369 231.793 0.195157C229.7 0.877682 228.533 3.126 229.177 5.21373C229.861 7.30145 232.115 8.46576 234.207 7.82338ZM227.414 23.615C231.623 22.2997 233.975 17.8196 232.613 13.586C231.293 9.39353 226.795 7.05068 222.586 8.36596C218.377 9.68124 216.025 14.1614 217.387 18.395C218.707 22.6286 223.205 24.9714 227.414 23.615ZM187.336 42.1158C186.15 38.4143 188.206 34.4765 191.884 33.3345C195.562 32.1532 199.477 34.2008 200.664 37.9024C201.85 41.6039 199.794 45.5417 196.116 46.6837C192.438 47.8256 188.483 45.778 187.336 42.1158Z"
                                    fill="#86BC25"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M239.917 22.4028C240.227 23.44 239.646 24.5541 238.6 24.8998C237.516 25.2455 236.393 24.6693 236.083 23.5937C235.773 22.5565 236.354 21.4425 237.4 21.0967C238.445 20.751 239.568 21.3656 239.917 22.4028ZM219.059 24.0764C218.254 24.3053 217.832 25.1828 218.062 25.9459C218.292 26.7471 219.136 27.1668 219.941 26.9378C220.746 26.6708 221.168 25.8314 220.938 25.0684C220.708 24.2671 219.864 23.8093 219.059 24.0764ZM208.054 36.0693C207.245 36.3214 206.818 37.1619 207.074 37.9604C207.33 38.7589 208.182 39.1792 208.949 38.927C209.717 38.6749 210.185 37.8343 209.93 37.0359C209.674 36.2794 208.822 35.8171 208.054 36.0693Z"
                                    fill="#BDD684"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M235.075 26.95C234.813 26.1625 235.263 25.3376 236.05 25.0751C236.837 24.8126 237.7 25.2626 237.925 26.05C238.187 26.8375 237.737 27.6624 236.95 27.9249C236.163 28.1874 235.338 27.7374 235.075 26.95ZM207.785 29.145C208.546 31.5362 207.224 34.047 204.861 34.8042C202.499 35.5216 199.976 34.2064 199.215 31.855C198.454 29.4638 199.776 26.953 202.139 26.1958C204.501 25.4784 207.024 26.7936 207.785 29.145Z"
                                    fill="#D5E4B1"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M240.255 18.8686C241.561 18.4621 242.295 17.0393 241.887 15.7384C241.479 14.4376 240.051 13.7059 238.745 14.1124C237.439 14.5189 236.705 15.9417 237.113 17.2425C237.521 18.5841 238.949 19.3158 240.255 18.8686ZM203.748 37.1095C202.441 37.5067 201.688 38.9365 202.124 40.2472C202.52 41.5579 203.946 42.3125 205.252 41.8756C206.559 41.4784 207.312 40.0486 206.876 38.7379C206.44 37.4273 205.054 36.7124 203.748 37.1095ZM221.164 29.5595C220.583 27.7072 221.591 25.7391 223.453 25.1603C225.276 24.5814 227.254 25.6233 227.836 27.4371C228.417 29.2894 227.409 31.2575 225.547 31.8364C223.724 32.4152 221.746 31.4119 221.164 29.5595Z"
                                    fill="#A4C954"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M237.744 7.13145C239.067 6.6803 240.466 7.43222 240.882 8.74808C241.298 10.0639 240.58 11.455 239.256 11.8686C237.933 12.3197 236.534 11.5678 236.118 10.2519C235.702 8.93606 236.42 7.54501 237.744 7.13145ZM209.25 34.1547C208.349 31.2736 209.956 28.1589 212.855 27.2634C215.754 26.329 218.849 27.9642 219.75 30.8453C220.651 33.7264 219.044 36.8411 216.145 37.7366C213.246 38.671 210.151 37.0358 209.25 34.1547Z"
                                    fill="#76B82A"></path>
                            </svg></div>
                    </li>
                </ul>
            </div>
        </div>

        <section class="promo section">
            <div class="container">
                <div class="container d-xl-flex align-items-center justify-content-between">
                    <div class="promo_info">
                        <h2 class="info_header" data-aos="fade-up">Find suitable budget accommodation</h2>
                        <p class="info_text" data-aos="fade-up" data-aos-delay="50">
                            Book budget rooms in Trichy for a wallet-friendly and comfortable stay. Discover the perfect
                            accommodation for your travel needs.
                        </p>
                        <ul class="info_list">
                            <li class="list-item d-flex align-items-sm-center" data-aos="fade-up">
                                <div class="media theme-element theme-element--accent"><svg width="40" height="38"
                                        viewbox="0 0 40 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M9.14272 37.5001H30.857C31.1726 37.5001 31.4284 37.2495 31.4284 36.9404V3.35829C31.4284 3.04917 31.1726 2.79858 30.857 2.79858H9.14272C8.82713 2.79858 8.57129 3.04917 8.57129 3.35829V36.9404C8.57129 37.2495 8.82713 37.5001 9.14272 37.5001ZM30.2856 36.3807H9.71415V3.91799H30.2856V36.3807Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.7145 3.91791H26.2859C26.6015 3.91791 26.8574 3.66732 26.8574 3.35821V0.559702C26.8574 0.250587 26.6015 0 26.2859 0H13.7145C13.3989 0 13.1431 0.250587 13.1431 0.559702V3.35821C13.1431 3.66732 13.3989 3.91791 13.7145 3.91791ZM25.7145 2.79851H14.2859V1.1194H25.7145V2.79851Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M30.8571 37.5H39.4285C39.7441 37.5 39.9999 37.2494 39.9999 36.9403V10.0746C39.9999 9.76548 39.7441 9.51489 39.4285 9.51489H30.8571C30.5415 9.51489 30.2856 9.76548 30.2856 10.0746V36.9403C30.2856 37.2494 30.5415 37.5 30.8571 37.5ZM38.8571 36.3806H31.4285V10.6343H38.8571V36.3806Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M0.571429 37.5H9.14286C9.45845 37.5 9.71429 37.2494 9.71429 36.9403V10.0746C9.71429 9.76548 9.45845 9.51489 9.14286 9.51489H0.571429C0.255837 9.51489 0 9.76548 0 10.0746V36.9403C0 37.2494 0.255837 37.5 0.571429 37.5ZM8.57143 36.3806H1.14286V10.6343H8.57143V36.3806Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M23.4285 11.3338H25.8571C26.4883 11.3338 26.9999 10.8327 26.9999 10.2144V7.83571C26.9999 7.21748 26.4883 6.71631 25.8571 6.71631H23.4285C22.7973 6.71631 22.2856 7.21748 22.2856 7.83571V10.2144C22.2856 10.8327 22.7973 11.3338 23.4285 11.3338ZM23.4285 10.2144V7.83571H25.8571V10.2144H23.4285Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14.1429 11.3338H16.5714C17.2026 11.3338 17.7143 10.8327 17.7143 10.2144V7.83571C17.7143 7.21748 17.2026 6.71631 16.5714 6.71631H14.1429C13.5117 6.71631 13 7.21748 13 7.83571V10.2144C13 10.8327 13.5117 11.3338 14.1429 11.3338ZM14.1429 7.83571H16.5714V10.2144H14.1429V7.83571Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M23.4285 18.2604H25.8571C26.4883 18.2604 26.9999 17.7592 26.9999 17.141V14.7622C26.9999 14.144 26.4883 13.6428 25.8571 13.6428H23.4285C22.7973 13.6428 22.2856 14.144 22.2856 14.7622V17.141C22.2856 17.7592 22.7973 18.2604 23.4285 18.2604ZM23.4285 17.141V14.7622H25.8571V17.141H23.4285Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14.1429 18.2604H16.5714C17.2026 18.2604 17.7143 17.7592 17.7143 17.141V14.7622C17.7143 14.144 17.2026 13.6428 16.5714 13.6428H14.1429C13.5117 13.6428 13 14.144 13 14.7622V17.141C13 17.7592 13.5117 18.2604 14.1429 18.2604ZM14.1429 14.7617H16.5714V17.1404H14.1429V14.7617Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M23.4285 25.1866H25.8571C26.4883 25.1866 26.9999 24.6855 26.9999 24.0672V21.6885C26.9999 21.0703 26.4883 20.5691 25.8571 20.5691H23.4285C22.7973 20.5691 22.2856 21.0703 22.2856 21.6885V24.0672C22.2856 24.6855 22.7973 25.1866 23.4285 25.1866ZM23.4285 24.0672V21.6885H25.8571V24.0672H23.4285Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14.1429 25.1866H16.5714C17.2026 25.1866 17.7143 24.6855 17.7143 24.0672V21.6885C17.7143 21.0703 17.2026 20.5691 16.5714 20.5691H14.1429C13.5117 20.5691 13 21.0703 13 21.6885V24.0672C13 24.6855 13.5117 25.1866 14.1429 25.1866ZM14.1429 21.6879H16.5714V24.0672H14.1429V21.6879Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M16.4528 37.4999H23.5476C23.8632 37.4999 24.1191 37.2493 24.1191 36.9402V27.985C24.1191 27.6759 23.8632 27.4253 23.5476 27.4253H16.4528C16.1372 27.4253 15.8813 27.6759 15.8813 27.985V36.9402C15.8813 37.2493 16.1372 37.4999 16.4528 37.4999ZM22.9762 36.3805H17.0242V28.5447H22.9762V36.3805Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M34.2503 18.4701H36.0354C36.6666 18.4701 37.1783 17.9689 37.1783 17.3506V15.6016C37.1783 14.9834 36.6666 14.4822 36.0354 14.4822H34.2503C33.6191 14.4822 33.1074 14.9834 33.1074 15.6016V17.3506C33.1074 17.9689 33.6191 18.4701 34.2503 18.4701ZM34.2503 17.3506V15.6016H36.0354V17.3506H34.2503Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M34.2503 25.5012H36.0354C36.6666 25.5012 37.1783 25.0001 37.1783 24.3818V22.6333C37.1783 22.0151 36.6666 21.5139 36.0354 21.5139H34.2503C33.6191 21.5139 33.1074 22.0151 33.1074 22.6333V24.3818C33.1074 25.0001 33.6191 25.5012 34.2503 25.5012ZM34.2503 24.3818V22.6333H36.0354V24.3818H34.2503Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M34.2503 32.5326H36.0354C36.6666 32.5326 37.1783 32.0314 37.1783 31.4131V29.6641C37.1783 29.0459 36.6666 28.5447 36.0354 28.5447H34.2503C33.6191 28.5447 33.1074 29.0459 33.1074 29.6641V31.4131C33.1074 32.0314 33.6191 32.5326 34.2503 32.5326ZM34.2503 31.4131V29.6641H36.0354V31.4131H34.2503Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3.96463 18.4701H5.74978C6.38096 18.4701 6.89263 17.9689 6.89263 17.3506V15.6016C6.89263 14.9834 6.38096 14.4822 5.74978 14.4822H3.96463C3.33345 14.4822 2.82178 14.9834 2.82178 15.6016V17.3506C2.82178 17.9689 3.33345 18.4701 3.96463 18.4701ZM3.96463 17.3506V15.6016H5.74978V17.3506H3.96463Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3.96463 25.5012H5.74978C6.38096 25.5012 6.89263 25.0001 6.89263 24.3818V22.6333C6.89263 22.0151 6.38096 21.5139 5.74978 21.5139H3.96463C3.33345 21.5139 2.82178 22.0151 2.82178 22.6333V24.3818C2.82178 25.0001 3.33345 25.5012 3.96463 25.5012ZM3.96463 24.3818V22.6333H5.74978V24.3818H3.96463Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M3.96463 32.5326H5.74978C6.38096 32.5326 6.89263 32.0314 6.89263 31.4131V29.6641C6.89263 29.0459 6.38096 28.5447 5.74978 28.5447H3.96463C3.33345 28.5447 2.82178 29.0459 2.82178 29.6641V31.4131C2.82178 32.0314 3.33345 32.5326 3.96463 32.5326ZM3.96463 31.4131V29.6641H5.74978V31.4131H3.96463Z"
                                            fill="currentColor"></path>
                                    </svg></div>
                                <div class="main">
                                    <h4 class="main_title">Our territory</h4>
                                    <p class="main_text">Cherish moments in our territory's embrace</p>
                                </div>
                            </li>
                            <li class="list-item d-flex align-items-sm-center" data-aos="fade-up" data-aos-delay="50">
                                <div class="media theme-element theme-element--accent"><svg width="40" height="40"
                                        viewbox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M35.5133 23.6979L35.3079 23.8084C34.4779 22.8045 33.0399 22.4154 31.9444 22.9688L31.9327 22.9748L31.4477 23.2351C30.2625 22.2348 28.5752 22.0828 27.2293 22.8552L24.6173 24.2712H21.1416C20.389 24.2702 19.6463 24.1006 18.9683 23.7748L18.4902 23.5443C15.7145 22.1981 12.4156 22.5193 9.95364 24.3753C9.94229 24.384 9.9312 24.3926 9.92064 24.4024L8.76626 25.4267C8.33 25.8129 7.81433 26.0994 7.25535 26.2662L6.59973 24.121C6.53304 23.903 6.33126 23.754 6.10262 23.754H0.519728C0.370932 23.754 0.229272 23.8176 0.130628 23.9286C0.0319839 24.0397 -0.0141828 24.1875 0.00382146 24.3348L1.86476 39.5445C1.89654 39.8045 2.11795 39.9999 2.38066 39.9999H10.7545C10.9192 39.9999 11.0742 39.9221 11.1722 39.7901C11.2702 39.6582 11.2997 39.4878 11.2516 39.3307L10.1516 35.7326L13.5777 33.5741C14.0361 33.3212 14.574 33.2519 15.0819 33.3801C15.0926 33.3827 15.1034 33.3852 15.1143 33.3871L22.0837 34.6663C23.9777 35.0041 25.9304 34.7293 27.6565 33.882C27.6786 33.8711 27.6998 33.8587 27.7201 33.8448L39.7744 25.5948C40.0011 25.4397 40.0673 25.1354 39.9255 24.9005C39.0143 23.3878 37.07 22.8579 35.5133 23.6979ZM32.4195 23.8903C33.0532 23.574 33.8508 23.8333 34.3603 24.3179L29.7893 26.776L29.5207 26.917C29.376 26.5074 29.1645 26.1243 28.8946 25.7833L32.4195 23.8903ZM27.7367 23.7596L27.7323 23.7621L26.6244 24.3616C27.1603 24.4784 27.6659 24.7052 28.1089 25.0276L30.433 23.7803C29.6084 23.2843 28.5784 23.2746 27.7446 23.7551C27.7422 23.7566 27.7395 23.7581 27.7367 23.7596ZM2.84044 38.9638L1.10675 24.7901H5.71742L10.0527 38.9638H2.84044ZM22.2696 33.6467C23.9312 33.9427 25.6442 33.7055 27.1618 32.9691L38.7394 25.0459C38.0331 24.3001 36.9119 24.1209 36.0071 24.6093L30.2773 27.6896L29.7349 27.9745C29.7401 28.0572 29.7436 28.1402 29.7436 28.2241C29.7436 28.5102 29.5109 28.7421 29.2239 28.7421C29.2161 28.7421 29.2082 28.7416 29.2003 28.7416L25.2456 28.5633C24.0873 28.5112 22.9267 28.5646 21.7782 28.7228C21.4954 28.7591 21.2362 28.5615 21.1971 28.2801C21.158 27.9986 21.3536 27.7383 21.6356 27.6966C22.8469 27.5298 24.071 27.4734 25.2927 27.5282L28.6531 27.6797C28.389 26.3038 27.1827 25.3082 25.7773 25.3062H21.141C20.2317 25.305 19.3343 25.1 18.5151 24.7065L18.0371 24.4759C15.6185 23.3029 12.7447 23.5785 10.5949 25.1895L9.45679 26.1997C8.90867 26.6858 8.26081 27.047 7.55835 27.258L9.83644 34.705L13.034 32.69C13.0419 32.685 13.0499 32.6802 13.058 32.6758C13.7449 32.2915 14.5528 32.1824 15.3175 32.3706L22.2696 33.6467Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M4.62732 38.125H5.99768C6.48221 38.125 6.875 37.7323 6.875 37.2478V35.8772C6.875 35.3927 6.48221 35 5.99768 35H4.62732C4.14279 35 3.75 35.3927 3.75 35.8772V37.2478C3.75 37.7323 4.14279 38.125 4.62732 38.125ZM4.79167 37.0833V36.0417H5.83333V37.0833H4.79167Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M24.0862 3.88411V5.57826C24.0762 7.72633 22.346 9.46237 20.2152 9.46237C18.0844 9.46237 16.3542 7.72633 16.3442 5.57826V3.88411C16.3542 1.73604 18.0844 0 20.2152 0C22.346 0 24.0762 1.73604 24.0862 3.88411ZM17.3642 3.88411V5.57826C17.3727 7.15948 18.6467 8.43675 20.2152 8.43675C21.7837 8.43675 23.0577 7.15948 23.0662 5.57826V3.88411C23.0577 2.30289 21.7837 1.02562 20.2152 1.02562C18.6467 1.02562 17.3727 2.30289 17.3642 3.88411Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M26.3728 20.2152H13.6411C13.3538 20.2152 13.1208 19.9855 13.1208 19.7022V18.5249H4.39139C4.10404 18.5249 3.87109 18.2952 3.87109 18.0119V14.6826C3.8714 12.5984 5.55676 10.8943 7.67017 10.8413C7.83973 10.8373 8.00063 10.9149 8.10158 11.0493C8.53964 11.6329 9.22637 11.9846 9.96259 12.0023C10.6988 12.02 11.4021 11.7018 11.8686 11.14L11.8689 11.1396C11.9844 11.0006 12.1281 10.8277 12.4044 10.8478C13.0322 10.8859 13.6411 11.0743 14.1783 11.3968C14.2391 11.3271 14.3015 11.2584 14.3672 11.1922C15.1627 10.3854 16.2478 9.91877 17.3888 9.89276C17.5584 9.88832 17.7195 9.96597 17.8202 10.1007C18.3342 10.7856 19.1401 11.1984 20.004 11.2192C20.868 11.24 21.6934 10.8665 22.2407 10.2071C22.3724 10.0495 22.5084 9.88857 22.7772 9.89934C23.9575 9.96963 25.0586 10.5081 25.8296 11.3919C26.4076 11.0462 27.0676 10.8564 27.7434 10.8414C27.913 10.8373 28.0741 10.9149 28.1749 11.0494C28.6129 11.6331 29.2997 11.9847 30.0359 12.0025C30.7722 12.0202 31.4755 11.702 31.9419 11.1401L31.9436 11.1382C32.059 10.9994 32.2016 10.8279 32.4778 10.8479C34.5301 10.9771 36.128 12.6552 36.1292 14.6826V18.0119C36.1292 18.2952 35.8962 18.5249 35.6089 18.5249H26.8931V19.7022C26.8931 19.9855 26.6602 20.2152 26.3728 20.2152ZM30.085 13.0292C29.1035 13.0267 28.1701 12.6096 27.5213 11.8835C27.1301 11.926 26.7523 12.0489 26.4123 12.2444C26.7288 12.852 26.8937 13.5254 26.8931 14.2084V17.499H35.0886V14.6826C35.0873 13.2886 34.053 12.1048 32.6548 11.8968C32.0021 12.6195 31.0666 13.0318 30.085 13.0292ZM17.1645 10.9342C17.8924 11.7649 18.95 12.2436 20.0635 12.2462C21.177 12.2488 22.2369 11.7751 22.9687 10.9478C24.6207 11.173 25.8513 12.5644 25.8529 14.2084V19.1893H14.1614V14.2084C14.1721 12.5229 15.4645 11.1138 17.1645 10.9342ZM4.91168 14.6826V17.499H13.1208V14.2084C13.1199 13.5277 13.2829 12.8565 13.5966 12.25C13.2841 12.0695 12.9394 11.9496 12.5812 11.8968C11.9286 12.6193 10.9932 13.0316 10.0119 13.0291C9.03053 13.0266 8.0973 12.6097 7.44844 11.8839C6.00814 12.053 4.92077 13.2527 4.91168 14.6826Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M33.5482 5.69622V7.2072C33.5482 9.16537 32.0077 10.7528 30.1074 10.7528C28.207 10.7528 26.6665 9.16537 26.6665 7.2072V5.69622C26.6665 3.73805 28.207 2.15063 30.1074 2.15063C32.0077 2.15063 33.5482 3.73805 33.5482 5.69622ZM27.6832 5.69622V7.2072C27.6832 8.58677 28.7685 9.70514 30.1074 9.70514C31.4462 9.70514 32.5315 8.58677 32.5315 7.2072V5.69622C32.5315 4.31665 31.4462 3.19828 30.1074 3.19828C28.7685 3.19828 27.6832 4.31665 27.6832 5.69622Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M13.3334 5.69622V7.2072C13.3334 9.16537 11.7929 10.7528 9.89252 10.7528C7.99219 10.7528 6.45166 9.16537 6.45166 7.2072V5.69622C6.45166 4.42951 7.10748 3.25901 8.17209 2.62565C9.2367 1.9923 10.5483 1.9923 11.613 2.62565C12.6776 3.25901 13.3334 4.42951 13.3334 5.69622ZM7.46836 5.69622V7.2072C7.46836 8.09962 7.9304 8.92426 8.68044 9.37048C9.43048 9.81669 10.3546 9.81669 11.1046 9.37048C11.8546 8.92426 12.3167 8.09962 12.3167 7.2072V5.69622C12.3167 4.31665 11.2313 3.19828 9.89252 3.19828C8.55369 3.19828 7.46836 4.31665 7.46836 5.69622Z"
                                            fill="currentColor"></path>
                                    </svg></div>
                                <div class="main">
                                    <h4 class="main_title">Accommodates guests</h4>
                                    <p class="main_text">Welcoming spaces for your memorable stay</p>
                                </div>
                            </li>
                            <li class="list-item d-flex align-items-sm-center" data-aos="fade-up" data-aos-delay="100">
                                <div class="media theme-element theme-element--accent"><svg width="40" height="40"
                                        viewbox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M25.3333 19.3333V25.4006C26.8527 25.7106 28 27.0573 28 28.6666V32.6666V39.3333C28 39.7013 27.7013 39.9999 27.3333 39.9999H24.6667C24.2987 39.9999 24 39.7013 24 39.3333V37.3333H4V39.3333C4 39.7013 3.70133 39.9999 3.33333 39.9999H0.666667C0.298667 39.9999 0 39.7013 0 39.3333V32.6666V28.6666C0 27.0573 1.14733 25.7106 2.66667 25.4006V19.3333C2.66667 18.2306 3.564 17.3333 4.66667 17.3333H23.3333C24.436 17.3333 25.3333 18.2306 25.3333 19.3333ZM4.66667 18.6666C4.29933 18.6666 4 18.9659 4 19.3333V25.3333H5.33333V22.6666C5.33333 21.5639 6.23067 20.6666 7.33333 20.6666H11.3333C12.436 20.6666 13.3333 21.5639 13.3333 22.6666V25.3333H14.6667V22.6666C14.6667 21.5639 15.564 20.6666 16.6667 20.6666H20.6667C21.7693 20.6666 22.6667 21.5639 22.6667 22.6666V25.3333H24V19.3333C24 18.9659 23.7007 18.6666 23.3333 18.6666H4.66667ZM21.3333 22.6666V25.3333H16V22.6666C16 22.2993 16.2993 21.9999 16.6667 21.9999H20.6667C21.034 21.9999 21.3333 22.2993 21.3333 22.6666ZM12 25.3333V22.6666C12 22.2993 11.7007 21.9999 11.3333 21.9999H7.33333C6.966 21.9999 6.66667 22.2993 6.66667 22.6666V25.3333H12ZM26.6667 38.6666H25.3333V36.6666C25.3333 36.2986 25.0347 35.9999 24.6667 35.9999H3.33333C2.96533 35.9999 2.66667 36.2986 2.66667 36.6666V38.6666H1.33333V33.3333H26.6667V38.6666ZM1.33333 31.9999H26.6667V28.6666C26.6667 27.5639 25.7693 26.6666 24.6667 26.6666H22H15.3333H12.6667H6H3.33333C2.23067 26.6666 1.33333 27.5639 1.33333 28.6666V31.9999Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M30.0002 25.3333H39.3335C39.7015 25.3333 40.0002 25.6319 40.0002 25.9999V31.3333V35.9999H38.6668V31.9999H30.6668V35.9999H29.3335V31.3333V25.9999C29.3335 25.6319 29.6322 25.3333 30.0002 25.3333ZM30.6668 30.6666H38.6668V26.6666H30.6668V30.6666Z"
                                            fill="currentColor"></path>
                                        <rect x="33.3335" y="28" width="2.66667" height="1.33333" fill="currentColor">
                                        </rect>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M36.6326 15.7886L37.9659 19.7886C38.0332 19.9919 37.9992 20.2153 37.8739 20.3893C37.7486 20.5639 37.5472 20.6666 37.3332 20.6666H35.3332V22.6666H36.6666V23.9999H32.6666V22.6666H33.9999V20.6666H31.9999C31.7859 20.6666 31.5846 20.5639 31.4592 20.3899C31.3339 20.2159 31.2992 19.9926 31.3672 19.7893L32.7006 15.7893C32.7919 15.5166 33.0459 15.3333 33.3332 15.3333H35.9999C36.2872 15.3333 36.5412 15.5166 36.6326 15.7886ZM33.8139 16.6666L32.9246 19.3333H36.4086L35.5199 16.6666H33.8139Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M39.606 8.72467L20.2727 0.058C20.0987 -0.0193333 19.9007 -0.0193333 19.7273 0.058L0.394 8.72467C0.154 8.83267 0 9.07067 0 9.33333V17.3333H1.33333V9.76467L20 1.39733L38.6667 9.76533V17.3333H40V9.33333C40 9.07067 39.846 8.83267 39.606 8.72467Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M24.6022 9.22259L23.2868 9.44392C23.3182 9.62592 23.3335 9.81259 23.3335 9.99992C23.3335 11.8379 21.8382 13.3333 20.0002 13.3333C18.1622 13.3333 16.6668 11.8379 16.6668 9.99992C16.6668 8.16192 18.1622 6.66659 20.0002 6.66659C20.3815 6.66659 20.7562 6.73059 21.1122 6.85659L21.5562 5.59925C21.0568 5.42259 20.5335 5.33325 20.0002 5.33325C17.4268 5.33325 15.3335 7.42659 15.3335 9.99992C15.3335 12.5733 17.4268 14.6666 20.0002 14.6666C22.5735 14.6666 24.6668 12.5733 24.6668 9.99992C24.6668 9.73858 24.6448 9.47725 24.6022 9.22259Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M24.1953 5.52856L20 9.7239L19.138 8.8619L18.1953 9.80456L19.5286 11.1379C19.6586 11.2679 19.8293 11.3332 20 11.3332C20.1706 11.3332 20.3413 11.2679 20.4713 11.1379L25.138 6.47123L24.1953 5.52856Z"
                                            fill="currentColor"></path>
                                    </svg></div>
                                <div class="main">
                                    <h4 class="main_title">Grateful guests</h4>
                                    <p class="main_text">Guests leave with hearts full</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="promo_media" data-aos="fade-up">
                        <picture>
                            <source data-srcset="img/index/promo.webp" srcset="img/index/promo.webp"><img class="lazy"
                                data-src="img/index/promo.jpg" src="img/index/promo.jpg" alt="media">
                        </picture>
                        <!-- <div class="media_card media_card--top" data-aos="fade-left">
                            <h4 class="media_card-text">This is the perfect hostel for a weekend getaway!</h4>
                            <div class="media_card-footer d-flex align-items-center"><span class="avatar">
                                    <picture>
                                        <source data-srcset="img/room/roomreview02.webp"
                                            srcset="img/room/roomreview02.webp"><img class="lazy"
                                            data-src="img/room/roomreview02.jpg" src="img/room/roomreview02.jpg"
                                            alt="media">
                                    </picture>
                                </span>
                                <div class="wrapper d-flex flex-column">
                                    <div class="stars d-flex align-items-center"><i class="icon-star icon"></i> <i
                                            class="icon-star icon"></i> <i class="icon-star icon"></i> <i
                                            class="icon-star icon"></i> <i class="icon-star icon"></i></div><span
                                        class="name h6">Esmond Ward</span>
                                </div>
                            </div>
                        </div>
                        <div class="media_card media_card--bottom" data-aos="fade-right">
                            <h4 class="media_card-text">Family Room with Private Bathroom</h4>
                            <div class="media_card-pricing"><span class="h2">$149</span> / 1 night</div><a
                                class="media_card-btn btn theme-element theme-element--light" href="#">See
                                availability</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>

    </main>
    <div class="video d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="video_frame d-flex align-items-center justify-content-center"><i
                    class="icon-close video_frame-close"></i>
                <div id="player"></div>
            </div>
        </div>
    </div>

    @include('components.footer')

    @include('components.script')

</body>

</html>

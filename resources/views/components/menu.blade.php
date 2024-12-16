<header class="header-pos">
    <div class="header--top">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between gap-5">
                <div class="header--top__socials">
                    <a class="header--top__social" href="https://www.facebook.com/businessinsidergeorgia"
                       target="blank">
                        <img src="/img/newheader/facebook-rect.svg" alt="">
                    </a>
                    <a class="header--top__social" target="blank"
                       href="https://www.linkedin.com/company/business-insider-georgia/about/?viewAsMember=true&amp;fbclid=IwAR21H8qlsy9zXTQ6R0P0gubJQMrLhGOOQiYZX_SAxwxQUJe3JdyV33gyqts">
                        <img src="/img/newheader/linkedin-rect.svg" alt="">
                    </a>
                    <a class="header--top__social" target="blank"
                       href="https://www.instagram.com/businessinsidergeorgia/">
                        <img src="/img/newheader/instagram-filled.svg" alt="">
                    </a>

                    <a class="header--top__social" target="blank"
                       href="https://twitter.com/insider_georgia?s=11&amp;t=-ve2WPE14mhTQDlionMzag">
                        <img src="/img/newheader/squaretwitter.svg" alt="">
                    </a>
                </div>
                <div id="language-switcher"><a href="https://www.businessinsider.ge/en" class="active">
                        <img src="https://www.businessinsider.ge/img/gbp_flag.png">
                    </a></div>


            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-4 col-sm-4 flexed">
                    <div class="logo">
                        <a href="https://www.businessinsider.ge/">
                            <img style="width:150px;height:75px;object-fit:cover;"
                                 src="https://www.businessinsider.ge/img/bi.png" alt="logo">
                        </a>
                    </div>
                    <section class="top-nav">

                        <input id="menu-toggle" type="checkbox">
                        <label class="menu-button-containerser" for="menu-toggle">
                            <div class="menu-button"></div>
                        </label>
                        <ul class="menu">
                            @foreach($categories as $category)
                                <li class=""><a href="{{route('category-slug' , $category->slug)}}">{{$category->title}}</a></li>
                            @endforeach
                            <li class="all-categories"><a href="{{route('news-index')}}">ყველა</a></li>
                        </ul>
                    </section>

                </div>

                <div class="col-lg-6 col-md-12 order-sm-last">
                    <div class="header-middle-inner feature-icon-ads">
                        <a href="https://www.facebook.com/GeorgianDreamOfficial?mibextid=LQQJ4d" target="_blank">
                            <div class="feature-icon">
                                <img src="https://www.businessinsider.ge/img/news/600X90_1722583087.jpg" alt="BOG">
                            </div>
                        </a>
                    </div>
                    <div class="header-middle-inner mt-2 feature-icon-ads">
                        <a href="https://www.facebook.com/CentralElectionCommissionOfGeorgia" target="_blank">
                            <div class="feature-icon">
                                <img alt="BOG" src="https://www.businessinsider.ge/img/elections.gif">
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12 order-sm-last">
                    <div class="header-middle-inner d-flex " style="gap:15px;">
                        <form action="https://www.businessinsider.ge/ka/product-filter" method="get" autocomplete="off"
                              style="position: relative;">
                            @csrf
                            <input type="text" class="top-cat-field" name="q" id="q" placeholder="ძებნა" required="">
                            <span class="input-group-btn">
                                    <button class="button_search"><i class="lnr lnr-magnifier"></i></button>
                                </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-top-menu  sticker">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="top-main-menu">
                        <div class="categories-menu-bar ">
                            <div class=" ha-toggle">
                                <img src="/img/newheader/menu-left.svg" alt="">

                            </div>
                            <nav class="categorie-menus ha-dropdown">
                                <ul id="menu2">
                                    @foreach($categories->where('hidden', 1) as $hidden_category)
                                    <li>
                                        <a href="{{route('category-slug', $hidden_category->slug)}}">{{$hidden_category->title}} </a>
                                    </li>
                                    @endforeach
                                    <li class="all-categories"><a
                                            href="https://www.businessinsider.ge/products">ყველა</a></li>
                                </ul>
                            </nav>
                        </div>
                        <div class="main-menu">
                            <nav id="mobile-menu" style="display: block;">

                                <ul>
                                    <li><a href="/"><i class="lnr lnr-home"></i></a></li>
                                    @foreach($categories->where('hidden' , 0) as $category)
                                        <li>
                                            <a href="{{route('category-slug', $category->slug)}}">{{$category->title}} </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </nav>
                        </div>


                    </div>

                </div>
                <div class="col-12 d-block d-lg-none">
                    <div class="mobile-menu"></div>
                </div>
            </div>
        </div>

    </div>

    <div class="container-fluid for-mobile">
        <div id="admixer_cc202fcfec6c42b3b8b39acee9089993_zone_116061_sect_56490_site_50017"
             data-sender="admixer"></div>
        <script type="text/javascript">
            (window.globalAmlAds = window.globalAmlAds || []).push(function () {
                globalAml.display('admixer_cc202fcfec6c42b3b8b39acee9089993_zone_116061_sect_56490_site_50017');
            });
        </script>
    </div>
</header>
@push('styles')
    @if (app()->getLocale() == 'en')
        <style>
            body,
            .main-menu li > a,
            .last__news__header__title,
            .news__header__title,
            .weekend .logo::after,
            .education_news__header__title,
            .personal_news__header__title,
            .popular_news__header__title,
            .new-videos--title,
            .new-videos--title + a,
            .podcast__title,
            .podcast__title a,
            h1, h2, h3, h4, h5, h6 {
                font-family: 'OldStandard-regular', 'hm';
            }
        </style>
    @endif
@endpush


@push('scripts')
    <script>
        let languager = document.querySelector('#language-switcher');
        if (window.location.href.includes('/ka')) {
            languager.innerHTML = ` <a href='https://www.businessinsider.ge/en' class="active">
                                <img src='https://www.businessinsider.ge/img/gbp_flag.png'/>
                            </a>`

        } else {
            languager.innerHTML = ` <a href='https://www.businessinsider.ge/ka' class="active">
                                <img src='https://www.businessinsider.ge/img/Flag_of_Georgia.svg.webp'/>
                            </a>`
        }
    </script>
@endpush


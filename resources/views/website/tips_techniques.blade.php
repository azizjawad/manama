@extends('layouts.main')

@section('content')
    <div id="content" class="main-content-wrapper">

        <!-- Page Headers -->
        <section class="page-headers">
            <div class="container-fluid">
                <div class="row">
                    <div class="order-md-2 col-md-4 ms-auto">
                        <h1>Tips & Techniques</h1>
                        <ul class="pghd-breadcrumbs">
                            <li><a href="index.html">Home</a></li>
                            <li>Tips & Techniques</li>
                        </ul>
                    </div>
                    <div class="order-md-1 col-md-3">
                        <h3 class="text-with-icon"><i class="fas fa-blender"></i>Expert tips to make your next drink mind-blowing.</h3>
                    </div>
                </div>
            </div>
        </section>


        <!-- Tips & Techniques Area -->

        <div id="content" class="main-content-wrapper">
            <div class="page-content-inner recipe-news-tips-corner">

            </div>

            <!-- Tips & Techniques End Here -->

            <div class="container">
                <div class="row pt--80 pt-md--60 pt-sm--50">
                    <div class="col-12 mb--40 mb-sm--30">
                        <article class="post post-listview">
                            <div class="post-media">
                                <div class="image">
                                    <img src="/web/images/tipstechniques/summer-cocktails.jpg" alt="Tips & Techniques">
                                    <a href="{{route('tips-techniques-single')}}" class="link-overlay">Tips & Techniques</a>
                                </div>
                            </div>
                            <div class="post-info post-info--3">
                                <h2 class="post-title">
                                    <a href="{{route('tips-techniques-single')}}">10 Fantastic Fresh Fruit Cocktails, Fresh is Always Best and These Cocktails Prove It</a>
                                </h2>

                                <div class="post-content">
                                    <p>You will often hear the advice that fresh is best when it comes to mixing drinks and it is very true.
                                        Whenever possible, you should be using fresh fruits and juices in order to get the best cocktails possible...</p>
                                </div>
                                <a href="{{route('tips-techniques-single')}}" class="read-more-btn">Continue Reading</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-12 mb--40 mb-sm--30">
                        <article class="post post-listview">
                            <div class="post-media">
                                <div class="image">
                                    <img src="/web/images/tipstechniques/simple-syrup.jpg" alt="Tips & Techniques">
                                    <a href="{{route('tips-techniques-single')}}" class="link-overlay">Tips & Techniques</a>
                                </div>
                            </div>
                            <div class="post-info post-info--3">
                                <h2 class="post-title">
                                    <a href="{{route('tips-techniques-single')}}">Make a Simple Syrup Recipe for Cocktails, Coffee, and Other Drinks</a>
                                </h2>

                                <div class="post-content">
                                    <p>Simple syrup is, as the name implies, very simple to make and it is an essential item to stock in any bar or kitchen.
                                        Also called sugar syrup, you will find it in many mixed drinks including the Mojito,
                                        Daiquiri, and Hurricane and it can be used for your coffee, tea, and homemade sodas as well...</p>
                                </div>
                                <a href="{{route('tips-techniques-single')}}" class="read-more-btn">Continue Reading</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-12 mb--40 mb-sm--30">
                        <article class="post post-listview">
                            <div class="post-media">
                                <div class="image">
                                    <img src="/web/images/tipstechniques/herbal-cocktails.jpg" alt="Tips & Techniques">
                                    <a href="{{route('tips-techniques-single')}}" class="link-overlay">Tips & Techniques</a>
                                </div>
                            </div>
                            <div class="post-info post-info--3">
                                <h2 class="post-title">
                                    <a href="{{route('tips-techniques-single')}}">Using Herbs and Spices in Cocktails</a>
                                </h2>

                                <div class="post-content">
                                    <p>For nearly 200 years, the imagination and experimentation of countless Bartenders has driven the form forward.
                                        "What's happening in the bar these days is that we're borrowing from the kitchen - not just in technique, but in ingredients...</p>
                                </div>
                                <a href="{{route('tips-techniques-single')}}" class="read-more-btn">Continue Reading</a>
                            </div>
                        </article>
                    </div>
                    <div class="col-12 mb--40 mb-sm--30">
                        <article class="post post-listview">
                            <div class="post-media">
                                <div class="image">
                                    <img src="/web/images/tipstechniques/perfectly-blended-cocktails.jpg" alt="Tips & Techniques">
                                    <a href="{{route('tips-techniques-single')}}" class="link-overlay">Tips & Techniques</a>
                                </div>
                            </div>
                            <div class="post-info post-info--3">
                                <h2 class="post-title">
                                    <a href="{{route('tips-techniques-single')}}">5 Steps to Creating the Perfectly Blended Cocktails</a>
                                </h2>

                                <div class="post-content">
                                    <p>You will often hear the advice that fresh is best when it comes to mixing drinks and it is very true.
                                        Whenever possible, you should be using fresh fruits and juices in order to get the best cocktails possible...</p>
                                </div>
                                <a href="{{route('tips-techniques-single')}}" class="read-more-btn">Continue Reading</a>
                            </div>
                        </article>
                    </div>





                </div>
            </div>
            <div class="row pb--80 pb-md--60 pb-sm--50">
                <div class="col-12">
                    <nav class="pagination-wrap">
                        <ul class="pagination">
                            <li><a href="#" class="prev page-number"><i class="fa fa-long-arrow-left"></i></a>
                            </li>
                            <li><span class="current page-number">1</span></li>
                            <li><a href="#" class="page-number">2</a></li>
                            <li><a href="#" class="page-number">3</a></li>
                            <li><a href="#" class="next page-number"><i class="fa fa-long-arrow-right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        @include('website.account.component.banner-section')
    </div>
@endsection

@extends('layouts.main')

@section('content')
    <div id="content" class="main-content-wrapper">

        <!-- Page Headers -->
        <section class="page-headers">
            <div class="container-fluid">
                <div class="row">
                    <div class="order-md-2 col-md-4 ms-auto">
                        <h1>Recipe Corner</h1>
                        <ul class="pghd-breadcrumbs">
                            <li><a href="index.html">Home</a></li>
                            <li>Recipe Corner</li>
                        </ul>
                    </div>
                    <div class="order-md-1 col-md-3">
                        <h3 class="text-with-icon"><i class="fas fa-cocktail"></i>Try something everyday, always something new.</h3>
                    </div>
                </div>
            </div>
        </section>


        <!-- Recipe Area -->

        <div id="content" class="main-content-wrapper">
            <div class="page-content-inner recipe-news-tips-corner">
                <div class="container">
                    <div class="row">
                        <!-- Single Recipe Item  col-md-4 col-lg-3 -->
                        @foreach($recipes as $recipe)
                            <div class="col-6 col-md-4 mb--40 mb-md--30 mb-sm--25">
                                <article class="post">
                                    <div class="post-media has-shadow">
                                        <div class="image">
                                            <img src="{{asset('/images/recipe/display-img/'.$recipe->rcp_display_img)}}" alt="Beach Bottom Punch">
                                            <a href="javascript:void(0);" data-recipe-id="{{$recipe->id}}" class="link-overlay show_recipe_image">{{$recipe->rcp_name}}</a>
                                        </div>
                                    </div>
                                    <div class="post-info">
                                        <h3 class="post-title">
                                            <a href="javascript:void(0);" data-recipe-id="{{$recipe->id}}" class="show_recipe_image">{{$recipe->rcp_name}}</a>
                                        </h3>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>

                    <!-- Address Modal Start -->

                    <div class="modal fade product-modal" id="recipenote" aria-hidden="true" aria-labelledby="recipenoteLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title" id="recipenoteLabel">Recipe Note</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="dl-icon-close"></i></span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <div class="container-fluid pb--40">
                                        <div class="row recipe-note">
                                            <div class="col-12">
                                                <h2><span>Beach Bottom Punch</span></h2>
                                                <div class="recipe-content">
                                                    <h3>Ingredients.</h3>
                                                    <ul>
                                                        <li>30ml Blue Curacao Fruit Twist</li>
                                                        <li>100ml Lemon Barley Fruit Twist</li>
                                                        <li>100ml Sprite / 7up</li>
                                                        <li>Ice</li>
                                                        <li>Garnish: Cherries, Lime</li>
                                                    </ul>
                                                    <h3>Instructions.</h3>
                                                    <p>Fill serving glass with ice. Add remaining ingredients. Stir gently and garnish.
                                                    </p>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>
                    </div>

                    <!-- Address  Modal End -->

                    <!-- Global Overlay Start -->
                    <div class="ai-global-overlay"></div>
                    <!-- Global Overlay End -->


                </div>
                @include('website.account.component.banner-section')
            </div>
        </div>
    </div>
    <script>
        $('.show_recipe_image').click(function (){
            console.log($(this).data('recipe-id'))
        });
    </script>

@endsection

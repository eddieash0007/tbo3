<nav class="navbar navbar-expand-lg">
    <div class="container"><a href="{{route('index')}}" class="navbar-brand home"><img src="{{asset($settings->logo)}}"
                alt="{{$settings->site_name}}" class="d-none d-md-inline-block" width="100px" height="70px"><img
                src="{{asset($settings->logo)}}" alt="{{$settings->site_name}}" class="d-inline-block d-md-none"
                width="100px" height="70px"><span class="sr-only">{{$settings->site_name}} go to homepage</span></a>
        <div class="navbar-buttons">
            <button type="button" data-toggle="collapse" data-target="#navigation"
                class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle navigation</span><i
                    class="fa fa-align-justify"></i></button>
            <button type="button" data-toggle="collapse" data-target="#search"
                class="btn btn-outline-secondary navbar-toggler"><span class="sr-only">Toggle search</span><i
                    class="fa fa-search"></i></button><a href="{{route('cart.index')}}"
                class="btn btn-outline-secondary navbar-toggler"><i class="fa fa-shopping-cart"></i>span> 
                {{Cart::getTotalQuantity()}} item(s) in cart
            </span></a>
        </div>
        <div id="navigation" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="{{route('index')}}" class="nav-link ">Home</a></li>
                @foreach ($bigcategories as $bigcategory)
                <li class="nav-item dropdown menu-large"><a href="#" data-toggle="dropdown" data-hover="dropdown"
                        data-delay="200" class="dropdown-toggle nav-link">{{$bigcategory->name}}<b
                            class="caret"></b></a>
                    <ul class="dropdown-menu megamenu">
                        <li>
                            <div class="row">
                                <div class="col-md-6 col-lg-3">
                                    <h5>Clothing</h5>
                                    <ul class="list-unstyled mb-3">
                                        @foreach ($categories as $category)
                                        @if ($category->big_category_id === $bigcategory->id)
                                        <li class="nav-item"><a
                                                href="{{ route('category.single', [ 'slug'=> $category->slug]) }}"
                                                class="nav-link">{{$category->name}}</a></li>
                                        @endif

                                        @endforeach


                                    </ul>
                                </div>

                            </div>
                        </li>
                    </ul>
                </li>
                @endforeach

            </ul>
            <div class="navbar-buttons d-flex justify-content-end">
                <!-- /.nav-collapse-->
                <div id="search-not-mobile" class="navbar-collapse collapse"></div><a data-toggle="collapse"
                    href="#search" class="btn navbar-btn btn-primary d-none d-lg-inline-block"><span
                        class="sr-only">Toggle search</span><i class="fa fa-search"></i></a>
                <div id="basket-overview" class="navbar-collapse collapse d-none d-lg-block"><a href="{{route('cart.index')}}"
                        class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span> 
                        {{Cart::getContent()->count()}} items in cart
                    </span></a></div>
            </div>
        </div>
    </div>
</nav>

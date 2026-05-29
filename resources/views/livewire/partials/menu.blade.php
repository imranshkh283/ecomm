<div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="nav-inner">
                    <div class="mega-category-menu">
                        <span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>
                        <ul class="sub-category">
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ $category->link }}">{{ $category->name }} <i class="lni lni-chevron-right"></i></a>
                                @if($category->items)
                                <ul class="inner-sub-category">
                                    @foreach(json_decode($category->items, true) as $item)
                                    <li><a href="{{ $category->link }}">{{ $item }}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item"><a href="#" class="active">Home</a></li>
                                <li class="nav-item"><a href="#" class="dd-menu">Pages</a></li>
                                <li class="nav-item"><a href="#" class="dd-menu">Shop</a></li>
                                <li class="nav-item"><a href="#" class="dd-menu">Blog</a></li>
                                <li class="nav-item"><a href="#contact">Contact Us</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="nav-social">
                    <h5 class="title">Follow Us:</h5>
                    <ul>
                        <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="lni lni-skype"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
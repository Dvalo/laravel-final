<!DOCTYPE html>
<html>
<head>
	<title>Our Products</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
	<nav id="navbar">
		<div class="container">
			<ul>
				@foreach ($categories as $category)
					<li>
						<a href="#" class="nav-link">{{ $category->name }}</a>
						<div class="sub_categories">
						@foreach ($subCategories as $subcategory)
							@if($subcategory->parent_id == $category->id)
								<a href="#" class="nav-link">{{ $subcategory->name }}</a>
							@endif
						@endforeach
						</div>
					</li>
				@endforeach
			</ul>
			<div class="avatar_wrapper">
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
		</div>
	</nav>

	<div class="container product_wrapper grid-display">
		@foreach ($products as $product)
            <div class="card-tile">
                <a href="#">
                    <img src="{{ asset('images/'.$product->img_path) }}" alt="product-image" class="card-image">
                </a>
                <div class="card-details">
                    <a href="#" class="card-title">{{ $product->title }}</a>
                    <div class="date">{{ $product->created_at }}</div>
                </div>
                @if (Auth::check())
                	<a href="{{ route('addtocart', ["id"=>$product->id]) }}" class="btn">Add To Cart</a>
                @endif
            </div>
		@endforeach
	</div>
</body>
</html>
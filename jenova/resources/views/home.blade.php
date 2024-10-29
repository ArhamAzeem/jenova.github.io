@extends('frontend_partials.main_layout')
@section('front_title', 'Home')

@section('main_content')


@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<script>
    // Automatically hide the alert after 5 seconds
    setTimeout(function() {
        let alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.remove('show');
            alert.classList.add('fade');
            setTimeout(function() {
                alert.remove();
            }, 500); // 0.5 second delay before removing the alert completely
        }
    }, 5000); // 5 seconds delay
</script>

                           <!-- Images -->


<!-- Main Container -->
<div class="container-fluid p-5" style="background-color: rgba(255, 99, 71, 0.3);">
  <div class="container">
    <div class="row align-items-center mb-5">
      <!-- Images and Text Section -->
      <div class="col-md-3 d-flex justify-content-center mb-4 mb-md-0">
        <img src="{{ asset('frontend_assets')}}/images/cosmetic1.png" alt="Tree Plant" class="img-fluid" style="height: 300px; width: auto;">
      </div>

      <div class="col-md-6 text-center mb-4 mb-md-0">
        <pre class="fw-bolder fs-1">Beautify Your Look With</pre>
        <p class="display-4 text-muted">Premium Cosmetics & Jewelry</p>
        <button class="btn btn-danger mt-3 rounded-5 px-3"><a href="{{ route('shop.index') }}" class="text-decoration-none text-white fw-bold">Shop Now</a></button>
      </div>

      <div class="col-md-3 d-flex justify-content-center mb-4 mb-md-0">
        <img src="{{ asset('frontend_assets')}}/images/jewellery1.png" alt="Tree Plant" class="img-fluid" style="height: 300px; width: auto;">
      </div>
    </div>

    <!-- Content Section -->
    <div class="row">
      <!-- Left Box -->
      <div class="col-md-5 mb-4">
        <div class="box p-4 bg-white rounded-5 shadow-sm">
          <p class="text-center small">Discover the best in beauty and elegance with our exclusive collection of cosmetics and jewelry. Transform your look with high-quality products that suit every occasion.</p>
          <a href="#" class="d-block text-danger text-center mt-3">Learn more <i class="fa-solid fa-arrow-right"></i></a>
          <div class="row mt-4 text-center">
            <div class="col">
              <p class="display-4 font-weight-bold">200+<blockquote class="font-size-small">Beauty Products</blockquote></p>
            </div>
            <div class="col">
              <p class="display-4 font-weight-bold">1.2k<blockquote class="font-size-small">Happy Customers</blockquote></p>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Box with Image -->
      <div class="col-md-7">
        <div class="box2 rounded-5 overflow-hidden shadow-sm">
          <img src="https://d32ijn7u0aqfv4.cloudfront.net/wp/wp-content/uploads/raw/SORL0723007_1560x880_desktop.jpg" alt="Gardener" class="img-fluid w-100" style="height: 300px; object-fit: cover; object-position: top;">
        </div>
      </div>
    </div>
  </div>
</div>



<!-- 4 images section -->
<div class="container mt-5">
  <div class="row text-center">
    <div class="col-md-3 col-sm-6 mb-4">
      <img src="{{ asset('frontend_assets')}}/images/skincare.png" alt="Garden Care" class="img-fluid" style="max-height: 120px; width: auto;">
      <h4 class="mt-3">Skincare</h4>
      <p class="small">Find your perfect skincare routine with our range of products designed to enhance your natural beauty and keep your skin glowing.</p>
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
      <img src="{{ asset('frontend_assets')}}/images/makeup.png" alt="Plant Renovation" class="img-fluid" style="max-height: 120px; width: auto;">
      <h4 class="mt-3">Makeup</h4>
      <p class="small">Explore our collection of high-quality makeup products to create stunning looks for any occasion. From everyday essentials to glamorous items.</p>
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
      <img src="{{ asset('frontend_assets')}}/images/perfume.png" alt="Seed Supply" class="img-fluid" style="max-height: 120px; width: auto;">
      <h4 class="mt-3">Perfumes</h4>
      <p class="small">Discover a range of luxurious perfumes that leave a lasting impression. Find your signature scent with our curated selection.</p>
    </div>
    <div class="col-md-3 col-sm-6 mb-4">
      <img src="{{ asset('frontend_assets')}}/images/jewellery.png" alt="Watering Garden" class="img-fluid" style="max-height: 120px; width: auto;">
      <h4 class="mt-3">Jewelry</h4>
      <p class="small">Adorn yourself with exquisite jewelry pieces that add a touch of elegance and sophistication to any outfit. Discover our stunning collection.</p>
    </div>
  </div>
</div>


<div class="container my-5">
    <div class="row text-center">
        <h1>Latest Cosmetics</h1>
    </div>
    <div class="row py-5" id="products">
        @forelse ($cosmeticProducts as $product)
        <div class="col col-6 col-lg-3 col-xl-3">
            <div class="card h-100 border-0 text-center position-relative product-card overflow-hidden">
                <!-- Discount Tag -->
                @if ($product->discount_percentage)
                <span
                    class="badge bg-danger position-absolute top-0 start-0 m-3 rounded-5">{{ $product->discount_percentage }}%
                    OFF</span>
                @endif

                <!-- Image Container -->
                <div class="position-relative">
                    <img src="{{ asset('storage/' . $product->image_path) }}"
                        class="card-img-top rounded-5 transition border" alt="{{ $product->name }}"  style="height: 250px;">

                    <!-- Icon Container -->
                    <div
                        class="icon-container d-flex flex-column gap-2 position-absolute top-50 end-0 translate-middle-y pe-3">
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1"> <!-- Default quantity for product card -->
                            <button type="submit" class="btn btn-dark btn-sm rounded-circle mb-1 icon">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </form>
                        <a href="{{ route('shop.show', [$product->category->name, $product->category->type, $product->name]) }}"
                            class="btn btn-dark btn-sm rounded-circle mb-1 icon"><i class="fas fa-search"></i></a>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <h5 class="card-title fs-6 fw-bold"><a
                            href="{{ route('shop.show', [$product->category->name, $product->category->type, $product->name]) }}"
                            class='text-decoration-none text-dark fs-6 fw-bold'>{{ $product->name }}</a></h5>
                    <p class="card-text fw-bold">${{ number_format($product->price, 2) }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <p class="fw-bold fs-4">No Similar Products Found</p>
        </div>
        @endforelse
    </div>
</div>


<!-- Shop Category Section -->
<div class="container my-5 p-5 rounded-5 bg-danger-subtle" id="shopcat">
    <div class="text-center mb-4">
        <h1>Shop by Category</h1>
        <p class="lead">Explore our diverse range of categories to find the perfect cosmetics, jewelry, and accessories tailored to your needs.</p>
    </div>

    <div class="row text-center">
        <div class="col-md-6 col-lg-3 mb-4">
            <a href="{{ route('shop.index', ['sub_category' => 1]) }}" class="d-block text-decoration-none text-black">
                <div class="position-relative">
                    <div class="bg-secondary rounded-3 overflow-hidden" style="background-image: url('https://conaturalintl.com/cdn/shop/collections/skin_care.jpg?v=1614668308'); background-size: cover; background-position: center; height: 230px;"></div>
                    <h5 class="mt-2">Skincare</h5>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <a href="{{ route('shop.index', ['sub_category' => 4]) }}" class="d-block text-decoration-none text-black">
                <div class="position-relative">
                    <div class="bg-secondary rounded-3 overflow-hidden" style="background-image: url('https://cdn.mos.cms.futurecdn.net/whowhatwear/posts/287142/affordable-products-makeup-artists-use-287142-1588854640963-square.jpg'); background-size: cover; background-position: center; height: 230px;"></div>
                    <h5 class="mt-2">Makeup</h5>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <a href="{{ route('shop.index', ['sub_category' => 8]) }}" class="d-block text-decoration-none text-black">
                <div class="position-relative">
                    <div class="bg-secondary rounded-3 overflow-hidden" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0Fa8nlBLAiofgMLJr9z0HQDW_GZ-vG3mEnQ&s'); background-size: cover; background-position: center; height: 230px;"></div>
                    <h5 class="mt-2">Bracelets</h5>
                </div>
            </a>
        </div>

        <div class="col-md-6 col-lg-3 mb-4">
            <a href="{{ route('shop.index', ['sub_category' => 9]) }}" class="d-block text-decoration-none text-black">
                <div class="position-relative">
                    <div class="bg-secondary rounded-3 overflow-hidden" style="background-image: url('https://m.media-amazon.com/images/I/712FpdCYeEL._AC_SL1500_.jpg'); background-size: cover; background-position: center; height: 230px;"></div>
                    <h5 class="mt-2">Rings</h5>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row text-center">
        <h1>Jewellery</h1>
    </div>
    <div class="row py-5" id="products">
        @forelse ($jewelleryProducts as $product)
        <div class="col col-6 col-lg-3 col-xl-3">
            <div class="card h-100 border-0 text-center position-relative product-card overflow-hidden">
                <!-- Discount Tag -->
                @if ($product->discount_percentage)
                <span
                    class="badge bg-danger position-absolute top-0 start-0 m-3 rounded-5">{{ $product->discount_percentage }}%
                    OFF</span>
                @endif

                <!-- Image Container -->
                <div class="position-relative">
                    <img src="{{ asset('storage/' . $product->image_path) }}"
                        class="card-img-top rounded-5 transition border" alt="{{ $product->name }}" style="height: 250px;">

                    <!-- Icon Container -->
                    <div
                        class="icon-container d-flex flex-column gap-2 position-absolute top-50 end-0 translate-middle-y pe-3">
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1"> <!-- Default quantity for product card -->
                            <button type="submit" class="btn btn-dark btn-sm rounded-circle mb-1 icon">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </form>
                        <a href="{{ route('shop.show', [$product->category->name, $product->category->type, $product->name]) }}"
                            class="btn btn-dark btn-sm rounded-circle mb-1 icon"><i class="fas fa-search"></i></a>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <h5 class="card-title fs-6 fw-bold"><a
                            href="{{ route('shop.show', [$product->category->name, $product->category->type, $product->name]) }}"
                            class='text-decoration-none text-dark fs-6 fw-bold'>{{ $product->name }}</a></h5>
                    <p class="card-text fw-bold">${{ number_format($product->price, 2) }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <p class="fw-bold fs-4">No Similar Products Found</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
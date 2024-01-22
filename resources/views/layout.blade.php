<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        {{-- style --}}
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        
        {{-- bootstrap bundle --}}
        <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        {{-- Moving to cart page --}}
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>


    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="dropdown">
                        <button type="button" class="btn btn-primary " data-toggle="dropdown">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span class="badge">{{ count((array) session('cart')) }}</span>
                        </button>

                        <div class="dropdown-menu">
                            <div class="row total-header-section">
                                @php $total = 0 @endphp
                                @foreach((array) session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                @endforeach
                                <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                    <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                                </div>
                            </div>
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    <div class="row cart-detail">
                                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                            <img src="{{ asset('images') }}/{{ $details['photo'] }}" />
                                        </div>
                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                            <p>{{ $details['product_name'] }}</p>
                                            <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                    <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <div class="container">

            @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    @endif

            @yield('content')
        </div>
        @yield('scripts')
    </body>
</html>

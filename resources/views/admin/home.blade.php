
@extends('layout.app')

@section('title', 'Dashboard')

@section('content')
            <!-- MAIN CONTENT-->
            
            3<section class="section-products">
		<div class="container">
				<div class="row justify-content-center text-center">
						<div class="col-md-8 col-lg-6">
								<div class="header">
										<h3>Featured Product</h3>
										<h2>Popular Products</h2>
								</div>
						</div>
				</div>
				<div class="row">
                @foreach($products as $product)
						<!-- Single Product -->
						<div class="col-md-6 col-lg-4 col-xl-3">
								<div id="product-1" class="single-product">
										<div class="part-1">
                                            <img src="images/{{$product->image}}" style="">
												<ul>
														<li><a href="#"><i class="fas fa-shopping-cart"></i></a></li>
														<li><a href="#"><i class="fas fa-heart"></i></a></li>
														<li><a href="#"><i class="fas fa-plus"></i></a></li>
														<li><a href="#"><i class="fas fa-expand"></i></a></li>
												</ul>
										</div>
										<div class="part-2">
												<h3 class="product-title"><strong>Title: </strong>{{$product->name}}</h3>
												<span class="">Categorie: {{$product->productCategorie}}</span>
												<p class="">description: {{$product->description}}</p>
												<h4 class="product-price">{{$product->price}}$</h4>
										</div>
								</div>
						</div>
                        @endforeach
				</div>
		</div>
</section>
            
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
@endsection


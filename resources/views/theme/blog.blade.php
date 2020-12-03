@extends('website/layout')
@section('title')
Blog
@endsection

@section('content')


<main class="main">
<nav aria-label="breadcrumb" class="breadcrumb-nav">
<div class="container">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index-2.html"><i class="icon-home"></i></a></li>
<li class="breadcrumb-item active" aria-current="page">{{ __('Blog') }}</li>
</ol>
</div><!-- End .container -->
</nav>

<div class="container">
<div class="row">
<div class="col-lg-9">
<article class="entry">
<div class="entry-media">
<a href="single.html">
<img src="/assets/front/images/blog/post-1.jpg" alt="Post">
</a>
</div><!-- End .entry-media -->

<div class="entry-body">
<div class="entry-date">
<span class="day">29</span>
<span class="month">Jun</span>
</div><!-- End .entry-date -->

<h2 class="entry-title">
<a href="single.html">Post Format - Image</a>
</h2>

<div class="entry-content">
<p>Euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel, congue sed ligula.</p>

<a href="single.html" class="read-more">{{ __('Read More ') }}<i class="icon-angle-double-right"></i></a>
</div><!-- End .entry-content -->

<div class="entry-meta">
<span><i class="icon-calendar"></i>June 29, 2018</span>
<span><i class="icon-user"></i>{{ __('By') }} <a href="#">Admin</a></span>
<span><i class="icon-folder-open"></i>
<a href="#">Haircuts & hairstyles</a>,
<a href="#">Fashion trends</a>,
<a href="#">Accessories</a>
</span>
</div><!-- End .entry-meta -->
</div><!-- End .entry-body -->
</article><!-- End .entry -->




<nav class="toolbox toolbox-pagination">
<ul class="pagination">
<li class="page-item disabled">
<a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
</li>
<li class="page-item active">
<a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
</li>
<li class="page-item"><a class="page-link" href="#">2</a></li>
<li class="page-item"><a class="page-link" href="#">3</a></li>
<li class="page-item"><a class="page-link" href="#">4</a></li>
<li class="page-item"><span>...</span></li>
<li class="page-item"><a class="page-link" href="#">15</a></li>
<li class="page-item">
<a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
</li>
</ul>
</nav>
</div><!-- End .col-lg-9 -->

@include(\System::$ACTIVE_THEME_PATH.'/elements.blogsidbar')
</div><!-- End .row -->
</div><!-- End .container -->

<div class="mb-6"></div><!-- margin -->
</main><!-- End .main -->




@endsection
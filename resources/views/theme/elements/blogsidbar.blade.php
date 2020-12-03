<aside class="sidebar col-lg-3">
<div class="sidebar-wrapper">
<div class="widget widget-search">
<form role="search" method="get" class="search-form" action="{{ route('search_blog') }}">
<input type="search" class="form-control" placeholder="{{ __('Search posts here...') }}" name="s" required>
<button type="submit" class="search-submit" title="Search">
<i class="icon-search"></i>
<span class="sr-only">{{ __('Search') }}</span>
</button>
</form>
</div><!-- End .widget -->

<div class="widget widget-categories">
<h4 class="widget-title">{{ __('Blog Categories') }}</h4>

<ul class="list">
<li><a href="#">All about clothing</a></li>

</ul>
</div><!-- End .widget -->

<div class="widget">
<h4 class="widget-title">{{ __('Recent Posts') }}</h4>

<ul class="simple-entry-list">
<li>
<div class="entry-media">
<a href="single.html">
<img src="/assets/front/images/blog/widget/post-1.jpg" alt="Post">
</a>
</div><!-- End .entry-media -->
<div class="entry-info">
<a href="single.html">Post Format - Video</a>
<div class="entry-meta">
April 08, 2018
</div><!-- End .entry-meta -->
</div><!-- End .entry-info -->
</li>
</ul>
</div><!-- End .widget -->



<div class="widget widget_compare">
<h4 class="widget-title">Compare Products</h4>

<p>You have no items to compare.</p>
</div><!-- End .widget -->
</div><!-- End .sidebar-wrapper -->
</aside><!-- End .col-lg-3 -->
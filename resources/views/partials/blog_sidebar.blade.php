<div class="col-lg-4">
    <div class="blog_right_sidebar">
       <aside class="single_sidebar_widget search_widget">
          <form action="{{ route('blog.search') }}" method="GET">
             <div class="form-group">
                <div class="input-group mb-3">
                   <input type="text" name="search" class="form-control" placeholder='Search Keyword'
                      onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                   <div class="input-group-append">
                      <button class="btn" type="button"><i class="ti-search"></i></button>
                   </div>
                </div>
             </div>
             <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                type="submit">Search</button>
          </form>
       </aside>
       <aside class="single_sidebar_widget popular_post_widget">
          <h3 class="widget_title">Recent Post</h3>
          @foreach ($recentPosts as $lPost)
            <div class="media post_item">
                <img src="{{ asset($lPost->image) }}" width="150px" alt="{{ $lPost->title }}">
                <div class="media-body">
                    <a href="{{ route('blog.post', $lPost->slug) }}">
                    <h3>{{ substr($lPost->title, 0, 20) }}</h3>
                    </a>
                    <p>{{ $lPost->created_at->diffForHumans() }}</p>
                </div>
            </div>
          @endforeach
       </aside>
    </div>
 </div>

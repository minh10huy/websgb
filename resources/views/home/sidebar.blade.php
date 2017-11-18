<div class="col-md-4 extra-gutter-left">
  <!-- Search -->
  <div class="widget">
    <h4>Tìm Kiếm</h4>
    <div class="search">
      <form role="search" method="get" id="searchform" action="{{route('search')}}">
        <div class="input"><input class="search-field" type="text" name="key" placeholder="Tìm Kiếm" value="" /></div>
      </form>
    </div>
  </div>

  <!-- Tabs -->
  <div class="widget">

    <ul class="tabs-nav blog">
      <li class="active"><a href="#tab1">Xem nhiều</a></li>
      <li><a href="#tab2">Liên quan</a></li>
    </ul>

    <!-- Tabs Content -->
    <div class="tabs-container">

      <div class="tab-content" id="tab1">

        <!-- Recent Posts -->
        <ul class="widget-tabs">
          <?php $path = 'public/upload/news/'?>

          @foreach ($newscv as $newv)
            <!-- Post #1 -->
            <li>
              <div class="widget-thumb">
                <a href="blog-post-page.html"><img src="{{asset($path.date('d-m-Y', strtotime($newv->News_Date)).'/'.$newv->News_Image)}}" alt="" /></a>
              </div>

              <div class="widget-text">
                <h5><a href="{{route('tinchitiet',$newv->News_ID)}}">{{$newv->News_Title}}</a></h5>
                <span>{{date('d-m-Y', strtotime($newv->News_Date))}}</span>
                <!-- <span>Lượt xem: {{$newv->News_CountView	}}</span> -->
              </div>
              <div class="clearfix"></div>
            </li>
            @endforeach
        </ul>

      </div>

      <div class="tab-content" id="tab2">

        <!-- Recent Posts -->
        <ul class="widget-tabs">

          @foreach ($newsrl as $newlq)
            <!-- Post #1 -->
            <li>
              <div class="widget-thumb">
                <a href="blog-post-page.html"><img src="{{asset($path.date('d-m-Y', strtotime($newlq->News_Date)).'/'.$newlq->News_Image)}}" alt="" /></a>
              </div>
              <div class="widget-text">
                <h5><a href="{{route('tinchitiet',$newlq->News_ID)}}">{{$newlq->News_Title}}</a></h5>
                <span>{{date('d-m-Y', strtotime($newlq->News_Date))}}</span>
              </div>
              <div class="clearfix"></div>
            </li>
          @endforeach
        </ul>
      </div>

    </div>
  </div>

  <div class="clearfix"></div>
  <div class="margin-bottom-40"></div>
</div>


<!-- Navigation
================================================== -->
<div class="container">
	<div class="row">
	<div class="col-md-12">

		<!-- Mobile Navigation -->
		<div class="menu-responsive">
			<i class="fa fa-reorder menu-trigger"></i>
			<i class="fa fa-search search-trigger"></i>
    	<form action="#" method="get" class="responsive-search" />
    		<input type="text" onblur="if(this.value=='')this.value='to search type and hit enter';" onfocus="if(this.value=='Tìm kiếm')this.value='';" value="Tìm kiếm" />
    	</form>
		</div>

		<!-- Main Navigation -->
		<nav id="navigation">
			<!-- Search Form -->
			<div class="search-container">
		      	<form action="{{route('search')}}" method="get" />
		      		<input type="text" name="key" id="s" onblur="if(this.value=='')this.value='to search type and hit enter';" onfocus="if(this.value=='Tìm kiếm')this.value='';" value="Tìm kiếm" />
		      	</form>
		      	<div class="close-search"><a class="fa fa-times" href="#"></a></div>
			</div>

			<ul class="menu" id="responsive">
				@foreach ($Cate as $item)
					@if($item->Cat_id == 1)
					<li class="dropdown"><a href="{{route('trangchu')}}">{{$item->Cat_name}}</a>
					@else
					<li class="dropdown"><a href="{{route('loai',['id' => str_slug($item->Cat_name)]) }}">{{$item->Cat_name}}</a>
					@endif
						<!-- <ul>
								@foreach ($SubCate as $subitem)
									@if($subitem->Cat_Sub_ID == $item->Cat_id)
										<li><a href="{{route('loai', ['id' => $subitem->Sub_ID.'/'.str_slug($subitem->Sub_Name)]) }}">{{$subitem->Sub_Name}}</a></li>
									@endif
								@endforeach
						</ul> -->
					</li>
				@endforeach
			</ul>

		</nav><!--end navigator-->
	</div>
	</div>
</div>
<div class="clearfix"></div>

<!-- Header
================================================== -->

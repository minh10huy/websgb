<script type="text/javascript" src="{{asset('public/home/js/charts.js')}}"></script>
<script type="text/javascript" src="{{asset('public/home/js/pie.js')}}"></script>

@extends('master')
@section('content')

<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

					<h2>Khảo Sát</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs">
					<ul>
						<li><a href="{{route('trangchu')}}">Trang chủ</a></li>
						<li><a href="#">Khảo sát</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
<!-- Content
================================================== -->
<div class="container">
    <div class="row">

			<div class="col-md-12">
				 <div class="poll-container">

						<div class="panel panel-primary">
							<div class="panel-heading">
								{{$ques->Ques_Title}}
							</div>
							
							<div class="panel-body">
									<div id="chartdiv" style="width: 100%; height: 400px;"></div>
									<a href="{{route('khaosat_list')}}" class="button small border"><i class="fa fa-long-arrow-left"></i> Quay lại </a>
							</div><!--panel-body-->
					</div><!--panel-->

					</form><!--end form-->
				</div><!--poll-container-->
			</div><!--col-md-12-->

    </div>
</div>

@endsection


<script>
	var chart;
	var legend;
  var chartData = <?php echo $jsdata; ?>

	AmCharts.ready(function () {
	    // PIE CHART
	    chart = new AmCharts.AmPieChart();
	    chart.dataProvider = chartData;
	    chart.titleField = "Ans_Title";
	    chart.valueField = "Ans_count";
	    chart.outlineColor = "#FFFFFF";
	    chart.outlineAlpha = 0.8;
	    chart.outlineThickness = 2;
	    chart.balloonText = "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>";
	    chart.depth3D = 15;
	    chart.angle = 30;

	    // WRITE
	    chart.write("chartdiv");
	});
</script>

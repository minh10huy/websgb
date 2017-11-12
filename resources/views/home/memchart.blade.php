@extends('master')
@section('content')

<script src="{{asset('public/home/js/orgchart.js')}}" ></script>

<style type="text/css">
		html, body {
					 margin: 0px;
					 padding: 0px;
					 width: 100%;
					 height: 100%;
					 /*overflow: hidden;*/
			 }

		 body {
				margin: 0px;
				padding: 0px;
				width: 100%;
				height: 100%;
				overflow: hidden;
		}

		#people {
			width: 100%;
			height: 100%;
		}

		.myCustomTheme-box{
			fill: #FFFFFF;
    	stroke: #DDDAB9;
		}
</style>


<div class="col-md-12">

<div id="people"></div>
<table id="orgChartData">
    <tr>
        <th>id</th>
        <th>parent id</th>
        <th>name</th>
        <th>title</th>
        <th>image</th>
    </tr>
    @foreach($memchart as $r)
      <tr>
          <td>{{$r->Employee_ID}}</td>
          <td>{{$r->Employee_Parent_ID}}</td>
          <td style="font-size:10px">{{$r->Employee_Name}}</td>
          <td>{{$r->Position_Name}}</td>
          <td>public/upload/member/{{$r->Employee_Avatar}}</td>
      </tr>
    @endforeach

</table>

</div>

<script type="text/javascript">
			getOrgChart.themes.myCustomTheme =
        {
            size: [270, 400],
            toolbarHeight: 46,
            textPoints: [
                { x: 130, y: 50, width: 250 },
                { x: 130, y: 90, width: 250 }
            ],
            textPointsNoImage: [
                { x: 130, y: 50, width: 250 },
                { x: 130, y: 90, width: 250 }
            ],
            expandCollapseBtnRadius: 10,
            defs: '<filter id="f1" x="0" y="0" width="200%" height="200%"><feOffset result="offOut" in="SourceAlpha" dx="5" dy="5" /><feGaussianBlur result="blurOut" in="offOut" stdDeviation="5" /><feBlend in="SourceGraphic" in2="blurOut" mode="normal" /></filter>',
            box: '<rect x="0" y="0" height="400" width="270" rx="10" ry="10" class="myCustomTheme-box" filter="url(#f1)"  />',
            text: '<text text-anchor="middle" width="[width]" class="get-text get-text-[index]" x="[x]" y="[y]">[text]</text>',
            image: '<clipPath id="getMonicaClip"><circle cx="135" cy="255" r="85" /></clipPath><image preserveAspectRatio="xMidYMid slice" clip-path="url(#)" xlink:href="[href]" x="50" y="150" height="210" width="170"/>'

        };

        var peopleElement = document.getElementById("people");
        var orgChart = new getOrgChart(peopleElement, {
            theme: "myCustomTheme",
            primaryFields: ["name", "title", "position"],
            photoFields: ["image"],
            enableGridView: true,
						enableEdit: false,
						enableDetailsView: false,
						renderNodeEvent: renderNodHandler,
            dataSource: document.getElementById("orgChartData")
        });

				function renderNodHandler(sender, args) {
                for (var i = 0; i < args.content.length; i++) {
                    if (args.content[i].indexOf("[reporters]") != -1) {
                        args.content[i] = args.content[i].replace("[reporters]", args.node.children.length);
                    }
                }
            }


</script>

@endsection

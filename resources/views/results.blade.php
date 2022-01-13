@extends('layout.app')
<style>
	#container {
  width: 100px;
  height: max-content;
  position: absolute;
  top: 0;
  right: 0;

  z-index: 10;
}
p{
	font-size: x-small !important;
	text-align: justify;
}
a{
	color:#262626 !important;
}
</style>
@section('content')
    	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/learn2.png" alt="IMG">
				</div>
				<form class="login100-form validate-form" action="/">
					<div class="row" style="text-align: center">
					 <div class="col-12" style="text-align: center"><img src="images/M1.png" alt="مقبول" style="width:70px;height:70px;border-radius: 50%;margin-bottom:5px"><p style="font-size:small !important;text-align:center">مقبول</p></div> 
					</div>
					<br>
				<table class="table table-striped table-bordered table-hover" id="example2" style="font-size:x-small">
					<thead>
						<tr style="background-color: lightblue">
						<th scope="row" style="text-align: center">#</th>
						<th scope="row" style="text-align: center">الكلية</th>
						<th scope="row" style="text-align: center">الجامعة</th>
						<th scope="row" style="text-align: center">النسبة</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($weak as $index => $weak)
							<tr style="background-color: rgb(252, 183, 183)">
							<td scope="row">{{$index+1}}</td>
							<td style="text-align: center"><a href="#" onclick='about("{{$weak->name}}",
							"{!! $weak->about !!}","{{$weak->website}}",
							"{{$weak->img}}")' style="font-size: x-small">{{$weak->name}}</a></td>

							<td style="text-align: center"><a href="#" onclick='about("{{$weak->university->name}}",
							"{!! $weak->university->about !!}","{{$weak->university->website}}",
							"{{$weak->university->img}}")' style="font-size: x-small">{{$weak->university->name}}</a></td>
							<td>{{$weak->percent}}</td>
							</tr>
						@endforeach	
						@foreach ($medium as $index2 => $medium)
							<tr style="background-color: rgb(250, 248, 248)">
							@if($weak->count() > 0)
							<td scope="row">{{$index + $index2 + 2}}</td>
							@else 
							<td scope="row">{{$index2 + 1}}</td>
							@endif
							<td style="text-align: center"><a href="#" onclick='about("{{$medium->name}}",
							"{!! $medium->about !!}","{{$medium->website}}",
							"{{$medium->img}}")' style="font-size: x-small">{{$medium->name}}</a></td>

							<td style="text-align: center"><a href="#" onclick='about("{{$medium->university->name}}",
							"{!! $medium->university->about !!}","{{$medium->university->website}}",
							"{{$medium->university->img}}")' style="font-size: x-small">{{$medium->university->name}}</a></td>
							<td>{{$medium->percent}}</td>
							</tr>
						@endforeach	
						@foreach ($strong as $index3 => $strong)
							<tr style="background-color: rgb(164, 248, 178)">
							@if($weak->count() > 0 && $medium->count() > 0)
							<td scope="row">{{$index + $index2 + $index3 + 3}}</td>
							@elseif($medium->count() > 0)
							<td scope="row">{{$index2 + $index3 + 2}}</td>
							@else
							<td scope="row">{{$index3 + 1}}</td>
							@endif
							<td style="text-align: center"><a href="#" onclick='about("{{$strong->name}}",
							"{!! $strong->about !!}","{{$strong->website}}",
							"{{$strong->img}}")' style="font-size: x-small">{{$strong->name}}</a></td>

							<td style="text-align: center"><a href="#" onclick='about("{{$strong->university->name}}",
							"{!! $strong->university->about !!}","{{$strong->university->website}}",
							"{{$strong->university->img}}")' style="font-size: x-small">{{$strong->university->name}}</a></td>

							<td>{{$strong->percent}}</td>
							</tr>
						@endforeach						
					</tbody>
					</table>
					<div class="container-login100-form-btn">
					<button class="login100-form-btn" style="font-family: Poppins-Regular;">
						الرجوع للرئيسية
					</button>
					</div>
					
					<a href="https://docs.google.com/forms/d/e/1FAIpQLSeHjjYwn7QrI4ax9q19Fa_7QoHKIQ8utSDUOpUgh5IBLFVl0g/viewform?usp=sf_link"
					class="login100-form-btn" style="font-family: Poppins-Regular;color:white !important;margin-top:5px">
						اضافة تعليق
					</a>
					<a href="https://docs.google.com/forms/d/e/1FAIpQLScuLr-PvypFsMWRvsYcw1Kxi_TJG282fkjVbm3kN-3dx6pNVw/viewform?usp=sf_link"
					class="login100-form-btn" style="font-family: Poppins-Regular;color:white !important;margin-top:5px">
						اضافة معلومات عن كلية
					</a>
					<div class="card" id="container" style="width: 18rem;display:none">
					<img id="img" src="..." class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title" id="university">الاسم</h5>
						<p class="card-text" style="position: inherit;font-size:11px !important" id="data">حول </p>
						<a href="#" class="btn btn-primary" id="link" style="width: 100%;margin-top:10px">انتقل للموقع </a>
						
						<a href="#" onclick="clos()" class="btn btn-light" style="width: 100%;margin-top:10px">اغلاق</a>
					</div>
					</div>
				</form>


			</div>
		</div>
	</div>
<script>
	
	function about(name,newdata,url,newimg) {
	
    var details = document.getElementById('container');
	var university = document.getElementById('university');
	var data = document.getElementById('data');
	var link = document.getElementById('link');
	var img = document.getElementById('img');
		
		details.style.display = "block";
		university.innerText = name;
		data.innerHTML = newdata;
		data.style.fontSize = '11px !important';
		link.href = url;
			if(url === ""){
				link.style.display = "none";
			}else{
				link.style.display = "block";
			}
		img.src='img/universities/'+newimg;

	}

	function clos() {
		var details = document.getElementById('container');
		details.style.display = "none";
	}
</script>	
@endsection

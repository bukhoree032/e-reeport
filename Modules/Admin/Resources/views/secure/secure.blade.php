@extends('layouts/contentNavbarLayout')

@section('title', 'Evalocal')

@section('content')
<?php
if(isset($_GET['act'])){
	if($_GET['act']== 'excel'){
		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=สภาสันติสุขข้อมูลกิจกรรม.xls");
		header("Pragma: no-cache");
		header("Expires: 0");
	}
}
?>
<p>
  <a href="?act=excel" class="btn btn-success"> Excel  <i class="fa fa-download"></i></a>
</p>
{{-- <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">ข้อมูลการประชุม </span>
</h4> --}}

<form action="{{ route('secure.search') }}" method="post"enctype="multipart/form-data">
  @csrf
  {{ method_field('PUT') }}
  <div class="row">

    <div class="col-md-3">
      <label for="cars">ประจำเดือน:</label>

      <select name="cars" id="cars" class="form-control">
        <option value="2023-6">มิถุนายน 2566</option>
        <option value="2023-7">กรกฎาคม 2566</option>
        <option value="2023-8">สิงหาคม 2566</option>
        <option value="2023-9">กันยายน 2566</option>
        <option value="2023-10">ตุลาคม 2566</option>
        <option value="2023-11">พฤศจิกายน 2566</option>
      </select>
    </div>

      <div class="col-md-1">
          <button style="margin-top: 27px" type="submit" class="form-control btn btn-sm btn-info">ค้นหา</button>
      </div>
  </div>
</form>

<br>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nvd3/1.1.14-beta/nv.d3.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.4.4/d3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/nvd3/1.1.14-beta/nv.d3.js"></script>

<style>
#chart {
  height: 300px;
  width: 330px;
  float: left;
}
#unrest {
  height: 300px;
  width: 330px;
  float: left;
}
#guard {
  height: 300px;
  width: 330px;
  float: left;
}
#covid {
  height: 300px;
  width: 330px;
  float: left;
}
#picture_meet {
  height: 300px;
  width: 330px;
  float: left;
}
</style>


<div class="row">
  <div class="col-lg-12">
      <div class="content">
        <div id="chart">
          <h4>ยาเสพติด</h4>
          <svg></svg></svg>
        </div>
        
        <div id="unrest">
          <h4>ความไม่สงบ</h4>
          <svg></svg></svg>
        </div>
        
        <div id="guard">
          <h4>เวรยาม</h4>
          <svg></svg></svg>
        </div>
        
        <div id="covid">
          <br>
          <br>
          <h4>อนามัย</h4>
          <svg></svg></svg>
        </div>
        
        <div id="picture_meet">
          <br>
          <br>
          <h4>รูปกิจกรรม</h4>
          <svg></svg></svg>
        </div>
      </div>
  </div>
</div>
<script>
  //Regular pie chart example
  nv.addGraph(function() {
     var chart = nv.models.pieChart()
         .x(function(d) { return d.label })
         .y(function(d) { return d.value })
         .showLabels(true)
         .valueFormat(d3.format(",.0f"))
         .tooltipContent(function(key, y, e, graph) {return '<span>' + y + ' ตำบล' + '</span>';});

       d3.select("#chart svg")
           .datum(pieData())
           .transition().duration(350)
           .call(chart);

     return chart;
   });


   //chart example data.
   function pieData() {
     return  [
         {
           "label": "นราธิวาส",
           "value" : {{$meet['นราธิวาส']['narcotics']}}
         } ,
         {
           "label": "ปัตตานี",
           "value" : {{$meet['ปัตตานี']['narcotics']}}
         } ,
         {
           "label": "ยะลา",
           "value" : {{$meet['ยะลา']['narcotics']}}
         } ,
         {
           "label": "สงขลา",
           "value" : {{$meet['สงขลา']['narcotics']}}
         }
       ];
   }

   
  nv.addGraph(function() {
     var chart = nv.models.pieChart()
         .x(function(d) { return d.label })
         .y(function(d) { return d.value })
         .showLabels(true)
         .valueFormat(d3.format(",.0f"))
         .tooltipContent(function(key, y, e, graph) {return '<span>' + y + ' ตำบล' + '</span>';});

       d3.select("#unrest svg")
           .datum(unrest())
           .transition().duration(350)
           .call(chart);

     return chart;
   });

   //chart example data.
   function unrest() {
     return  [
         {
           "label": "นราธิวาส",
           "value" : {{$meet['นราธิวาส']['unrest']}}
         } ,
         {
           "label": "ปัตตานี",
           "value" : {{$meet['ปัตตานี']['unrest']}}
         } ,
         {
           "label": "ยะลา",
           "value" : {{$meet['ยะลา']['unrest']}}
         } ,
         {
           "label": "สงขลา",
           "value" : {{$meet['สงขลา']['unrest']}}
         }
       ];
   }

   
nv.addGraph(function() {
   var chart = nv.models.pieChart()
       .x(function(d) { return d.label })
       .y(function(d) { return d.value })
       .showLabels(true)
       .valueFormat(d3.format(",.0f"))
       .tooltipContent(function(key, y, e, graph) {return '<span>' + y + ' ตำบล' + '</span>';});

     d3.select("#guard svg")
         .datum(guard())
         .transition().duration(350)
         .call(chart);

   return chart;
 });

 //chart example data.
 function guard() {
   return  [
       {
         "label": "นราธิวาส",
         "value" : {{$meet['นราธิวาส']['guard']}}
       } ,
       {
         "label": "ปัตตานี",
         "value" : {{$meet['ปัตตานี']['guard']}}
       } ,
       {
         "label": "ยะลา",
         "value" : {{$meet['ยะลา']['guard']}}
       } ,
       {
         "label": "สงขลา",
         "value" : {{$meet['สงขลา']['guard']}}
       }
     ];
 }

   
nv.addGraph(function() {
   var chart = nv.models.pieChart()
       .x(function(d) { return d.label })
       .y(function(d) { return d.value })
       .showLabels(true)
       .valueFormat(d3.format(",.0f"))
       .tooltipContent(function(key, y, e, graph) {return '<span>' + y + ' ตำบล' + '</span>';});

     d3.select("#covid svg")
         .datum(covid())
         .transition().duration(350)
         .call(chart);

   return chart;
 });

 //chart example data.
 function covid() {
   return  [
       {
         "label": "นราธิวาส",
         "value" : {{$meet['นราธิวาส']['covid']}}
       } ,
       {
         "label": "ปัตตานี",
         "value" : {{$meet['ปัตตานี']['covid']}}
       } ,
       {
         "label": "ยะลา",
         "value" : {{$meet['ยะลา']['covid']}}
       } ,
       {
         "label": "สงขลา",
         "value" : {{$meet['สงขลา']['covid']}}
       }
     ];
 }
 
   
nv.addGraph(function() {
   var chart = nv.models.pieChart()
       .x(function(d) { return d.label })
       .y(function(d) { return d.value })
       .showLabels(true)
       .valueFormat(d3.format(",.0f"))
       .tooltipContent(function(key, y, e, graph) {return '<span>' + y + ' ตำบล' + '</span>';});

     d3.select("#picture_meet svg")
         .datum(picture_meet())
         .transition().duration(350)
         .call(chart);

   return chart;
 });

 //chart example data.
 function picture_meet() {
   return  [
       {
         "label": "นราธิวาส",
         "value" : {{$meet['นราธิวาส']['picture_meet']}}
       } ,
       {
         "label": "ปัตตานี",
         "value" : {{$meet['ปัตตานี']['picture_meet']}}
       } ,
       {
         "label": "ยะลา",
         "value" : {{$meet['ยะลา']['picture_meet']}}
       } ,
       {
         "label": "สงขลา",
         "value" : {{$meet['สงขลา']['picture_meet']}}
       }
     ];
 }
</script>






<br>
<br>
<br>
<br>


<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <h5 class="card-header">บันทึกข้อมูลการประชุม  )</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>จังหวัด</th>
              <th>อำเภอ</th>
              <th>ตำบล</th>
              <th>งบ</th>
              
              <th></th>

              <th>ยาเสพติด6</th>
              <th>ยาเสพติด7</th>
              <th>ยาเสพติด8</th>
              <th>ยาเสพติด9</th>
              <th>ยาเสพติด10</th>
              
              <th></th>
              
              <th>ความไม่สงบ6</th>
              <th>ความไม่สงบ7</th>
              <th>ความไม่สงบ8</th>
              <th>ความไม่สงบ9</th>
              <th>ความไม่สงบ10</th>

              <th></th>
              
              <th>เวรยาม6</th>
              <th>เวรยาม7</th>
              <th>เวรยาม8</th>
              <th>เวรยาม9</th>
              <th>เวรยาม10</th>

              <th></th>
              
              <th>อนามัย6</th>
              <th>อนามัย7</th>
              <th>อนามัย8</th>
              <th>อนามัย9</th>
              <th>อนามัย10</th>

              <th></th>
              
              <th>รูปประกอบ6</th>
              <th>รูปประกอบ7</th>
              <th>รูปประกอบ8</th>
              <th>รูปประกอบ9</th>
              <th>รูปประกอบ10</th>
            </tr> 
          </thead>
          <tbody class="table-border-bottom-0">
          </tbody>
        </table>
      </div>
      
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->

  <!--/ Basic Bootstrap Table -->
</div>
@endsection

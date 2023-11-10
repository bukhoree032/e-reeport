@extends('layouts/contentNavbarLayout')

@section('title', 'Evalocal')

@section('content')

<a href="{{ route('secure.excell','2023-10') }}" class="btn btn-success">Excel</a>
{{-- <h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">ข้อมูลการประชุม </span>
</h4> --}}

<br>
<br>
<form action="{{ route('secure.search') }}" method="post"enctype="multipart/form-data">
  @csrf
  {{ method_field('PUT') }}
  <div class="row">

    <div class="col-md-3">
      <label for="cars">ประจำเดือน:</label>
{{-- @dd($time) --}}
      <select name="cars" id="cars" class="form-control">
        <option value="2023-6" @if($time == '2023-6') selected @endif>มิถุนายน 2566</option>
        <option value="2023-7" @if($time == '2023-7') selected @endif>กรกฎาคม 2566</option>
        <option value="2023-8" @if($time == '2023-8') selected @endif>สิงหาคม 2566</option>
        <option value="2023-9" @if($time == '2023-9') selected @endif>กันยายน 2566</option>
        <option value="2023-10" @if($time == '2023-10') selected @endif>ตุลาคม 2566</option>
        <option value="2023-11" @if($time == '2023-11') selected @endif>พฤศจิกายน 2566</option>
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
      <h5 class="card-header">บันทึกข้อมูลการประชุม</h5>
      <div class="table-responsive text-nowrap">
        <table class="table">
          <thead>
            <tr>
              <th>จังหวัด</th>
              <th>อำเภอ</th>
              <th>ตำบล</th>
              <th>งบประมาณ</th>

              <th>ยาเสพติด</th>
              <th>ความไม่สงบ</th>
              <th>เวรยาม</th>
              <th>อนามัย</th>
              <th>รูปประกอบ</th>
            </tr> 
          </thead>
          <tbody class="table-border-bottom-0">
              @foreach ($data_meet as $item =>$value)
                <tr>
                  {{-- <td>{{ $value->date }}</td> --}}
                  <td>{{ $value->provinces }}</td>
                  <td>{{ $value->amphures }}</td>
                  <td>{{ $value->districts }}</td>
                  @if($value->status == 1)
                    <td>300,000</td>
                  @else
                    <td>1,000,000</td>
                  @endif
                  <td>{{ $value->narcotics }}</td>
                  <td>{{ $value->unrest }}</td>
                  <td>{{ $value->guard }}</td>
                  <td>{{ $value->covid }}</td>
                  <td>{{ $value->picture_meet }}</td>
                <tr>
                  
              @endforeach
          </tbody>
        </table>
      </div>
      
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->

  <!--/ Basic Bootstrap Table -->
</div>
@endsection

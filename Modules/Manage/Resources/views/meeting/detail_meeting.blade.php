<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
		body {
		  font-family: 'Kanit', sans-serif;
		}
		h1 {
		  font-family: 'Kanit', sans-serif;
		}
    @media print {
      .no-print {
        visibility: hidden;
        display: none;
      }
    }
    @page { 
      size: auto;  
      margin-top: 30px;
    margin-bottom: 30px;
    }
    .al_l {
      text-align: left;
    }
    .dd{
        margin-left: 50px;
    }
    </style>
</head>
<body>

<div class="container">
    <p style="float: right;">มชต.02/2566</p>
    <br>
    <br>
    <h4><center>รายงานการประชุมสภาสันติสุขตำบล{{$resultID->district}}</center></h4>
    <h5><center>ครั้งที่{{$resultID->round}}</center></h5>
    <h5><center>วันที่ {{$resultID->meeting_date}}      เดือน {{$resultID->meeting_date}}       พ.ศ  {{$resultID->meeting_date}}....</center></h5>
    <h5><center>ณ {{$resultID->location}}</center></h5>

    <h4>1. ผู้มาประชุม (ให้ลงเฉพาะสมาชิกสภาสันติสุข)</h4>
     
    <table class="dd">
        <td style="width: 400px;">1.{{$resultID->title_president}}{{$resultID->name_president}} {{$resultID->lastname_president}}</td> 
        <td>ตำแหน่ง {{$resultID->position_president}}</td>
    </table>
    <table class="dd">
        <td style="width: 400px;">2.{{$resultID->title_vice_president1}}{{$resultID->name_vice_president1}} {{$resultID->lastname_vice_president1}}</td> 
        <td>ตำแหน่ง {{$resultID->position_vice_president2}}</td>
    </table>
    <table class="dd">
        <td style="width: 400px;">3.{{$resultID->title_vice_president2}}{{$resultID->name_vice_president2}} {{$resultID->lastname_vice_president2}}</td> 
        <td>ตำแหน่ง {{$resultID->position_vice_president2}}</td>
    </table>
    <table class="dd">
        <td style="width: 400px;">4.{{$resultID->title_group_plan}}{{$resultID->name_group_plan}} {{$resultID->lastname_group_plan}}</td> 
        <td>ตำแหน่ง {{$resultID->position_group_plan}}</td>
    </table>
    <table class="dd">
        <td style="width: 400px;">5.{{$resultID->title_group_budget}}{{$resultID->name_group_budget}} {{$resultID->lastname_group_budget}}</td> 
        <td>ตำแหน่ง {{$resultID->position_group_budget}}</td>
    </table>
    <table class="dd">
        <td style="width: 400px;">6.{{$resultID->title_group_environment}}{{$resultID->name_group_stability}} {{$resultID->lastname_group_stability}}</td> 
        <td>ตำแหน่ง {{$resultID->position_group_stability}}</td>
    </table>
    <table class="dd">
        <td style="width: 400px;">7.{{$resultID->title_group_edu}}{{$resultID->name_group_edu}} {{$resultID->lastname_group_edu}}</td> 
        <td>ตำแหน่ง {{$resultID->position_group_edu}}</td>
    </table>
    <table class="dd">
        <td style="width: 400px;">8.{{$resultID->title_group_director}}{{$resultID->name_group_director}} {{$resultID->lastname_group_director}}</td> 
        <td>ตำแหน่ง {{$resultID->position_group_director}}</td>
    </table>
    <table class="dd">
        <td style="width: 400px;">9.{{$resultID->title_group_environment}}{{$resultID->name_group_stability}} {{$resultID->lastname_group_stability}}</td> 
        <td>ตำแหน่ง {{$resultID->position_group_stability}}</td>
    </table>
    <table class="dd">
        <td style="width: 400px;">10.{{$resultID->title_director1}}{{$resultID->name_director1}} {{$resultID->lastname_director1}}</td> 
        <td>ตำแหน่ง {{$resultID->position_director1}}</td>
    </table>
    <table class="dd">
        <td style="width: 400px;">11.{{$resultID->title_director2}}{{$resultID->name_director2}} {{$resultID->lastname_director2}}</td> 
        <td>ตำแหน่ง {{$resultID->position_director2}}</td>
    </table>
    <table class="dd">
        <td style="width: 400px;">12.{{$resultID->title_director3}}{{$resultID->name_director3}} {{$resultID->lastname_director3}}</td> 
        <td>ตำแหน่ง {{$resultID->position_director3}}</td>
    </table>
    <table class="dd">
        <td style="width: 400px;">1.{{$resultID->title_bailiff}}{{$resultID->name_bailiff}} {{$resultID->lastname_bailiff}}</td> 
        <td>ตำแหน่ง {{$resultID->position_bailiff}}</td>
    </table>
    <table class="dd">
        <td style="width: 400px;">2.{{$resultID->title_soldier}}{{$resultID->name_soldier}} {{$resultID->lastname_soldier}}</td> 
        <td>ตำแหน่ง {{$resultID->position_soldier}}</td>
    </table>
    <table class="dd">
        <td style="width: 400px;">3.{{$resultID->title_rule}}{{$resultID->name_rule}} {{$resultID->lastname_rule}}</td> 
        <td>ตำแหน่ง {{$resultID->position_rule}}</td>
    </table>
    <table class="dd">
        <td style="width: 400px;">4.{{$resultID->title_volunteer}}{{$resultID->name_volunteer}} {{$resultID->lastname_volunteer}}</td> 
        <td>ตำแหน่ง {{$resultID->position_volunteer}}</td>
    </table>


    <h4>2. ไม่มาผู้มาประชุม (ให้ลงเฉพาะสมาชิกสภาสันติสุข)</h4>

    @foreach($resultID->no_meeting as $key => $value)
        <table class="dd">
            <td style="width: 400px;">1.{{$value['title']}}{{$value['name']}} {{$value['lastname']}}</td> 
            <td>ตำแหน่ง {{$value['position']}}</td>
            <td>สาเหตุ {{$value['reason']}}</td>
        </table>
    @endforeach

    <h4>3. ผู้เข้าร่วมประชุม (เฉพาะผู้ที่ไม่ได้เป็นสมาชิกสภาสันติสุข)</h4>

    @foreach($resultID->p_meeting as $key => $value)
        <table class="dd">
            <td style="width: 400px;">1.{{$value['title']}}{{$value['name']}} {{$value['lastname']}}</td> 
        </table>
    @endforeach

    <h5>เริ่มประชุมเวลา {{$resultID->begin_meet}} น.</h5><br>

    <table>
        <td style="width:100px;">ระเบียบวาระที่ ๑ </td> 
        <td>ประธานแจ้งให้ทราบ</td> 
    </table>

    <table class="dd">
        <td style="width:50px;"></td> 
        <td >{{$resultID->agenda1}} </td> 
    </table><br>

    <table>
        <td style="width:100px;">ระเบียบวาระที่ ๒ </td> 
        <td>การรับรองรายงานการประชุมครั้งที่ {{$resultID->r_meet_no}}/{{$resultID->r_meeting_year}} วันที่{{$resultID->r_meeting_date}}เดือน{{$resultID->r_meeting_date}}พ.ศ.{{$resultID->r_meeting_date}} (กรณีการประชุมครั้งที่ 2 เป็นต้นไป)</td> 
    </table><br>

    <table>
        <td style="width:100px;">มติที่ประชุม </td> 
        <td>รับรอง/แก้ไขเรื่อง {{$resultID->r_meet_edit}}(กรณีมีการแก้ไข)</td> 
    </table><br>

    <table>
        <td style="width:100px;">ระเบียบวาระที่ ๓ </td> 
        <td>เรื่องเสนอให้ที่ประชุมทราบ (เรื่องสืบเนื่อง)</td> 
    </table>

    <table>
        <td style="width:100px;"></td> 
        <td>๑.ภารกิจด้านความมั่นคงและรักษาความสงบเรียบร้อย (หน่วยทหารในพื้นที่/ตชด/ตำรวจภูธร).</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>๑.๑ สถานการณ์ยาเสพติด</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>{{$resultID->narcotics}}</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>๑.๒ สถานการณ์ความไม่สงบ </td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>{{$resultID->unrest}}</td> 
    </table>


    <table>
        <td style="width:120px;"></td> 
        <td>๑.๓ การปฏิบัติหน้าที่เวรยาม</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>{{$resultID->guard}}</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>๑.๔ อื่น ๆ</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>{{$resultID->other1}}</td> 
    </table>

    <table>
        <td style="width:100px;"></td> 
        <td>๒.ภารกิจด้านแผนงานและการพัฒนาด้านเศรษฐกิจ(พัฒนากรประจำตำบล).</td> 
    </table>
    <table>
        <td style="width:120px;"></td> 
        <td>๒.๑ โครงการเสริมสร้างความเข้มแข็งให้กับตำบล (ศอ.บต.) </td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>{{$resultID->district}}</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>๒.๒ โครงการของส่วนราชการในตำบล</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>{{$resultID->district}}</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>๒.๓ อื่นๆ </td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>{{$resultID->other2}}</td> 
    </table>

    <table>
        <td style="width:100px;"></td> 
        <td>๓.ภารกิจด้านประสานแผนงานพัฒนาพื้นที่และงบประมาณ (ปลัด อปท)</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>{{$resultID->government}}</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>๓.๑ อื่นๆ </td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>{{$resultID->other3}}</td> 
    </table>

    <table>
        <td style="width:100px;"></td> 
        <td>๔.ภารกิจด้านการพัฒนาสังคม สาธารณสุขและสิ่งแวดล้อม (ผอ.รพ.สต.)</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>๔.๑ สถานการณ์สุขอนามัย (โควิด 19 และอื่นๆ)</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>{{$resultID->covid}}</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>๔.๒ บ้าน/ซ่อมบ้าน (ส่งต่อ พอช.)</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>{{$resultID->home}}</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>๔.๓ ผู้สูงอายุ </td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>{{$resultID->elder}}</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>๔.๔ อื่นๆ </td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>{{$resultID->other4}}</td> 
    </table>

    <table>
        <td style="width:100px;"></td> 
        <td>๕.ภารกิจด้านการพัฒนาสังคม สาธารณสุขและสิ่งแวดล้อม (ผอ.รพ.สต.)</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>๕.๑ สถานการณ์เด็กหลุดจากระบบการศึกษา </td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>{{$resultID->education}}</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>๕.๒ อื่นๆ </td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>{{$resultID->other5}}</td> 
    </table>

   

    <table>
        <td style="width:100px;"></td> 
        <td>๖.กลุ่มภารกิจด้านอำนวยการและการบริหาร(ปลัดอำเภอผู้เป้นหัวหน้าประจำตำบล)</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>{{$resultID->executive}}</td> 
    </table><br>

    <table>
        <td style="width:120px;"></td> 
        <td>๖.๑ อื่นๆ </td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>{{$resultID->other6}}</td> 
    </table>

    <table>
        <td style="width:100px;">มติที่ประชุม </td> 
        <td>รับทราบ</td> 
    </table><br>

    <table>
        <td style="width:120px;"><h5>ระเบียบวาระที่ ๔</h5></td>
        <td>เรื่องเพื่อพิจารณา</td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>๑ เรื่อง {{$resultID->agenda4}}</td> 
    </table>

    <table>
        <td style="width:120px;"><h5>มติที่ประชุม</h5></td>
    </table>

    <table> 
        <td>{{$resultID->resolution4}}</td> 
    </table><br>

    <table>
        <td style="width:120px;"><h5>ระเบียบวาระที่ ๕</h5></td>
        <td>เรื่องอื่น ๆ </td> 
    </table>

    <table>
        <td style="width:120px;"></td> 
        <td>{{$resultID->agenda5}}</td> 
    </table>

    <table>
        <td style="width:120px;"><h5>มติที่ประชุม</h5></td>
    </table>

    <table> 
        <td>{{$resultID->resolution5}}</td> 
    </table><br>

    <table>
        <td style="width:120px;"><h5>ระเบียบวาระที่ ๖</h5></td>
        <td>ข้อสั่งการ/ปิดการประชุม{{$resultID->agenda6}}</td> 
    </table>

    <h5>ปิดการประชุมเวลา{{$resultID->end_meet}} น.</h5><br>

    <br>
  <br>
  <table class="dd">
    <td style="width: 500px;"></td> 
    <td>ลงชื่อ.................ผู้จดบันทึกการประชุม</td>
  </table>

  <table class="dd">
    <td style="width: 500px;"></td> 
    <td>({{$resultID->name_record}})</td>
  </table>
  <table class="dd">
    <td style="width: 550px;"></td> 
    <td></td>
  </table>

  <table class="dd">
    <td style="width: 500px;"></td> 
    <td>{{$resultID->position_record}}</td>
  </table>

  <br>
  <table class="dd">
    <td style="width: 500px;"></td> 
    <td>ลงชื่อ.................ผู้ตรวจรายงานการประชุม</td>
  </table>

  <table class="dd">
    <td style="width: 500px;"></td> 
    <td>({{$resultID->name_reporter}})</td>
  </table>
  <table class="dd">
    <td style="width: 550px;"></td> 
    <td></td>
  </table>

  <table class="dd">
    <td style="width: 500px;"></td> 
    <td>{{$resultID->position_reporter}}</td>
  </table>

  <br>
  <table class="dd">
    <td style="width: 500px;"></td> 
    <td>ลงชื่อ.................ผู้รับรองการประชุม</td>
  </table>

  <table class="dd">
    <td style="width: 500px;"></td> 
    <td>({{$resultID->name_guarantee}})</td>
  </table>
  <table class="dd">
    <td style="width: 550px;"></td> 
    <td></td>
  </table>

  <table class="dd">
    <td style="width: 500px;"></td> 
    <td>{{$resultID->position_guarantee}}</td>
  </table>
    

</div>
<script> 
  window.print() 
</script>

<script>
function myFunction() {
  window.print() 
}
</script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>รายงานการประชุม</title>
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
    <p style="float: right;">ครั้งที่ {{$resultID->round}} / {{$resultID->year_round}}</p>
    <br>
    <br>
    <center>แบบรายงานผลการดำเนินงานประจำเดือน{{$resultID->month}} พ.ศ.{{$resultID->year}}</center>
    <center>โครงการเสริมสร้างความเข้มแข็งให้กับตำบล จังหวัดชายแดนภาคใต้ ประจำปีงบประมาณ พ.ศ.{{$resultID->year_budget}}</center>
    <center>สภาสันติสุขตำบล{{$resultID->district}}  อำเภอ{{$resultID->amphur}}  จังหวัด{{$resultID->province}} </center>

    <b>แบบรายงานผลการดำเนินงานประจำเดือน : ส่วนที่ 1</b>
    <table class="dd">
      <td style="width: 400px;">รายงานการประชุมสภาสันติสุขตำบล {{$resultID->district1}}</td> 
      <td>ประจำเดือน {{$resultID->month1}}</td>
    </table>

    <table class="dd">
      <td style="width: 300px;">วันที่ 
        <?php
          $date=date_create($resultID->date_report);
          echo date_format($date,"d");
        ?>
        </td> 
      <td style="width: 300px;">เดือน 
        <?php
        $month = array(
            '00'=>"", 
            '01'=>"มกราคม", 
            '02'=>"กุมภาพันธ์", 
            '03'=>"มีนาคม",
            '04'=>"เมษายน",
            '05'=>"พฤษภาคม",
            '06'=>"มิถุนายน",
            '07'=>"กรกฎาคม",
            '08'=>"สิงหาคม",
            '09'=>"กันยายน",
            '10'=>"ตุลาคม",
            '11'=>"พฤศจิกายน",
            '12'=>"ธันวาคม"
        );
          $date=date_create($resultID->date_report);
          echo $month[date_format($date,"m")];
        ?>
        </td> </td>
      <td>พ.ศ. 
        <?php
          $date=date_create($resultID->date_report);
          echo date_format($date,"Y");
        ?>
        </td> </td>
    </table>
      
    <table class="dd">
      <td>ณ {{$resultID->location}}</td>
    </table>
      
    <table class="dd">
      <td style="width: 300px;">ตำบล {{$resultID->district2}}</td> 
      <td style="width: 300px;">อำเภอ {{$resultID->amphur2}}</td>
      <td>จังหวัด {{$resultID->province2}}</td>
    </table>

    <b>ตามระเบียบวาระที่ 3 เรื่องเสนอให้ที่ประชุมทราบ (เรื่องสืบเนื่อง)</b>
    <table class="dd">
        <td style="width: 550px;">1. ภารกิจด้านความมั่นคงและรักษาความสงบเรียบร้อย (หน่วยทหารในพื้นที่/ตชด/ตำรวจภูธร)</td> 
        <td>{{$resultID->secure}} </td>
    </table>
    <table class="dd">
        <td style="width: 550px;">2. ภารกิจด้านแผนงานและการพัฒนาด้านเศรษฐกิจ(พัฒนากรประจำตำบล)</td> 
        <td>{{$resultID->economy}} </td>
    </table>
    </table>
    <table class="dd">
        <td style="width: 550px;">3. ภารกิจด้านประสานแผนงานพัฒนาพื้นที่และงบประมาณ (ปลัด อปท.)</td> 
        <td>{{$resultID->budget}} </td>
    </table>
    <table class="dd">
        <td style="width: 550px;">4. ภารกิจด้านการพัฒนาสังคม สาธารณสุขและสิ่งแวดล้อม (ผอ.รพ.สต.)</td> 
        <td>{{$resultID->environment}} </td>
    </table>
    <table class="dd">
        <td style="width: 550px;">5. ภารกิจการพัฒนาการศึกษา ศาสนาและวัฒนธรรม (ครู อาสา กศน.)</td> 
        <td>{{$resultID->education}} </td>
    </table>
    <table class="dd">
        <td style="width: 550px;">6. กลุ่มภารกิจด้านอำนวยการและการบริหาร(ปลัดอำเภอผู้เป้นหัวหน้าประจำตำบล)</td> 
        <td>{{$resultID->director}} </td>
    </table>
    <table class="dd">
        <td style="width: 900px;">หลักฐานประกอบแบบรายงาน ปรากฎตามเอกสารแนบ (แนบรายงานการประชุมสภาสันติสุขตำบล ตามแบบฟอร์มที่กำหนด)</td> 
    </table>



    <br>
    <b>แบบรายงานผลการดำเนินงานประจำเดือน : ส่วนที่ 2</b>
    <table class="table table-striped">
      <thead>
          <th>ที่</th>
          <th>ชื่อโครงการ/กิจกรรม</th>
          <th>การเบิกจ่ายงบประมาณได้รับอนุมัติ</th>
          <th>การเบิกจ่ายงบประมาณเบิก-จ่าย</th>
          <th>กลุ่มเป้าหมาย (ประเภท/คน)</th>
          <th>รายได้ที่ได้รับจากกิจกรรม (บาท)</th>
          <th>คุณภาพชีวิตกลุ่มเป้าหมาย</th>
          <th>ปัญหา/อุปสรรค/ข้อเสนอแนะ</th>
          <th>หมายเหตุ (ภาพและอื่นๆ)</th>
      </tr>
      </thead>
        @foreach($resultID->activity as $key => $value)
          <tbody>
            <td>{{$key+1}}</td>
            <td>{{$value['activity']}}</td>
            <td>{{$value['approve']}}</td>
            <td>{{$value['withdraw']}}</td>
            <td>{{$value['target']}}</td>
            <td>{{$value['income']}}</td>
            <td>{{$value['quality']}}</td>
            <td>{{$value['problem']}}</td>
            <td>{{$value['note']}}</td>
          </tbody>
        @endforeach
  </table>
  <p><b>หมายเหตุ :</b>  1. กำหนดรายงานผลการดำเนินงานทุกวันที่ 25 ของทุกเดือน</p>

  <br>
  <br>
  <table class="dd">
    <td style="width: 500px;"></td> 
    <td>ลงชื่อ    {{$resultID->name_head}}</td>
  </table>

  <table class="dd">
    <td style="width: 500px;"></td> 
    <td>(.................................................................................................................)</td>
  </table>
  <table class="dd">
    <td style="width: 550px;"></td> 
    <td>{{$resultID->position_head}}</td>
  </table>

  <table class="dd">
    <td style="width: 500px;"></td> 
    <td>..................................../......................................../...................................</td>
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

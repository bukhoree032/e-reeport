
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
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>สภาสันติสุขตำบล</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">

          <p>
            <a href="?act=excel" class="btn btn-success"> Excel  <i class="fa fa-download"></i></a>
          </p>


          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>ประจำเดือน</th>
                        <th>จังหวัด</th>
                        <th>อำเภอ</th>
                        <th>ตำบล</th>
                        <th>งบ</th>
                        <th>ประเด็นการประชุม</th>
                      </tr> 
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach ($user as $item =>$value)
                        @foreach ($value->secure as $item_secure => $value_secure)
                          <tr>
                            <td>{{ $value->date }}</td>
                            <td>{{ $value->provinces }}</td>
                            <td>{{ $value->amphures }}</td>
                            <td>{{ $value->districts }}</td>
                            @if($value->status == 1)
                              <td>300,000</td>
                            @else
                              <td>1,000,000</td>
                            @endif
                            <td>{{ $value_secure }}</td>
                                
                          </tr> 
                        @endforeach
                      @endforeach
                    </tbody>
                  </table>
                </div>
                
              </div>
            </div>
            <!--/ Basic Bootstrap Table -->

            <!--/ Basic Bootstrap Table -->
          </div>
				</div>
			</div>
		</div>
	</body>
</html>

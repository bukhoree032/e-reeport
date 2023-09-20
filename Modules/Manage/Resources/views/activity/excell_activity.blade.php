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
					<br /><br /><br />
					{{-- <h4> ::ตย. PHP EXPORT TO EXCEL by devbanban.com ::
					</h4> --}}
					
					<p>
						<a href="?act=excel" class="btn btn-success"> Excel  <i class="fa fa-download"></i></a>
					</p>
					
					<table border="1" class="table table-hover">
						<thead>
							<tr class="info">
								<th>จังหวัด</th>
								<th>อำเภอ</th>
								<th>ตำบล</th>
								<th>งบประมาณ</th>
								<th>กิจกรรม1</th>
								<th>ละติจูด/ลองจิจูด</th>
								<th>กิจกรรม2</th>
								<th>ละติจูด/ลองจิจูด</th>
								<th>กิจกรรม3</th>
								<th>ละติจูด/ลองจิจูด</th>
								<th>กิจกรรม4</th>
								<th>ละติจูด/ลองจิจูด</th>
								<th>กิจกรรม5</th>
								<th>ละติจูด/ลองจิจูด</th>
								<th>กิจกรรม6</th>
								<th>ละติจูด/ลองจิจูด</th>
								<th>กิจกรรม7</th>
								<th>ละติจูด/ลองจิจูด</th>
								<th>กิจกรรม8</th>
								<th>ละติจูด/ลองจิจูด</th>
								<th>กิจกรรม9</th>
								<th>ละติจูด/ลองจิจูด</th>
							</tr>
						</thead>
						
						<tbody>
							@foreach($pro as $key_pro => $value_pro)
								@foreach($pro1m[$value_pro->provinces] as $key => $value)
									<tr>
										<td>{{ $value->provinces }}</td>
										<td>{{ $value->amphures }}</td>
										<td>{{ $value->districts }}</td>
										<td>1,000,000</td>
										@foreach($value->activity as $ac_key => $ac_value)
											<td>{{ $ac_value->name }}</td>
											<td>{{ $ac_value->lat }},{{ $ac_value->log }}</td>
										@endforeach
									</tr>
								@endforeach
							@endforeach
							@foreach($pro as $key_pro => $value_pro)
								@foreach($pro3k[$value_pro->provinces] as $key => $value)
									<tr>
										<td>{{ $value->provinces }}</td>
										<td>{{ $value->amphures }}</td>
										<td>{{ $value->districts }}</td>
										<td>300,000</td>
										@foreach($value->activity as $ac_key => $ac_value)
											<td>{{ $ac_value->name }}</td>
											<td>{{ $ac_value->lat }},{{ $ac_value->log }}</td>
										@endforeach
									</tr>
								@endforeach
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
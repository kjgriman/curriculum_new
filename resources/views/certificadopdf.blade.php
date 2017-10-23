<?php
$epoch=$data['getUserCourses'][0]->date_asignation;
$fecha=date('Y-M-d',$epoch);?>
	?>
	<!DOCTYPE html>
<html>
<head>
	<title>Certificado</title>
	<style type="text/css">
		body{
			font-size: 24px;
			background: #f2f2f2;
			font-style: italic;

/*background-image: url('img/certdigi.jpg');*/
		}
		

		
 
	</style>
</head>
<body>
	<nav> 
		
	
<table align="center" border="0">
		
		<tbody>

			<tr ><td colspan="2" align="center">
		<img src="img/diploma.png"></td></tr>

		
			<tr>

				<td colspan="2" align="center"><br><br><br>:Se le otorga el presente certificado a</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><strong><h2>{{Auth::user()->name}} {{Auth::user()->apellido}}</h2></strong></td>
			</tr>
			<tr><td colspan="2" align="center"><b>{{Auth::user()->cedula}}</b></td></tr>
			<tr>
				<td  align="center" colspan="2"><br><br>:Por haber aprobado el curso</td>
			</tr>
			<tr><td align="center" colspan="2">
				 <b>{{strtoupper($data['getUserCourses'][0]->name_courses)}}</b>
			</td></tr>
			<tr><td colspan="2" align="center">{{$data['getUserCourses'][0]->description_courses}}</td></tr>
			<tr><td colspan="2" align="center"><br><br>Asignado con fecha</td></tr>
			<tr><td colspan="2" align="center">{{$fecha}}</td></tr>
			
		</tbody>
	</table>
	</nav>
	<footer style="font-size: 14px;"><br><br><br>
				<br><br> Bajo el codigo de certificado # <b>{{$data['getUserCourses'][0]->id_usercourse}}</b>
			</footer>
</body>
</html>
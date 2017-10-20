<?php
$epoch=$data['getUserCourses'][0]->date_asignation;
$fecha=date('Y-M-d',$epoch);?>
	?>
	<!DOCTYPE html>
<html>
<head>
	<title>La Web Del Hamster</title>
	<style type="text/css">
		
		
 
	</style>
</head>
<body>
	<nav> 
		
	
<table align="center" border="1">
		
		<tbody>
			<tr ><td colspan="2">
		<img src="img/certdigi.jpg"></td></tr>
		
			<tr>
				<td colspan="2" align="center">:Se le otorga el presente certificado a</td>
			</tr>
			<tr>
				<td align="center">{{Auth::user()->cedula}}</td><td align="center">{{Auth::user()->name}} {{Auth::user()->apellido}}</td>
			</tr>
			<tr>
				<td  align="center" colspan="2">por haber aprovado el curso <b>{{strtoupper($data['getUserCourses'][0]->name_courses)}}</b></td>
			</tr>
			<tr><td colspan="2" align="center">{{$data['getUserCourses'][0]->description_courses}}</td></tr>
			<tr><td colspan="2" align="center">Aprovado el</td></tr>
			<tr><td colspan="2" align="center">{{$fecha}}</td></tr>
		</tbody>
	</table>
	</nav>
</body>
</html>
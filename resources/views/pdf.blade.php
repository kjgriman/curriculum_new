<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Example 2</title>
    <style type="text/css">
      body{
        font-size: 10px;
        text-align: left;
      }
      
    </style>
  </head>
  <body>
    

 
    <main>
      <div id="details" class="clearfix">
        <div id="invoice">
          <h1>{{Auth::user()->name}} {{Auth::user()->apellido}}</h1>
         
          <small>Cedula: {{Auth::user()->cedula}}</small><br>
          <small>Direccion: {{Auth::user()->direccion}}</small><br>
          <small>Telefono: {{Auth::user()->telefono}}</small><br>
          <small>Email: {{Auth::user()->email}}</small><br>
          
        </div>
      </div>
      <br><br>
                     <div >
                       <table class="table">
                        <thead>
                          Experiencia laboral
                          <tr style="background: gray;">
                            <th class="">Nr.</th>
                            <th class="">Nombre de Empresa</th>
                            <th class="">Cargo</th>
                            <th class="">Fecha de Ingreso</th>
                            <th class="">Fecha de Egreso</th>
                            <th class="">Ubicacion de la empresa</th>
                            <th class="">Responsabilidades del cargo</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          
                            
                            @foreach($data as $key => $value)
                              @foreach($value as $key1 => $value2)

                                <tr style="font-size: 10px; background: #f5f5f5;" >
                                  <td>{{$key1 +1}}</td>
                                  <td>{{$value[$key1]['name_company']}}</td>
                                  <td>{{$value[$key1]['cargo']}}</td>
                                  <td>{{$value[$key1]['date_in']}}</td>
                                  <td>{{$value[$key1]['date_out']}}</td>
                                  <td>{{$value[$key1]['ubication_company']}}</td>
                                  <td>{{$value[$key1]['observation']}}</td>
                                  
                                           
                                </tr>
                                @endforeach
                          @endforeach
                         
                        </tbody>
                      </table>
                    </div>
  </body>
</html>
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
                       <table>
                        <thead>
                          Experiencia laboral
                          <tr style="background: #f9f9f9;">
                            <th class="">#</th>
                            <th class="">Tipo de estudio</th>
                            <th class="">Carrera</th>
                            <th class="">status</th>
                            <th class="">Nombre de la institucion</th>
                            <th class="">Ubicacion de la institucion</th>
                            <th class="">fecha de ingreso</th>
                            <th class="">fecha de egreso</th>
                            <th class="">promedio de notas</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          

                        
                            
                          
                          
                         
                        </tbody>
                      </table>
                    </div>

                     <div >
                       <table>
                        <thead>
                          Estudios Realizados
                          <tr style="background: #f9f9f9;">
                            <th class="">#</th>
                            <th class="">Nombre de Empresa</th>
                            <th class="">Cargo</th>
                            <th class="">Fecha de Ingreso</th>
                            <th class="">Fecha de Egreso</th>
                            <th class="">Ubicacion de la empresa</th>
                            <th class="">Responsabilidades del cargo</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          
                            
                        </tbody>
                      </table>
                    </div>
  </body>
</html>
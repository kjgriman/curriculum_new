
        @foreach($valuerefresh as $key => $value)
      <tr id="row2_{{$key}}">
        <td>{{$value->name_company}}</td>
        <td>{{$value->cargo}}</td>
        <th><a onclick="deleteJob({{ $value->id_jobs }},'{{ $key }}')" class="btn btn-danger"> <span class="fa fa-plus"></span> Eliminar</a></th>                 
      </tr>
      @endforeach
     


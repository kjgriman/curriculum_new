
        @foreach($valuerefresh as $key => $value)
      <tr id="row2_{{$key}}">
        <td>{{$value->name_company}}</td>
        <td>{{$value->cargo}}</td>
        <td>{{$value->date_in}} / @if($value->date_out==0)
                                Actualidad
                                @else
                                {{$value->date_out}} 
                                 @endif</td>
        <td>{{$value->observation}}</td>
        <td align="right" style=""><a onclick="deletestudies({{ $value->id_jobs }},'{{ $key }}')" class="btn btn-danger"><span class="fa fa-trash"></span> Eliminar</a>
                            </td>               
      </tr>
      @endforeach
     



      
        @foreach($valuerefresh as $key => $value)
       <tr id="row3_{{$key}}">
                            <td>{{$value->name_institute}}</td>
                            <td>{{$value->career}}</td>
                            <td>{{$value->status_studies}}</td>
                            <td>{{$value->note_average}}</td>
                            <td align="right"><a onclick="deleteJob({{ $value->id_estudies }},'{{ $key }}')" class="btn btn-danger"><span class="fa fa-trash"></span> Eliminar</a>
                               </td>
                                     
                          </tr>
      @endforeach
     


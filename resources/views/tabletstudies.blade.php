
      
        @foreach($valuerefresh as $key => $value)
       <tr id="row3_{{$key2}}">
                            <td>{{$value2->name_institute}}</td>
                            <td>{{$value2->career}}</td>
                            <td>{{$value2->status_studies}}</td>
                            <td>{{$value2->note_average}}</td>
                            <td align="right"><a onclick="deleteStudies({{ $value->id_studies }},'{{ $key }}')" class="btn btn-danger"><span class="fa fa-trash"></span> Eliminar</a>
                               </td>
                                     
                          </tr>
      @endforeach
     


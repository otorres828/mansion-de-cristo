<ul class="todo-list ui-sortable" data-widget="todo-list" id="list" >
    @foreach ($lists as $list)
    <li >
        <!-- drag handle -->
        <span class="handle ui-sortable-handle">
          <i class="fas fa-ellipsis-v"></i>
          <i class="fas fa-ellipsis-v"></i>
        </span>
        <!-- checkbox -->
        <div class="d-inline ml-2">
          <input  type="checkbox" value=""id="{{$list->id}}">
        </div>
        <!-- TITULO -->
        <span class="text">{{$list->name}}</span>
        {{$estatus}}
        <!-- General tools such as edit or delete-->
        <div class="tools" >
          <i class="fas fa-edit"></i>
          <i class="fas fa-trash-alt"></i>
        </div> 
    </li>
    
    @endforeach
  </ul>
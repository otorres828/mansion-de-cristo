<ul class="todo-list " >
    @foreach ($lists as $list)
        <li @if ($list->status == 2) class="done" @endif>
            <div class="d-inline ml-2" >
                <input type="checkbox" @if ($list->status == 2) checked @endif value="{{$list->status}}" id="{{ $list->id }}" wire:click="status({{ $list->id }})">
            </div>
            <!-- TITULO -->
            <span class="text">{{ $list->name }}</span>
            {{ $estatus }}
            <!-- General tools such as edit or delete-->
            <div class="tools">
                {{-- <i class="fas fa-edit"></i> --}}
                <i class="fas fa-trash-alt" wire:click="delete({{ $list->id }})"></i>
            </div>
        </li>
    @endforeach
</ul>

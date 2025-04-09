<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse{{$name}}"
        aria-expanded="true" aria-controls="collapse{{$name}}">
        <i class="fas fa-fw fa-wrench"></i>
        <span>{{$title}}</span>
    </a>
    <div id="collapse{{$name}}" class="collapse {{ request()->is('admin/'.$name.'/*') || request()->is('admin/'.$name) || isRoute($includes ?? []) ? 'show' : false }}" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            @if (!empty($except))
                <a class="collapse-item" href="{{route('admin.'.$name.'.index')}}">List</a>
            @else
                <a class="collapse-item" href="{{route('admin.'.$name.'.index')}}">List</a>
                <a class="collapse-item" href="{{route('admin.'.$name.'.create')}}">Add new</a>
            @endif
        </div>
    </div>
</li>
@foreach($menu as $menu)
    @if ($menu->parent==$id and $menu->enabled<>0 and $menu->title<>'dropdown-divider')
        <a class="dropdown-item" href="{{$menu->link}}">{{$menu->title}}</a>
    @elseif ($menu->parent==$id and $menu->enabled<>0 and $menu->title=='dropdown-divider')
        <div class="dropdown-divider"></div>
    @elseif ($menu->parent==$id and $menu->enabled==0)
        <a class="dropdown-item disabled" href="{{$menu->link}}">{{$menu->title}}</a>
    @endif
@endforeach

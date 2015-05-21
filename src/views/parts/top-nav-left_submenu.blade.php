<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
    @foreach ($submenu as $subitem)
        @if ( $subitem == 'divider' )
            <li class="divider"></li>
        @else
            @if (!empty($subitem['submenu']))
            <li class="dropdown-submenu">
                <a href="{{$subitem['href']}}"><i class="fa {{$subitem['icon']}}"></i> {{$subitem['label']}}</a>
                @include('laradmin::parts.top-nav-left_submenu', array('submenu'=>$subitem['submenu']))
            </li>
            @else
            <li><a href="{{$subitem['href']}}"><i class="fa {{$subitem['icon']}}"></i> {{$subitem['label']}}</a></li>
            @endif
        @endif
    @endforeach
</ul>

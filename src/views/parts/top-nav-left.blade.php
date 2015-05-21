@section('nav.top-left')
<ul class="nav navbar-nav">
    @foreach (Event::fire('admin.top-left-menu') as $v)
    @foreach ($v as $item)
        @if (!empty($item['submenu']))
        <li class="dropdown">
        @else
        <li>
        @endif
            @if ( $item != 'divider' )
                <a data-toggle="dropdown" class="dropdown-toggle" href="{{$item['href']}}">
                    <i class="fa {{$item['icon']}}"></i>
                    @if ($item['label'])
                    <span>{{$item['label']}}</span>
                    @endif
                </a>
                @if (!empty($item['submenu']))
                    @include('laradmin::parts.top-nav-left_submenu', array('submenu'=>$item['submenu']))
                @endif
            @endif
        </li>
    @endforeach
    @endforeach
</ul>
@show
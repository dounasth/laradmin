<ul class="sidebar-menu">
@section('sidebar.left')
@foreach (Event::fire('admin.left-menu') as $v)
@foreach ($v as $item)
@if (!empty($item['submenu']))
<li class="treeview">
@else
<li>
@endif
    <a href="{{$item['href']}}">
        <i class="fa {{$item['icon']}}"></i>
        <span>{{$item['label']}}</span>
        @if (!empty($item['submenu']))
        <i class="fa pull-right fa-angle-left"></i>
        @endif
    </a>
    @if (!empty($item['submenu']))
    <ul class="treeview-menu" style="display: none;">
        @foreach ($item['submenu'] as $subitem)
        <li><a href="{{$subitem['href']}}" style="margin-left: 10px;"><i class="fa {{$subitem['icon']}}"></i> {{$subitem['label']}}</a></li>
        @endforeach
    </ul>
    @endif
</li>
@endforeach
@endforeach
@show
</ul>
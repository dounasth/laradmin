<div class="tab-pane" id="tab-{{$key}}" style="position: relative;">
    @each($group['template'], $group['items'], 'item', 'laradmin::site.search.parts.no-data')
    <div class="w100 categoryFooter clearfix">
        <div class="pagination pull-left no-margin-top">
            @if ($group['title'] == 'Products')
                {{ $group['items']->appends(['q'=>Input::get('q')])->links() }}
            @endif
        </div>
    </div>
</div>
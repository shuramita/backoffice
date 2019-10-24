<nav id="sidebar" class="active">
    <div class="sidebar-header">
        <span id="sidebarCollapse">
            {{@svg_image('vendor.backoffice.dark')}}
        </span>
    </div>
    <ul class="list-unstyled components">
        @foreach(collect($items)->sortBy('order') as $key => $item)
            @if( auth()->user()->is($item['first']->permission) )
                <li  data-role="{{auth()->user()->is($item['first']->permission)}}" data-order="{{$item['order']}}" class="@if($item['first']->route == Route::currentRouteName()) active @endif">
                    <a href="{{$item['has_sub'] ? '#'.$item['first']->route : route($item['first']->route)}}"
                            {{$item['has_sub'] ? 'data-toggle=collapse' : ''}}>
                        @if(isset($item['first']->icon) && gettype($item['first']->icon) == 'string')
                            <i class="fas {{$item['first']->icon ?? 'fa-dot-circle'}}"></i>
                        @elseif(isset($item['first']->icon) && gettype($item['first']->icon) == 'array')
                            @if($item['first']->icon['type'] == 'svg')
                                <span class="svg-icon">{{@svg_image($item['first']->icon['file'])}}</span>
                            @endif
                        @else
                            <i class="fas fa-dot-circle}}"></i>
                        @endif
                        <span class="title">{{$item['first']->title}}</span>
                        @if($item['has_sub'])
                            <span class="fa fa-chevron-down"></span>
                        @endif
                    </a>
                    @if($item['has_sub'])
                        <ul class="collapse list-unstyled child-menu" id="{{$item['first']->route}}">
                            @foreach($item['sub'] as $sub_key => $sub_item)
                                <li class="{{request()->getUri() == route($sub_item->route,$params) ? 'active' : ''}}">
                                    <a href="{{route($sub_item->route,$params)}}">
                                        <i class="fas {{$sub_item->icon ?? 'fa-dot-circle'}}"></i>
                                        {{$sub_item->title}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endif
        @endforeach
    </ul>
</nav>

<ul class="sidebar-menu" data-widget="tree">
    <li class="nav-devider"></li>
    <li class="header nav-small-cap">{{__('general.PERSONAL')}}</li>
    @foreach($menus as $menu)
            @if(count($menu['sub_menu'])>0)
            {{-- @can($menu['can']) --}}
            <li class="treeview {{ (ltrim(request()->route()->getPrefix(),'/')==@$menu['prefix'] && !is_null(@$menu['prefix'])) ? 'active' : '' }}">
                <a href="#" title="{{__('general.'.$menu['page_name'])}}">
                    <i class="{{$menu['link_icon']}}"></i>
                    <span class="nav-label">{{__('general.'.$menu['page_name'])}}</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                   @foreach($menu['sub_menu'] as $subMenu)
                       {{-- @can($subMenu['can']) --}}
                        <li @if(@explode('.',request()->route()->getName())[1]==@explode('.',$subMenu['link'])[1]) class="active" @endif>
                            <a href="{{ route($subMenu['link']) }}">
                                {{-- <i class="{{ $subMenu['link_icon'] }}"></i> --}}
                                {{__('general.'.$subMenu['page_name'])}}
                            </a>
                        </li>
                        {{-- @endcan --}}
                    @endforeach
                </ul>
            </li>
            {{-- @endcan --}}
            @else 
            {{-- @can($menu['can']) --}}
                <li  @if(@explode('.',request()->route()->getName())[0]==@explode('.',$menu['link'])[0]) class="active" @endif>
                    <a href="{{ route($menu['link']) }}" title="{{__('general.'.$menu['page_name'])}}">
                        <i class="{{$menu['link_icon']}}"></i> <span class="nav-label">{{__('general.'.$menu['page_name'])}}</span>
                    </a>
                </li>
                {{-- @endcan --}}
            @endif
    @endforeach
  </ul>
<div id="sidebar-disable" class="sidebar-disable hidden"></div>

<div id="sidebar" class="sidebar-menu transform -translate-x-full ease-in">
    <div class="flex items-center justify-center mt-4">
        <div class="flex items-center">
            <span class="text-white text-2xl mx-2 font-semibold">AIG</span>
        </div>
    </div>
    <nav class="mt-4">
        <!-- Dashboard -->
        <a class="nav-link{{ request()->is('admin') ? ' active' : '' }}" href="{{ route('admin.dashboard') }}">
            <span class="mx-4">Dashboard</span>
        </a>

        <!-- User Management -->
        @can('user_management_access')
            <div class="nav-dropdown">
                <a class="nav-link" href="#">
                    <i class="fa-fw fas fa-users"></i>
                    <span class="mx-4">{{ trans('cruds.userManagement.title') }}</span>
                    <i class="fa fa-caret-down ml-auto" aria-hidden="true"></i>
                </a>
                <div class="dropdown-items mb-1 hidden">
                    @can('permission_access')
                        <a class="nav-link{{ request()->is('admin/permissions*') ? ' active' : '' }}" href="{{ route('admin.permissions.index') }}">
                            <i class="fa-fw fas fa-unlock-alt"></i>
                            <span class="mx-4">{{ trans('cruds.permission.title') }}</span>
                        </a>
                    @endcan
                    @can('role_access')
                        <a class="nav-link{{ request()->is('admin/roles*') ? ' active' : '' }}" href="{{ route('admin.roles.index') }}">
                            <i class="fa-fw fas fa-briefcase"></i>
                            <span class="mx-4">{{ trans('cruds.role.title') }}</span>
                        </a>
                    @endcan
                    @can('user_access')
                        <a class="nav-link{{ request()->is('admin/users*') ? ' active' : '' }}" href="{{ route('admin.users.index') }}">
                            <i class="fa-fw fas fa-user"></i>
                            <span class="mx-4">{{ trans('cruds.user.title') }}</span>
                        </a>
                    @endcan
                </div>
            </div>
        @endcan


         <!-- Section -->
         @can('section_access')
         <a class="nav-link{{ request()->is('admin/sections*') ? ' active' : '' }}" href="{{ route('admin.sections.index') }}">
            <i class="fa-fw fas fa-layer-group"></i>
             <span class="mx-4">Sections</span>
         </a>
         @endcan

            <!-- Home-->
            @can('home_access')
            <a class="nav-link{{ request()->is('admin/heroes*') ? ' active' : '' }}" href="{{ route('admin.heroes.index') }}">
                <i class="fa-fw fas fa-house"></i>
                <span class="mx-4">Home</span>
            </a>
            @endcan

             <!-- Home-->
             @can('home_stat_access')
             <a class="nav-link{{ request()->is('admin/hero_stats*') ? ' active' : '' }}" href="{{ route('admin.hero_stats.index') }}">
                <i class="fa-fw fas fa-house"></i>
                 <span class="mx-4">Home Stat</span>
             </a>
             @endcan
        <!-- Services -->
        @can('service_access')
        <a class="nav-link{{ request()->is('admin/services*') ? ' active' : '' }}" href="{{ route('admin.services.index') }}">
            <i class="fa-fw fas fa-servicestack"></i>
            <span class="mx-4">Services</span>
        </a>
        @endcan

        <!-- About -->
        @can('about_access')
        <a class="nav-link{{ request()->is('admin/abouts*') ? ' active' : '' }}" href="{{ route('admin.abouts.index') }}">
            <i class="fa-fw fas fa-info-circle"></i>
            <span class="mx-4">About</span>
        </a>
        @endcan

         <!-- Mission -->
         @can('mission_access')
         <a class="nav-link{{ request()->is('admin/missions*') ? ' active' : '' }}" href="{{ route('admin.missions.index') }}">
             <i class="fa-fw fas fa-bullseye"></i>
             <span class="mx-4">Mission</span>
         </a>
         @endcan

         <!-- Pricing -->
         @can('pricing_access')
         <a class="nav-link{{ request()->is('admin/pricing*') ? ' active' : '' }}" href="{{ route('admin.pricing.index') }}">
          <i class="fa-fw fas fa-dollar-sign"></i>
             <span class="mx-4">Pricing</span>
         </a>
             @endcan
       @can('testimonial_access')
            <a class="nav-link{{ request()->is('admin/testimonials*') ? ' active' : '' }}" href="{{ route('admin.testimonials.index') }}">
                <i class="fa-fw fas fa-address-book"></i>
                <span class="mx-4">Testimonials</span>
            </a>
       @endcan

       @can('show_room_access')
       <a class="nav-link{{ request()->is('admin/showrooms*') ? ' active' : '' }}" href="{{ route('admin.showrooms.index') }}">
           <i class="fa-fw fas fa-address-book"></i>
           <span class="mx-4">ShowRooms</span>
       </a>
       @endcan
      
       @can('contact_access')
       <a class="nav-link{{ request()->is('admin/contacts*') ? ' active' : '' }}" href="{{ route('admin.contacts.index') }}">
        <i class="fa-fw fas fa-address-book"></i>
        <span class="mx-4">Contacts</span>
       </a>
       @endcan
       @can('inbox_access')
       <a class="nav-link{{ request()->is('admin/inbox*') ? ' active' : '' }}" href="{{ route('admin.inbox') }}">
           <i class="fa-fw fas fa-address-book"></i>
           <span class="mx-4">Inbox</span>
       </a>
      @endcan
   

       
          
        <!-- Logout -->
        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
            <i class="fa-fw fas fa-sign-out-alt"></i>
            <span class="mx-4">{{ trans('global.logout') }}</span>
        </a>
    </nav>
</div>

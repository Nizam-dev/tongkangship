 <div class="navbar-wrapper">
     <div class="m-header">
         <a href="{{url('')}}" class="b-brand text-primary">
             <!-- <i class="ti ti-ship me-2 fs-4"></i>  -->
            <img src="{{asset('images/logo.png')}}" class="img-fluid" width="50px" alt="" srcset="">    
             Tongkang Ship
         </a>
     </div>
     <div class="navbar-content">
         <ul class="pc-navbar">
             <li class="pc-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                 <a href="{{url('admin/dashboard')}}" class="pc-link">
                     <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
                     <span class="pc-mtext">Dashboard</span>
                 </a>
             </li>

             <li class="pc-item pc-caption">
                 <label>Kapal</label>
                 <i class="ti ti-brand-chrome"></i>
             </li>

             <li class="pc-item {{ request()->is('admin/kategori') ? 'active' : '' }}">
                 <a href="{{url('admin/kategori')}}" class="pc-link">
                     <span class="pc-micon"><i class="ti ti-list"></i></span>
                     <span class="pc-mtext">Kategori</span>
                 </a>
             </li>


             <li class="pc-item {{ request()->is('admin/kapal') ? 'active' : '' }}">
                 <a href="{{url('admin/kapal')}}" class="pc-link">
                     <span class="pc-micon"><i class="ti ti-ship"></i></span>
                     <span class="pc-mtext">Kapal</span>
                 </a>
             </li>
             <li class="pc-item pc-caption">
                 <label>Booking</label>
                 <i class="ti ti-brand-chrome"></i>
             </li>
             <li class="pc-item {{ request()->is('admin/booking') ? 'active' : '' }}">
                 <a href="{{url('admin/booking')}}" class="pc-link">
                     <span class="pc-micon"><i class="ti ti-command"></i></span>
                     <span class="pc-mtext">List Booking</span>
                 </a>
             </li>
             <li class="pc-item pc-caption">
                 <label>Other</label>
                 <i class="ti ti-brand-chrome"></i>
             </li>
             <li class="pc-item {{ request()->is('admin/user') ? 'active' : '' }}">
                 <a href="{{url('admin/user')}}" class="pc-link">
                     <span class="pc-micon"><i class="ti ti-users"></i></span>
                     <span class="pc-mtext">Data User</span>
                 </a>
             </li>
         </ul>

     </div>
 </div>
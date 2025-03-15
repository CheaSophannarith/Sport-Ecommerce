
<div class="p-0 border sidebar border-right col-md-3 col-lg-2 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">X-Soccer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="p-0 overflow-y-auto offcanvas-body d-md-flex flex-column pt-lg-3">
            <ul class="nav flex-column bg-[#001f3d]">
                <li class="nav-item">
                    <a class="gap-2 nav-link d-flex align-items-center text-[#d99a00]" aria-current="page" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-dashboard" style="color: #d99a00"></i>
                        Dashboard
                    </a>
                </li>
            </ul>
            <hr class="my-3"/>
            <ul class="mb-auto nav flex-column bg-[#001f3d]">
                <li class="nav-item">
                    <a href="#" class="gap-2 nav-link d-flex align-items-center text-[#d99a00]">
                        <i class="fas fa-user" style="color: #d99a00"></i>
                        {{ Auth::guard('admin')->user()->name }}
                    </a>
                </li>
                <li class="nav-item">
                    <a onclick="document.getElementById('adminLogoutForm').submit()" href="#" class="gap-2 nav-link d-flex align-items-center">
                        <i class="fas fa-sign-out text-[#d99a00]" style="color: #d99a00">Sign Out</i>
                        <form id="adminLogoutForm" action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                        </form>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

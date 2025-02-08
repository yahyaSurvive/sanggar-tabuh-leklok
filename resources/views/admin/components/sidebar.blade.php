<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Sidebar header -->
        <div class="sidebar-section">
            <div class="sidebar-section-body d-flex justify-content-center">
                <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Menu</h5>

                <div>
                    <button type="button"
                        class="btn btn-flat-white btn-icon btn-sm rounded-pill sidebar-control sidebar-main-resize d-none d-lg-inline-flex border-transparent">
                        <i class="ph-arrows-left-right"></i>
                    </button>

                    <button type="button"
                        class="btn btn-flat-white btn-icon btn-sm rounded-pill sidebar-mobile-main-toggle d-lg-none border-transparent">
                        <i class="ph-x"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- /sidebar header -->


        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                {{-- <li class="nav-item-header pt-0">
                    <div class="text-uppercase fs-sm lh-sm sidebar-resize-hide opacity-50">Main</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li> --}}

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="ph-house"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.quiz') }}"
                        class="nav-link {{ request()->routeIs('admin.quiz') ? 'active' : '' }}">
                        <i class="ph-list-checks"></i>
                        <span>Quiz</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.gallery') }}"
                        class="nav-link {{ request()->routeIs('admin.gallery') ? 'active' : '' }}">
                        <i class="ph-file-image"></i>
                        <span>Gallery</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.achievement') }}"
                        class="nav-link {{ request()->routeIs('admin.achievement') ? 'active' : '' }}">
                        <i class="ph-star"></i>
                        <span>Prestasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.course') }}"
                        class="nav-link {{ request()->routeIs('admin.course') ? 'active' : '' }}">
                        <i class="ph-student"></i>
                        <span>Course</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.profile') }}"
                        class="nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                        <i class="ph-user"></i>
                        <span>Profile</span>
                    </a>
                </li>


                {{-- <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link">
                        <i class="ph-layout"></i>
                        <span>Layouts</span>
                    </a>
                    <ul class="nav-group-sub collapse">
                        <li class="nav-item"><a href="index.html" class="nav-link active">Default layout</a>
                        </li>
                        <li class="nav-item"><a href="../../layout_2/full/index.html" class="nav-link">Layout
                                2</a></li>
                        <li class="nav-item"><a href="../../layout_3/full/index.html" class="nav-link">Layout
                                3</a></li>
                        <li class="nav-item"><a href="../../layout_4/full/index.html" class="nav-link">Layout
                                4</a></li>
                        <li class="nav-item"><a href="../../layout_5/full/index.html" class="nav-link">Layout
                                5</a></li>
                        <li class="nav-item"><a href="../../layout_6/full/index.html" class="nav-link">Layout
                                6</a></li>
                        <li class="nav-item"><a href="../../layout_7/full/index.html"
                                class="nav-link disabled">Layout 7 <span
                                    class="badge align-self-center ms-auto">Coming soon</span></a></li>
                    </ul>
                </li> --}}


            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
<!-- /main sidebar -->

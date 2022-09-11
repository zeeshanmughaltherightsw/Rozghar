<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Navigation</li>
                <li class="has_sub">
                    <a href="dashboard.php" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span> </a>
                </li>

                <!-- Govt Jobs -->

                <li class="has_sub">
                    <a href="{{route('admin.categories.index')}}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Categories </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{route('admin.posts.index')}}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Jobs </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{route('admin.blogs.index')}}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Blogs </span> </a>
                </li>
                <li class="has_sub">
                    <a href="{{route('admin.blog-categories.index')}}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i> <span> Blog Categories </span> </a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Pages </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="aboutus.php">About us</a></li>
                        <li><a href="contactus.php">Contact us</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted"></i> <span> Comments </span> <span class="menu-arrow"></span></a>
                    <ul class="list-unstyled">
                        <li><a href="unapprove-comment.php">Waiting for Approval </a></li>
                        <li><a href="manage-comments.php">Approved Comments</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>
        <div class="help-box">
            <h5 class="text-muted m-t-0">For Help ?</h5>
            <p class=""><span class="text-custom">Email:</span> <br />raxamagsi@gmail.com</p>
        </div>
    </div>
    <!-- Sidebar -left -->
</div>
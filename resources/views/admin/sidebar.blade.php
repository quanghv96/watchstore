<div id="left_content">
    <div id="leftSide" style="padding-top:30px;">
        <!-- Account panel -->
        <div class="sideProfile">
            <a href="admin/admin/edit/" title="" class="profileFace"><img width="40" src="source/bower_components/library/backend/admin/images/user.png" /></a>
            <span>{{ trans('common.sidebar.hello') }} <strong>{{ trans('common.sidebar.admin') }}</strong></span>
            <span>Hà Văn Quang</span>
            <div class="clear"></div>
        </div>
        <div class="sidebarSep"></div>
        <!-- Left navigation -->

        <ul id="menu" class="nav">

            <li class="home">

                <a href="admin/home/index.html" class="active" id="current">
                    <span>{{ trans('common.layout.bang_dieu_kien') }}</span>
                    <strong></strong>
                </a>


            </li>
            <li class="tran">

                <a href="admin/tran.html" class=" exp" >
                    <span>{{ trans('common.sidebar.qlbh') }}</span>
                    <strong>{{ trans('common.sidebar.qlbh_nb') }}</strong>
                </a>

                <ul class="sub">
                    <li >
                        <a href="">
                            {{ trans('common.sidebar.qlgd') }}
                        </a>
                    </li>
                    <li >
                        <a href="">
                            {{ trans('common.sidebar.dhsp') }}
                        </a>
                    </li>
                </ul>

            </li>
            <li class="product">

                <a href="admin/product.html" class=" exp" >
                    <span>{{ trans('common.sidebar.sp') }}</span>
                    <strong>{{ trans('common.sidebar.sp_nb') }}</strong>
                </a>

                <ul class="sub">
                    <li >
                        <a href="">
                            {{ trans('common.sidebar.sp') }}
                        </a>
                    </li>
                    <li >
                        <a href="">
                            {{ trans('common.sidebar.dm') }}
                        </a>
                    </li>
                    <li >
                        <a href="">
                            {{ trans('common.sidebar.bl') }}
                        </a>
                    </li>
                </ul>

            </li>
            <li class="account">

                <a href="admin/account.html" class=" exp" >
                    <span>{{ trans('common.sidebar.tk') }}</span>
                    <strong>{{ trans('common.sidebar.qlbh_nb') }}</strong>
                </a>

                <ul class="sub">
                    <li >
                        <a href="admin/admin/view.html">
                            {{ trans('common.sidebar.Admin') }}
                        </a>
                    </li>
                    <li >
                        <a href="">
                            {{ trans('common.sidebar.customer') }}
                        </a>
                    </li>
                </ul>

            </li>
            <li class="content">

                <a href="admin/content.html" class=" exp" >
                    <span>{{ trans('common.sidebar.nd') }}</span>
                    <strong>1</strong>
                </a>

                <ul class="sub">
                    <li >
                        <a href="">
                            {{ trans('common.sidebar.slide') }}
                        </a>
                    </li>
                    <li >
                        <a href="">
                            {{ trans('common.sidebar.news') }}
                        </a>
                    </li>
                </ul>

            </li>

        </ul>

    </div>
    <div class="clear"></div>
</div>

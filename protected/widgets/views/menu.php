<div id="sidebar" class="sidebar">
    <div class="sidebar-menu nav-collapse">
        <div class="divide-20"></div>
        <!-- SEARCH BAR -->
        <div id="search-bar">
            <input class="search" type="text" placeholder="Поиск"><i class="fa fa-search search-icon"></i>
        </div>
        <ul>

            <li>
                <a href="<?=$this->createUrl('/archive');?>">
                    <i class="fa fa-file-text fa-fw"></i> <span class="menu-text">Архив</span>
                    <span class="selected"></span>
                </a>
            </li>

            <li class="has-sub">
                <a href="javascript:;" class="">
                    <i class="fa fa-th-large fa-fw"></i><span class="menu-text">Пользователи</span>
                    <span class="arrow"></span>
                </a>

                <ul class="sub">
                    <li><a class="" href="<?=$this->createUrl('/users/list');?>"><span class="sub-menu-text">Пользователей</span></a></li>
                    <li><a class="" href="<?=$this->createUrl('/users/roles');?>"><span class="sub-menu-text">Роли</span></a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
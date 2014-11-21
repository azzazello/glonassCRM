<div class="leftpanel">
    <div class="media profile-left">
        <a class="pull-left profile-thumb" href="profile.html">
            <img class="img-circle" src="<?=Yii::app()->request->baseUrl;?>/images/photos/profile.png" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><?=Yii::app()->user->name;?></h4>
            <small class="text-muted">���������</small>
        </div>
    </div><!-- media -->

    <h5 class="leftpanel-title">���������</h5>
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="<?=$this->createUrl("/site/index")?>"><i class="fa fa-home"></i> <span>������� ��������</span></a></li>

        <li><a href="<?=$this->createUrl("/requestshipping/create")?>"><i class="fa fa-edit"></i> <span>������ ������</span></a></li>

        <li><a href="<?=$this->createUrl("/order/inwork")?>"><span class="pull-right badge">2</span><i class="fa fa-bars"></i> <span>������ � ������</span></a></li>
        <li><a href="messages.html"><span class="pull-right badge">5</span><i class="fa fa-edit"></i> <span>����� ������</span></a></li>
        <li><a href="messages.html"><i class="fa fa-file-text"></i> <span>����� ������</span></a></li>
        <li><a href="<?=$this->createUrl("/rating")?>"><i class="fa fa-edit"></i> <span>��� ������</span></a></li>

        <li class="parent"><a href=""><i class="fa fa-suitcase"></i> <span>������</span></a>
            <ul class="children">
                <li><a href="alerts.html">����������</a></li>
                <li><a href="buttons.html">�������� � ������ ���������</a></li>
            </ul>
        </li>


    </ul>

</div><!-- leftpanel -->
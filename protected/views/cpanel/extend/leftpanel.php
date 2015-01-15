<div class="leftpanel">
    <div class="media profile-left">
        <a class="pull-left profile-thumb" href="profile.html">
            <img class="img-circle" src="<?=Yii::app()->request->baseUrl;?>/images/photos/profile.png" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><?=Yii::app()->user->name;?></h4>
            <small class="text-muted">�����</small>
        </div>
    </div><!-- media -->

    <h5 class="leftpanel-title">���������</h5>
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="<?=$this->createUrl("/site/index")?>"><i class="fa fa-home"></i> <span>������� ��������</span></a></li>

        <li><a href="<?=$this->createUrl("/requestshipping/create")?>"><i class="fa fa-edit"></i> <span>�������� ������</span></a></li>

        <li><a href="<?=$this->createUrl("/zreport/index")?>"><i class="fa fa-bars"></i> <span>Z ������</span></a></li>
        <li><a href="<?=$this->createUrl("/trucks/list")?>"><i class="fa fa-edit"></i> <span>������</span></a></li>
        <li><a href="messages.html"><i class="fa fa-edit"></i> <span>��������</span></a></li>
        <li><a href="<?=$this->createUrl("/export/index")?>"><i class="fa fa-edit"></i> <span>�������</span></a></li>


    </ul>

</div><!-- leftpanel -->
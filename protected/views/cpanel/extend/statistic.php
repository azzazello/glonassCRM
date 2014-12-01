<div class="row row-stat">
    <div class="col-md-4">
        <div class="panel panel-success-alt noborder">
            <div class="panel-heading noborder">
                <div class="panel-btns">
                    <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                </div><!-- panel-btns -->
                <div class="panel-icon"><i class="fa fa-dollar"></i></div>
                <div class="media-body">
                    <h5 class="md-title nomargin">Размещено заявок на</h5>
                    <h1 class="mt5"><b><?=RequestShipping::countRequestAmountMoney()?> р</b></h1>
                </div><!-- media-body -->
                <hr>
                <div class="clearfix mt20">
                    <div class="pull-left">
                        <h5 class="md-title nomargin">Сегодня</h5>
                        <h4 class="nomargin"><b><?=RequestShipping::countRequestAmountMoneyYesterday()?> р</b></h4>
                    </div>
                    <div class="pull-right">
                        <h5 class="md-title nomargin">Неделя</h5>
                        <h4 class="nomargin"><?=RequestShipping::countRequestAmountMoneyWeekly()?> р</h4>
                    </div>
                </div>

            </div><!-- panel-body -->
        </div><!-- panel -->
    </div><!-- col-md-4 -->

    <div class="col-md-4">
        <div class="panel panel-primary noborder">
            <div class="panel-heading noborder">
                <div class="panel-btns">
                    <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                </div><!-- panel-btns -->
                <div class="panel-icon"><i class="fa fa-users"></i></div>
                <div class="media-body">
                    <h5 class="md-title nomargin">Всего пользователей</h5>
                    <h1 class="mt5"><?=Users::countAllUsers()?></h1>
                </div><!-- media-body -->
                <hr>
                <div class="clearfix mt20">
                    <div class="pull-left">
                        <h5 class="md-title nomargin">Yesterday</h5>
                        <h4 class="nomargin"><?=Users::countAllUsersYesterday()?></h4>
                    </div>
                    <div class="pull-right">
                        <h5 class="md-title nomargin">This Week</h5>
                        <h4 class="nomargin"><?=Users::countAllUsersWeekly()?></h4>
                    </div>
                </div>

            </div><!-- panel-body -->
        </div><!-- panel -->
    </div><!-- col-md-4 -->

    <div class="col-md-4">
        <div class="panel panel-dark noborder">
            <div class="panel-heading noborder">
                <div class="panel-btns">
                    <a href="" class="panel-close tooltips" data-toggle="tooltip" data-placement="left" title="Close Panel"><i class="fa fa-times"></i></a>
                </div><!-- panel-btns -->
                <div class="panel-icon"><i class="fa fa-pencil"></i></div>
                <div class="media-body">
                    <h5 class="md-title nomargin">Ответов водителей</h5>
                    <h1 class="mt5"><?=ReplyShipping::countAllReply()?></h1>
                </div><!-- media-body -->
                <hr>
                <div class="clearfix mt20">
                    <div class="pull-left">
                        <h5 class="md-title nomargin">Yesterday</h5>
                        <h4 class="nomargin"><?=ReplyShipping::countAllReplyYesterday()?></h4>
                    </div>
                    <div class="pull-right">
                        <h5 class="md-title nomargin">This Week</h5>
                        <h4 class="nomargin"><?=ReplyShipping::countAllReplyWeekly()?></h4>
                    </div>
                </div>

            </div><!-- panel-body -->
        </div><!-- panel -->
    </div><!-- col-md-4 -->
</div><!-- row -->


<div class="locked" style="display: none">
    <div class="lockedpanel">
        <div class="loginuser">
            <img src="<?=Yii::app()->request->baseUrl;?>/images/logo-h.png" class="img-circle img-online" alt="" style="background-color: #428BCA; height: 92px"/>
        </div>
        <div class="logged">
            <h4>Ожидайте выполнения запроса.</h4>
            <small class="text-muted">Окно закроется самостоятельно после окончания выполнения задачи.</small>
        </div>
        <form id="unlock" method="post" action="index.html">
            <div class="input-group">

            </div><!-- input-group -->
            <img src="<?=Yii::app()->request->baseUrl;?>/images/loaders/ajax-loader.gif">
        </form>
    </div><!-- lockedpanel -->
</div><!-- locked -->
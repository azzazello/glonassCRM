<div class="mainpanel">
    <div class="pageheader">
        <div class="media">
            <div class="pageicon pull-left">
                <i class="fa fa-home"></i>
            </div>
            <?$this->renderPartial("application.views.cpanel.extend.breadcumb")?>
        </div><!-- media -->
    </div><!-- pageheader -->

    <div class="contentpanel">
        <p class="mb20"><a href="http://datatables.net/" target="_blank">DataTables</a> is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table.</p>

        <div class="panel panel-primary-head">
            <div class="panel-heading">
                <h4 class="panel-title">Basic Configuration</h4>
                <p>Searching, ordering, paging etc goodness will be immediately added to the table, as shown in this example.</p>
            </div><!-- panel-heading -->
            <br>
            Логин: <?=$account->user?><br>
            Пароль: <?=$account->pass?><br>
            Новый: <?=$isNew?>


            <iframe src="http://85.175.152.118:81/web2/index.cfm?" width="100%" height="600" align="left" id='web2'>
                Ваш браузер не поддерживает плавающие фреймы!
            </iframe>







        </div><!-- panel -->
        <br />



    </div><!-- contentpanel -->

</div>

<script>


    $(document).ready(function(){
        $(".mask").mask("+7(999)999-99-99")
    });

</script>
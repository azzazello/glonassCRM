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

        <form action="<?=$this->createUrl("/trucks/CreateAndSendAccess")?>" method="post">
         <?
         echo  FormHTML::select_simple($accounts,"accounts","accounts","Новый аккаунт","user"); echo "<br><br>";
         foreach ($plates as $plate) {
             echo "Номера: <input type='text' name='plates[]' size='20' value='".$plate."'><br>";

         }
         ?>
         <br><br>
         Номер телефона: <input type="text" name="phone" class="mask"><br><br>
        <input type="submit" value="ПШЁЛ">
        </form>
        </div><!-- panel -->
        <br />



    </div><!-- contentpanel -->

</div>

    <script>
        $(document).ready(function(){
           $(".mask").mask("+7(999)999-99-99")
        });

    </script>
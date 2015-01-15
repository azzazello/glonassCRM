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

        <div class="panel panel-primary-head">
        <div class="panel-heading">
            <h4 class="panel-title">���������� ����� ������</h4>
            <p>�� ������ �������� �� ������ �������� ����� ������.</p>
        </div><!-- panel-heading -->

<br>

            <?
            if ($result["result"] == "error") {
            if ($result["errno"] > 0) echo MYChtml::alert_msg($this->errorSave[$result["errno"]]);
            if ($result["errno"] == -1) echo MYChtml::alert_msg("�������� �� ������ � ��");
            }
            if ($result["result"] == "noerror") {
                $this->redirect($this->createUrl("requestshipping/create",array("success"=>1)));
                //echo MYChtml::success_msg("������ �� ��������� ���������.");
            }

            if ($_GET['success']==1) {
                echo MYChtml::success_msg("������ �� ��������� ���������.");
            }



            ?>
            <br>
            <div class="panel-body nopadding" style="max-width: 1000px">
<form action="<?=$this->createUrl("create",array("select"=>1))?>" method="post"  class="form-horizontal form-bordered">





    <div class="form-group">
        <label class="col-sm-4 control-label">���� �������(z ������):</label>
        <div class="col-sm-8">
            <input class="form-control maskdate" name='date' >
        </div>
    </div>




    <div class="form-group">
        <label class="col-sm-4 control-label">����� ������:</label>
        <div class="col-sm-8">
            <input value="" name="plate" id="plate" class="form-control">
        </div>
    </div>




    <div class="form-group newtruck" style="display: none" >
        <label class="col-sm-4 control-label">���:</label>
        <div class="col-sm-8">
            <input name="fio" id="fio" class="float  form-control">
        </div>
    </div>

    <div class="form-group newtruck" style="display: none" >
        <label class="col-sm-4 control-label">��������� ���:</label>
        <div class="col-sm-8">
            <select name="weight" id="fsdfsd2" class="float  form-control">
                <option value="10">300 � ���</option>
                <option value="6.67">200 � ���</option>
                <option value="5.48">2000 � ���</option>
                <option value="0">��� ���������</option>
            </select>
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-4 control-label">����� ���������:</label>
        <div class="col-sm-8">
            <input name="amount_installation" id="amount_installation" class="float  form-control">
        </div>
    </div>


    <div class="form-group">
        <label class="col-sm-4 control-label">����� ���������:</label>
        <div class="col-sm-8">
            <input name="amount_fee_license" id="amount_fee_license" class="float  form-control">
        </div>
    </div>





    <div class="form-group">
        <label class="col-sm-4 control-label">�����������<div style="color: #808080">������� ������ ���������� �� ���������</div></label>
        <div class="col-sm-8">
            <textarea id="comment"  name = "comment" class="form-control" rows="5"></textarea>
        </div>
    </div><!-- form-group -->

    <div class="form-group">
        <label class="col-sm-4 control-label"></label>
        <div class="col-sm-8">
            <button type="submit" id="sendButton">���������</button> <span id="spinner" style="display: none" ><img src="<?=Yii::app()->request->baseUrl;?>/img/loading.gif"></span>
        </div>
    </div>



</form>

</div>
        </div>
        </div>
</div>

<script>


    jQuery(document).ready(function() {

        $("#sendButton").click(function(){
          locked();
        });

        jQuery("#regions").removeClass("form-control");
        jQuery('#regions').select2();
        jQuery('select.select2').select2();
        $("#plate").blur(function(){
            $.get("<?=$this->createUrl("/ajax/checkplate")?>",{"plate":$(this).val()},function(data){

                if (data == "false") {
                    $(".newtruck").show("fast");
                } else {
                    $(".newtruck").hide("fast");
                }

            });

        });
        $(".maskdate").mask("9999-99-99");
    });

</script>
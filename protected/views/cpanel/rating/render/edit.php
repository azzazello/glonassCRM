<?header('Content-Type: text/html; charset=windows-1251');?>
<form action="#" method="post" class="form-horizontal form-bordered" onsubmit="return false;">

    <div class="form-group">
        <label class="col-sm-4 control-label">��� ������</label>
        <div class="col-sm-8">

            <div class="rdio rdio-success">
                <input type="radio" name="rating" value="1" <?if($rating->rating==1)echo 'checked';?> id="radioSuccess" />
                <label for="radioSuccess">��������������</label>
            </div>

            <div class="rdio rdio-danger">
                <input type="radio" name="rating" value="2" <?if($rating->rating==2)echo 'checked';?> id="radioDanger" />
                <label for="radioDanger">�������������</label>
            </div>

        </div><!-- col-sm-8 -->
    </div><!-- form-group -->

    <div class="form-group">
        <label class="col-sm-4 control-label">����� ������</label>
        <div class="col-sm-8">
            <textarea class="form-control" name="description" rows="5"><?=$rating->description;?></textarea>
        </div>
    </div>

    <button style="float: right;" class="btn btn-success" onclick="saveComment()">�������������</button>

    <div style="clear: both"></div>


</form>
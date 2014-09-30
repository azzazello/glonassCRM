<form action="<?=$this->createUrl("create",array("select"=>1))?>" method="post">

<?

echo FormHTML::select($all_region,"regions","regions","Выберите регион",$_POST["regions"]);
if ($select == 1) {

}
?>
  <button type="submit">Отправить</button>
</form>




<script>
    jQuery(document).ready(function() {


        $('#categories').select2({

            ajax: {
                url: "<?=$this->createUrl("/ajax/locality")?>?code="+$("#region"),
                dataType: 'json',
                quietMillis: 100,
                data: function (term, page) {
                    return {
                        name: term, //search term
                        page_limit: 10 // page size
                    };
                },
                results: function (data, page) {
                    return { results: data.results };
                }

            },
            initSelection: function(element, callback) {
                return $.getJSON("/ajax/select2_sample.php?id=" + (element.val()), null, function(data) {

                    return callback(data);

                });
            }

        });


    });

</script>
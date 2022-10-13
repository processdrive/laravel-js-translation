
<?php
    $lanuage = app()->getLocale();
    //Read JSON file
    $data = file_get_contents(resource_path().'/'.$lanuage.'.json');
?>

<script>

    var json_data =   {!! json_encode($data, JSON_HEX_TAG) !!};
    json_data = json_data ? JSON.parse(json_data) : {}

    function trans(key, replace = {})
    {
        let translation = json_data[key] || '';
        return translation;
    }
</script>   

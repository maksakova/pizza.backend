$('input:file').change(
    function(e){
        $('#file-name').text(e.target.files[0].name)
    }
);

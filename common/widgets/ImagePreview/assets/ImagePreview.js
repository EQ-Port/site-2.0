var ImagePreview = {
    init: function(hiddenInputId, uploadUrl) {
        var img = $('#' + hiddenInputId + '-img');
        var fileInput = $('#' + hiddenInputId + '-file');
        var hiddenInput = $('#' + hiddenInputId);

        $(fileInput).change(function(){
            var fd = new FormData();
            fd.append('image', $(this)[0].files[0]);

            $.ajax({
                type: 'POST',
                url: uploadUrl,
                data: fd,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data) {
                    $(img).attr('src', data.url).show();
                    $(hiddenInput).val(data.id);
                }
            });
        });
    }
};
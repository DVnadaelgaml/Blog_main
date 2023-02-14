<div style="background-color: #fff;border-radius: 10px" class="col-sm-12">
    <div class="form-group">
        <label>Write Something:</label>
        <textarea name="text" id="text" class="form-control post-text" rows="5"
                  placeholder="Example : Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s"></textarea>
    </div>
    <div class="form-group">
        <input type="file" name="file" id="file" class="form-control post-file">
    </div>
    <div class="photos" style="overflow-x: auto;overflow-y: hidden;width: 100%;white-space: nowrap">

    </div>
    <input type="button" value="Post" class="btn btn-primary float-right send-post-btn" style="margin: 10px 0px">
</div>

@push('scripts')
    <script>
        var meta_data = $('meta[name="meta_data"]');
        $('.post-file').change(function (event) {
            var src = URL.createObjectURL(event.target.files[0]);
            $('.photos').empty().append(`
                <img src="${src}" width="60" />
            `);
        });

        $('.send-post-btn').click(function () {
            var data = new FormData();
            if(document.getElementById('file').files[0] != undefined) {
                var file = document.getElementById('file').files[0];
                data.append('image',file);
            }
            var text = document.getElementById('text').value;
            data.append('text', text);
            data.append('_token',meta_data.data('token'));
            if (meta_data.data('user') == 0){
                alert('Login First');
                return;
            }

            $.ajax({
                url : `/post`,
                method : 'post',
                data,
                processData: false, // important
                contentType: false, // important
                cache: false,
                success : function (data) {
                    if(data.status == 400){
                        toastr.warning(data.error);
                        return;
                    }
                    toastr.success('Post Created Successfully');
                }
            })
        });
    </script>
@endpush

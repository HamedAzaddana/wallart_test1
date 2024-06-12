<div id="field-{{$name}}-file-picker" class="m-2 p-1">
    <input style="text-align: left;margin: 5px;width: 65%;float: left;" id="ff-{{$name}}" name="{{$name}}" class="form-control" type="text" readonly>
    <button class="btn btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#open-{{$name}}-file-picker">{{ $slot }}</button>
    <div class="modal fade" id="open-{{$name}}-file-picker" tabindex="-1" aria-labelledby="open-{{$name}}-file-picker" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">انتخاب فایل</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <iframe style="width: 100%;height: 900px;" src="{{$iframe_url}}" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('message', function(event) {
        if (event.data.case == "file_uploader") {
            var name = "{{$name}}";
            document.getElementById(`ff-${name}`).value = event.data.url_picked;
            var myModalEl = document.getElementById(`open-${event.data.selector_fp}-file-picker`);
            var modal = bootstrap.Modal.getInstance(myModalEl)
            modal.hide();
        }
    });
</script>
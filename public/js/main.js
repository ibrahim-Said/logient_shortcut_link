
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function deleteItem(route) {
    Swal.fire({
        title: $('#swal_title').val(),
        text: $('#swal_text').val(),
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: $('#confirmButtonText').val(),
        cancelButtonText: $('#cancelButtonText').val()
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'delete',
                url: route,
                success: function(data) {
                    if (data.success === true) {
                        Swal.fire(
                            $('#swal_success_alert_title').val(),
                            data.message,
                            'success'
                        )
                        datatable.ajax.reload();
                        return;
                    }
                }
            })
        }
    })
}
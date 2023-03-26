
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
// $(document).ready(function() {

//     $('.treeview').each(function() {
//         var shouldExpand = false
//         $(this).find('li').each(function() {
//             if ($(this).hasClass('active')) {
//                 shouldExpand = true
//             }
//         })
//         if (shouldExpand) {
//             $(this).addClass('active')
//         }
//     })
// })
function deleteItem(route) {
    Swal.fire({
        title: 'Attention !?',
        text: 'Voulez-vous supprimer cet élement ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Supprimer !',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'delete',
                url: route,
                success: function(data) {
                    if (data.success === true) {
                        Swal.fire(
                            'Bien !',
                            'Supprimé avec succès !',
                            'success'
                        )
                        datatable.ajax.reload();
                        return;
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Tu n\'a pas le droit !',
                        })
                    }
                }
            })
        }
    })
}
function enableOrDisableItem(route) {
    Swal.fire({
        title: 'Attention !?',
        text: 'Voulez-vous change le statut de cet élement ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Valider  !',
        cancelButtonText: 'Annuler'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'post',
                url: route,
                success: function(data) {
                    if (data.success === true) {
                        Swal.fire(
                            'Bien !',
                            'Changé avec succès !',
                            'success'
                        )
                        datatable.ajax.reload();
                        return;
                    }
                }
            })
        }
    })
    datatable.ajax.reload();
}
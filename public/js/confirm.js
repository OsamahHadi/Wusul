$('.confirm').on('click',function(e){
    e.preventDefault();
    var form = $(this).parents('form');
    Swal.fire({
        title: "هل انت متأكد من المتابعة",
        text: "لن يمكنك التراجع عن هذا !",
        icon: "warning",
        showCancelButton: !0,
        confirmButtonText: "نعم, تأكيد",
        customClass: {confirmButton: "btn btn-primary me-3", cancelButton: "btn btn-label-secondary"},
        buttonsStyling: !1
    }).then(function (t) {
        t.value ? Swal.fire({
                icon: "success",
                title: "تم!",
                text: "لقد تمت العملية بنجاخ.",
                customClass: {confirmButton: "btn btn-success"}
            }, setTimeout(function(){

                form.submit()
            }, 1000)
        ) : t.dismiss === Swal.DismissReason.cancel && Swal.fire({
            title: "تم الالغاء",
            text: "تم الغاء العملية :)",
            icon: "error",
            customClass: {confirmButton: "btn btn-success"}
        })
    })
});

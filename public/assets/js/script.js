$('body').on('click', '.modal-show', function(event){
	event.preventDefault();

	var me = $(this),
      url = me.attr('href'),
      title = me.attr('title');

        $('#modal-title').text(title);
        $('#modal-btn-save').prop('hidden', false);
        $('#modal-btn-save').removeClass('hide')
        .text(me.hasClass('edit') ? 'Update' : 'Create');

        $.ajax({
            url: url,
            dataType: 'html',
            success: function(response){
                $('#modal-body').html(response);
            }
        })	
    $('#modal').modal('show');
})

$('#modal-btn-save').click(function (event) {
    event.preventDefault();

    var form = $('#modal-body form'),
    url = form.attr('action'),
    method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

    form.find('.help-error').remove();
    form.find('.spanerror').removeClass('has-error');

    $.ajax({
        url : url,
        method: method,
        data : form.serialize(),
        success: function (response) {
            form.trigger('reset');
            $('#modal').modal('hide');
            $('#datatable').DataTable().ajax.reload();

            if(response.status == 'ERROR'){
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'NIS tidak Ada di Data!'
                });
            } else {
                swal({
                    type : 'success',
                    title : 'Success!',
                    text : 'Data has been saved!'
                });
            }
        },
        error : function (xhr) {
            var res = xhr.responseJSON;
            if ($.isEmptyObject(res) == false) {
                $.each(res.errors, function (key, value) {
                    $('#' + key)
                    .closest('.spanerror')
                    .addClass('has-error')
                    .append('<span class="help-error text-danger text-sm"><strong>' + value + '</strong></span>');
                });
            }
        }
    })
});

$('body').on('click', '.btn-delete', function (event) {
    event.preventDefault();

    var me = $(this),
    url = me.attr('href'),
    title = me.attr('title'),
    csrf_token = $('meta[name="csrf-token"]').attr('content');

    swal({
        title: 'Yakin ingin menghapus Data ' + title + ' ?',
        text: 'kamu tidak bisa mengembalikan data ini',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': csrf_token
                },
                success: function (response) {
                    $('#datatable').DataTable().ajax.reload();
                    swal({
                        type: 'success',
                        title: 'Success!',
                        text: 'Data Berhasil Dihapus'
                    });
                },
                error: function (xhr) {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!'
                    });
                }
            });
        }
    });
});

$('body').on('click', '.btn-show', function (event) {
    event.preventDefault();

    var me = $(this),
    url = me.attr('href'),
    title = me.attr('title');

    $('#modal-title').text(title);
    $('#modal-btn-save').addClass('hide');
    $('#modal-btn-save').prop('hidden', true);

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal-body').html(response);
        }
    });

    $('#modal').modal('show');
});
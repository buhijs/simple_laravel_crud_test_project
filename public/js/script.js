$(document).ready(function() {
  // Edit modal
  $(document).on('click', '.edit-modal', function() {
        $('#footer_action_button').text("Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#n').val($(this).data('name'));
        $('#sn').val($(this).data('surname'));
        $('#p').val($(this).data('phone'));
        $('#a').val($(this).data('age'));
        $('#e').val($(this).data('email'));
        $('#myModal').modal('show');
    });
    // delete modal
    $(document).on('click', '.delete-modal', function() {
        $('#footer_action_button').text(" Delete");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('.dsname').html($(this).data('surname'));
        $('#myModal').modal('show');
    });

    $('.modal-footer').on('click', '.edit', function() {

        $.ajax({
            type: 'post',
            url: '/editItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'name': $('#n').val(),
                'surname': $('#sn').val(),
                'phone': $('#p').val(),
                'age': $('#a').val(),
                'email': $('#e').val()

            },
            success: function(data) {
                $('.item' + data.id).replaceWith(
                  "<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.surname + "</td><td>" + data.phone + "</td><td>" + data.age + "</td><td>" + data.email + "</td><td><button class='edit-modal btn btn-info btn-xs' data-id='" + data.id + "' data-name='" + data.name + "' data-surname='" + data.surname + "' data-phone='" + data.phone + "' data-age='" + data.age + "'data-email='" + data.email + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger btn-xs' data-id='" + data.id + "' data-name='" + data.name + "' data-surname='" + data.surname + "' data-phone='" + data.phone + "' data-age='" + data.age + "'data-email='" + data.email + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
            }
        });
    });
    // add new entry
    $("#add").click(function() {

        $.ajax({
            type: 'post',
            url: '/addItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'name': $('input[name=name]').val(),
                'surname': $('input[name=surname]').val(),
                'phone': $('input[name=phone]').val(),
                'age': $('input[name=age]').val(),
                'email': $('input[name=email]').val()

            },
            success: function(data) {
                if ((data.errors)){
                  $('.error').removeClass('hidden');
                    $('.error').text(data.errors.name);
                    $('.error').text(data.errors.surname);
                    $('.error').text(data.errors.phone);
                    $('.error').text(data.errors.age);
                    //$('.error').text(data.errors.email);
                }
                else {
                    $('.error').addClass('hidden');
                    $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.surname + "</td><td>" + data.phone + "</td><td>" + data.age + "</td><td>" + data.email + "</td><td><button class='edit-modal btn btn-info btn-xs' data-id='" + data.id + "' data-name='" + data.name + "' data-surname='" + data.surname + "' data-phone='" + data.phone + "' data-age='" + data.age + "'data-email='" + data.email + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger btn-xs' data-id='" + data.id + "' data-name='" + data.name + "' data-surname='" + data.surname + "' data-phone='" + data.phone + "' data-age='" + data.age + "'data-email='" + data.email + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                }
            },

        });
        $('#name').val('');
        $('#surname').val('');
        $('#phone').val('');
        $('#age').val('');
        $('#email').val('');
    });
    // delete entry
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/deleteItem',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text()
            },
            success: function(data) {
                $('.item' + $('.did').text()).remove();
            }
        });
    });
});

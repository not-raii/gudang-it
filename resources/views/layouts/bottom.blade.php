<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
{{-- <script src="{{ asset('vendor/jquery-ui/jquery-ui.js') }}" type="text/javascript"></script> --}}

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/script.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script> --}}

<!-- Script Yajra DataTables -->
<script>
	// TABLE USER
	$(document).ready(function () {
		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$('#tableUser').DataTable({
		processing: true,
		serverSide: true,
		// ordering: true,
		ajax: {
			url: "{{ route('manage.user') }}",
		},
		columns: [
					{data: 'id', name: 'id', width: '10px'},
					{data: 'name', name: 'name'},
					{data: 'email', name: 'email'},
					{data: 'role.name', name: 'role.name'},
					{data: 'action', name: 'action', orderable: false, searchable: false},
				],
		});

		// 01.TAMBAH USER
		$('#create_record').click(function(){
			$('#action_button').val('Tambah');
			$('#action').val('Tambah');
			$('.modal-title').text('Tambah Karyawan');

			$('#formUser').modal('show');
		});

		$('#addUser').on('submit', function(e){
			e.preventDefault(); 
			var action_url = '';
	
			if($('#action').val() == 'Tambah')
			{
				action_url = "{{ route('add.user') }}";
			}

			// if($('#action').val() == 'Edit')
			// {
			// 	action_url = 
			// }

			$.ajax({
				type: 'post',
				url: action_url,
				data: {
						name: $('#name').val(),
						role_id: $('#role_id').val(),
						email: $('#email').val(),
						password: $('#password').val()
					},
				dataType: 'json',
				success: function(response) {
				if (response.errors) {
						$('.alert-danger').removeClass('d-none');
						$.each(response.errors, function(key, value) {
						$('.alert-danger').append("<p>" +value+ "</p>");
						});
					} else {
						$('#addUser')[0].reset();
						$('.alert-success').removeClass('d-none');
						$('.alert-success').html(response.success);
					}
				$('#tableUser').DataTable().ajax.reload();
				},
				error: function(response) {
					var errors = response.responseJSON;
					console.log(errors);
				}
			});
		});

		var user_id;
 
    $(document).on('click', '#remove', function(){
        user_id = $(this).attr('id');
        $('#confirmModal').modal('show');
    });
 
    $('#ok_button').click(function(){
        $.ajax({
            url: "manage_user/"+user_id,
            beforeSend:function(){
                $('#ok_button').text('Deleting...');
            },
            success:function(data)
            {
                setTimeout(function(){
                $('#confirmModal').modal('hide');
                $('#tableUser').DataTable().ajax.reload();
                alert('Data Deleted');
                }, 2000);
            }
        })
    });

		// 04_PROSES Delete 
		// $(document).on('click', '#remove', function(e) {

		// 	e.preventDefault();

		// 	Swal.fire({
		// 	title: 'Apakah Anda Yakin?',
		// 	icon: 'warning',
		// 	showCancelButton: true,
		// 	confirmButtonColor: '#0061FF',
		// 	cancelButtonColor: '#858796',
		// 	cancelButtonText: 'Tidak',
		// 	confirmButtonText: 'Iya, Hapus!'
		// 	}).then((result) => {
		// 	if (result.isConfirmed) {
		// 		var id = $(this).data('id');

		// 		// console.log(id)
		// 		$.ajax({
		// 			url: "manage_user/"+id,
		// 		});
		// 		$('#tableUser').DataTable().ajax.reload();
		// 	}
		// 	});
		// }); 
	});



	//02. EDIT USER
	$(document).on('click', '#edit', function(e){
        e.preventDefault(); 
        var id = $(this).attr('id');
 
        $.ajax({
            url :'manage_user/' + id + '/edit',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType:'json',
            success:function(response)
            {
                $('#formUser').modal('show');
				$('.modal-title').text('Edit Karyawan');

                $('#name').val(response.result.name);
                $('#role_id').val(response.result.role_id);
                $('#email').val(response.result.email);

				$('#action_button').val('Update');
                $('#action').val('Edit'); 

                console.log(response.result);
                // $('.editpass').hide(); 
            },
            error: function(response) {
                var errors = response.responseJSON;
                console.log(errors);
            }
        })
    });

	
	// $('body').on('click', '#remove', function(e) {
	// 	if (confirm('Yakin mau hapus data ini?') == true) {
	// 		var id = $(this).data('id');
	// 		$.ajax({
	// 			url: 'manage_user/' + id,
	// 			type: 'DELETE',
	// 		});
	// 		$('#tableUser').DataTable().ajax.reload();
	// 	}
    // });

	// $('body').on('click', '.tombol-edit', function(e) {
    //     var id = $(this).data('id');
    //     $.ajax({
    //         url: 'pegawaiAjax/' + id + '/edit',
    //         type: 'GET',
    //         success: function(response) {
    //             $('#exampleModal').modal('show');
    //             $('#nama').val(response.result.nama);
    //             $('#email').val(response.result.email);
    //             console.log(response.result);
    //             $('.tombol-simpan').click(function() {
    //                 simpan(id);
    //             });
    //         }
    //     });

    // });
</script>

<!-- Script SweetAlert -->
<script type="text/javascript">

	$('.update').click(function(event) {
		var form =  $(this).closest("form");
		var name = $(this).data("name");
		event.preventDefault();

		Swal.fire({
		title: 'Apakah Anda Yakin?',
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#0061FF',
		cancelButtonColor: '#858796',
		cancelButtonText: 'Tidak',
		confirmButtonText: 'Iya, Update!'
		}).then((result) => {
		if (result.isConfirmed) {
			form.submit();
		}
		});
	});

</script>

{{-- Script Show Password --}}
<script>
	function password_show_hide() {
		var x = document.getElementById("password");
		var show_eye = document.getElementById("show_eye");
		var hide_eye = document.getElementById("hide_eye");
		hide_eye.classList.remove("d-none");
		if (x.type === "password") {
			x.type = "text";
			show_eye.style.display = "none";
			hide_eye.style.display = "block";
		} else {
			x.type = "password";
			show_eye.style.display = "block";
			hide_eye.style.display = "none";

		}
	}

	$(document).ready(function() {
		$('#show_password').click(function() {
			var passwordField = $('#password');
			var passwordFieldType = passwordField.attr('type');
			if (passwordFieldType === 'password') {
			passwordField.attr('type', 'text');
			$(this).html('<i class="fa fa-eye-slash"></i>');
			} else {
			passwordField.attr('type', 'password');
			$(this).html('<i class="fa  fa-eye"></i>');
			}
		});
	});
</script>

<!-- Script AutoComplete -->
<script type="text/javascript">

	// CSRF Token
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$(document).ready(function(){

		$( "#namaBarang" ).autocomplete({
		source: function( request, response ) {
			$.ajax({
			url: "{{ route('fetch.barang.masuk') }}",
			type: 'post',
			dataType: "json",
			data: {
				_token: CSRF_TOKEN,
				search: request.term
			},
			success: function( data ) {
				response( data );
			}
			});
		},
		select: function (event, ui) {
			$('#namaBarang').val(ui.item.label); 
			$('#listBarang').val(ui.item.value); 
			return false;
		}
		});

	});
	</script>
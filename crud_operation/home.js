$(document).ready(function() {
	baseURL = window.location.protocol + "//" + window.location.host + "/crud_operation";
	$('#post').click(function() {

		var text = $("textarea[name=text]").val();
		if (text != "") {

			$.ajax
				({
					type: 'post',
					url: baseURL + '/api/create',

					data: {
						do_post: "do_post",
						text: text
					},
					success: function(response) {
						if (response.trim() == 'ok') {
							window.location.href = baseURL;

						} else {
							$("#msg").html(response);

						}
					}
				});
		}

		return false;
	});

	$('#update').click(function(e) {
		e.preventDefault();
		var text = $("input[name=text]").val();
		var id = $("input[name=id]").val();
		$.ajax
			({
				type: 'put',
				url: baseURL + '/api/update',
				data: {
					do_update: "do_update",
					text: text,
					id: id
				},
				success: function(response) {
					if (response.trim() == 'ok') {
						window.location.href = baseURL;

					} else {
						$("#msg").html(response);


					}
				}
			});



	});
	$('#delete').click(function(e) {
		e.preventDefault();
		var id = $("input[name=id]").val();

		$.ajax
			({
				type: 'delete',
				url: baseURL + '/api/delete',
				data: {
					do_delete: "do_delete",
					id: id
				},
				success: function(response) {
					if (response.trim() == 'ok') {
						window.location.href = baseURL;

					} else {
						$("#msg").html(response);

					}
				}
			});
	})

});
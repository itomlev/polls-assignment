$(function() {

	$(document).on('click', '.poll input[type=radio]', function() {
		$('.poll').find('label').removeClass('not-chosen');
		var id = $(this).attr('id');
		$(this).parents('.poll').find('label').not('[for='+id+']').addClass('not-chosen');
		$('.poll').find('.alert').fadeOut(function() {
			$(this).remove();
		});
	});

	$('.poll form').on('submit', function(e) {
		e.preventDefault();
		var formData = $(this).serializeArray();
		pollVote(formData, function(err, res) {
			if (err) {
				if (err == 'missing poll data') {
					$('.poll').append('<div class="alert alert-danger" role="alert">Please choose an answer</div>')
				}
			} else {
				getVotes(formData[0].name, function(votes) {
					$.each(votes, function(key, val) {
						if (key == 'total') return;
						var percent = Math.round((val*100)/votes.total);
						$('.poll').find('.row[data-answer='+key+']').find('.bar').css('width', percent+'%').html(percent+'%');
					});
					$('.poll').find('.total').html(votes.total);
				});
			}
		});
	});

	function pollVote(data, callback) {
		$.ajax({
			url: 'services/poll-vote.php',
			method: 'POST',
			dataType: 'json',
			data: data,
		}).done(function(response) {
			if (response.error) {
				callback(response.error);
			} else {
				callback(null, response.success);
			}
		});
	}

	function getVotes(poll_id, callback) {
		$.ajax({
			url: 'services/poll-votes.php',
			method: 'GET',
			data: { poll_id: poll_id }
		}).done(function(response) {
			callback(response);
		});
	}

});
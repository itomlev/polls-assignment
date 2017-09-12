<?php include 'header.php';?>

<div class="container">
	<div class="poll">
		<h1>What color do you like best?</h1>
		<form>
			<div class="row" data-answer="1">
				<div class="col-md-3">
					<input type="radio" id="poll-111-1" name="poll-111" value="1"> <label for="poll-111-1">Blue</label>
				</div>
				<div class="col-md-9">
					<div class="bar"></div>
				</div>
			</div>
			<div class="row" data-answer="2">
				<div class="col-md-3">
					<input type="radio" id="poll-111-2" name="poll-111" value="2"> <label for="poll-111-2">Green</label>
				</div>
				<div class="col-md-9">
					<div class="bar"></div>
				</div>
			</div>
			<div class="row" data-answer="3">
				<div class="col-md-3">
					<input type="radio" id="poll-111-3" name="poll-111" value="3"> <label for="poll-111-3">Don't care</label>
				</div>
				<div class="col-md-9">
					<div class="bar"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					<input type="submit" value="Vote" class="btn btn-primary">
				</div>
			</div>
		</form>
		<div class="row">
			<div class="col-md-10">Total votes: <span class="total"></span></div>
		</div>
	</div>
</div>

<?php include 'footer.php';?>


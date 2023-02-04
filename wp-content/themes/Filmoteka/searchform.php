<form role="search" method="get" id="searchform" class="searchform form-inline" action="<?php echo home_url(); ?>" style="display:inline;">
<div class="form-group">
	<select name="filter" class="form-control">
		<option value="all">Sve</option>
		<option value="movies">Filmovi</option>
		<option value="actors">Glumci</option>
		<option value="awards">Nagrade</option>
	</select>
	<!--<label class="screen-reader-text ml-2" for="s">Pretraži:</label> -->
	<input class="form-control ml-1" type="text" value="" name="s" data-swplive="true" data-swpengine="default" placeholder="Pretraži stranicu..." data-swpconfig="default" id="s" autocomplete="off" aria-owns="searchwp_live_search_results_63bd3df3f4e51" aria-autocomplete="both" aria-label="When autocomplete results are available use up and down arrows to review and enter to go to the desired page. Touch device users, explore by touch or with swipe gestures.">
	
	<button  type="submit" id="searchsubmit" value="Pretraži" class="d-inline btn btn-light ml-1 p-2" >
	<i class="fa fa-search" aria-hidden="true"></i>
	</button>
</div>
</form>
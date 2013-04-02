<?php

if (!defined('INDEX_AUTH')) {
	die("can not access this file directly");
} elseif (INDEX_AUTH != 1) {
	die("can not access this file directly");
}

?>
 	<div class="row " >
  <div class=" alert alert-info  well">
	    <div id="simply-search">
				<form name="advSearchForm"  class="form-search" id="advSearchForm" action="index.php" method="get">			    <input type="hidden" name="search" value="Search" />
				<div class="input-append">
			    <input type="text" name="keywords" class="span5 search-query" id="keyword" placeholder="<?php echo __('Keyword'); ?>" x-webkit-speech="x-webkit-speech" />
			    <button type="submit" class="btn btn-info" name="submit-btn">Search</button>
			    </div>
			    </form>

	    </div>
	   <div id="show_advance" class="pull-right ">
		    <a href="#"><?php echo __('Advanced Search'); ?></a>
	    </div>
	    <div class="clearfix"></div>

	    <div id="advance-search" style="display:none;"     class="">
		<form name="advSearchForm" id="advSearchForm" action="index.php" method="get" class="form-horizontal">
	    <input type="hidden" name="search" value="Search" />

		<div class="simply" >
		    <input type="text" name="title" id="title" placeholder="<?php echo __('Title'); ?>" class="span5" />
		</div>

		 <div class="control-group">
		  <label class="control-label" for="author"><?php echo __('Author(s)'); ?></label>
			<div class="controls">
				<?php echo $advsearch_author; ?>
			</div>
		 </div>

		 <div class="control-group">
		  <label class="control-label" for="subject"><?php echo __('Subject(s)'); ?></label>
			<div class="controls">
				<?php echo $advsearch_author; ?>
			</div>
		 </div>

		 <div class="control-group">
		  <label class="control-label" for="isbn"><?php echo __('ISBN/ISSN'); ?></label>
			<div class="controls">
					<input type="text" name="isbn" />
			</div>
		 </div>

		 <div class="control-group">
		  <label class="control-label" for="isbn"><?php echo __('GMD'); ?></label>
			<div class="controls">
			<select name="gmd">
					<?php echo $gmd_list; ?>
					</select>			</div>
		 </div>

		 		 <div class="control-group">
		  <label class="control-label" for="isbn"><?php echo __('Collection Type'); ?></label>
			<div class="controls">
					<select name="colltype">
					<?php echo $colltype_list; ?>
					</select>			</div>
		 </div>
		  		 <div class="control-group">
		  <label class="control-label" for="isbn">					<?php echo __('Location'); ?></label>
			<div class="controls">
					<select name="location">
					<?php echo $location_list; ?>
					</select>		</div>
		 </div>
		 <div class="advance">


				    <input type="submit"  name="search" value="<?php echo __('Search'); ?>" class="searchButton btn btn-info" />

		</div>
		</form>
	    </div>

	    </div>
    </div>
<?php
/*------------------------------------------------------------

Template : Slims Meranti Template
Create Date : March 24, 2012
Author  : Eddy Subratha (eddy.subratha@gmail.com)


This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA

-------------------------------------------------------------*/
// be sure that this file not accessed directly

if (!defined('INDEX_AUTH')) {
    die("can not access this file directly");
} elseif (INDEX_AUTH != 1) {
    die("can not access this file directly");
}
//set default index page
$p = 'home';

if (isset($_GET['p']))
{
 if ($_GET['p'] == 'libinfo') {
  $p = 'libinfo';
 } elseif ($_GET['p'] == 'help') {
  $p = 'help';
 } elseif ($_GET['p'] == 'member') {
  $p = 'member';
 } elseif ($_GET['p'] == 'login') {
  $p = 'login';
 }
}

/*----------------------------------------------------
  menu list
  you may modified as you need
----------------------------------------------------*/
$menus = array (
  'home'   => array('url'  => 'index.php',
        'text' => __('Home'),
        'icon'=>'icon-home',
       ),
  'libinfo'  => array('url'  => 'index.php?p=libinfo',
  	'text' => __('Library Information'),
  	'icon'=>'icon-info-sign',

       ),
  'help'   => array('url'  => 'index.php?p=help',
  	'text' => __('Help on Search'),
  	'icon'=>'icon-question-sign',
       ),

);

/*----------------------------------------------------
  social button
  you may modified as you need.
----------------------------------------------------*/
$social = array (
  'facebook'  => array('url'  => 'http://www.facebook.com/groups/senayan.slims/',
        'text' => 'Facebook'
       ),
  'twitter'  => array('url'  => 'http://twitter.com/#!/slims_official',
        'text' => 'Twitter'
       ),
  'youtube'  => array('url'  => 'http://www.youtube.com/user/senayanslims',
        'text' => 'Youtube'
       ),
  'gihub'  => array('url'  => 'https://github.com/slims/',
        'text' => 'Github'
       ),
  'forum'  => array('url'  => 'http://slims.web.id/forum/',
        'text' => 'Forum'
       )
  );

?>
<!DOCTYPE html>
<html><head>
 <title><?php echo $page_title; ?></title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="description" content="SLiMS (Senayan Library Management System) is an open source Library Management System. It is build on Open source technology like PHP and MySQL">
 <meta name="keywords" content="senayan,slims,library automation,free library application, library, perpustakaan, aplikasi perpustakaan">
 <meta name="viewport" content="width=device-width,initial-scale=1">
 <meta name="robots" content="index, nofollow">
 <!-- load style -->
 <link rel="shortcut icon" href="webicon.ico" type="image/x-icon" />
 <link href="<?php echo SWB; ?>template/default/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
 <link href="<?php echo SWB; ?>template/default/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" type="text/css" />

 <link href="template/core.style.css" rel="stylesheet" type="text/css" />
 <link href="<?php echo $sysconf['template']['css']; ?>" rel="stylesheet" type="text/css" />
 <!--[if IE]>
 <link type="text/css" rel="stylesheet" media="all" href="<?php echo SWB; ?>template/default/ie.css"/>
 <![endif]-->
 <!--[if IE 6]>
 <link type="text/css" rel="stylesheet" media="all" href="<?php echo SWB; ?>template/default/ie6.css"/>
 <![endif]-->
 <script type="text/javascript" src="<?php echo JWB; ?>jquery.js"></script>
 <script type="text/javascript" src="<?php echo JWB; ?>form.js"></script>
 <script type="text/javascript" src="<?php echo JWB; ?>gui.js"></script>
 <script type="text/javascript" src="<?php echo SWB; ?>template/default/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript">
	$(function(){
		$('#show_advance').click(function(){
			$("#advance-search").slideToggle();
			$('#simply-search').toggle();
		});

		$('a[rel=tooltip]').tooltip();
		$('a[rel=popover]').mouseenter(function(){
			$(this).popover('show');
		});
		$('a[rel=popover]').mouseleave(function(){
			$(this).popover('hide');
		});

		$('#info-btn').click(function(){
			$('#search-result').toggle();
		});
	});
</script>
</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top ">
    <div class="navbar-inner">
    <div  class="container-fluid">
		<a data-html="true" data-content="<img src='template/default/images/logo.png'><?php echo $sysconf['library_subname']; ?>" rel="popover"  data-placement="bottom" class="brand title" href="index.php" title="<?php echo $sysconf['library_name']; ?>"><?php echo $sysconf['library_name']; ?></a>
    <ul class="nav">
	    <ul class="nav">
	     <?php foreach ($menus as $path => $menu) : ?>
			<li><a href="<?php echo $menu['url']; ?>"   data-placement="bottom" rel="tooltip" title="<?php echo $menu['text']; ?>" <?php echo $p == $path?' class="active"' : ''; ?>><i class="icon icon-white <?php echo $menu['icon']?>"> </i></a></li>
	     <?php endforeach ?>
    </ul>
    </ul>

		<form name="langSelect" action="index.php" method="get"  class=" navbar-form pull-right ">
          <select name="select_lang"  onchange="document.langSelect.submit();">
         <?php echo $language_select; ?>
         </select>
        </form>
		<div class="pull-right ">
			<ul class="nav">
			 <?php if (utility::isMemberLogin()) : ?>
			    <li><a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon icon-white icon-user"></i> Logged in as: <?php echo $_SESSION['m_name'] ?> <b class="caret"></b></a>
   					<ul  class="dropdown-menu">
						<li><a href="index.php?p=member">Dashboard</a></li>
						<li><a href="index.php?p=member&logout=1">Logout</a></li>
   					</ul>
				</li>
		    <?php else: ?>
				<li><a title="" rel="tooltip" data-placement="bottom" href="index.php?p=member" data-original-title="Member Area"><i class="icon icon-white icon-user"> </i> Login</a></li>
		    <?php endif ?>

			<li><a title="" rel="tooltip" data-placement="bottom" href="index.php?p=login" data-original-title="Librarian LOGIN"><i class="icon icon-white icon-lock"> </i>Librarian </a></li>

				<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon icon-white icon-comment"></i> Social <b class="caret"></b></a>
					<ul  class="dropdown-menu">
						<?php foreach ($social as $path => $menu) : ?>
							<li><a href="<?php echo $menu['url']; ?>" title="<?php echo $menu['text']; ?>"><?php echo $menu['text']; ?></a></li>
						<?php endforeach ?>
					</ul>
				</li>

			</ul>

		</div>
		</div>
    </div>
</div>

  <div class="container">
    <div class="row">
      <?php if(isset($_GET['search']) || isset($_GET['title']) || isset($_GET['keywords'])) { ?>
     <div class="sidebar span3">
         <div class="well" style="background: #fff;">

	  <div class="">
       <b><i class="icon icon-info-sign"></i><?php echo __('Information'); ?></b>
      </div>

      <div class=""  >
       <?php echo $info; ?>
      </div>
 		<?php if (utility::isMemberLogin()) : ?>
		    <hr />
	    <div class="">
		    <b><i class="icon icon-user"></i> <?php echo __('User Login'); ?></b>
	    </div>
	    <div class="info">
		    <?php echo $header_info; ?>
	    </div>
		<?php endif ?>

      <?php if ($sysconf['enable_search_clustering'] && !isset($_GET['fromcluster'])) { ?>
      <div class="tagline">
       <?php echo __('Search Cluster'); ?>
      </div>
        <div id="search-cluster"><div class="cluster-loading"><?php echo __('Generating search cluster...');  ?></div></div>
        <script type="text/javascript">
        $('document').ready( function() {
         $.ajax({
           url: 'index.php?p=clustering&q=<?php echo isset($_GET['keywords'])?urlencode(trim($_GET['keywords'])):''; ?>',
           type: 'GET',
           success: function(data, status, jqXHR) {
             $('#search-cluster').html(data);
           }
         });
        });
       </script>  <?php } ?>
     </div>
     </div>


    <div class="section span9">
    <div class="well" style="background: #fff;">
	    <div class="pull-right" >
		<a href="javascript: history.back();" class="back to_right label" title="Back to previous page"> <i class="icon icon-chevron-left"></i> </a>
		<a  id="info-btn" class="back to_right label"> <i class="icon icon-info-sign" title="Result Info"></i> </a>
		<a href="javascript: history.back();" class="back to_right label" title="result in XML Format"> <i class="icon icon-chevron-left"></i><i class="icon icon-chevron-right"></i> </a>
		 		</div>
		<h3>
		    <?php echo __('Collections'); ?>
	    </h3>
		<div class="alert alert-info" id="search-result"> <button type="button" class="close" data-dismiss="alert">&times;</button>
			 <?php echo $search_result_info; ?></div>

	    <div class="result-search">
		    <div  class="pull-right">
		    	<a href="#myModal" role="button" class=" " data-toggle="modal"><?php echo __('Advanced Search'); ?></a>
		    </div>
		    <div id="simply-search">
			    <form name="advSearchForm" id="advSearchForm" action="index.php" method="get" class="form-search">
			 <div class="input-append">
			    <input type="hidden" name="search" value="Search"  />
			    <input type="text" name="keywords" id="keyword" placeholder="<?php echo __('Keyword'); ?>" x-webkit-speech="x-webkit-speech" class="span4 search-query offset2" <?php echo empty($_REQUEST['keywords']) ? '': 'value="'.$_REQUEST['keywords'].'"' ?> />
			     <button type="submit" class="btn">Search</button>
			</div>
			    </form>
		    </div>

				<form name="advSearchForm" id="advSearchForm" action="index.php" method="get">
	<div class="modal hide fade" id="myModal">
		 <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3><?php echo __('Advanced Search'); ?></h3>
		</div>
 		<div class="modal-body">
		    <input type="hidden" name="search" value="Search" />
			<div class="simply" >
			    <input type="text" name="title" id="title" placeholder="Title" />
			</div>
			<div class="advance">
			<table class="table">
				<tr>
					<td class="value">
					<?php echo __('Author(s)'); ?>
					</td>
					<td class="value">
					<?php echo $advsearch_author; ?>
					</td>
				</tr>
				<tr>
					<td class="value">
					<?php echo __('Subject(s)'); ?>
					</td>
					<td class="value">
					<?php echo $advsearch_topic; ?>
					</td>
				</tr>
				<tr>
					<td class="value">
					<?php echo __('ISBN/ISSN'); ?>
					</td>
					<td class="value">
						<input type="text" name="isbn" />
					</td>

				</tr>
				<tr>
				<td class="value">
						<?php echo __('GMD'); ?>
					</td>
					<td class="value">
						<select name="gmd">
						<?php echo $gmd_list; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="value">
						<?php echo __('Collection Type'); ?>
					</td>
					<td class="value">
						<select name="colltype">
						<?php echo $colltype_list; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="value">
						<?php echo __('Location'); ?>
					</td>
					<td class="value">
						<select name="location">
						<?php echo $location_list; ?>
						</select>
					</td>
				</tr>

			</table>
			</div>
		    </div>
		     <div class="modal-footer">
					    <input type="submit" name="search" value="<?php echo __('Search'); ?>" class="btn btn-info" />
 </div>
		    </div>
		    			</form>


	    </div>
	    <div class="collections-list">
		    <?php echo $main_content; ?>
	    </div>
    </div>
    </div>		    <div class="clearfix">&nbsp;</div>

    <?php } elseif($p == 'member') { ?>
    <div class="sidebar span3  ">
	    <div class="well" style="background: white;">
		<div class="">
		    <i class="icon icon-info-sign"></i><b><?php echo __('Information'); ?></b>
		    <a class="pull-right" href="javascript: history.back();"  title=" <?php echo __('Back'); ?> "><i class="icon-chevron-left"></i></a>
	    </div>
	    <div class="info">
		    <?php echo $info; ?>
	    </div>
	    <?php if (utility::isMemberLogin()) { ?>
	    <hr />
	    <div class="">
		    <b><i class="icon icon-user"></i> <?php echo __('User Login'); ?></b>
	    </div>
	    <div class="info">
		    <?php echo $header_info; ?>
	    </div>
	    <?php } ?>
	    </div>
    </div>
    <div class="section  span9 ">
	    <div class="collections-list well" style="background: white;">
		    <?php echo $main_content; ?>
		    &nbsp;</div>
	    </div>
    </div><div class="clearfix">
    <?php } elseif(isset($_GET['p'])) { ?>
      <?php if ($_GET['p'] == 'show_detail') {
			    echo $main_content;
	    } else {
	    ?>
	    <div class="span8 offset2">
	    <div class="well " style="background: #fff;">
		    			    <a href="javascript: history.back();" class="back to_right"> <?php echo __('Back'); ?> </a>
		    <h3 class="tagline">
			    <?php echo $page_title; ?>
		    </h3>
		    <?php if (utility::isMemberLogin()) { ?>
		    <div class="search-result-info">
			    <?php echo $header_info; ?>
		    </div>
		    <?php } ?>
		    <div class="section page">
			    <div class="collection-detail">
				    <div class="content-padding"><?php echo $main_content; ?></div>
			    </div>
		    </div>
		    </div></div>
			<div class="clearfix">&nbsp;</div>

	    <?php } ?>
    <?php } else { ?>
    <div class="tagline">
	    <?php echo $info; ?>
    </div>


	<div class="span6 offset3">
 		<?php include_once('search_form.inc.php'); ?>
    </div>
    <?php } ?>
 </div>
  </div>

<div class="navbar navbar-inverse navbar-fixed-bottom ">
    <div class="navbar-inner">
    	<div class="container">
  	    	<small class="navbar-text">This software and this template are released Under GNU GPL License Version 3</small>
 	     	<small class="navbar-text pull-right">The Winner in the Category of OSS Indonesia ICT Award 2009</small>
 	     </div>
    </div>
  </div>
 <!-- script type="text/javascript" src="<?php echo $sysconf['template']['dir'].'/'.$sysconf['template']['theme']; ?>/js/supersized.3.1.3.min.js"></script -->
 <!-- script type="text/javascript">
 jQuery(function($){
  $.supersized(
  {
      transition  : 6,
      keyboard_nav  : 0,
      start_slide  : 0,
      vertical_center : 1,
      horizontal_center : 1,
      min_width : 1000,
      min_height : 700,
      fit_portrait  : 1,
      fit_landscape : 0,
      image_protect : 1,
      slides  : [
     { image : '<?php echo $sysconf['template']['dir'].'/'.$sysconf['template']['theme']; ?>/images/1.jpg' },
      { image : '<?php echo $sysconf['template']['dir'].'/'.$sysconf['template']['theme']; ?>/images/2.jpg' }
    ]
  });
 });

	var ADAPT_CONFIG = {
		path: 'assets/css/',
		range: [
		'0px    to 760px  = mobile.css',
		'760px  to 980px  = 720.css',
		'980px  to 1280px = 960.css',
		'1280px to 1600px = 1200.css',
		'1600px to 1920px = 1560.css',
		'1920px = fluid.css'
		]
	};
	$(document).ready(function()
	{
		$('#keyword').keyup(function(){
			$('#title').val();
			$('#title').val($('#keyword').val());
		});

		$('#title').keyup(function(){
			$('#keyword').val();
			$('#keyword').val($('#title').val());
		});

		$('#advSearchForm input').attr('autocomplete','off');
		$('#title').attr('style','');


		$('#title').keypress(function(e){
		    if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
			this.form.submit();
		    }
		});
	});
	</script -->
	<!-- script type="text/javascript" src="<?php echo $sysconf['template']['dir'].'/'.$sysconf['template']['theme']; ?>/js/adapt.min.js"></script -->

</body>
</html>

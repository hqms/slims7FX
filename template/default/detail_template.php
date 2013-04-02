<?php
if (!defined('INDEX_AUTH')) {
	die("can not access this file directly");
} elseif (INDEX_AUTH != 1) {
	die("can not access this file directly");
}

// biblio/record detail
// output the buffer
ob_start(); /* <- DONT REMOVE THIS COMMAND */
?>
<div class="row">
     <div class="sidebar span3">
     <div class="well" style="background:#fff;">
      <div class="cover">
      {image}
      </div>
      <div>
       <a  class="label back" href="javascript: history.back();" rel="tooltip" title="Back to previous" data-placement="bottom"> <i class="icon icon-chevron-left"></i> </a>

       <a  target="_blank" href="index.php?p=show_detail&inXML=true&id=<?php echo $_GET['id'];?>" class="xml label" style="margin-top:10px;margin-right:20px;" rel="tooltip" title="View in XML" data-placement="bottom">&lt;&gt;</a>
      </div>
     </div>
     </div>

     <div class="section span9">
     <div class="well" style="background: #fff;">
      <small>Book's Detail</small>
      <h3>{title}</h3>
    	<p>
		<small>{notes}</small>
    	</p>
      <div class="collections-list">
       <div class="collection-detail">
        <table id="review" class="table table-striped table-hover">
         <tr>
          <td class="key" style="width: 200px;"><?php print __('Statement of Responsibility'); ?></td>
          <td class="value">{sor}</td>
         </tr>
         <tr>
          <td class="key"><?php print __('Author(s)'); ?></td>
          <td class="value">{authors}</td>
         </tr>
         <tr>
          <td class="key"><?php print __('Edition'); ?></td>
          <td class="value">{edition}</td>
         </tr>
         <tr>
          <td class="key"><?php print __('Call Number'); ?></td>
          <td class="value">{call_number}</td>
         </tr>
         <tr class="isbn">
          <td class="key"><?php print __('ISBN/ISSN'); ?></td>
          <td class="value">{isbn_issn}</td>
         </tr>
         <tr>
          <td class="key"><?php print __('Subject(s)'); ?></td>
          <td class="value">{subjects}</td>
         </tr>
         <tr>
          <td class="key"><?php print __('Classification'); ?></td>
          <td class="value">{classification}</td>
         </tr>
         <tr>
          <td class="key"><?php print __('Series Title'); ?></td>
          <td class="value">{series_title}</td>
         </tr>
         <tr>
          <td class="key"><?php print __('GMD'); ?></td>
          <td class="value">{gmd_name}</td>
         </tr>
         <tr>
          <td class="key"><?php print __('Language'); ?></td>
          <td class="value">{language_name}</td>
         </tr>
         <tr>
          <td class="key"><?php print __('Publisher'); ?></td>
          <td class="value">{publisher_name}</td>
         </tr>
         <tr>
          <td class="key"><?php print __('Publishing Year'); ?></td>
          <td class="value">{publish_year}</td>
         </tr>
         <tr>
          <td class="key"><?php print __('Publishing Place'); ?></td>
          <td class="value">{publish_place}</td>
         </tr>
         <tr>
          <td class="key"><?php print __('Collation'); ?></td>
          <td class="value">{collation}</td>
         </tr>
         <tr>
          <td class="key"><?php print __('Specific Detail Info'); ?></td>
          <td class="value">{spec_detail_info}</td>
         </tr>
         <tr>
          <td class="key"><?php print __('File Attachment'); ?></td>
          <td class="value">{file_att}</td>
         </tr>
         <tr>
          <td class="key"><?php print __('Availability'); ?></td>
          <td class="value">{availability}</td>
         </tr>
       </table>
       <?php echo showComment($detail_id); ?>
       </div>
      </div>
     </div>
     </div>
     </div>
            <div class="clearfix">&nbsp;</div>

<?php
// put the buffer to template var
$detail_template = ob_get_clean();

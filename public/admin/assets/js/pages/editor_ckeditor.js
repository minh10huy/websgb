/* ------------------------------------------------------------------------------
*
*  # CKEditor editor
*
*  Specific JS code additions for editor_ckeditor.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function() {

    // ckfinder
		CKEDITOR.replace('editor1', {
			filebrowserBrowseUrl: 'http://intranet.saigonbpo.vn/public/admin/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: 'http://intranet.saigonbpo.vn/public/admin/ckfinder/ckfinder.html',
			filebrowserUploadUrl: 'http://intranet.saigonbpo.vn/public/admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
	 });

});

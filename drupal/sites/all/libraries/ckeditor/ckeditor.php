<<<<<<< HEAD
<?php
/*
 * Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

/*! \mainpage CKEditor - PHP server side intergation
 * \section intro_sec CKEditor
 * Visit <a href="http://ckeditor.com">CKEditor web site</a> to find more information about the editor.
 * \section install_sec Installation
 * \subsection step1 Include ckeditor.php in your PHP web site.
 * @code
 * <?php
 * include("ckeditor/ckeditor.php");
 * ?>
 * @endcode
 * \subsection step2 Create CKEditor class instance and use one of available methods to insert CKEditor.
 * @code
 * <?php
 * $CKEditor = new CKEditor();
 * $CKEditor->editor("editor1", "<p>Initial value.</p>");
 * ?>
 * @endcode
 */

if ( !function_exists('version_compare') || version_compare( phpversion(), '5', '<' ) )
	include_once( 'ckeditor_php4.php' ) ;
else
	include_once( 'ckeditor_php5.php' ) ;
=======
<?php
/*
 * Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

/*! \mainpage CKEditor - PHP server side intergation
 * \section intro_sec CKEditor
 * Visit <a href="http://ckeditor.com">CKEditor web site</a> to find more information about the editor.
 * \section install_sec Installation
 * \subsection step1 Include ckeditor.php in your PHP web site.
 * @code
 * <?php
 * include("ckeditor/ckeditor.php");
 * ?>
 * @endcode
 * \subsection step2 Create CKEditor class instance and use one of available methods to insert CKEditor.
 * @code
 * <?php
 * $CKEditor = new CKEditor();
 * $CKEditor->editor("editor1", "<p>Initial value.</p>");
 * ?>
 * @endcode
 */

if ( !function_exists('version_compare') || version_compare( phpversion(), '5', '<' ) )
	include_once( 'ckeditor_php4.php' ) ;
else
	include_once( 'ckeditor_php5.php' ) ;
>>>>>>> 3c233a519e8546032631f6d31915c0a728a8cd53

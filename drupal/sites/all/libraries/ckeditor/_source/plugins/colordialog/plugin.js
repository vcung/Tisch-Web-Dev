<<<<<<< HEAD
<<<<<<< HEAD
﻿/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.plugins.colordialog =
{
	requires : [ 'dialog' ],
	init : function( editor )
	{
		editor.addCommand( 'colordialog', new CKEDITOR.dialogCommand( 'colordialog' ) );
		CKEDITOR.dialog.add( 'colordialog', this.path + 'dialogs/colordialog.js' );
	}
};

CKEDITOR.plugins.add( 'colordialog', CKEDITOR.plugins.colordialog );
=======
﻿/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.plugins.colordialog =
{
	requires : [ 'dialog' ],
	init : function( editor )
	{
		editor.addCommand( 'colordialog', new CKEDITOR.dialogCommand( 'colordialog' ) );
		CKEDITOR.dialog.add( 'colordialog', this.path + 'dialogs/colordialog.js' );
	}
};

CKEDITOR.plugins.add( 'colordialog', CKEDITOR.plugins.colordialog );
>>>>>>> 3c233a519e8546032631f6d31915c0a728a8cd53
=======
﻿/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.plugins.colordialog =
{
	requires : [ 'dialog' ],
	init : function( editor )
	{
		editor.addCommand( 'colordialog', new CKEDITOR.dialogCommand( 'colordialog' ) );
		CKEDITOR.dialog.add( 'colordialog', this.path + 'dialogs/colordialog.js' );
	}
};

CKEDITOR.plugins.add( 'colordialog', CKEDITOR.plugins.colordialog );
>>>>>>> 444740077eb6a07cd49a4296d1b3d5aebb65b9a5

<<<<<<< HEAD
<<<<<<< HEAD
﻿/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/**
 * @file Print Plugin
 */

CKEDITOR.plugins.add( 'print',
{
	init : function( editor )
	{
		var pluginName = 'print';

		// Register the command.
		var command = editor.addCommand( pluginName, CKEDITOR.plugins.print );

		// Register the toolbar button.
		editor.ui.addButton( 'Print',
			{
				label : editor.lang.print,
				command : pluginName
			});
	}
} );

CKEDITOR.plugins.print =
{
	exec : function( editor )
	{
		if ( CKEDITOR.env.opera )
			return;
		else if ( CKEDITOR.env.gecko )
			editor.window.$.print();
		else
			editor.document.$.execCommand( "Print" );
	},
	canUndo : false,
	readOnly : 1,
	modes : { wysiwyg : !( CKEDITOR.env.opera ) }		// It is imposible to print the inner document in Opera.
};
=======
﻿/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/**
 * @file Print Plugin
 */

CKEDITOR.plugins.add( 'print',
{
	init : function( editor )
	{
		var pluginName = 'print';

		// Register the command.
		var command = editor.addCommand( pluginName, CKEDITOR.plugins.print );

		// Register the toolbar button.
		editor.ui.addButton( 'Print',
			{
				label : editor.lang.print,
				command : pluginName
			});
	}
} );

CKEDITOR.plugins.print =
{
	exec : function( editor )
	{
		if ( CKEDITOR.env.opera )
			return;
		else if ( CKEDITOR.env.gecko )
			editor.window.$.print();
		else
			editor.document.$.execCommand( "Print" );
	},
	canUndo : false,
	readOnly : 1,
	modes : { wysiwyg : !( CKEDITOR.env.opera ) }		// It is imposible to print the inner document in Opera.
};
>>>>>>> 3c233a519e8546032631f6d31915c0a728a8cd53
=======
﻿/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/**
 * @file Print Plugin
 */

CKEDITOR.plugins.add( 'print',
{
	init : function( editor )
	{
		var pluginName = 'print';

		// Register the command.
		var command = editor.addCommand( pluginName, CKEDITOR.plugins.print );

		// Register the toolbar button.
		editor.ui.addButton( 'Print',
			{
				label : editor.lang.print,
				command : pluginName
			});
	}
} );

CKEDITOR.plugins.print =
{
	exec : function( editor )
	{
		if ( CKEDITOR.env.opera )
			return;
		else if ( CKEDITOR.env.gecko )
			editor.window.$.print();
		else
			editor.document.$.execCommand( "Print" );
	},
	canUndo : false,
	readOnly : 1,
	modes : { wysiwyg : !( CKEDITOR.env.opera ) }		// It is imposible to print the inner document in Opera.
};
>>>>>>> 444740077eb6a07cd49a4296d1b3d5aebb65b9a5

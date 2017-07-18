scnShortcodeMeta = {
	attributes : [
		{
			label : "Background Color",
			id : "backgroundcolor",
			help : '',
			controlType : "color-control"
		},

		{
			label : "Background Image",
			id : "backgroundimage",
			help : "",
		},
		{
			label : "Background Opacity",
			id : "opacity",
			help : "Add opacity for background ( 0- 1 ) ",
		},

		{
			label : "Background Position",
			id : 'backgroundposition',
			help : '',
			controlType : "select-control",
			selectValues : [ 'left top', 'left center', 'left bottom', 'right top', 'right center','right bottom', 'center top', 'center center','center bottom'],
			defaultValue : 'center center',
			defaultText : 'center center (Default)'
		},

		{
			label : "Margin Top",
			id : "margintop",
			help : "In pixels",
		},
		{
			label : "Margin Bottom",
			id : "marginbottom",
			help : "In pixels",
		},
		{
			label : "Text Color",
			id : "textcolor",
			help : 'You can change the color of the text.',
			controlType : "color-control"
		},
		{
			label : "CSS Class",
			id : "class",
			help : "Add additional CSS Class",
		},

		{
			label : "Content Position",
			id : 'align',
			help : '',
			controlType : "select-control",
			selectValues : [ 'left', 'right'],
			defaultValue : 'left',
			defaultText : 'left (Default)'
		},
	],
	defaultContent : "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras cursus sollicitudin nunc nec rhoncus.",
	shortcode : "dt_sc_semi_fullwidth_section"
};
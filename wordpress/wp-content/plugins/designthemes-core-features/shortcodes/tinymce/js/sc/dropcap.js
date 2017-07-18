scnShortcodeMeta = {
	attributes : [

			{
				label : "Type",
				id : "type",
				help : "Select which type of box you would like to use.",
				controlType : "select-control",
				selectValues : [ 'Default' ,'Circle' ,'Bordered Circle','Square','Bordered Square'],
				defaultValue : 'Circle',
				defaultText : 'Circle'
			},
	
			{
				label : "Background Color",
				id : "bgcolor",
				help : 'Or you can also choose your own color to use as the background for your Dropcap',
				controlType : "color-control"
			},
			{
				label : 'Variation',
				id : 'variation',
				help : 'Choose one of our predefined color skins to use with your Dropcap.',
				controlType : "select-control",
				selectValues : [ '','chocolate','coral','cyan','darkblue','darkmagenta','duskblue','electricblue','ferngreen','lavender','lightgreen','limegreen','ocean','orange','pink','purple','red','royalblue','salmon','violet','yellow'],
				defaultValue : '',
				defaultText : 'Select'
			},
			{
				label : "Text Color",
				id : "textcolor",
				help : 'You can change the color of the text that appears on your Dropcap.',
				controlType : "color-control"
			}],
	defaultContent : "A",
	shortcode : "dt_sc_dropcap"
};
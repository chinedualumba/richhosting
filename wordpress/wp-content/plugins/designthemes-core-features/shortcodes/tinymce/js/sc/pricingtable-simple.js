scnShortcodeMeta = {
	attributes : [ 
	 {
		label : "Columns",
		id : "content",
		controlType : "column-control"
	} ],
	customMakeShortcode : function(b) {
		var a = b.data;

		if (!a)
			return "";
		b = a.numColumns;
		var c = a.content;
		a = [ "0", "one", "two", "three", "four", "five", 'six' ];
		var x = [ "0", "0", "half", "third", "fourth", "fifth", 'sixth' ];
		var f = x[b];
		c = c.split("|");
		var g = "";
		for ( var h in c) {
			var d = jQuery.trim(c[h]);
			if (d.length > 0) {
				var e = a[d.length] + '_' + f;
				if (b == 4 && d.length == 2)
					e = "one_half";

				var z = e;
				var selected = "";
				if (h == 0) {
					e += " first";
					selected = "selected";
				}

				g += "<br>[dt_sc_"
						+ e
						+ "] "
						+ "<br>[dt_sc_pricing_table_item_1  title='Title' button_text='Buy Now' button_link='#' currency='$' price='15' per='/ month' "
						+ selected + "]<br>" + "<ul>" + "<li>Text</li>"
						+ "<li>Text</li>" + "<li>Text</li>" + "<li>Text</li>" + "<li>Text</li>" + "</ul>"
						+ "[/dt_sc_pricing_table_item_1]<br>" + " [/dt_sc_" + z
						+ "]<br/>";
			}
		}

		return "[dt_sc_pricing_table class='type1']<br>" + g + "<br>[/dt_sc_pricing_table]";
	}
};
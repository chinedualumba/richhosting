(function() {

	var dummy_conent = "Lorem ipsum dolor sit amet, consectetur"
		+ " adipiscing elit. Morbi hendrerit elit turpis,"
		+ " a porttitor tellus sollicitudin at."
		+ " Class aptent taciti sociosqu ad litora "
		+ " torquent per conubia nostra,"
		+ " per inceptos himenaeos.";

	var dummy_tabs = '<br>[dt_sc_tab title="Tab 1"]'
		+ "<br> Tab 1 : " + dummy_conent + "<br>" + '[/dt_sc_tab]' + "<br>"
		+ '[dt_sc_tab title="Tab 2"]' + "<br> Tab 2 : "
		+ dummy_conent + "<br>" + '[/dt_sc_tab]' + "<br>"
		+ '[dt_sc_tab title="Tab 3"]' + "<br> Tab 3 : "
		+ dummy_conent + "<br>" + '[/dt_sc_tab]<br>';

	var images_carousel = '<ul>'
		+'<li><a href="#"><img src="http://placehold.it/550x241&text=Image 1" alt="Client 1" title="Client 1"/></a></li>'
		+'<li><a href="#"><img src="http://placehold.it/550x241&text=Image 2" alt="Client 2" title="Client 2"/></a></li>'
		+'<li><a href="#"><img src="http://placehold.it/550x241&text=Image 3" alt="Client 3" title="Client 3"/></a></li>'
		+'<li><a href="#"><img src="http://placehold.it/550x241&text=Image 4" alt="Client 4" title="Client 4"/></a></li>'
		+'<li><a href="#"><img src="http://placehold.it/550x241&text=Image 5" alt="Client 5" title="Client 5"/></a></li>'
		+'<li><a href="#"><img src="http://placehold.it/550x241&text=Image 6" alt="Client 6" title="Client 6"/></a></li>'
		+'<li><a href="#"><img src="http://placehold.it/550x241&text=Image 7" alt="Client 7" title="Client 7"/></a></li>'
		+'</ul>';

	var testimonal = '[dt_sc_testimonial name="John Doe" image="http://placehold.it/300" role="CEO &amp; Founder - Dhoom Inc"]'+dummy_conent+'[/dt_sc_testimonial]';

	// add DTCoreShortcodePlugin plugin
	tinymce.PluginManager.add("DTCoreShortcodePlugin",function( editor , url ) {
		
		editor.on('init', function() {
			editor.addCommand("scnOpenDialog", function(obj) {
				scnSelectedShortcodeType = obj.identifier;
				jQuery.get(url + "/dialog.php", function(b) {
					jQuery("#scn-dialog").remove();
					jQuery("body").append(b);
					jQuery("#scn-dialog").hide();
					var f = jQuery(window).width();
					b = jQuery(window).height();
					f = 720 < f ? 720 : f;
					f -= 80;
					b -= 84;
					tb_show("Insert Shortcode", "#TB_inline?width=800"+ "&height=400&inlineId=scn-dialog");
					jQuery("#scn-options h3:first").text("Customize the " + obj.title + " Shortcode");
				});
			});
		});
	
		editor.addButton('designthemes_sc_button', {
			title : "DT Shortcodes",
			icon : "dt-icon",
			type: 'menubutton',
			menu: [

				{ text : 'Accordion',
					menu : [
						{ text: 'Default', onclick: function(e){
							e.stopPropagation();
							var content = "[dt_sc_accordion_group]"
								+'<br>[dt_sc_toggle title="Accordion 1"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle]"
								+'<br>[dt_sc_toggle title="Accordion 2"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle]"
								+'<br>[dt_sc_toggle title="Accordion 3"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle]"
								+"<br>[/dt_sc_accordion_group]";
								editor.insertContent(content);
							}
						},

						{ text: 'Framed', onclick: function(e){
							e.stopPropagation();
							var content = "[dt_sc_accordion_group]"
								+'<br>[dt_sc_toggle_framed title="Accordion 1"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle_framed]"
								+'<br>[dt_sc_toggle_framed title="Accordion 2"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle_framed]"
								+'<br>[dt_sc_toggle_framed title="Accordion 3"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle_framed]"
								+"<br>[/dt_sc_accordion_group]";
							editor.insertContent(content);
							}
						}
					]
				},

				{ text: 'Animation' , onclick: function() {

						editor.windowManager.open({

							title : "Add Animation",
							body : [

								{ type: 'listbox', name:'effect', label:'Choose Effect',values:[
									{ text: 'Flash', value : 'flash' },							{ text: 'Shake', value : 'shake' },							{ text: 'Bounce', value : 'bounce' },
									{ text: 'Tada', value : 'tada' },							{ text: 'Swing', value : 'swing'},							{ text: 'Wobble', value : 'wobble' },
									{ text: 'Pulse', value : 'pulse' },							{ text: 'Flip', value : 'flip' },							{ text: 'Flip In X Axis', value : 'flipInX' },
									{ text: 'Flip Out X Axis', value : 'flipOutX' },			{ text: 'Flip In Y Axis', value : 'flipInY' },				{ text: 'Flip Out Y Axis', value : 'flipOutY' },
									{ text: 'fadeIn', value:'fadeIn'},							{ text: 'fadeInUp', value:'fadeInUp'},						{ text: 'fadeInDown', value:'fadeInDown'},
									{ text: 'fadeInLeft', value:'fadeInLeftfadeInLeft'},		{ text: 'fadeInRight', value:'fadeInRight'},				{ text: 'fadeInUpBig', value:'fadeInUpBig'},
									{ text: 'fadeInDownBig', value:'fadeInDownBig'},			{ text: 'fadeInLeftBig', value:'fadeInLeftBig'},			{ text: 'fadeInRightBig', value:'fadeInRightBig'},
									{ text: 'fadeOut', value:'fadeOut'},						{ text: 'fadeOutUp', value:'fadeOutUp'},					{ text: 'fadeOutDown', value:'fadeOutDown'},
									{ text: 'fadeOutLeft', value:'fadeOutLeft'},				{ text: 'fadeOutRight', value:'fadeOutRight'},				{ text: 'fadeOutUpBig', value:'fadeOutUpBig'},
									{ text: 'fadeOutDownBig', value:'fadeOutDownBig'},			{ text: 'fadeOutLeftBig', value:'fadeOutLeftBig'},			{ text: 'fadeOutRightBig', value:'fadeOutRightBig'},
									{ text: 'bounceIn', value:'bounceIn'},						{ text: 'bounceInUp', value:'bounceInUp'},					{ text: 'bounceInDown', value:'bounceInDown'},
									{ text: 'bounceInLeft', value:'bounceInLeft'},				{ text: 'bounceInRight', value:'bounceInRight'},			{ text: 'bounceOut', value:'bounceOut'},
									{ text: 'bounceOutUp', value:'bounceOutUp'},				{ text: 'bounceOutDown', value:'bounceOutDown'},			{ text: 'bounceOutLeft', value:'bounceOutLeft'},
									{ text: 'bounceOutRight', value:'bounceOutRight'},			{ text:'rotateIn', value:'rotateIn'},						{ text:'rotateInUpLeft', value:'rotateInUpLeft'},		
									{ text:'rotateInDownLeft', value:'rotateInDownLeft'},		{ text:'rotateInUpRight', value:'rotateInUpRight'},			{ text:'rotateInDownRight', value:'rotateInDownRight'},		
									{ text:'rotateOut', value:'rotateOut'},						{ text:'rotateOutUpLeft', value:'rotateOutUpLeft'},			{ text:'rotateOutDownLeft', value:'rotateOutDownLeft'},		
									{ text:'rotateOutUpRight', value:'rotateOutUpRight'},		{ text:'rotateOutDownRight', value:'rotateOutDownRight'},	{ text:'hinge', value:'hinge'},		
									{ text:'rollIn', value:'rollIn'},							{ text:'rollOut', value:'rollOut'},							{ text:'lightSpeedIn', value:'lightSpeedIn'},		
									{ text:'lightSpeedOut', value:'lightSpeedOut'},				{ text:'slideDown', value:'slideDown'},						{ text:'slideUp', value:'slideUp'},		
									{ text:'slideLeft', value:'slideLeft'},						{ text:'slideRight', value:'slideRight'},					{ text:'slideExpandUp', value:'slideExpandUp'},
									{ text:'expandUp', value:'expandUp'},						{ text:'expandOpen', value:'expandOpen'},					{ text:'bigEntrance', value:'bigEntrance'},		
									{ text:'hatch', value:'hatch'},								{ text:'floating', value:'floating'},						{ text:'tossing', value:'tossing'},		
									{ text:'pullUp', value:'pullUp'},							{ text:'pullDown', value:'pullDown'},						{ text:'stretchLeft', value:'stretchLeft'},
									{ text:'stretchRight', value:'stretchRight'}],
								},

								{ type: 'textbox', name:'delay',label : "Time Delay"},
							],
							onsubmit: function(e) {
								editor.insertContent('[dt_sc_animation effect="'+e.data.effect +'" delay="'+ e.data.delay+'"] Add Content to Animate [/dt_sc_animation]');
							}
						});	}
				},

				{ text: 'Animate Number',
					onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_animate_number title="" number="1985" fontawesome="" icon=""]');
					}
				},

				{ text : 'Button',
					onclick: function(e){
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "button"});
					}
				},

				{ text: 'Block Quote',
					onclick: function(e) {
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "blockquote"});
					}
				},

				{ text: 'Call Out Button',
					menu:[
						{
							text:'With Icon',
							onclick: function() {

								editor.windowManager.open({
									title: "Call Out Buttons With Icon",
									body:[
										{ 
											type: 'listbox',
											name: 'type',
											label:'Type',
											values:[ { text: 'Type 1', value: 'type1' },	 { text: 'Type 2', value: 'type2' }, { text: 'Type 3', value: 'type3' }],
										},

										{ type: 'textbox', name: 'icon', label: 'Font Awesome Icon', value: 'fa-heart' },

										{ type:'textbox', name:'button_text', label: 'Button Label'},

										{ type: 'textbox', name: 'button_icon', label: 'Button Font Awesome Icon', value: 'fa-chevron-circle-right' },
										
										{ type: 'listbox', name: 'variation', label: 'Variation', values:[
											{ text: 'Default', value: '' },	{ text: 'Skin Color', value: 'skincolor' }, 
											{ text: 'Chocolate', value: 'chocolate' },	{ text: 'Coral', value: 'coral' }, { text: 'Cyan', value: 'cyan' }, 
											{ text: 'DarkBlue', value: 'darkblue' }, { text: 'DarkMagenta', value: 'darkmagenta' },	{ text: 'DuskBlue', value: 'duskblue' },
											{ text: 'ElectricBlue', value: 'electricblue' }, { text: 'FernGreen', value: 'ferngreen' },{ text: 'Lavender', value: 'lavender' },
											{ text: 'LightGreen', value: 'lightgreen' }, { text: 'LimeGreen', value: 'limegreen' }, { text: 'Ocean', value: 'ocean' }, 
											{ text: 'Orange', value: 'orange' }, { text: 'Pink', value: 'pink' }, { text: 'Purple', value: 'purple' }, { text: 'Red', value: 'red' }, 
											{ text: 'RoyalBlue', value: 'royalblue' }, { text: 'Salmon', value: 'salmon' }, { text: 'Violet', value: 'violet' }, 
											{ text: 'Yellow', value: 'yellow' }],
										},										

										{ 
											type: 'listbox',
											name: 'target',
											label:'Target',
											values:[ { text: 'Blank', value: '_blank' }, { text: 'New', value: '_new' }, { text: 'Parent', value: '_parent' }, { text: 'Self', value: '_self' }, { text: 'Top', value: '_top' },],
										},
									],

									onsubmit: function(e){
										editor.insertContent('[dt_sc_callout_box type="'+e.data.type+'" icon="'+e.data.icon+'" link="'+e.data.link+'" target="'+e.data.target+'" button_text="'+e.data.button_text+'" variation="'+e.data.variation+'"]'
												+'<h2>Looking for an Elegant Theme for your Business?</h2>'
												+'<h4>You stumbled to the right place!</h4>'
												+'<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem Ipsum has been the industry standard dummy text ever since the 1500s</p>'
												+'[/dt_sc_callout_box]');
									}
								});
							}
						},
						{
							text:'Without Icon',
							onclick: function() {

								editor.windowManager.open({
									title: "Call Out Buttons With Icon",
									body:[
										{ 
											type: 'listbox',
											name: 'type',
											label:'Type',
											values:[ { text: 'Type 1', value: 'type1' },	 { text: 'Type 2', value: 'type2' }, { text: 'Type 3', value: 'type3' }],
										},

										{ type:'textbox', name:'button_text', label: 'Button Label'},

										{ type: 'textbox', name: 'link', label: 'Button link', value: '#' },
										
										{ type: 'listbox', name: 'variation', label: 'Variation', values:[
											{ text: 'Default', value: '' },	{ text: 'Skin Color', value: 'skincolor' }, 
											{ text: 'Chocolate', value: 'chocolate' },	{ text: 'Coral', value: 'coral' }, { text: 'Cyan', value: 'cyan' }, 
											{ text: 'DarkBlue', value: 'darkblue' }, { text: 'DarkMagenta', value: 'darkmagenta' },	{ text: 'DuskBlue', value: 'duskblue' },
											{ text: 'ElectricBlue', value: 'electricblue' }, { text: 'FernGreen', value: 'ferngreen' },{ text: 'Lavender', value: 'lavender' },
											{ text: 'LightGreen', value: 'lightgreen' }, { text: 'LimeGreen', value: 'limegreen' }, { text: 'Ocean', value: 'ocean' }, 
											{ text: 'Orange', value: 'orange' }, { text: 'Pink', value: 'pink' }, { text: 'Purple', value: 'purple' }, { text: 'Red', value: 'red' }, 
											{ text: 'RoyalBlue', value: 'royalblue' }, { text: 'Salmon', value: 'salmon' }, { text: 'Violet', value: 'violet' }, 
											{ text: 'Yellow', value: 'yellow' }],
										},
										

										{ 
											type: 'listbox',
											name: 'target',
											label:'Target',
											values:[ { text: 'Blank', value: '_blank' }, { text: 'New', value: '_new' }, { text: 'Parent', value: '_parent' }, { text: 'Self', value: '_self' }, { text: 'Top', value: '_top' },],
										},
									],

									onsubmit: function(e){
										editor.insertContent('[dt_sc_callout_box type="'+e.data.type+'" link="'+e.data.link+'" target="'+e.data.target+'" button_text="'+e.data.button_text+'" variation="'+e.data.variation+'"]'
												+'<h2>Looking for an Elegant Theme for your Business?</h2>'
												+'<h4>You stumbled to the right place!</h4>'
												+'<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem Ipsum has been the industry standard dummy text ever since the 1500s</p>'
												+'[/dt_sc_callout_box]');
									}
								});
							}
						}
					]
				},

				{ text: 'Colored Box',
					onclick: function(e) {
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "coloredbox"});
					}
				},
				
				{ text: 'Column Layout', 
					onclick: function(e) {
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "column"});
					}
				},

				{ text : 'Contact Info', 
					menu :[
						{ text: 'Contact', onclick: function(e){
							e.stopPropagation();
							editor.insertContent('[dt_sc_contact icon="" text="" detail=""/]');
						}},

						{ text: 'Web', onclick: function(e){
							e.stopPropagation();
							editor.insertContent('[dt_sc_web icon="fa-globe" text="Website" url="http://www.google.com" target="_new"/]');
						}},

						{ text: 'Email', onclick: function(e){
							e.stopPropagation();
							editor.insertContent('[dt_sc_email icon="fa-envelope" text="Email" emailid="yourname@somemail.com"/]');
						}},
					]
				},

				{ 	text: 'Donut Chart',
					onclick : function(e){
						e.stopPropagation();
						var $code = '[dt_sc_donutchart title="Monthly" subtitle="Code: XF235" toptext="Save" bottomtext="off" bgcolor="#f5f5f5" fgcolor="#4bbcd7" percent="70" textcolor="#121212"]'
						+"<p>Has been the industry's standard dummy text ever since the 1500s.</p>"
						+'[dt_sc_button type="without-icon" link="#" size="small" target="_blank"]Select[/dt_sc_button]'
						+'<br>'
						+'[/dt_sc_donutchart]';
						editor.insertContent($code);
					}
				},

				{ text: 'Drop Cap',
					onclick: function( e ){
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "dropcap"});
					}
				},

				{ text : 'Dividers',
					menu:[

						{ text: 'Clear', 
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_clear]');
							}
						},

						{ text: 'Horizontal Rule',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_hr]');
							}
						},

						{ text: 'Horizontal Rule Medium',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_hr_medium]');
							}
						},

						{ text: 'Horizontal Rule Large',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_hr_large]');
							}
						},

						{ text: 'Horizontal Rule with top link',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_hr top]');
							}
						},

						{ text :'Horizontal Rule with Icon',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_hr_with_icon fontawesome="fa-cloud-upload" icon="" /]');
							}
						},

						{ text: 'Whitespace',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_hr_invisible]');
							}
						},

						{ text: 'Whitespace Very Small',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_hr_invisible_very_small]');
							}
						},

						{ text: 'Whitespace Small',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_hr_invisible_small]');
							}
						},

						{ text: 'Whitespace Medium',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_hr_invisible_medium]');
							}
						},

						{ text: 'Whitespace Large',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_hr_invisible_large]');
							}
						},
					]
				},

				{ text: 'Full Width Section',
					menu:[
						{ text : 'Type 1',
							onclick: function(e){
								e.stopPropagation();
								tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "fullwidth"});
							}
						},
						{ text : 'Type 2',
							onclick: function(e){
								e.stopPropagation();
								tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "semi-fullwidth"});
							}
						},
					]
				},

				{ text: 'Full Width Video',

					onclick: function(){

						editor.windowManager.open({
							title: "Add Full Width  Video Section",
							body:[
								{ type:'textbox', label:'MP4', name: 'mp4'},
								{ type:'textbox', label:'WEBM', name: 'webm'},
								{ type:'textbox', label:'OGV', name: 'ogv'},
								{ type:'textbox', label:'Poster Image', name: 'poster'},
								{ type:'textbox', name:'backgroundimage', label: 'Background Image'},
								{ type:'textbox', name:'class', label: 'CSS Class'},
							],
							onsubmit: function(e){
								editor.insertContent('[dt_sc_fullwidth_video mp4="'+e.data.mp4+'" webm="'+e.data.we+'" ogv="'+e.data.ogv+'" poster="'+e.data.po+'" backgroundimage="'+e.data.backgroundimage+'" class="'+e.data.class+'"][/dt_sc_fullwidth_video]');
							}
						});
					}
				},

				{ text: 'Icon Boxes', 
					onclick: function(){
						editor.windowManager.open({
							title: "Add Icon Box",
							body:[
								{
									type: 'listbox',
									name: 'type',
									label:'Type',
									values:[ 
										{ text: 'Type 1', value: 'type1' },
										{ text: 'Type 2', value: 'type2' },
										{ text: 'Type 3', value: 'type3' },
										{ text: 'Type 4', value: 'type4' },
										{ text: 'Type 5', value: 'type5' },
									],
								},

								{ type:'textbox', name:'fontawesome', label:'Font Awesome ' },
								{ type:'textbox', name:'icon', label: 'Or Custom Icon'},
								{ type:'listbox', name:'align', label:'Align', values:[ { text:'None', value:'' }, { text:'Left', value:'left' }, { text:'Right', value:'right' } ]}
							],
							onsubmit: function(e){

								var $content = '<h5><a title="" href="#">24/7 support</a></h5>';
								$content += '<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>';

								switch ( e.data.type ){
									case 'type2':
									case 'type3':
										$content = '<h3>Instant Setup</h3>';
										$content += '<p>We denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire.</p>';
									break;

									case 'type4':
										$content = '<h4><a title="" href="#">Host up to 100 websites</a></h4>';
									break;

									case 'type5':
										$content = '<h3><a href="#" target="_blank"> Make more traffic to your site with SEO </a></h3>';
										$content += '<p>Nunc at pretium est curabitur commodo leac est venenatis egestas sed aliquet auguevelit.</p>';
									break;
								}

								var $shortcode = '[dt_sc_icon_box type="'+e.data.type+'" fontawesome="'+e.data.fontawesome+'"  icon="'+e.data.icon+'" align="'+e.data.align+'"]';
									$shortcode += $content;
									$shortcode += '[/dt_sc_icon_box]';
								editor.insertContent($shortcode);
							}
						});
					} 
				},

				{ text: 'Lists',
					menu :[
						{ text: 'Ordered List',
							onclick : function() {
								editor.windowManager.open({
									title: "Add New Stylish Ordered List",
									body: [
										{
											type: 'listbox',
											name: 'style',
											label:'Style',
											values:[
												{ text: 'Decimal', value: 'decimal' }, { text: 'Decimals With Leading Zero', value: 'decimal-leading-zero' }, { text:'Lower Alpha', value:'lower-alpha'},
												{ text:'Lower Roman', value:'lower-roman'}, { text:'Upper Alpha', value:'upper-alpha'},{ text:'Upper Roman', value:'upper-roman'}
											],
										},

										{
											type: 'listbox',
											name: 'variation',
											label: 'Variation',
											values:[
												{ text: 'Default', value: '' },
												{ text: 'Chocolate', value: 'chocolate' },
												{ text: 'Coral', value: 'coral' },
												{ text: 'Cyan', value: 'cyan' },
												{ text: 'DarkBlue', value: 'darkblue' },
												{ text: 'DarkMagenta', value: 'darkmagenta' },
												{ text: 'DuskBlue', value: 'duskblue' },
												{ text: 'ElectricBlue', value: 'electricblue' },
												{ text: 'FernGreen', value: 'ferngreen' },
												{ text: 'Lavender', value: 'lavender' },
												{ text: 'LightGreen', value: 'lightgreen' },
												{ text: 'LimeGreen', value: 'limegreen' },
												{ text: 'Ocean', value: 'ocean' },
												{ text: 'Orange', value: 'orange' },
												{ text: 'Pink', value: 'pink' },
												{ text: 'Purple', value: 'purple' },
												{ text: 'Red', value: 'red' },
												{ text: 'RoyalBlue', value: 'royalblue' },
												{ text: 'Salmon', value: 'salmon' },
												{ text: 'Violet', value: 'violet' },
												{ text: 'Yellow', value: 'yellow' }
											],
										},
									],
									onsubmit: function(e){
										var defaultContent =  "<ol>"
												+ "<li>Lorem ipsum dolor sit </li>"
												+ "<li>Praesent convallis nibh</li>"
												+ "<li>Nullam ac sapien sit</li>"
												+ "<li>Phasellus auctor augue</li></ol>";

										editor.insertContent('[dt_sc_fancy_ol style="'+e.data.style+'" variation="'+e.data.variation+'"]'+ defaultContent+'[/dt_sc_fancy_ol]');
									}
								});
							}
						},

						{ text: 'Unordered List',
							onclick : function(){
								editor.windowManager.open({
									title: "Add New Stylish Unordered List",
									body: [
										{
											type: 'listbox',
											name: 'style',
											label:'Style',
											values:[
												{ text: 'Arrow', value: 'arrow' },
												{ text: 'Book', value:'book'},
												{ text: 'Check', value:'check'},
												{ text: 'Cog', value:'cog'},
												{ text: 'Car', value:'car'},
												{ text: 'Rounded Arrow', value: 'rounded-arrow' },
												{ text: 'Double Arrow', value: 'double-arrow' },
												{ text: 'Heart', value: 'heart' },
												{ text: 'Trash', value: 'trash' },
												{ text: 'Star', value: 'star' },
												{ text: 'Tick', value: 'tick' },
												{ text: 'Rounded Tick', value: 'rounded-tick' },
												{ text: 'Cross', value: 'cross' },
												{ text: 'Hand', value:'hand'},
												{ text: 'Rounded Cross', value: 'rounded-cross' },
												{ text: 'Rounded Question', value: 'rounded-question' }, 
												{ text: 'Rounded Info', value: 'rounded-info' },
												{ text: 'Reddit',value:'reddit' },
												{ text: 'Delete', value: 'delete' },	
												{ text: 'Gift', value:'gift'},
												{ text: 'Graduation Cap', value:'graduation-cap' },
												{ text: 'Warning', value: 'warning' },
												{ text: 'Comment', value: 'comment' },
												{ text: 'Edit', value: 'edit' },
												{ text: 'Share', value: 'share' },
												{ text: 'Tree', value:'tree'},
												{ text: 'Plus', value: 'plus' },
												{ text: 'Rounded Plus', value: 'rounded-plus' },
												{ text: 'Minus', value: 'minus' },
												{ text: 'Rounded minus', value: 'rounded-minus' },
												{ text: 'Asterisk', value: 'asterisk' },
												{ text: 'Cart', value: 'cart' },
												{ text: 'Folder', value: 'folder' },
												{ text: 'Play', value:'play' },
												{ text: 'Folder Open', value: 'folder-open' },
												{ text: 'Desktop', value: 'desktop' },
												{ text: 'Tablet', value: 'tablet' },
												{ text: 'Mobile', value: 'mobile' },
												{ text: 'Reply', value: 'reply' },
												{ text: 'Quote', value: 'quote' },
												{ text: 'Mail', value: 'mail' },
												{ text: 'External Link', value: 'external-link' },
												{ text: 'Adjust', value: 'adjust' },
												{ text: 'Pencil', value: 'pencil' },
												{ text: 'Print', value: 'print' },
												{ text: 'Tag', value: 'tag' },
												{ text: 'Thumbs Up', value: 'thumbs-up' },
												{ text: 'Thumbs Down', value: 'thumbs-down' },
												{ text: 'Time', value: 'time' },
												{ text: 'Globe', value: 'globe' },
												{ text: 'Music', value: 'music' },
												{ text: 'Moon', value: 'moon' },
												{ text: 'Pushpin', value: 'pushpin' },
												{ text: 'Smile', value: 'smile' },
												{ text: 'Map Marker', value: 'map-marker' },
												{ text: 'Link', value: 'link' },
												{ text: 'Paper Clip', value: 'paper-clip' },
												{ text: 'Download', value: 'download' },
												{ text: 'Key', value: 'key' },
												{ text: 'Search', value: 'search' },
												{ text: 'Rss', value: 'rss' },
												{ text: 'Twitter', value: 'twitter' },
												{ text: 'Facebook', value: 'facebook' },
												{ text: 'Linkedin', value: 'linkedin' },
												{ text:'Google Plus', value:'google-plus'},
											],
										},
										{
											type: 'listbox',
											name: 'variation',
											label: 'Variation',
											values:[
												{ text: 'Default', value: '' },
												{ text: 'Chocolate', value: 'chocolate' },
												{ text: 'Coral', value: 'coral' },
												{ text: 'Cyan', value: 'cyan' },
												{ text: 'DarkBlue', value: 'darkblue' },
												{ text: 'DarkMagenta', value: 'darkmagenta' },
												{ text: 'DuskBlue', value: 'duskblue' },
												{ text: 'ElectricBlue', value: 'electricblue' },
												{ text: 'FernGreen', value: 'ferngreen' },
												{ text: 'Lavender', value: 'lavender' },
												{ text: 'LightGreen', value: 'lightgreen' },
												{ text: 'LimeGreen', value: 'limegreen' },
												{ text: 'Ocean', value: 'ocean' },
												{ text: 'Orange', value: 'orange' },
												{ text: 'Pink', value: 'pink' },
												{ text: 'Purple', value: 'purple' },
												{ text: 'Red', value: 'red' },
												{ text: 'RoyalBlue', value: 'royalblue' },
												{ text: 'Salmon', value: 'salmon' },
												{ text: 'Violet', value: 'violet' },
												{ text: 'Yellow', value: 'yellow' }											
											]
										},
									],
									onsubmit: function(e){
										var defaultContent =  "<ul>"
											+ "<li>Lorem ipsum dolor sit </li>"
											+ "<li>Praesent convallis nibh</li>"
											+ "<li>Nullam ac sapien sit</li>"
											+ "<li>Phasellus auctor augue</li></ul>";
											editor.insertContent('[dt_sc_fancy_ul style="'+e.data.style+'" variation="'+e.data.variation+'"]'+ defaultContent+'[/dt_sc_fancy_ul]');
									}
								});
							}
						},

						{ text : 'Multiple Icon List',
							onclick : function(e){
								e.stopPropagation();
								var $sc =  "[dt_sc_fancy_ul class='type2']<ul>"
									+ "<li> [dt_sc_fontawesome icon='fa-bolt'] Lorem ipsum dolor sit </li>"
									+ "<li> [dt_sc_fontawesome icon='fa-hdd-o'] Praesent convallis nibh</li>"
									+ "<li> [dt_sc_fontawesome icon='fa-gift'] Nullam ac sapien sit</li>"
									+ "<li> [dt_sc_fontawesome icon='fa-code'] Phasellus auctor augue</li></ul>[/dt_sc_fancy_ul]";
								editor.insertContent($sc);
							}
						},
					]
				},

				{ text: 'Post',
					menu:[

						{ text:'Single Post',
							onclick: function(e){
								editor.windowManager.open({
									title: "Add Post",
									body:[
										{ type:'textbox', name:'id', label:'Post id', value:'1'},
										{ type:'textbox', name:'excerpt_length', label:'Excerpt Length', value:'15' },
										{ type:'listbox', name:'show_format', 'label':'Show Post Format', values:[ {text:'Yes',value:'yes'}, {text:'No',value:'no'} ]},
										{ type:'listbox', name:'show_author', 'label':'Show Author Meta', values:[ {text:'Yes',value:'yes'}, {text:'No',value:'no'} ]},
										{ type:'listbox', name:'show_date', 'label':'Show Date Meta', values:[ {text:'Yes',value:'yes'}, {text:'No',value:'no'} ]},
										{ type:'listbox', name:'show_comments', 'label':'Show Comments Meta', values:[ {text:'Yes',value:'yes'}, {text:'No',value:'no'} ]},
										{ type:'listbox', name:'show_cats', 'label':'Show Category Meta', values:[ {text:'Yes',value:'yes'}, {text:'No',value:'no'} ]},
										{ type:'listbox', name:'show_tags', 'label':'Show Tags Meta', values:[ {text:'Yes',value:'yes'}, {text:'No',value:'no'} ]},
									],
									onsubmit: function(e){
										editor.insertContent('[dt_sc_post id="'+e.data.id+'" excerpt_length="'+e.data.excerpt_length+'" show_format="'+e.data.show_format+'" show_author="'+e.data.show_author+'" show_date="'+e.data.show_date+'" show_comments="'+e.data.show_comments+'" show_cats="'+e.data.show_cats+'"  show_tags="'+e.data.show_tags+'"/]');
									}
								});
							}
						},

						{ text:'Recent Posts',
							onclick: function(e){
								editor.windowManager.open({
									title: "Add Recent Posts",
									body:[
										{ type:'textbox', name:'count', label:'Post Counts', value:'3'},
										{ type:'textbox', name:'excerpt_length', label:'Excerpt Length', value:'15' },
										{ type:'listbox', name:'columns', 'label':'Columns', values:[ {text:'1',value:'1'}, {text:'2',value:'2'}, {text:'3',value:'3'}, ]},
										{ type:'listbox', name:'show_format', 'label':'Show Post Format', values:[ {text:'Yes',value:'yes'}, {text:'No',value:'no'} ]},
										{ type:'listbox', name:'show_author', 'label':'Show Author Meta', values:[ {text:'Yes',value:'yes'}, {text:'No',value:'no'} ]},
										{ type:'listbox', name:'show_date', 'label':'Show Date Meta', values:[ {text:'Yes',value:'yes'}, {text:'No',value:'no'} ]},
										{ type:'listbox', name:'show_comments', 'label':'Show Comments Meta', values:[ {text:'Yes',value:'yes'}, {text:'No',value:'no'} ]},
										{ type:'listbox', name:'show_cats', 'label':'Show Category Meta', values:[ {text:'Yes',value:'yes'}, {text:'No',value:'no'} ]},
										{ type:'listbox', name:'show_tags', 'label':'Show Tags Meta', values:[ {text:'Yes',value:'yes'}, {text:'No',value:'no'} ]},
									],
									onsubmit: function(e){
										editor.insertContent('[dt_sc_recent_post count="'+e.data.count+'" columns="'+e.data.columns+'" excerpt_length="'+e.data.excerpt_length+'" show_format="'+e.data.show_format+'" show_author="'+e.data.show_author+'" show_date="'+e.data.show_date+'" show_comments="'+e.data.show_comments+'" show_cats="'+e.data.show_cats+'"  show_tags="'+e.data.show_tags+'"/]');
									}
								});
							}
						},

						{ text:'Recent Posts From Category',
							onclick: function(e){
								editor.windowManager.open({
									title: "Add Recent Posts From Category",
									body:[
										{ type:'textbox', name:'count', label:'Post Counts', value:'3'},
										{ type:'textbox', name:'excerpt_length', label:'Excerpt Length', value:'15' },
										{ type:'listbox', name:'columns', 'label':'Columns', values:[ {text:'1',value:'1'}, {text:'2',value:'2'}, {text:'3',value:'3'}, ]},
										{ type:'textbox', name:'category', label:'Category', value:'1'},
										{ type:'listbox', name:'show_format', 'label':'Show Post Format', values:[ {text:'Yes',value:'yes'}, {text:'No',value:'no'} ]},
										{ type:'listbox', name:'show_author', 'label':'Show Author Meta', values:[ {text:'Yes',value:'yes'}, {text:'No',value:'no'} ]},
										{ type:'listbox', name:'show_date', 'label':'Show Date Meta', values:[ {text:'Yes',value:'yes'}, {text:'No',value:'no'} ]},
										{ type:'listbox', name:'show_comments', 'label':'Show Comments Meta', values:[ {text:'Yes',value:'yes'}, {text:'No',value:'no'} ]},
										{ type:'listbox', name:'show_cats', 'label':'Show Category Meta', values:[ {text:'Yes',value:'yes'}, {text:'No',value:'no'} ]},
										{ type:'listbox', name:'show_tags', 'label':'Show Tags Meta', values:[ {text:'Yes',value:'yes'}, {text:'No',value:'no'} ]},
									],
									onsubmit: function(e){
										editor.insertContent('[dt_sc_recent_post count="'+e.data.count+'" columns="'+e.data.columns+'" category="'+e.data.category+'" excerpt_length="'+e.data.excerpt_length+'" show_format="'+e.data.show_format+'" show_author="'+e.data.show_author+'" show_date="'+e.data.show_date+'" show_comments="'+e.data.show_comments+'" show_cats="'+e.data.show_cats+'"  show_tags="'+e.data.show_tags+'"/]');
									}
								});
							}
						},
					]
				},

				{ text: 'Portfolio',
					menu:[
						{ text: 'Single',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent("[dt_sc_portfolio_item id='']");
							}
						},
						{ text: 'Recent',
							onclick: function(e){
								editor.windowManager.open({
									title:"Show Recent Portfolios",
									body:[
										{ type:'textbox', name:'count', label:'Post Counts', value:'3'},
										{ type:'listbox', name:'columns', 'label':'Columns', values:[ {text:'2',value:'2'}, {text:'3',value:'3'}, {text:'4', value:'4'},]},
									],
									onsubmit: function(e){
										editor.insertContent('[dt_sc_recent_portfolio column="'+e.data.count+'" count="'+e.data.columns+'"/]');
									}
								});
							}
						},
						{ text: 'Form Category',
							onclick: function(e){
								//editor.insertContent('[dt_sc_recent_portfolio_from_cateogory category=""/]<br>');
								editor.windowManager.open({
									title:"Show Recent Portfolios From Category",
									body:[
										{ type:'textbox', name:'count', label:'Post Counts', value:'3'},
										{ type:'listbox', name:'columns', 'label':'Columns', values:[ {text:'2',value:'2'}, {text:'3',value:'3'}, {text:'4', value:'4'},]},
										{ type:'textbox', name:'category', label:'Category', value:''},
									],
									onsubmit: function(e){
										editor.insertContent('[dt_sc_recent_portfolio column="'+e.data.count+'" category="'+e.data.category+'" count="'+e.data.columns+'"/]');
									}
								});
							}
						}
					]
				},

				{ text:'Pull Quote',
					onclick: function(e){
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "pullquote"});
					}
				},

				{ text:'Pricing Table',
					menu:[
						{ text:'Type 1',
							onclick: function(e){
								e.stopPropagation();
								tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "pricingtable-simple"});
							}
						},
						{ text:'Type 2',
							onclick: function(e){
								e.stopPropagation();
								var $sc = '[dt_sc_pricing_table class="type2"]<br>';
									$sc += '<table>';
									$sc += '<thead>';
									$sc += '<tr>';
									$sc += '    <th>Plan Code</th>';
									$sc += '    <th>Full</th>';
									$sc += '    <th>High 250</th>';
									$sc += '    <th>Medium 250</th>';
									$sc += '    <th>Economy 500</th>';
									$sc += '    <th>Basic 500</th>';
									$sc += '</tr>';
									$sc += '</thead>';
									$sc += '<tbody>';
									$sc += '<tr>';
									$sc += '    <td>Bandwidth (GB)</td>';
									$sc += '    <td>Unlimited</td>';
									$sc += '    <td>Unlimited</td>';
									$sc += '    <td>Unlimited</td>';
									$sc += '    <td>Unlimited</td>';
									$sc += '    <td>Unlimited</td>';
									$sc += '</tr>';
									$sc += '<tr>';
									$sc += '    <td>Disk Space (GB)</td>';
									$sc += '    <td>Unlimited</td>';
									$sc += '    <td>Unlimited</td>';
									$sc += '    <td>Unlimited</td>';
									$sc += '    <td>Unlimited</td>';
									$sc += '    <td>Unlimited</td>';
									$sc += '</tr>';
									$sc += '<tr>';
									$sc += '    <td>Unlimited MySQL Databases</td>';
									$sc += '    <td>[dt_sc_fontawesome icon="fa-check-circle" color="#08c43c"]</td>';
									$sc += '    <td>[dt_sc_fontawesome icon="fa-check-circle" color="#08c43c"]</td>';
									$sc += '    <td>[dt_sc_fontawesome icon="fa-check-circle" color="#08c43c"]</td>';
									$sc += '    <td>[dt_sc_fontawesome icon="fa-check-circle" color="#08c43c"]</td>';
									$sc += '    <td>[dt_sc_fontawesome icon="fa-check-circle" color="#08c43c"]</td>';
									$sc += '</tr>';
									$sc += '<tr>';
									$sc += '    <td>Unlimited Hosted Domains</td>';
									$sc += '    <td>[dt_sc_fontawesome icon="fa-check-circle" color="#08c43c"]</td>';
									$sc += '    <td></td>';
									$sc += '    <td>[dt_sc_fontawesome icon="fa-check-circle" color="#08c43c"]</td>';
									$sc += '    <td></td>';
									$sc += '    <td></td>';
									$sc += '</tr>';
									$sc += '<tr>';
									$sc += '    <td>International Domains</td>';
									$sc += '    <td>[dt_sc_fontawesome icon="fa-check-circle" color="#08c43c"]</td>';
									$sc += '    <td></td>';
									$sc += '    <td></td>';
									$sc += '    <td>[dt_sc_fontawesome icon="fa-check-circle" color="#08c43c"]</td>';
									$sc += '    <td>[dt_sc_fontawesome icon="fa-check-circle" color="#08c43c"]</td>';
									$sc += '</tr>';
									$sc += '<tr>';
									$sc += '    <td>Linux Hosting</td>';
									$sc += '    <td>[dt_sc_fontawesome icon="fa-check-circle" color="#08c43c"]</td>';
									$sc += '    <td>[dt_sc_fontawesome icon="fa-check-circle" color="#08c43c"]</td>';
									$sc += '    <td>[dt_sc_fontawesome icon="fa-check-circle" color="#08c43c"]</td>';
									$sc += '    <td></td>';
									$sc += '    <td>[dt_sc_fontawesome icon="fa-check-circle" color="#08c43c"]</td>';
									$sc += '</tr>';
									$sc += '<tr>';
									$sc += '    <td>Windows Hosting</td>';
									$sc += '    <td>[dt_sc_fontawesome icon="fa-check-circle" color="#08c43c"]</td>';
									$sc += '    <td>[dt_sc_fontawesome icon="fa-check-circle" color="#08c43c"]</td>';
									$sc += '    <td></td>';
									$sc += '    <td>[dt_sc_fontawesome icon="fa-check-circle" color="#08c43c"]</td>';
									$sc += '    <td></td>';
									$sc += '</tr>';
									$sc += '<tr>';
									$sc += '    <td>Pricing / Plans </td>';
									$sc += '    <td><a class="price" href="#">$ 999<span> / Year</span></a></td>';
									$sc += '    <td><a class="price" href="#">$ 786<span> / Year</span></a></td>';
									$sc += '    <td><a class="price" href="#">$ 720<span> / Year</span></a></td>';
									$sc += '    <td><a class="price" href="#">$ 678<span> / Year</span></a></td>';
									$sc += '    <td><a class="price" href="#">$ 534<span> / Year</span></a></td>';
									$sc += '</tr>';
									$sc += '</tbody>';
									$sc += '</table>';
									$sc += '<br>[/dt_sc_pricing_table]';
								editor.insertContent($sc);
							}
						},

						{ text:'Type 3',
							onclick: function(e){
								e.stopPropagation();
								tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "pricingtable-with-image"});
							}
						},
					]
				},

				{ text: 'Progress Bar',
					menu:[

						{ text:'Active', 
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_progressbar value="45" type="progress-striped-active" color="#9c59b6"] Consectetur [/dt_sc_progressbar]');
							}
						},

						{ text:'Standard',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_progressbar value="85" type="standard" color="#9c59b6"] Consectetur [/dt_sc_progressbar]');
							}
						},

						{ text:'Stripe',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_progressbar value="75" type="progress-striped" color="#9c59b6"] Consectetur[/dt_sc_progressbar]');
							}
						},
					]
				},

				{ text: 'Tabs',
					menu:[
						{
							text : "Horizontal",
							menu:[
								{ text : 'Default',
									onclick: function(){
										editor.windowManager.open({
											title: "Add Horizontal Tab",
											body:[
												{ type:'listbox', name:'type', label:'Type', values:[ { text: 'Type 1', value: 'type1' }, { text: 'Type 2', value: 'type2' },] }
											],
											onsubmit: function(e){
												$shortcode = '[dt_sc_tabs_horizontal class="'+ e.data.type+'"]' + dummy_tabs + "[/dt_sc_tabs_horizontal]";
												editor.insertContent($shortcode);
											}
										});
									}
								},

								{ text : 'Framed',
									onclick: function(e){
										e.stopPropagation();
										editor.insertContent('[dt_sc_tabs_horizontal]' + dummy_tabs + "[/dt_sc_tabs_horizontal]");
									}
								}
							]
						},
						{ text:'Vertical',
							onclick:function(e){
								e.stopPropagation();
								var dummy_tabs = '<br>[dt_sc_tab title="Tab 1" number="1"]'
								+ "<br> Tab 1 : " + dummy_conent + "<br>" + '[/dt_sc_tab]' + "<br>"
								+ '[dt_sc_tab title="Tab 2" number="2"]' + "<br> Tab 2 : "
								+ dummy_conent + "<br>" + '[/dt_sc_tab]' + "<br>"
								+ '[dt_sc_tab title="Tab 3" number="3"]' + "<br> Tab 3 : "
								+ dummy_conent + "<br>" + '[/dt_sc_tab]<br>';

								editor.insertContent("[dt_sc_tabs_vertical]" + dummy_tabs+ "[/dt_sc_tabs_vertical]");
							}
						},
					]
				},

				/* Title */
				{ text : 'Title',
					menu:[
						{ text : 'Type 1',
							onclick: function(){
								editor.windowManager.open({
									title : 'Add Title',
									body  : [

										{ type:'listbox',
										  name:'type',
										  label:'Type',
										  values:[ { text: 'Heading 1', value: 'h1' },	{ text: 'Heading 2', value: 'h2' },  { text: 'Heading 3', value: 'h3' }, { text: 'Heading 4', value: 'h4' }, { text: 'Heading 5', value: 'h5' }, { text: 'Heading 6', value: 'h6' }, ]
										} ,

										{ type:'listbox',
										  name:'align',
										  label:'Alignment',
										  values:[ { text: 'Left', value: 'left' }, { text: 'Center', value: 'center' }, { text: 'Right', value: 'right' }, ]
										} ,

										{ type:'listbox',
										  name:'style',
										  label:'Style at',
										  values:[ { text: 'Left', value: 'left' }, { text: 'Right', value: 'right' }, ]
										} ,
									],
									onsubmit: function(e){
										$shortcode = '[dt_sc_title_styled type="'+e.data.type+'" class="'+e.data.align+'" style="'+e.data.style+'" span="We are really happy to help small businesses"]to grow up mutually, with[/dt_sc_title_styled]';
										editor.insertContent($shortcode);
									}
								});
							}
						},
						{ text : 'Type 2',
							onclick: function(){
								editor.windowManager.open({
									title : 'Add Title ',
									body :[
										{ 
											type:'listbox',
											name:'type',
											label:'Type',
											values:[
												{ text: 'Heading 1', value: 'h1' },
												{ text: 'Heading 2', value: 'h2' },
												{ text: 'Heading 3', value: 'h3' },
												{ text: 'Heading 4', value: 'h4' },
												{ text: 'Heading 5', value: 'h5' },
												{ text: 'Heading 6', value: 'h6' },
											]
										} ,

										{ 
											type:'listbox',
											name:'align',
											label:'Alignment',
											values:[
												{ text: 'Left', value: 'left' },
												{ text: 'Center', value: 'center' },
												{ text: 'Right', value: 'right' },
											]
										}
									],
									onsubmit: function(e){
										$shortcode = '[dt_sc_title type="'+e.data.type+'"" class="'+e.data.align+'"]Lorem ipsum dolor sit amet[/dt_sc_title]';
										editor.insertContent($shortcode);
									}
								});
							}
						},
						{ text: 'Type 3',
							onclick: function(){
								editor.windowManager.open({
									title : 'Add Title ',
									body :[
										{ 
											type:'listbox',
											name:'type',
											label:'Type',
											values:[
												{ text: 'Heading 1', value: 'h1' },
												{ text: 'Heading 2', value: 'h2' },
												{ text: 'Heading 3', value: 'h3' },
												{ text: 'Heading 4', value: 'h4' },
												{ text: 'Heading 5', value: 'h5' },
												{ text: 'Heading 6', value: 'h6' },
											]
										},
										{
											type:'textbox',
											name:'fontawesome',
											label: 'Font Awesome Icon',
											value:'fa-home'
										},
										{
											type:'textbox',
											name:'class',
											label:'Class',
											value:''
										},
									],
									onsubmit: function(e){
										$shortcode = '[dt_sc_icon_title type="'+e.data.type+'" fontawesome="'+e.data.fontawesome+'" class="'+e.data.class+'"]Lorem ipsum dolor sit amet[/dt_sc_icon_title]';
										editor.insertContent($shortcode);
									}
								});
							}
						},
					]
				},
				/* Title */

				{ text:'Title Box',
					onclick: function(e){
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "box"});
					}
				},

				{ text: 'Toggle',
					menu:[
						{ text: 'Default',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_toggle title="Toggle 1"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle]"
										+'<br>[dt_sc_toggle title="Toggle 2"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle]"
										+'<br>[dt_sc_toggle title="Toggle 3"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle]");
							}
						},

						{ text: 'Framed',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_toggle_framed title="Toggle 1"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle_framed]"
										+'<br>[dt_sc_toggle_framed title="Toggle 2"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle_framed]"
										+'<br>[dt_sc_toggle_framed title="Toggle 3"]<br>'+ dummy_conent + "<br>[/dt_sc_toggle_framed]");
							}
						},
					]
				},

				{ text:'Tool tip',
					onclick: function(e){
						e.stopPropagation();
						tinyMCE.activeEditor.execCommand("scnOpenDialog", {title: this.text() ,identifier: "tooltip"});
					}
				},

				{ text:'Others',
					menu:[

						{ text : 'Slider' ,
							onclick: function(e){

								editor.windowManager.open({
									title : 'Simple Slider',
									body:[

										{ type:'listbox', name:'type', 'label':'Type', values:[
											{ text:'Right Slider',value:'right-slide'}, {text:'Left Slider',value : 'left-slide'}]
										},

										{ type:'listbox', name:'slides', 'label':'Slides', values:[ 
											{text:'1',value:'1'}, {text:'2',value:'2'},	{text:'3',value:'3'},
											{text:'4',value:'4'}, {text:'5',value:'5'}, {text:'6',value:'6'},
											{text:'7',value:'7'}, {text:'8',value:'8'},	{text:'9',value:'9'}, {text:'10',value:'10'},] },

									],
									onsubmit: function(e){

										var $shortcode = '[dt_sc_slider type="'+ e.data.type+'"]<br>';

										$shortcode += '[dt_sc_three_fifth first type ="type1"]<br>';
										$shortcode += '[dt_sc_title_styled type="h3" class="left" style="left" span="We are really happy to help small businesses"]to grow up mutually, with these ideal features.[/dt_sc_title_styled]<br>';

										$shortcode += '[dt_sc_slider_control]<br>';
										$shortcode += '[dt_sc_fancy_ul class="type2"]<br>';
										$shortcode += '<ul>';
														for (i = 1; i <= e.data.slides; i++) {
															$shortcode += "<li> [dt_sc_fontawesome icon='fa-inbox'] Slider "+i+" Control</li>";	
														}
										$shortcode += '</ul>';
										$shortcode += '[/dt_sc_fancy_ul]<br>';
										$shortcode += '[/dt_sc_slider_control]<br>';
										$shortcode += '[/dt_sc_three_fifth]<br>';

										$shortcode += '[dt_sc_two_fifth last type="type1"]<br>';
										$shortcode += '[dt_sc_carousel_slider]';
										$shortcode += '<ul>';
														for (i = 1; i <= e.data.slides; i++) {
															$shortcode += "<li><img src='http://placehold.it/450x270&amp;text=Image"+ i +"'/></li>";	
														}
										$shortcode += '</ul>';
										$shortcode += '[/dt_sc_carousel_slider]<br>';
										$shortcode += '[/dt_sc_two_fifth]<br>';
										$shortcode += '[/dt_sc_slider]';
										editor.insertContent($shortcode);
									}
								});
							}
						},

						{ text : 'Team',
							menu:[
								{ text:'Single',
									menu:[
										{ text : 'Type 1',
											onclick: function(e){
												e.stopPropagation();
												editor.insertContent('[dt_sc_team type="type1" name="DesignThemes" role="Chief Programmer" image="http://placehold.it/500" twitter="#" facebook="#"  google_plus="#" linkedin="#"/]');
											}
										},
										{ text : 'Type 2',
											onclick: function(e){
												e.stopPropagation();
												editor.insertContent('[dt_sc_team type="type2" name="DesignThemes" role="Chief Programmer" image="http://placehold.it/500" twitter="#" facebook="#"  google_plus="#" linkedin="#"/]');
											}
										},
									]
								},

								{  text:'Carousel',
									menu:[
										{ text : 'Type 1',
											onclick: function(e){
												e.stopPropagation();

												$shortcode = "[dt_sc_team_carousel]<br>"
													+'<ul>'
													+'<li>[dt_sc_team type="type1" name="DesignThemes" role="Chief Programmer" image="http://placehold.it/500&text=Team%201" twitter="#" facebook="#"  google_plus="#" linkedin="#"/]</li>'
													+'<li>[dt_sc_team type="type1" name="DesignThemes" role="Chief Programmer" image="http://placehold.it/500&text=Team%202" twitter="#" facebook="#"  google_plus="#" linkedin="#"/]</li>'
													+'<li>[dt_sc_team type="type1" name="DesignThemes" role="Chief Programmer" image="http://placehold.it/500&text=Team%203" twitter="#" facebook="#"  google_plus="#" linkedin="#"/]</li>'
													+'<li>[dt_sc_team type="type1" name="DesignThemes" role="Chief Programmer" image="http://placehold.it/500&text=Team%204" twitter="#" facebook="#"  google_plus="#" linkedin="#"/]</li>'
													+'<li>[dt_sc_team type="type1" name="DesignThemes" role="Chief Programmer" image="http://placehold.it/500&text=Team%205" twitter="#" facebook="#"  google_plus="#" linkedin="#"/]</li>'
													+'</ul>'
													+"<br>[/dt_sc_team_carousel]";
												editor.insertContent($shortcode);
											}
										},
										{ text : 'Type 2',
											onclick: function(e){
												e.stopPropagation();

												$shortcode = "[dt_sc_team_carousel]<br>"
													+'<ul>'
													+'<li>[dt_sc_team type="type2" name="DesignThemes" role="Chief Programmer" image="http://placehold.it/500&text=Team%201" twitter="#" facebook="#"  google_plus="#" linkedin="#"/]</li>'
													+'<li>[dt_sc_team type="type2" name="DesignThemes" role="Chief Programmer" image="http://placehold.it/500&text=Team%202" twitter="#" facebook="#"  google_plus="#" linkedin="#"/]</li>'
													+'<li>[dt_sc_team type="type2" name="DesignThemes" role="Chief Programmer" image="http://placehold.it/500&text=Team%203" twitter="#" facebook="#"  google_plus="#" linkedin="#"/]</li>'
													+'<li>[dt_sc_team type="type2" name="DesignThemes" role="Chief Programmer" image="http://placehold.it/500&text=Team%204" twitter="#" facebook="#"  google_plus="#" linkedin="#"/]</li>'
													+'<li>[dt_sc_team type="type2" name="DesignThemes" role="Chief Programmer" image="http://placehold.it/500&text=Team%205" twitter="#" facebook="#"  google_plus="#" linkedin="#"/]</li>'
													+'</ul>'
													+"<br>[/dt_sc_team_carousel]";

												editor.insertContent($shortcode);
											}
										},
									]
								},
							]
						},

						{ text:'Testimonial',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent(testimonal);
							}
						},

						{ text:'Testimonial Carousel',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_testimonial_carousel]<br>'
									+'<ul>'
									+'<li>'+testimonal+'</li>'
									+'<li>'+testimonal+'</li>'
									+'<li>'+testimonal+'</li>'
									+'</ul>'
									+'<br>[/dt_sc_testimonial_carousel]');
							}
						},

						{ text:'Clients Carousel',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_carousel]<br>'+images_carousel+'<br>[/dt_sc_carousel]');
							}
						},

						{ text:'Domains Carousel',
							onclick: function( e ) {
								e.stopPropagation();

								var domains = '<ul>'
								+'<li class="column dt-sc-one-fifth">[dt_sc_domain text="Domain names ranging from" price="$2.49" per="/Mo" featured/]</li>'
								+'<li class="column dt-sc-one-fifth">[dt_sc_domain tld=".com" price="$5.99"/]</li>'
								+'<li class="column dt-sc-one-fifth">[dt_sc_domain tld=".in" price="$3.49"/]</li>'
								+'<li class="column dt-sc-one-fifth">[dt_sc_domain tld=".org" price="$6.99"/]</li>'
								+'<li class="column dt-sc-one-fifth">[dt_sc_domain tld=".net" price="$8.99"/]</li>'
								+'<li class="column dt-sc-one-fifth">[dt_sc_domain tld=".biz" price="$7.49"/]</li>'
								+'<li class="column dt-sc-one-fifth">[dt_sc_domain tld=".app" price="$4.99"/]</li>'
								+'</ul>';

								editor.insertContent('[dt_sc_domains_carousel]'+ domains+'[/dt_sc_domains_carousel]');
							}
						},

						{ text:'FAQ Carousel',
							onclick: function(e) {
								e.stopPropagation();

								var faqs = '<ul>'
								+'<li class="column dt-sc-one-fifth">[dt_sc_faq text="How to create a new email account" icon="" fontawesome="fa-file"/]</li>'
								+'<li class="column dt-sc-one-fifth">[dt_sc_faq text="Setting up your email with Gmail" icon="" fontawesome="fa-question-circle"/]</li>'
								+'<li class="column dt-sc-one-fifth">[dt_sc_faq text="How to Manage your emails & accounts" icon="" fontawesome="fa-play-circle"/]</li>'
								+'<li class="column dt-sc-one-fifth">[dt_sc_faq text="How to use Smart FTP Clients" icon="" fontawesome="fa-question-circle"/]</li>'
								+'<li class="column dt-sc-one-fifth">[dt_sc_faq text=".htacccess tutorial" icon="" fontawesome="fa-play-circle"/]</li>'
								+'<li class="column dt-sc-one-fifth">[dt_sc_faq text="Easy Mail Account Configuration" icon="" fontawesome="fa-file"/]</li>'
								+'<li class="column dt-sc-one-fifth">[dt_sc_faq text="Overview - Complete Hosting Solutions" icon="" fontawesome="fa-play-circle"/]</li>'
								+'</ul>';

								editor.insertContent('[dt_sc_faqs_carousel]'+ faqs+'[/dt_sc_faqs_carousel]');
							}
					    },

						{ text: 'Pricing Box',
							onclick: function(e){
								e.stopPropagation();
								editor.insertContent('[dt_sc_pricing_box price="$1,500" per="Per month"] Starting @ [/dt_sc_pricing_box]');
							}
						}
					]
				},

				{ text: 'Search Domain',
					onclick: function(e){
						e.stopPropagation();
						editor.insertContent('[dt_sc_domain_search_form action="" tlds=".com,.net,.org,.wiki"/]');
					}
				},
			]
		});
	});
})();
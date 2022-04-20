  function myAlert(txtname, ico, titlecolor, titlehead, btncolor, typecolor, colclass, btntext) {
		$.alert({
		icon: ico,
		title: '<font color="'+titlecolor+'"><strong>'+titlehead+'</strong></font>',
		content: txtname,
		type: typecolor,
		typeAnimated: true,
			 buttons: {
				tryAgain: {
					text: btntext,
					btnClass: btncolor,
					action: function(){
				 }
			}
		},
		columnClass: colclass,
	});
  }
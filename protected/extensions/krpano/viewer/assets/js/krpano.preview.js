function Preview(){
	return{
		/* @public variables */
		attributes: {
			type:"CUBESTRIP",
			url:"preview.jpg",
			details:8,
			striporder:"LFRBUP",
		},
		/* @public methods */
        Init: function(options)
		{
		    $.extend(this.attributes, options);
		},
	}
}
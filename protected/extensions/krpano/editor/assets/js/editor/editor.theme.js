function Theme(){
	
	return{
        id: 0,
        attributes: {
            name: 'default',
            path: 'src/themes/'
        },
        Init: function(options){
            console.log(options);
            this.id = options.id;
            this.attributes.name = options.name === undefined ? 'default' : options.name;
            this.attributes.path = options.path === undefined ? 'src/themes/'  : options.path;
        }
    }
};
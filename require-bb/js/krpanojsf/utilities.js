define(
	function(){
        var utilities = {};
        utilities.getUniqueId = function(prefix)
        {
             var dateObject = new Date();
             var uniqueId = dateObject.getTime();

             if(prefix !== undefined){
                uniqueId = prefix + uniqueId;
             }

             return uniqueId;
        };
        utilities.getUniqueId = function(prefix)
        {
            var dateObject = new Date();
            var uniqueId = dateObject.getTime();
    
            if(prefix !== undefined){
                uniqueId = prefix + uniqueId;
            }
            return uniqueId;
        };
        utilities.getRandomNumber = function(range)
        {
            return Math.floor(Math.random() * range);
        };
    
        utilities.getRandomChar = function()
        {
            var chars = "0123456789abcdefghijklmnopqurstuvwxyzABCDEFGHIJKLMNOPQURSTUVWXYZ";
            return chars.substr( krApp.utilities.getRandomNumber(62), 1 );
        };
    
        utilities.randomID = function(size)
        {
            var str = "";
            for(var i = 0; i < size; i++)
            {
                str += App.utilities.getRandomChar();
            }
            return str;
        };
    
        utilities.roundValue = function(value, decimals){
            var d = Math.pow(10, decimals);
            return Math.round(Number(value) * d) / d;
        };
    
        utilities.santizeString = function(str){
            var without_html = str.replace(/(<([^>]+)>)/ig, ""); //removes <p></p> html tags
            var without_squarebrackets =  without_html.replace(/\[([^\]]+)\]/ig, ""); //removes [p][/p] pseudo html tags
            var xmlencoded = krApp.utilities.XmlEncode(without_squarebrackets); //safe encode quote, &, semicolon, >, <
            var no_whitespace = xmlencoded.replace(/^\s*|\s*$/,"");
            return no_whitespace;
        };
    
        utilities.XmlEncode = function(text) {
            //text = text.replace(/&/g, '&amp;');
            // text = text.replace(/\"/g, '&quot;');
            text = text.replace(/\"/g, '');
            //text = text.replace(/\'/g, '&apos;');
            text = text.replace(/\'/g, '');
            //text = text.replace(/</g, '&lt;');
            //text = text.replace(/>/g, '&gt;');
            text = text.replace(/\?/g, '');
            text = text.replace(/\[/g, '');
            text = text.replace(/\]/g, '');
            text = text.replace(/\</g, '');
            text = text.replace(/\>/g, '');
            text = text.replace(/\\/g, '');
            text = text.replace(/\//g, '');
            text = text.replace(/www/ig, '');
            text = text.replace(/http:/ig, '');
            text = text.replace(/\&/g, ' en ');
            return text;
        };
        return utilities;
    }
);

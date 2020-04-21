function amigable(url) {
    var link="";
    url = url.replace("?", "");
    url = url.split("&");
    cont = 0;
    for (var i=0;i<url.length;i++) {
    	cont++;
        var aux = url[i].split("=");
        if (cont == 2) {
        	link +=  "/"+aux[1]+"/";	
        }else{
        	link +=  "/"+aux[1];
        }
        
    }
    return "http://localhost/1_Fw_PHP_OO_MVC_jQuery_AngularJS/Framework/9_adoptions_dogs" + link;
}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<footer>
        <li>·Instagram</li>
        <li>·Youtube</li>
    </footer>
    <script>
        //aqui hacemos la opcion de aceptar las cookies y cambiar el color de fondo del body
        function mostrarPrompt(){ 
            var decision = window.confirm("Este sitio web utiliza cookies. ¿Aceptas su uso?");
            if(decision === true){
                document.cookie = "cookies_accepted=true; expires=Fri, 31 Dec 9999 23:59:59 GMT;";
                establecerCookieColor();
            }else{

            }
        }
        function establecerCookieColor(){
            document.cookie = "background_color=white; expires=Fri,31 Dec 99999 23:59:59 GMT;";
            document.body.style.backgroundColor= "white";
        }

        window.onload = function(){
            var cookiesAccepted = document.cookie.split(';').some(function(item){
                return item.trim().indexOf('cookies_accepted=') == 0;
            
            });
            
            if(!cookiesAccepted){
            mostrarPrompt();
            }else{
                var backgroundColorCookie = document.cookie.split(';').some(function(item){
                    return item.trim().indexOf('background_color=') == 0;
                    });
                    if(backgroundColorCookie){
                        document.body.style.backgroundColor= "white";
                    }
            }
        }
        
                
    </script>
</body>
</html>

<!DOCTYPE html> 
<html> 
    <head> 
        <meta charset="utf-8">
        <meta name=viewport content="user-scalable=no,width=device-width" />
        <link rel=stylesheet href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.css" />
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
        <script>
            $( document ).on( "click", ".show-page-loading-msg", function() {
                var $this = $( this ),
                    theme = $this.jqmData( "theme" ) || $.mobile.loader.prototype.options.theme,
                    msgText = $this.jqmData( "msgtext" ) || $.mobile.loader.prototype.options.text,
                    textVisible = $this.jqmData( "textvisible" ) || $.mobile.loader.prototype.options.textVisible,
                    textonly = !!$this.jqmData( "textonly" );
                    html = $this.jqmData( "html" ) || "";
                $.mobile.loading( "show", {
                        text: msgText,
                        textVisible: textVisible,
                        theme: theme,
                        textonly: textonly,
                        html: html
                });
            })
            .on( "click", ".hide-page-loading-msg", function() {
                $.mobile.loading( "hide" );
            });
        </script>
    </head> 

    <body> 
        <div data-role=page id=home>
            <div data-role=header>
                <h1>Inicio de sesión</h1>
            </div>
            <center><img src="<?= base_url()?>assets/images/EscudoDeTrujilloPeru1.png" width="136" alt="" style="margin-top: 20px;" /></center>
            <div data-role=content>
                <form id="validate" method="post" action="<?= base_url()?>usermobile/login">
                    <div data-role="fieldcontain">
                        <span> Usuario : </span> <input type=text id=lat placeholder="Ingrese usuario" name="usuario" id="usuario" required="required"/>
                    </div>
                    <div data-role="fieldcontain">
                        <span> Contraseña : </span> <input type=password id=lng placeholder="Ingrese contraseña" name="password" id="password" required="required" />
                    </div>
                    <button type="submit" class="show-page-loading-msg" data-theme="a" data-textonly="false" data-textvisible="true" data-msgtext="Validando datos..." data-inline="true">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </body>
</html>
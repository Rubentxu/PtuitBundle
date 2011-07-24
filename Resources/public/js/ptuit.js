$(document).ready(function(){
    $(".txtMen").cuentaCaracteres();
    $("#botonTxt").click(enviarMensaje);
    $("#btnRegistrar").click(registrar);
    $("#btnLogin").click(login);
    $('#panel').hide();
    $('#panel2').hide();
    $("#login").click(toggleLogin);
    $("#registro").click(toggleRegistro);
    $("#mar").marquee({
        yScroll: "bottom"
    });


})
function toggleLogin()
{
    $('#panel2').hide();
    $('#panel').toggle("slow");
    $('#errorFormLogin').text('');
    return false;
}
function toggleRegistro()
{
    $('#panel').hide();
    $('#panel2').toggle("slow");
    return false;
}

function login(){
    var usuario=$("#nick").attr("value");
    var pass=$("#pass").attr("value");

    $.ajax({
        url:"index.php",
        async: true,
        type: "POST",
        dataType: "json",
        contentType: "application/x-www-form-urlencoded",
        data:"controlador=usuario&accion=login&formulario=Login&usuario="+usuario+"&pass="+pass,
        beforeSend: inicioLogin,
        success:llegadaDatosLogin,
        complete: completadoLogin,
        timeout: 4000,
        error: problemasEnvio

    });


}

function inicioLogin (datos){

    $("#panel").addClass("txtMenCargando");


}
function llegadaDatosLogin(datos){

    if(datos.validado=='FALSE'){
        var errorMensaje =$('#errorFormLogin');
        errorMensaje.text(datos.msgError);
        errorMensaje.show('slow');

    }else {
        $('#login').hide();
        $('#registro').hide();
        $('#logExito').text("Bienvenido: "+datos.datosUsuario.usuario);
        $('#logExito').show("slow");

        $('#panel').hide();
        $('#panel2').hide();
    }
    $("#panel").removeClass("txtMenCargando");
    $("#pass").val("")
    $("#nick").val("");

    
    


}
function completadoLogin()   {
    
}

function registrar(){

    var usuario=$("#nickR").attr("value");
    var pass=$("#passR").attr("value");
    var pass2=$("#passR2").attr("value");
    var correo=$("#correo").attr("value");
    $.ajax({
        url:"index.php",
        async: true,
        type: "POST",
        dataType: "json",
        contentType: "application/x-www-form-urlencoded",
        data:"controlador=usuario&accion=crearUsuario&formulario=Registro&usuario="+usuario+"&pass="+pass+"&pass2="+pass2+"&correo="+correo,
        beforeSend: inicioRegistro,
        success:llegadaDatosRegistro,
        complete: completadoRegistro,
        timeout: 4000,
        error: problemasEnvio

    });


}
function inicioRegistro (datos){

    $("#panel2").addClass("txtMenCargando");


}
function llegadaDatosRegistro(datos){
    if(datos.validado=='FALSE'){
        var errorMensaje =$('#errorFormRegistro');
        errorMensaje.text(datos.msgError);
        errorMensaje.show('slow');

    }else {
        
        $('#panel').hide();
        $('#panel2').hide();
        $("#panel").removeClass("txtMenCargando");
        $("#pass").val("")
        $("#nick").val("");
        $("#pass2").val("");
        $("#correo").val("");
    }   


}
function completadoRegistro()   {
    $("#panel2").removeClass("txtMenCargando");
    $("#passR").val("")
    $("#nickR").val("");

}

jQuery.fn.cuentaCaracteres= function(){
    txt=$(this);
    var errorMensaje =$('#errorMensaje');
    
    var contador =$('.contador');
    txt.keyup(function(){
        errorMensaje.text('');
        errorMensaje.hide();
        contador.text(': '+txt.attr("value").length+' :');

    });
    return this;

}
function enviarMensaje(){

    var texto=$(".txtMen").attr("value");
    var url=$("#formMens").attr('action');
    var token=$("#form__token").attr('value');
    $(".txtMen").val("");
    $('.contador').text('');
    $.ajax({
        url:url,
        async: true,
        type: "POST",
        dataType: "json",
        contentType: "application/x-www-form-urlencoded",
        data:"texto="+texto+"&Mensaje[_token]="+token,
        beforeSend: inicioEnvio,    
        success:llegadaDatos,
        complete: completado,
        timeout: 4000,
        error: problemasEnvio

    });


    return false;
}
function inicioEnvio (datos){
    $(".txtMen").addClass("txtMenCargando");

}
function llegadaDatos (datos){
    
        alert('los datos son: '+datos.texto);
       var msg= '<li><a href="#"><img class="avatar" src="/web/imagen/ptuit.png"  alt="avatar" /></a>'+
	'<div class="tweetTxt"><strong><a href="#"> ' +datos.usuario+ ' </a></strong>'+
                    datos.texto+'<div class="date">'+datos.fecha+ '</div>'+
	'</div>	<div class="clear"></div></li>';
        
        
        $('ul.statuses li:first-child').before(msg);
        $("ul.statuses:empty").append(msg);
        $('#lastTweet').html($('#inputField').val());
        $('#inputField').val('');
        
    
    $(".txtMen").removeClass("txtMenCargando");
}
function problemasEnvio(objeto, quepaso, otroobj){
    alert("Hubo un fallo en el envio AJAX... Pasó lo siguiente: "+quepaso+" "+objeto+" "+otroobj);

}
function completado(exito){
    

    if(exito=="success"){
        alert("Y con éxito");
    }

}
/*!
 * Marquee jQuery Plug-in
 *
 * Copyright 2009 Giva, Inc. (http://www.givainc.com/labs/)
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * 	http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * Date: 2009-05-20
 * Rev:  1.0.01
 */
;
(function($){
    // set the version of the link select
    $.marquee = {
        version: "1.0.01"
    };

    $.fn.marquee = function(options) {
        var method = typeof arguments[0] == "string" && arguments[0];
        var args = method && Array.prototype.slice.call(arguments, 1) || arguments;
        // get a reference to the first marquee found
        var self = (this.length == 0) ? null : $.data(this[0], "marquee");

        // if a method is supplied, execute it for non-empty results
        if( self && method && this.length ){

            // if request a copy of the object, return it
            if( method.toLowerCase() == "object" ) return self;
            // if method is defined, run it and return either it's results or the chain
            else if( self[method] ){
                // define a result variable to return to the jQuery chain
                var result;
                this.each(function (i){
                    // apply the method to the current element
                    var r = $.data(this, "marquee")[method].apply(self, args);
                    // if first iteration we need to check if we're done processing or need to add it to the jquery chain
                    if( i == 0 && r ){
                        // if this is a jQuery item, we need to store them in a collection
                        if( !!r.jquery ){
                            result = $([]).add(r);
                        // otherwise, just store the result and stop executing
                        } else {
                            result = r;
                            // since we're a non-jQuery item, just cancel processing further items
                            return false;
                        }
                    // keep adding jQuery objects to the results
                    } else if( !!r && !!r.jquery ){
                        result = result.add(r);
                    }
                });

                // return either the results (which could be a jQuery object) or the original chain
                return result || this;
            // everything else, return the chain
            } else return this;
        // initializing request
        } else {
            // create a new marquee for each object found
            return this.each(function (){
                new $.Marquee(this, options);
            });
        };
    };

    $.Marquee = function (marquee, options){
        options = $.extend({}, $.Marquee.defaults, options);

        var self = this, $marquee = $(marquee), $lis = $marquee.find("> li"), current = -1, hard_paused = false, paused = false, loop_count = 0;

        // store a reference to this marquee
        $.data($marquee[0], "marquee", self);

        // pause the marquee
        this.pause = function (){
            // mark as hard pause (no resume on hover)
            hard_paused = true;
            // pause scrolling
            pause();
        }

        // resume the marquee
        this.resume = function (){
            // mark as hard pause (no resume on hover)
            hard_paused = false;
            // resume scrolling
            resume();
        }

        // update the marquee
        this.update = function (){
            var iCurrentCount = $lis.length;

            // update the line items
            $lis = $marquee.find("> li");

            // if we only have one item, show the next item by resuming playback (which will scroll to the next item)
            if( iCurrentCount <= 1 ) resume();
        }

        // code to introduce the new marquee message
        function show(i){
            // if we're already scrolling an item, stop processing
            if( $lis.filter("." + options.cssShowing).length > 0 ) return false;

            var $li = $lis.eq(i);

            // run the beforeshow callback
            if( $.isFunction(options.beforeshow) ) options.beforeshow.apply(self, [$marquee, $li]);

            var params = {
                top: (options.yScroll == "top" ? "-" : "+") + $li.outerHeight() + "px"
                ,
                left: 0
            };

            $marquee.data("marquee.showing", true);
            $li.addClass(options.cssShowing);

            $li.css(params).animate({
                top: "0px"
            }, options.showSpeed, options.fxEasingShow, function (){
                // run the show callback
                if( $.isFunction(options.show) ) options.show.apply(self, [$marquee, $li]);
                $marquee.data("marquee.showing", false);
                scroll($li);
            });
        }

        // keep the message on the screen for the user to read, scrolling long messages
        function scroll($li, delay){
            // if paused, stop processing
            if( paused == true ) return false;

            // get the delay speed
            delay = delay || options.pauseSpeed;
            // if	item is wider than marquee, then scroll
            if( doScroll($li) ){
                setTimeout(function (){
                    // if paused, stop processing (we need to check to see if the pause state has changed)
                    if( paused == true ) return false;

                    var width = $li.outerWidth(), endPos = width * -1, curPos = parseInt($li.css("left"), 10);

                    // scroll the message to the left
                    $li.animate({
                        left: endPos + "px"
                    }, ((width + curPos) * options.scrollSpeed), options.fxEasingScroll, function (){
                        finish($li);
                    });
                }, delay);
            } else if ( $lis.length > 1 ){
                setTimeout(function (){
                    // if paused, stop processing (we need to check to see if the pause state has changed)
                    if( paused == true ) return false;

                    // scroll the message down
                    $li.animate({
                        top: (options.yScroll == "top" ? "+" : "-") + $marquee.innerHeight() + "px"
                    }, options.showSpeed, options.fxEasingScroll);
                    // finish showing this message
                    finish($li);
                }, delay);
            }

        }

        function finish($li){
            // run the aftershow callback, only after we've displayed the first option
            if( $.isFunction(options.aftershow) ) options.aftershow.apply(self, [$marquee, $li]);

            // mark that we're done scrolling this element
            $li.removeClass(options.cssShowing);

            // show the next message
            showNext();
        }

        // this function will pause the current animation
        function pause(){
            // mark the message as paused
            paused = true;
            // don't stop animation if we're just beginning to show the marquee message
            if( $marquee.data("marquee.showing") != true ){
                // we must dequeue() the animation to ensure that it does indeed stop animation
                $lis.filter("." + options.cssShowing).dequeue().stop();
            }
        }

        // this function will resume the previous animation
        function resume(){
            // mark the message as resumed
            paused = false;
            // don't resume animation if we haven't completed introducing the message
            if( $marquee.data("marquee.showing") != true ) scroll($lis.filter("." + options.cssShowing), 1);
        }

        // determine if we should pause on hover
        if( options.pauseOnHover ){
            $marquee.hover(
                function (){
                    // if hard paused, prevent hover events
                    if( hard_paused ) return false;
                    // pause scrolling
                    pause();
                }
                , function (){
                    // if hard paused, prevent hover events
                    if( hard_paused ) return false;
                    // resume scrolling
                    resume();
                }
                );
        }

        // determines if the message needs to be scrolled to read
        function doScroll($li){
            return ($li.outerWidth() > $marquee.innerWidth());
        }

        // show the next message in the queue
        function showNext(){
            // increase the current counter (starts at -1, to indicate a new marquee beginning)
            current++;

            // if we only have 1 entry and it doesn't need to scroll, just cancel processing
            if( current >= $lis.length ){
                // if we've reached our loop count, cancel processing
                if( !isNaN(options.loop) && options.loop > 0 && (++loop_count >= options.loop ) ) return false;
                current = 0;
            }

            // show the next message
            show(current);
        }

        // run the init callback
        if( $.isFunction(options.init) ) options.init.apply(self, [$marquee, options]);

        // show the first item
        showNext();
    };

    $.Marquee.defaults = {
        yScroll: "top"                          // the position of the marquee initially scroll (can be either "top" or "bottom")
        ,
        showSpeed: 850                          // the speed of to animate the initial dropdown of the messages
        ,
        scrollSpeed: 12                         // the speed of the scrolling (keep number low)
        ,
        pauseSpeed: 5000                        // the time to wait before showing the next message or scrolling current message
        ,
        pauseOnHover: true                      // determine if we should pause on mouse hover
        ,
        loop: -1                                // determine how many times to loop through the marquees (#'s < 0 = infinite)
        ,
        fxEasingShow: "swing"                   // the animition easing to use when showing a new marquee
        ,
        fxEasingScroll: "linear"                // the animition easing to use when showing a new marquee

        // define the class statements
        ,
        cssShowing: "marquee-showing"

        // event handlers
        ,
        init: null                              // callback that occurs when a marquee is initialized
        ,
        beforeshow: null                        // callback that occurs before message starts scrolling on screen
        ,
        show: null                              // callback that occurs when a new marquee message is displayed
        ,
        aftershow: null                         // callback that occurs after the message has scrolled
    };

})(jQuery);

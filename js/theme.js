/*!------- Cookie bar JS -------*/
!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):(e=e||self,function(){var n=e.Cookies,r=e.Cookies=t();r.noConflict=function(){return e.Cookies=n,r}}())}(this,function(){"use strict";function e(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var r in n)e[r]=n[r]}return e}var t={read:function(e){return e.replace(/(%[\dA-F]{2})+/gi,decodeURIComponent)},write:function(e){return encodeURIComponent(e).replace(/%(2[346BF]|3[AC-F]|40|5[BDE]|60|7[BCD])/g,decodeURIComponent)}};return function n(r,o){function i(t,n,i){if("undefined"!=typeof document){"number"==typeof(i=e({},o,i)).expires&&(i.expires=new Date(Date.now()+864e5*i.expires)),i.expires&&(i.expires=i.expires.toUTCString()),t=encodeURIComponent(t).replace(/%(2[346B]|5E|60|7C)/g,decodeURIComponent).replace(/[()]/g,escape),n=r.write(n,t);var c="";for(var u in i)i[u]&&(c+="; "+u,!0!==i[u]&&(c+="="+i[u].split(";")[0]));return document.cookie=t+"="+n+c}}return Object.create({set:i,get:function(e){if("undefined"!=typeof document&&(!arguments.length||e)){for(var n=document.cookie?document.cookie.split("; "):[],o={},i=0;i<n.length;i++){var c=n[i].split("="),u=c.slice(1).join("=");'"'===u[0]&&(u=u.slice(1,-1));try{var f=t.read(c[0]);if(o[f]=r.read(u,f),e===f)break}catch(e){}}return e?o[e]:o}},remove:function(t,n){i(t,"",e({},n,{expires:-1}))},withAttributes:function(t){return n(this.converter,e({},this.attributes,t))},withConverter:function(t){return n(e({},this.converter,t),this.attributes)}},{attributes:{value:Object.freeze(o)},converter:{value:Object.freeze(r)}})}(t,{path:"/"})});
/*------- Cookie bar JS Ends -------*/
/*------- Scroll Out JS ---------*/
var ScrollOut=function(){"use strict"
function S(e,t,n){return e<t?t:n<e?n:e}function T(e){return+(0<e)-+(e<0)}var q,t={}
function n(e){return"-"+e[0].toLowerCase()}function d(e){return t[e]||(t[e]=e.replace(/([A-Z])/g,n))}function v(e,t){return e&&0!==e.length?e.nodeName?[e]:[].slice.call(e[0].nodeName?e:(t||document.documentElement).querySelectorAll(e)):[]}function h(e,t){for(var n in t)n.indexOf("_")&&e.setAttribute("data-"+d(n),t[n])}var z=[]
function e(){q=0,z.slice().forEach(function(e){return e()}),F()}function F(){!q&&z.length&&(q=requestAnimationFrame(e))}function N(e,t,n,r){return"function"==typeof e?e(t,n,r):e}function m(){}return function(L){var i,P,_,H,o=(L=L||{}).onChange||m,l=L.onHidden||m,c=L.onShown||m,s=L.onScroll||m,f=L.cssProps?(i=L.cssProps,function(e,t){for(var n in t)n.indexOf("_")&&(!0===i||i[n])&&e.style.setProperty("--"+d(n),(r=t[n],Math.round(1e4*r)/1e4))
var r}):m,e=L.scrollingElement,A=e?v(e)[0]:window,W=e?v(e)[0]:document.documentElement,x=!1,O={},y=[]
function t(){y=v(L.targets||"[data-scroll]",v(L.scope||W)[0]).map(function(e){return{element:e}})}function n(){var e=W.clientWidth,t=W.clientHeight,n=T(-P+(P=W.scrollLeft||window.pageXOffset)),r=T(-_+(_=W.scrollTop||window.pageYOffset)),i=W.scrollLeft/(W.scrollWidth-e||1),o=W.scrollTop/(W.scrollHeight-t||1)
x=x||O.scrollDirX!==n||O.scrollDirY!==r||O.scrollPercentX!==i||O.scrollPercentY!==o,O.scrollDirX=n,O.scrollDirY=r,O.scrollPercentX=i,O.scrollPercentY=o
for(var l,c=!1,s=0;s<y.length;s++){for(var f=y[s],u=f.element,a=u,d=0,v=0;d+=a.offsetLeft,v+=a.offsetTop,(a=a.offsetParent)&&a!==A;);var h=u.clientHeight||u.offsetHeight||0,m=u.clientWidth||u.offsetWidth||0,g=(S(d+m,P,P+e)-S(d,P,P+e))/m,p=(S(v+h,_,_+t)-S(v,_,_+t))/h,w=1===g?0:T(d-P),X=1===p?0:T(v-_),Y=S((P-(m/2+d-e/2))/(e/2),-1,1),b=S((_-(h/2+v-t/2))/(t/2),-1,1),D=void 0
D=L.offset?N(L.offset,u,f,W)>_?0:1:(N(L.threshold,u,f,W)||0)<g*p?1:0
var E=f.visible!==D;(f._changed||E||f.visibleX!==g||f.visibleY!==p||f.index!==s||f.elementHeight!==h||f.elementWidth!==m||f.offsetX!==d||f.offsetY!==v||f.intersectX!=f.intersectX||f.intersectY!=f.intersectY||f.viewportX!==Y||f.viewportY!==b)&&(c=!0,f._changed=!0,f._visibleChanged=E,f.visible=D,f.elementHeight=h,f.elementWidth=m,f.index=s,f.offsetX=d,f.offsetY=v,f.visibleX=g,f.visibleY=p,f.intersectX=w,f.intersectY=X,f.viewportX=Y,f.viewportY=b,f.visible=D)}H||!x&&!c||(l=C,z.push(l),F(),H=function(){!(z=z.filter(function(e){return e!==l})).length&&q&&(cancelAnimationFrame(q),q=0)})}function C(){u(),x&&(x=!1,h(W,{scrollDirX:O.scrollDirX,scrollDirY:O.scrollDirY}),f(W,O),s(W,O,y))
for(var e=y.length-1;-1<e;e--){var t=y[e],n=t.element,r=t.visible,i=n.hasAttribute("scrollout-once")||!1
t._changed&&(t._changed=!1,f(n,t)),t._visibleChanged&&(h(n,{scroll:r?"in":"out"}),o(n,t,W),(r?c:l)(n,t,W)),r&&(L.once||i)&&y.splice(e,1)}}function u(){H&&(H(),H=void 0)}t(),n(),C()
var r=0,a=function(){r=r||setTimeout(function(){r=0,n()},0)}
return window.addEventListener("resize",a),A.addEventListener("scroll",a),{index:t,update:n,teardown:function(){u(),window.removeEventListener("resize",a),A.removeEventListener("scroll",a)}}}}()
/*------- Scroll Out JS Ends ---------*/



jQuery(function ($) { 


	/*-------- stickyHead --------*/
        $siteheaderHeight = $('.shead').outerHeight(); 
        function stickyHead() {
            var lastScrollTop = 0;
            $(window).scroll(function(event) {
			   var st = $(this).scrollTop();

               if (st >= lastScrollTop) {
                   $('body').addClass('downScroll').removeClass('upScroll');
                } else {
                   $('body').addClass('upScroll').removeClass('downScroll');
                }

                if((st >= $('.shead').outerHeight()) && (st >= $(window).height()/2) ) {
                   $('.shead').addClass('sticky');
                } else {
                    $('.shead').removeClass('sticky');
                }
               lastScrollTop = st;
            });

        }
        /*-------- stickyHead Ends --------*/


	function smoothScroll() {
       ScrollOut({ targets: '.anim', onShown(el) { el.classList.add("in"); } });    
       ScrollOut({ targets: '.anim.repeat', onShown(el) { el.classList.add("in"); el.classList.remove("out"); threshold: .3; }, onHidden(el) {
           el.classList.remove("in"); 
           el.classList.add("out"); 
       } });
    }


     /*---------- easyScroll Scrolling -------------*/
        function easyScroll(target){
        var amount = $(target).offset();
        if(amount){ $('html,body').animate({scrollTop: amount.top }, 500); }
        }
    
        $('#primary-menu a, .ctaLink').on('click', function(event){ 
            $(this).attr('target');
            if( $(this).attr('href').startsWith('#') || ( window.location.href.indexOf(`${location.href}#`) > -1  ) ) {
                event.preventDefault(); 
                easyScroll(this.hash);    
            }
        });
        if(window.location.hash) { easyScroll(location.hash); }
    /*---------- easyScroll Ends -------------*/


    $('document').ready(function(){
        
        stickyHead(); easyScroll(); smoothScroll(); 

    })




});
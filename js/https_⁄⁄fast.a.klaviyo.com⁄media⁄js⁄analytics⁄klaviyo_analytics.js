
/*
 Copyright 2013 Klaviyo, Inc. http://www.klaviyo.com/
*/
(function(t){Array.prototype.toJSON&&delete Array.prototype.toJSON;var n={_keyStr:"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=",encode:function(a){var c="",b=0;for(a=n._utf8_encode(a);b<a.length;){var d=a.charCodeAt(b++);var f=a.charCodeAt(b++);var h=a.charCodeAt(b++);var g=d>>2;d=(d&3)<<4|f>>4;var l=(f&15)<<2|h>>6;var k=h&63;isNaN(f)?l=k=64:isNaN(h)&&(k=64);c=c+this._keyStr.charAt(g)+this._keyStr.charAt(d)+this._keyStr.charAt(l)+this._keyStr.charAt(k)}return c},decode:function(a){var c=
        "",b=0;for(a=a.replace(/[^A-Za-z0-9\+\/=]/g,"");b<a.length;){var d=this._keyStr.indexOf(a.charAt(b++));var f=this._keyStr.indexOf(a.charAt(b++));var h=this._keyStr.indexOf(a.charAt(b++));var g=this._keyStr.indexOf(a.charAt(b++));d=d<<2|f>>4;f=(f&15)<<4|h>>2;var l=(h&3)<<6|g;c+=String.fromCharCode(d);64!=h&&(c+=String.fromCharCode(f));64!=g&&(c+=String.fromCharCode(l))}return c=n._utf8_decode(c)},_utf8_encode:function(a){a=a.replace(/\r\n/g,"\n");for(var c="",b=0;b<a.length;b++){var d=a.charCodeAt(b);
        128>d?c+=String.fromCharCode(d):(127<d&&2048>d?c+=String.fromCharCode(d>>6|192):(c+=String.fromCharCode(d>>12|224),c+=String.fromCharCode(d>>6&63|128)),c+=String.fromCharCode(d&63|128))}return c},_utf8_decode:function(a){for(var c="",b=0,d,f;b<a.length;)d=a.charCodeAt(b),128>d?(c+=String.fromCharCode(d),b++):191<d&&224>d?(f=a.charCodeAt(b+1),c+=String.fromCharCode((d&31)<<6|f&63),b+=2):(f=a.charCodeAt(b+1),c3=a.charCodeAt(b+2),c+=String.fromCharCode((d&15)<<12|(f&63)<<6|c3&63),b+=3);return c}},b=
    b||{};b.LEARNING_HOST="a.klaviyo.com";b.LEARNING_DOMAIN="http://www.klaviyo.com";b.JS_VERSION=14;b.DEBUG=!1;b=b||{};b.debug=!1;b.log=function(){var a=new b.Cookie,c=-1<document.location.hash.indexOf("#ldbg");if(b.DEBUG||c||"1"===a.get("learnly_dbg"))(c=t.console)&&"function"===typeof c.log&&c.log.apply(c,arguments),a.set("learnly_dbg","1")};b=b||{};b.global={};b.global.Context=function(a,b,e,d,f,h,g){this.doc=a||document;this.nav=b||navigator;this.scr=e||screen;this.win=d||t;this.loc=f||this.doc.location;
    this.top=h||top;this.parent=g||parent};b.global.Context.prototype.getDocument=function(){return this.doc};b.global.Context.prototype.getNavigator=function(){return this.nav};b.global.Context.prototype.getScreen=function(){return this.scr};b.global.Context.prototype.getWindow=function(){return this.win};b.global.Context.prototype.getLocation=function(){return this.loc};b.global.Context.prototype.getProtocol=function(){return"https:"==this.loc.protocol?"https://":"http://"};b.global.Context.prototype.getHostName=
    function(){return this.loc.hostname};b.global.Context.prototype.getTop=function(){return this.top};b.global.Context.prototype.getParent=function(){return this.parent};b.global.Context.prototype.getReferrer=function(){var a="";try{a=this.top.document.referrer}catch(c){if(parent)try{a=this.parent.document.referrer}catch(e){a=""}}""===a&&(a=this.doc.referrer);return a};b.global.Context.prototype.getCharacterSet=function(){return this.doc.characterSet?this.doc.characterSet:this.doc.charset?this.doc.charset:
    ""};b.global.Context.prototype.getLanguage=function(){return this.nav.language?this.nav.language:this.nav.browserLanguage?this.nav.browserLanguage:""};b.global.Browser=function(a){var c=(a||new b.global.Context).getNavigator();a=c.userAgent.toLowerCase();var e={init:function(){this.browser=this.searchString(this.dataBrowser)||"";this.version=this.searchVersion(c.userAgent)||this.searchVersion(c.appVersion)||"";this.OS=this.searchString(this.dataOS)||""},searchString:function(a){for(var b=0;b<a.length;b++){var c=
        a[b].string,d=a[b].prop;this.versionSearchString=a[b].versionSearch||a[b].identity;if(c){if(-1!=c.indexOf(a[b].subString))return a[b].identity}else if(d)return a[b].identity}},searchVersion:function(a){var b=a.indexOf(this.versionSearchString);if(-1!=b)return parseFloat(a.substring(b+this.versionSearchString.length+1))},dataBrowser:[{string:c.userAgent,subString:"Chrome",identity:"Chrome"},{string:c.userAgent,subString:"OmniWeb",versionSearch:"OmniWeb/",identity:"OmniWeb"},{string:c.vendor,subString:"Apple",
        identity:"Safari",versionSearch:"Version"},{prop:t.opera,identity:"Opera"},{string:c.vendor,subString:"iCab",identity:"iCab"},{string:c.vendor,subString:"KDE",identity:"Konqueror"},{string:c.userAgent,subString:"Firefox",identity:"Firefox"},{string:c.vendor,subString:"Camino",identity:"Camino"},{string:c.userAgent,subString:"Netscape",identity:"Netscape"},{string:c.userAgent,subString:"MSIE",identity:"Internet Explorer",versionSearch:"MSIE"},{string:c.userAgent,subString:"Gecko",identity:"Mozilla",
        versionSearch:"rv"},{string:c.userAgent,subString:"Mozilla",identity:"Netscape",versionSearch:"Mozilla"}],dataOS:[{string:c.platform,subString:"Win",identity:"Windows"},{string:c.platform,subString:"Mac",identity:"Mac"},{string:c.userAgent,subString:"iPhone",identity:"iPhone/iPod"},{string:c.platform,subString:"Linux",identity:"Linux"}]};e.init();this.version=(a.match(/.+(?:rv|it|ra|ie)[\/: ]([\d.]+)/)||[0,"0"])[1];this.os=e.OS;this.browser=e.browser};b=b||{};b.utils=b.utils||{};var u={},m=Array.prototype,
    q=Object.prototype,B=m.slice,v=q.toString,C=q.hasOwnProperty,y=m.forEach,z=m.indexOf,A=m.some;b.utils.isArray=Array.isArray||function(a){return"[object Array]"==v.call(a)};b.utils.isUndefined=function(a){return void 0===a};b.utils.has=function(a,b){return C.call(a,b)};var r=b.utils.each=function(a,c,e){if(null!=a)if(y&&a.forEach===y)a.forEach(c,e);else if(a.length===+a.length)for(var d=0,f=a.length;d<f&&!(d in a&&c.call(e,a[d],d,a)===u);d++);else for(d in a)if(b.utils.has(a,d)&&c.call(e,a[d],d,a)===
    u)break};b.utils.identity=function(a){return a};var D=b.utils.any=function(a,c,e){c||(c=b.utils.identity);var d=!1;if(null==a)return d;if(A&&a.some===A)return a.some(c,e);r(a,function(a,b,g){if(d||(d=c.call(e,a,b,g)))return u});return!!d};b.utils.contains=function(a,b){var c=!1;return null==a?c:z&&a.indexOf===z?-1!=a.indexOf(b):c=D(a,function(a){return a===b})};b.utils.extend=function(a){r(B.call(arguments,1),function(b){for(var c in b)a[c]=b[c]});return a};var w=function(a,c,e){if(a===c)return 0!==
    a||1/a==1/c;if(null==a||null==c)return a===c;var d=v.call(a);if(d!=v.call(c))return!1;switch(d){case "[object String]":return a==String(c);case "[object Number]":return a!=+a?c!=+c:0==a?1/a==1/c:a==+c;case "[object Date]":case "[object Boolean]":return+a==+c;case "[object RegExp]":return a.source==c.source&&a.global==c.global&&a.multiline==c.multiline&&a.ignoreCase==c.ignoreCase}if("object"!=typeof a||"object"!=typeof c)return!1;for(var f=e.length;f--;)if(e[f]==a)return!0;e.push(a);f=0;var h=!0;if("[object Array]"==
    d){if(f=a.length,h=f==c.length)for(;f--&&(h=f in a==f in c&&w(a[f],c[f],e)););}else{if("constructor"in a!="constructor"in c||a.constructor!=c.constructor)return!1;for(var g in a)if(b.utils.has(a,g)&&(f++,!(h=b.utils.has(c,g)&&w(a[g],c[g],e))))break;if(h){for(g in c)if(b.utils.has(c,g)&&!f--)break;h=!f}}e.pop();return h};b.utils.isEqual=function(a,b){return w(a,b,[])};b.utils.url=function(a){return(b.DEBUG?"http://":(new b.global.Context).getProtocol())+b.LEARNING_HOST+"/"+a};b.utils.encodeParam=function(a,
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 b){var c=encodeURIComponent;return c instanceof Function?b?encodeURI(a):c(a):escape(a)};b.utils.encodeParams=function(a,c){var e=[];c=c||"&";var d=function(a,c){e[e.length]=b.utils.encodeParam(a)+"="+b.utils.encodeParam(c)};r(a,function(a,c){b.utils.isArray(a)?r(a,function(a,b){d(c,a)}):d(c,a)});return e.join(c).replace(/%20/g,"+")};b.utils.decodeParam=function(a,b){var c=decodeURIComponent;a=a.split("+").join(" ");if(c instanceof Function)try{var d=b?decodeURI(a):c(a)}catch(f){d=unescape(a)}else d=
    unescape(a);return d};b.utils.addEventListener=function(a,b,e,d){if(a.addEventListener)return a.addEventListener(b,e,d),!0;if(a.attachEvent)return a.attachEvent("on"+b,e);a["on"+b]=e};b.utils.hashDomain=function(a){for(var b=0,e=a.length-1;0<=e;e--){var d=a.charCodeAt(e);b=(b<<6&268435455)+d+(d<<14);d=b&266338304;b=0!=d?b^d>>21:b}return b};b.utils.extractDomain=function(a){a=a.split(".");2<a.length&&(a=a.slice(1));return"."+a.join(".")};b.utils.guid=function(){var a=(new Date).getTime(),c=(new b.global.Context).getWindow();
    c.performance&&"function"===typeof c.performance.now&&(a+=performance.now());return"xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g,function(b){var c=(a+16*Math.random())%16|0;a=Math.floor(a/16);return("x"==b?c:c&3|8).toString(16)})};b.utils.utcnow=function(){return Math.round(new Date/1E3)};b.utils.utf8Encode=function(a){a=(a+"").replace(/\r\n/g,"\n").replace(/\r/g,"\n");var b="",e,d;var f=e=0;var h=a.length;for(d=0;d<h;d++){var g=a.charCodeAt(d),l=null;128>g?e++:l=127<g&&2048>g?String.fromCharCode(g>>
    6|192)+String.fromCharCode(g&63|128):String.fromCharCode(g>>12|224)+String.fromCharCode(g>>6&63|128)+String.fromCharCode(g&63|128);null!==l&&(e>f&&(b+=a.substring(f,e)),b+=l,f=e=d+1)}e>f&&(b+=a.substring(f,a.length));return b};b.utils.logError=function(a,c){c=c||{};var e={ts:b.utils.utcnow(),m:a.message||a.toString?a.toString():"-",v:b.JS_VERSION};b.utils.extend(e,c);a.name&&(e.n=a.name);a.fileName&&(e.f=a.fileName);a.lineNumber&&(e.l=a.lineNumber);try{e.x=a.stack||a.stacktrace||""}catch(d){}b.log("Encountered a JS error");
    b.log(e)};b=b||{};b.Cookie=function(a){this.context=a||new b.global.Context;this.cookies=[]};b.Cookie.prototype.set=function(a,c,e){e=e||{};if(e.minsToExpire){var d=new Date;d.setTime(d.getTime()+6E4*e.minsToExpire)}else e.daysToExpire&&(d=new Date,d.setTime(d.getTime()+864E5*e.daysToExpire));this._set(a,e.alreadyEncoded?c:b.utils.encodeParam(c,!0),(b.utils.isUndefined(d)?"":";expires="+d.toGMTString())+";path="+(e.path?e.path:"/")+(e.domain?";domain="+e.domain:"")+(e.secure?";secure":""))};b.Cookie.prototype._set=
    function(a,b,e){this.context.getDocument().cookie=a+"="+b+e;this.cookies.push({name:a,value:b,extras:e})};b.Cookie.prototype.get=function(a){return(a=(new RegExp("(^|;)[ ]*"+a+"=([^;]*)")).exec(this.context.getDocument().cookie))?b.utils.decodeParam(a[2],!0):""};b.Cookie.prototype.del=function(a,b){b=b||{};b.daysToExpire=-1;this.get(a)&&this.set(a,"",b)};b.Cookie.prototype.has=function(){return b.utils.isUndefined(this.context.getNavigator().cookieEnabled)?this.context.getNavigator().cookieEnabled?
    "1":"0":(this.set("__l_testcookie","1"),"1"==this.get("__l_testcookie")?"1":"0")};b=b||{};b.LocalStorage=function(a){this.context=a||new b.global.Context;this.is_available=!1;try{return localStorage.setItem("_kla_test","_kla_test"),localStorage.removeItem("_kla_test"),this.is_available=!0}catch(c){}};b.LocalStorage.prototype.set=function(a,b){if(!this.is_available)return!1;localStorage.setItem(a,b);return!0};b.LocalStorage.prototype.get=function(a){if(this.is_available)return localStorage.getItem(a)};
    b.LocalStorage.prototype.del=function(a){if(!this.is_available)return!1;localStorage.removeItem(a);return!0};b.tracking=b.tracking||{};b.tracking.Tracker=function(a){this.context=a.context;this.cookie=a.cookie;this.local_storage=a.local_storage;this.identity=this.cookie_domain=this.account_id=null;this.has_tracked_interests=this.has_tracked_activity=!1;this.is_tracking_on=!this.cookie.get("__kla_off");this._loadIdentityFromCookie()};b.tracking.Tracker.prototype._loadIdentityFromCookie=function(){var a=
        this.cookie.get("__kla_id");if(a)try{if((this.identity=JSON.parse(n.decode(a)))&&this.identity.$email)try{var b=JSON.parse(this.identity.$email);this.identity=this._getIdentityFromKLObject(b);this._saveIdentity(this.identity)}catch(e){}}catch(e){}};b.tracking.Tracker.prototype.account=function(a){this.is_tracking_on&&!b.utils.isUndefined(a)&&(this.account_id=a);return this.account_id};b.tracking.Tracker.prototype.cookieDomain=function(a){this.is_tracking_on&&!b.utils.isUndefined(a)&&(this.cookie_domain=
        a);return this.cookie_domain};b.tracking.Tracker.prototype.identify=function(a,c,e){this._shouldClearIdentity(a)&&this.clearIdentity();if(!1===c&&this.identity||!this._identityNeedsUpdate(a)||!this.account_id)return this.identity;var d=b.utils.extend({},this.identity,a);this._sendRequest({url:"api/identify",data:{data:n.encode(JSON.stringify({token:this.account_id,properties:d}))}});b.utils.each(["$append","$unappend","$unset"],function(a){b.utils.has(d,a)&&(b.utils.each(d[a],function(c,e){"$unset"===
    a&&(e=c);b.utils.has(d,e)&&delete d[e]}),delete d[a])});!1!==e&&this._setIdentity(d);this.trackActivity();return d};b.tracking.Tracker.prototype.clearIdentity=function(){this.cookie.del("__kla_id");this.identity=null;this.clearViewedItems()};b.tracking.Tracker.prototype.enableAnonymousTracking=function(){this.identity&&this.identity.$anonymous||this.identify({$anonymous:b.utils.guid()})};b.tracking.Tracker.prototype.clearViewedItems=function(){this.local_storage.del("__kla_viewed")};b.tracking.Tracker.prototype.trackActivity=
        function(){if(!this.has_tracked_activity){this._saveReferrer();this._saveLastReferrer();this._parseInitialUrl();var a=this.context,c=new b.global.Browser(a);a={page:a.getLocation().href,browser:c.browser,os:c.os};this.track("__activity__",a)&&(this.has_tracked_activity=!0)}};b.tracking.Tracker.prototype.trackInterests=function(){if(!this.has_tracked_interests){this._saveReferrer();this._saveLastReferrer();this._parseInitialUrl();var a={$tags:this._parsePageTags()};this.track("$passive_interest",a)&&
    (this.has_tracked_interests=!0)}};b.tracking.Tracker.prototype.trackViewedItem=function(a){if(this.local_storage.is_available){var c=b.utils.utcnow(),e=this.local_storage.get("__kla_viewed");try{e=JSON.parse(e)||[]}catch(l){e=[]}if(e.length){var d;b.utils.each(e,function(a){a[0].LastViewedDate&&(!d||a[0].LastViewedDate>d)&&(d=a[0].LastViewedDate)});if(!d||d+2592E3<c)e=[]}var f=!1;b.utils.each(e,function(b){if(a.ItemId===b[0].ItemId)return b[1]++,b[0].LastViewedDate=c,f=!0,!1});f||(a.LastViewedDate=
        c,e.unshift([a,1]),e=e.splice(0,20));e.sort(function(b,c){return b[1]!==c[1]?c[1]-b[1]:b[0].ItemId===a.ItemId?-1:c[0].ItemId===a.ItemId?1:0});this.local_storage.set("__kla_viewed",JSON.stringify(e));var h={},g=[];b.utils.each(e,function(a){normalized_item=b.utils.extend({},a[0]);normalized_item.Views=a[1];g.push(normalized_item)});h.$viewed_items=g;this.identify(h,!0,!1)}};b.tracking.Tracker.prototype.track=function(a,b){b=b||{};var c=this.account_id,d=this.identity||{},f=!d.email&&!d.id&&!d.$email&&
        !d.$id&&!d.$anonymous&&!d.$phone_number;if(!c||f)return!1;b.$use_ip=!0;b.$is_session_activity=!0;this._sendRequest({url:"api/track",data:{data:n.encode(JSON.stringify({event:a,token:c,properties:b,customer_properties:d}))}});return!0};b.tracking.Tracker.prototype.trackOnce=function(a,c){c=b.utils.extend({__track_once__:!0},c);return this.track(a,c)};b.tracking.Tracker.prototype._identityNeedsUpdate=function(a){var c=this.identity;a=b.utils.extend({},c,a);return!c||!b.utils.isEqual(c,a)};b.tracking.Tracker.prototype._setIdentity=
        function(a){this.identity=a;this._saveIdentity(a)};b.tracking.Tracker.prototype._saveIdentity=function(a){this.cookie.set("__kla_id",n.encode(JSON.stringify(a)),{daysToExpire:730,domain:this.cookie_domain})};b.tracking.Tracker.prototype._saveReferrer=function(){var a=b.utils.extend({},this.identity);a.$referrer||(a.$referrer={ts:b.utils.utcnow(),value:this.context.getReferrer(),first_page:this.context.getLocation().href},this._setIdentity(a))};b.tracking.Tracker.prototype._saveLastReferrer=function(){var a=
        b.utils.extend({},this.identity),c=b.utils.utcnow();if(!a.$last_referrer||a.$last_referrer.ts+1800<c)b.log("Updating last."),a.$last_referrer={ts:c,value:this.context.getReferrer(),first_page:this.context.getLocation().href};a.$last_referrer.ts=c;this._setIdentity(a)};b.tracking.Tracker.prototype._parseInitialUrl=function(){var a=this.context.getLocation(),b=a.search.match(/utm_email=([^#&]+)/i);b&&this.identify({$email:decodeURIComponent(b[1])});if(b=a.search.match(/_ke=([^#&]+)/i)){a=n.decode(decodeURIComponent(b[1]));
        try{var e=JSON.parse(a);e.kl_company_id===this.account_id&&this.identify(this._getIdentityFromKLObject(e))}catch(d){this.identify({$email:a})}}};b.tracking.Tracker.prototype._getIdentityFromKLObject=function(a){var c={};b.utils.isUndefined(a.kl_email)||(c.$email=a.kl_email);b.utils.isUndefined(a.kl_phone_number)||(c.$phone_number=a.kl_phone_number);return c};b.tracking.Tracker.prototype._parsePageTags=function(){var a=this,c=document.getElementsByTagName("meta"),e,d;b.utils.each(c,function(b){var c=
        b.getAttribute("name");b.getAttribute("property");"keywords"===c?d||(b=a._normalizeTags(b.getAttribute("content")))&&b.length&&(d=b):"klaviyo:tags"!==c||e||(b=a._normalizeTags(b.getAttribute("content")))&&b.length&&(e=b)});return e&&e.length?e:d&&d.length?d:!1};b.tracking.Tracker.prototype._normalizeTags=function(a){if(null===a)return[];a=b.utils.isArray(a)?a:a.split(",");for(var c=0,e=a.length,d=[],f;c<e;c++)(f=a[c].toLowerCase().replace(" ","-").replace("_","-").replace(/[^a-z\-]/gi,"").replace(/^(-)*/,
        "").replace(/(-)*$/,"").substring(0,64))&&!b.utils.contains(d,f)&&d.push(f);return d};b.tracking.Tracker.prototype._sendRequest=function(a,c){b.log("Sending request.");a.data.i=1;a&&b.log(a);var e=b.utils.url(a.url);e=e+"?"+b.utils.encodeParams(a.data);b.log(e);a=new Image(1,1);c&&(a.onload=function(){c()});a.src=e};b.tracking.Tracker.prototype._shouldClearIdentity=function(a){return a&&this.identity?this._hasCachedIdAndNewIdDiffers(a)||!this._hasCachedId()&&this._hasCachedEmailAndNewEmailDiffers(a):
        !1};b.tracking.Tracker.prototype._hasCachedEmailAndNewEmailDiffers=function(a){return this.identity.$email&&a.$email&&this.identity.$email!==a.$email};b.tracking.Tracker.prototype._hasCachedIdAndNewIdDiffers=function(a){return this._hasCachedId()&&!b.utils.isUndefined(a.$id)&&a.$id!==this.identity.$id};b.tracking.Tracker.prototype._hasCachedId=function(){return!b.utils.isUndefined(this.identity.$id)};m=new b.global.Context;q=m.getWindow();var k=q._learnq,p=new b.tracking.Tracker({cookie:new b.Cookie(m),
        local_storage:new b.LocalStorage(m),context:m});if(!k||!k._loaded){var x=function(a){if("function"==typeof a)a(p,b);else if(b.utils.isArray(a)&&a&&p[a[0]])return p[a[0]].apply(p,a.slice(1))};b.utils.isArray(k)||(q._learnq=[],k=q._learnq);b.log("Ready. Processing LEARNQ2.");for(b.utils.each(k,function(a){b.utils.isArray(a)&&a&&b.utils.contains(["account","cookieDomain","identify"],a[0])&&x(a)});k.length;)x(k.shift());k.push=x;b.utils.each(["account","cookieDomain","identify","track"],function(a){p[a]&&
    (k[a]=function(){return p[a].apply(p,arguments)})});k._loaded=!0;k.push(["trackActivity"])}})(window);
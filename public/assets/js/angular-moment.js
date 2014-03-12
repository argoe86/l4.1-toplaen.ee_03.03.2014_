!function(){"use strict";function a(a,b,c){return a&&b&&(a.tz?a=a.tz(b):c.warn("angular-moment: timezone specified but moment.tz() is undefined. Did you forget to include moment-timezone.js?")),a}angular.module("angularMoment",[]).constant("angularMomentConfig",{timezone:""}).constant("amTimeAgoConfig",{withoutSuffix:!1}).directive("amTimeAgo",["$window","amTimeAgoConfig",function(a,b){return function(c,d,e){function f(){k&&(a.clearTimeout(k),k=null)}function g(b){d.text(b.fromNow(l));var c=a.moment().diff(b,"minute"),e=3600;1>c?e=1:60>c?e=30:180>c&&(e=300),k=a.setTimeout(function(){g(b)},1e3*e)}function h(){f(),g(a.moment(i,j))}var i,j,k=null,l=b.withoutSuffix;c.$watch(e.amTimeAgo,function(a){return"undefined"==typeof a||null===a||""===a?(f(),void(i&&(d.text(""),i=null))):(angular.isNumber(a)&&(a=new Date(a)),i=a,void h())}),angular.isDefined(e.amWithoutSuffix)&&c.$watch(e.amWithoutSuffix,function(a){"boolean"==typeof a?(l=a,h()):l=b.withoutSuffix}),e.$observe("amFormat",function(a){j=a,i&&h()}),c.$on("$destroy",function(){f()}),c.$on("amMoment:languageChange",function(){h()})}}]).factory("amMoment",["$window","$rootScope",function(a,b){return{changeLanguage:function(c){var d=a.moment.lang(c);return angular.isDefined(c)&&b.$broadcast("amMoment:languageChange"),d}}}]).filter("amCalendar",["$window","$log","angularMomentConfig",function(b,c,d){return function(e){return"undefined"==typeof e||null===e?"":(!isNaN(parseFloat(e))&&isFinite(e)&&(e=new Date(parseInt(e,10))),a(b.moment(e),d.timezone,c).calendar())}}]).filter("amDateFormat",["$window","$log","angularMomentConfig",function(b,c,d){return function(e,f){return"undefined"==typeof e||null===e?"":(!isNaN(parseFloat(e))&&isFinite(e)&&(e=new Date(parseInt(e,10))),a(b.moment(e),d.timezone,c).format(f))}}]).filter("amDurationFormat",["$window",function(a){return function(b,c,d){return"undefined"==typeof b||null===b?"":a.moment.duration(b,c).humanize(d)}}])}();

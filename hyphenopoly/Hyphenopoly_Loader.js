/**
 * @license Hyphenopoly_Loader 5.0.0-beta.4 - client side hyphenation
 * ©2022  Mathias Nater, Güttingen (mathiasnater at gmail dot com)
 * https://github.com/mnater/Hyphenopoly
 *
 * Released under the MIT license
 * http://mnater.github.io/Hyphenopoly/LICENSE
 */ window.Hyphenopoly={},((e,t,l,s)=>{"use strict";let n=e=>new Map(e),r="Hyphenopoly_Loader.js",a=t.currentScript.src,c=sessionStorage,i=!1,o=()=>{let a={ac:"appendChild",ce:"createElement",ct:"createTextNode"},o=()=>{let e=null,t=null,l=new Promise((l,s)=>{e=l,t=s});return l.resolve=e,l.reject=t,l},h=null;l.hide=(e,n)=>{if(0===e)h&&h.remove();else{let r="{visibility:hidden!important}";h=t[a.ce]("style");let c="";0===n?c="html"+r:-1!==n&&(2===n&&(r="{color:transparent!important}"),s.keys(l.s.selectors).forEach(e=>{c+=e+r})),h[a.ac](t[a.ct](c)),t.head[a.ac](h)}};let f=(()=>{let e=null;return{ap:()=>e?(t.documentElement[a.ac](e),e):null,cl(){e&&e.remove()},cr(s){if(l.cf.langs.has(s))return;e=e||t[a.ce]("body");let n=t[a.ce]("div"),r="hyphens:auto";n.lang=s,n.style.cssText=`visibility:hidden;-webkit-${r};-ms-${r};${r};width:48px;font-size:12px;line-height:12px;border:none;padding:0;word-wrap:normal`,n[a.ac](t[a.ct](l.lrq.get(s).wo.toLowerCase())),e[a.ac](n)}}})(),p=e=>{let t=e.hyphens||e.webkitHyphens||e.msHyphens;return"auto"===t};l.res={he:n()};let d=t=>{let s=l.lrq.get(t).fn;l.cf.pf=!0,l.cf.langs.set(t,"H9Y"),l.res.he.has(s)?l.res.he.get(s).l.push(t):l.res.he.set(s,{l:[t],w:e.fetch(l.paths.patterndir+s+".wasm",{credentials:l.s.CORScredentials})})};l.lrq.forEach((e,t)=>{"FORCEHYPHENOPOLY"===e.wo||"H9Y"===l.cf.langs.get(t)?d(t):f.cr(t)});let y=f.ap();y&&(y.querySelectorAll("div").forEach(e=>{p(e.style)&&e.offsetHeight>12?l.cf.langs.set(e.lang,"CSS"):d(e.lang)}),f.cl());let g=l.hev;if(l.cf.pf){if(l.res.DOM=new Promise(e=>{"loading"===t.readyState?t.addEventListener("DOMContentLoaded",e,{once:!0,passive:!0}):e()}),l.hide(1,l.s.hide),l.timeOutHandler=e.setTimeout(()=>{l.hide(0,null),console.info(r+" timed out.")},l.s.timeout),i)l.main();else{let u=t[a.ce]("script");u.src=l.paths.maindir+"Hyphenopoly.js",t.head[a.ac](u),i=!0}l.hy6ors=n(),l.cf.langs.forEach((e,t)=>{"H9Y"===e&&l.hy6ors.set(t,o())}),l.hy6ors.set("HTML",o()),l.hyphenators=new Proxy(l.hy6ors,{get:(e,t)=>e.get(t),set:()=>!0}),g&&g.polyfill&&g.polyfill()}else g&&g.tearDown&&g.tearDown(),e.Hyphenopoly=null;l.cft&&c.setItem(r,JSON.stringify({langs:[...l.cf.langs.entries()],pf:l.cf.pf}))};l.config=e=>{let t=(e,t)=>e?(s.entries(t).forEach(([t,l])=>{e[t]=e[t]||l}),e):t;l.cft=Boolean(e.cacheFeatureTests),l.cft&&c.getItem(r)?(l.cf=JSON.parse(c.getItem(r)),l.cf.langs=n(l.cf.langs)):l.cf={langs:n(),pf:!1};let i=a.slice(0,a.lastIndexOf("/")+1),h=i+"patterns/";l.paths=t(e.paths,{maindir:i,patterndir:h}),l.s=t(e.setup,{CORScredentials:"include",hide:"all",selectors:{".hyphenate":{}},timeout:1e3}),l.s.hide=["all","element","text"].indexOf(l.s.hide),e.handleEvent&&(l.hev=e.handleEvent);let f=n(s.entries(e.fallbacks||{}));l.lrq=n(),s.entries(e.require).forEach(([e,t])=>{l.lrq.set(e.toLowerCase(),{fn:f.get(e)||e,wo:t})}),o()}})(window,document,Hyphenopoly,Object);
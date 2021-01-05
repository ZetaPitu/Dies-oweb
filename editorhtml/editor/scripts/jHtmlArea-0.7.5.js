/*
* jHtmlArea 0.7.5 - WYSIWYG Html Editor jQuery Plugin
* Copyright (c) 2012 Chris Pietschmann
* http://jhtmlarea.codeplex.com
* Licensed under the Microsoft Reciprocal License (Ms-RL)
* http://jhtmlarea.codeplex.com/license
*/
var MIEDITOR;
var WEB_ORIGINAL;  
(function ($) {
            
        $.fn.htmlarea = function (opts) {
            if (opts && typeof (opts) === "string") {
                var args = [];
                for (var i = 1; i < arguments.length; i++) { args.push(arguments[i]); }
                var htmlarea = jHtmlArea(this[0]);
                var f = htmlarea[opts];
                if (f) { return f.apply(htmlarea, args); }
            }
            return this.each(function () { jHtmlArea(this, opts); });
        };
        var jHtmlArea = window.jHtmlArea = function (elem, options) {
            if (elem.jquery) {
                return jHtmlArea(elem[0]);
            }
            if (elem.jhtmlareaObject) {
                return elem.jhtmlareaObject;
            } else {
                return new jHtmlArea.fn.init(elem, options);
            }
        };
        jHtmlArea.fn = jHtmlArea.prototype = {

            // The current version of jHtmlArea being used
            jhtmlarea: "0.7.5",

                 init: function (elem, options) {
                     MIEDITOR = this;
                if (elem.nodeName.toLowerCase() === "textarea") {
                    var opts = $.extend({}, jHtmlArea.defaultOptions, options);
                    elem.jhtmlareaObject = this;

                    var textarea = this.textarea = $(elem);
                    var container = this.container = $("<div/>").addClass("jHtmlArea").width("100%").insertAfter(textarea);

                    var toolbar = this.toolbar = $("<div/>").addClass("ToolBar").appendTo(container);
                    priv.initToolBar.call(this, opts);
                                       
                    
                    var iframe = this.iframe = $("<iframe/>").addClass("editor");
                    //iframe.width(textarea.width() - ($.browser.msie ? 0 : 4));
                    var htmlarea = this.htmlarea = $("<div/>").append(iframe);

                    container.append(htmlarea).append(textarea.hide());

                    priv.initEditor.call(this, opts);
                    priv.attachEditorEvents.call(this);

                    // Fix total height to match TextAreajHtmlArea
                    //iframe.height(iframe.height() - toolbar.height());
                    //toolbar.width(textarea.width() - 2);
                    $("#jHtmlArea").attr("style", "");
                    $("#ToolBar").attr("id", "barraherramientas"); 
                    $("#ToolBar").attr("class", "barra-herrientas");                    
                    $("iframe").attr("id","mieditor");
                   
                    if (opts.loaded) { opts.loaded.call(this); }
                }
                //alert("fg");
            },
            dispose: function () {
                this.textarea.show().insertAfter(this.container);
                this.container.remove();
                this.textarea[0].jhtmlareaObject = null;
            },
            execCommand: function (a, b, c) {
                this.iframe[0].contentWindow.focus();
                this.editor.execCommand(a, b || false, c || null);
                this.updateTextArea();
            },
            ec: function (a, b, c) {
                return this.execCommand(a, b, c);
            },
            queryCommandValue: function (a) {
                this.iframe[0].contentWindow.focus();
                return this.editor.queryCommandValue(a);
            },
            qc: function (a) {
                return this.queryCommandValue(a);
            },
            getSelectedHTML: function () {

                return this.getRange().htmlText;

            },
            getSelectedNode :function () {
                var range = this.getRange();
                var parent = range.commonAncestorContainer ? range.commonAncestorContainer :
                    range.parentElement ? range.parentElement() :
                        range.item(0);
                return parent;
            },
            parent: function () {

                var node, selection;
                selection = this.iframe[0].contentDocument.defaultView.getSelection();
                node = selection.anchorNode;
                if (node) {
                    return node.getAttribute("style");
                }
                else return false;
            },
            getSelection: function () {

                return this.iframe[0].contentDocument.defaultView.getSelection();

            },
            getRange: function () {
                var s = this.getSelection();
                if (!s) { return null; }
                //return (s.rangeCount > 0) ? s.getRangeAt(0) : s.createRange();
                return (s.getRangeAt) ? s.getRangeAt(0) : s.createRange();
            },
            html: function (v) {
                if (v) {
                    this.textarea.val(v);
                    this.updateHtmlArea();
                } else {
                    return this.toHtmlString();
                }
            },
            pasteHTML: function (html) {
                this.iframe[0].contentWindow.focus();
                var r = this.getRange();
                r.pasteHTML(html);
                r.collapse(false);
                r.select();
            },
            cut: function () {
                sessionStorage.setItem("copy", this.getSelection());
                try {
                    this.ec("cut");
                }
                catch (e) {
                    alert("Su navegador no permite cortar\n Utilce control + c para copiar");

                }
            },
            copy: function () {
                alert(this.getRange());
                sessionStorage.setItem("copy",this.getSelection());
                try {
                    this.ec("copy");
                }
                catch (e) {
                    alert("Su navegador no permite copiar\n Utilce control + c para copiar");
                }

                //  
            },
            paste: function () {
                var co = sessionStorage.getItem("copy");
              if(co) this.ec("insertHTML", false,co);

            },
            bold: function () { this.ec("bold"); },
            italic: function () { this.ec("italic"); },
            underline: function () { this.ec("underline"); },
            strikeThrough: function () { this.ec("strikethrough"); },
                 image: function (url) {
                var num = Math.floor((Math.random() * 100000000));
                var v = "https://ziw.es/images/imagenfijas/imagen.jpg";
                     this.ec("insertHTML", false, "<div style='width:100%;'><img id='" + num +"' class='imagen' src='" + v + "' style='width:10%;'/></div>");
                modificarimagennueva(num);
            },
            removeFormat: function () {
                this.ec("removeFormat", false, []);
                this.unlink();
            },
            link: function () {

                this.ec("createLink", false, prompt("Link URL:", "http://"));

            },
            unlink: function () { this.ec("unlink", false, []); },
            orderedList: function () { this.ec("insertOrderedList"); },
            unorderedList: function () { this.ec("insertUnorderedList"); },
            superscript: function () { this.ec("superscript"); },
            subscript: function () { this.ec("subscript"); },

            p: function () {
                this.formatBlock("<p>");
            },
            h1: function () {
                this.heading(1);
            },
            h2: function () {
                this.heading(2);
            },
            h3: function () {
                this.heading(3);
            },
            h4: function () {
                this.heading(4);
            },
            h5: function () {
                this.heading(5);
            },
            h6: function () {
                this.heading(6);
            },
            heading: function (h) {
                this.formatBlock("h" + h);
            },

            indent: function () {
                this.ec("indent");
            },
            outdent: function () {
                this.ec("outdent");
            },

            insertHorizontalRule: function () {
                this.ec("insertHorizontalRule", false, "ht");
            },

            justifyLeft: function () {
                this.ec("justifyLeft");
            },
            justifyCenter: function () {
                this.ec("justifyCenter");
            },
            justifyRight: function () {
                this.ec("justifyRight");
            },
            justify: function () {
                this.ec("justifyFull");
            },
            colorfondo: function () { 
                         fondocolor = true;
                         $("#colores").click();                   

            },            
            increaseFontSize: function () {
                               
                              this.getRange().surroundContents($(this.iframe[0].contentWindow.document.createElement("span")).attr("style", "font-size:110%;width: 20px;height: 20px;")[0]);



            },
            decreaseFontSize: function () {

                this.getRange().surroundContents($(this.iframe[0].contentWindow.document.createElement("span")).attr("style", "font-size:90%;")[0]);


            },
            forecolor: function (c) {

                if (COLOR) {
                    if (fondocolor) this.ec("backColor", false, c || COLOR);
                    else this.ec("foreColor", false, c || COLOR);
                    COLOR = null;
                }
                else {
                    fondocolor = false;
                    $("#colores").click();
                }


            },

            formatBlock: function (v) {
                this.ec("formatblock", false, v || null);
            },
            showHTMLView: function () {
                this.updateTextArea();
                this.textarea.show();
                this.htmlarea.hide();
                $("ul li:not(li:has(a.html))", this.toolbar).hide();
                $("ul:not(:has(:visible))", this.toolbar).hide();
                $("ul li a.html", this.toolbar).addClass("highlighted");

            },
            hideHTMLView: function () {
                this.updateHtmlArea();
                this.textarea.hide();
                this.htmlarea.show();
                $("ul", this.toolbar).show();
                $("ul li", this.toolbar).show().find("a.html").removeClass("highlighted");
                actualizareventos();
            },
            toggleHTMLView: function () {
                (this.textarea.is(":hidden")) ? this.showHTMLView() : this.hideHTMLView();
            },


            toHtmlString: function () {
                return this.editor.body.innerHTML;
            },
            toString: function () {
                return this.editor.body.innerText;
            },
            borrador: function (html) {

                localStorage.setItem('borrador', html);

            },
            updateTextArea: function () {                
                this.borrador(this.toHtmlString());
                this.textarea.val(this.toHtmlString());
            },
            updateHtmlArea: function () {
                this.borrador(this.textarea.val());
                this.editor.body.innerHTML = this.textarea.val();
                 },

           youtube: function () {
               var num = Math.floor((Math.random() * 100000000)); 
               modificarvideo(num);
                 },
           youtube1: function (video) {
                     var num = Math.floor(Math.random() * 100000000);                                         
               this.ec("insertHTML", false, '<div id="video-' + num + '"class="video-responsive"contenteditable="false"><div class="tapadera"></div><iframe id="' + num + '" src = "'+ video +'" frameborder = "0"></iframe ></div>');
                  
                 }

        };
        jHtmlArea.fn.init.prototype = jHtmlArea.fn;
        jHtmlArea.defaultOptions = {
            toolbar: [
                ["html"], ["bold"], ["italic"], ["underline"], ["strikethrough"], ["subscript"], ["superscript"],
                ["increasefontsize"], ["decreasefontsize"], ["forecolor"], ["colorfondo"],
                ["orderedlist"], ["unorderedlist"],
                ["indent"], ["outdent"],
                ["justifyleft"], ["justifycenter"], ["justifyright"], ["justify"],
                ["link"], ["unlink"], ["image"], ["youtube"], ["horizontalrule"],
                ["p"], ["h1"], ["h2"], ["h3"], ["h4"], ["h5"], ["h6"],
                ["cut"], ["copy"], ["paste"]
            ],
            css: "style/costum.css",
            toolbarText: {
                bold: "Negrita", italic: "Italic", underline: "Subrayado", strikethrough: "Rayado central",
                cut: "Cortar", copy: "Copiar", paste: "Pegar", justify: "Justificar",
                h1: "Titulo 1", h2: "Titulo 2 ", h3: "Titulo 3", h4: "Titulo 4", h5: "Titulo 5", h6: "Titulo 6", p: "Parrafo",
                indent: "Indent", outdent: "Outdent", horizontalrule: "Insertar barra Horizontal",
                justifyleft: "Justificar izquierda", justifycenter: "Justificar centro", justifyright: "Justificar derecha",
                increasefontsize: "Aumentar fuente", decreasefontsize: "Disminuir fuente", forecolor: "Color del texto",
                link: "Insertar link", unlink: "Eliminar Link", image: "Insertar Imagen",
                orderedlist: "Insertar lista ordenada", unorderedlist: "Insertar lista desordenada",
                subscript: "Subtexto", superscript: "SuperTexto", colorfondo: "Color fondo", youtube: "Video de You Tube",
                html: "Ver diseño/codigo HTML"
            }
        };
        var priv = {
            toolbarButtons: {
                strikethrough: "strikeThrough", orderedlist: "orderedList", unorderedlist: "unorderedList",
                horizontalrule: "insertHorizontalRule",
                justifyleft: "justifyLeft", justifycenter: "justifyCenter", justifyright: "justifyRight",
                increasefontsize: "increaseFontSize", decreasefontsize: "decreaseFontSize",
                html: function (btn) {
                    this.toggleHTMLView();
                }
            },
            initEditor: function (options) {
                var edit = this.editor = this.iframe[0].contentWindow.document;
                edit.designMode = 'on';
                edit.open();
                WEB_ORIGINAL = this.textarea.val();
                edit.write(this.textarea.val());
                edit.close();
                if (options.css) {
                    var e = edit.createElement('link'); e.rel = 'stylesheet'; e.type = 'text/css'; e.href = options.css; edit.getElementsByTagName('head')[0].appendChild(e);
                }

            },
            initToolBar: function (options) {
                var that = this;

                var menuItem = function (className, altText, action) {
                    return $("<li/>").append($("<a href='javascript:void(0);'/>").addClass(className).attr("title", altText).click(function () { action.call(that, $(this)); }));
                };

                function addButtons(arr) {
                    var ul = $("<ul/>").appendTo(that.toolbar);
                    for (var i = 0; i < arr.length; i++) {
                        var e = arr[i];
                        if ((typeof (e)).toLowerCase() === "string") {
                            if (e === "|") {
                                ul.append($('<li class="separator"/>'));
                            } else {
                                var f = (function (e) {
                                    // If button name exists in priv.toolbarButtons then call the "method" defined there, otherwise call the method with the same name
                                    var m = priv.toolbarButtons[e] || e;
                                    if ((typeof (m)).toLowerCase() === "function") {
                                        return function (btn) { m.call(this, btn); };
                                    } else {
                                        return function () { this[m](); this.editor.body.focus(); };
                                    }
                                })(e.toLowerCase());
                                var t = options.toolbarText[e.toLowerCase()];
                                ul.append(menuItem(e.toLowerCase(), t || e, f));
                            }
                        } else {
                            ul.append(menuItem(e.css, e.text, e.action));
                        }
                    }
                }
                if (options.toolbar.length !== 0 && priv.isArray(options.toolbar[0])) {
                    for (var i = 0; i < options.toolbar.length; i++) {
                        addButtons(options.toolbar[i]);
                    }
                } else {
                    addButtons(options.toolbar);
                }
            },

            attachEditorEvents: function () {
                var t = this;

                var fnHA = function () {                   
                    t.updateHtmlArea();
                    return true;

                };


                var fnTA = function () {                    
                    t.updateTextArea();
                    return true;
                };
                var event = function () {
                    $("#test")                                            
                        blur(fnHA);
                    $('#mieditor').contents().find('body').
                        blur(fnTA);
                };
                setTimeout(event, 4000);


                $('form').submit(function () { t.toggleHTMLView(); t.toggleHTMLView(); });
                //$(this.textarea[0].form).submit(function() { //this.textarea.closest("form").submit(function() {


                // Fix for ASP.NET Postback Model
                if (window.__doPostBack) {
                    var old__doPostBack = __doPostBack;
                    window.__doPostBack = function () {
                        if (t) {
                            if (t.toggleHTMLView) {
                                t.toggleHTMLView();
                                t.toggleHTMLView();
                            }
                        }
                        return old__doPostBack.apply(window, arguments);
                    };
                }

            },
            isArray: function (v) {
                return v && typeof v === 'object' && typeof v.length === 'number' && typeof v.splice === 'function' && !(v.propertyIsEnumerable('length'));
            }

        };
    })(jQuery);


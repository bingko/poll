
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="This demo shows how Kendo UI Pie Charts is easily applied to web apps. The control draws data series in slices in order to create rich HTML5 visualizations.">
    <title>Kendo UI HTML5 Pie Charts Example</title>
    <link rel="shortcut icon" href="/favicon.ico"/>
    <link href="http://cdn.kendostatic.com/2013.2.918/styles/kendo.common.min.css" rel="stylesheet" />
    <link href="http://cdn.kendostatic.com/2013.2.918/styles/kendo.rtl.min.css" rel="stylesheet" />
    <link href="http://cdn.kendostatic.com/2013.2.918/styles/kendo.default.min.css" rel="stylesheet" />
    <link href="http://cdn.kendostatic.com/2013.2.918/styles/kendo.dataviz.min.css" rel="stylesheet" />
    <link href="http://cdn.kendostatic.com/2013.2.918/styles/kendo.dataviz.default.min.css" rel="stylesheet" />
    <link href="/content/shared/styles/telerik-navigation.css" rel="stylesheet" />
<script>var _gaq=[["_setAccount","UA-23480938-1"],["_setDomainName",".kendoui.com"],["_addIgnoredRef","kendoui.com"],["_trackPageview"]];(function(d,s){var g=d.createElement(s),e=d.getElementsByTagName(s)[0];g.src="//www.google-analytics.com/ga.js";e.parentNode.insertBefore(g,e);}(document,"script"))</script> 
    <link href="/content/shared/styles/examples.css" rel="stylesheet" />
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="http://cdn.kendostatic.com/2013.2.918/js/kendo.all.min.js"></script>
    <script src="http://cdn.kendostatic.com/2013.2.918/js/kendo.timezones.min.js"></script>
    <script src="/content/shared/js/examples.js"></script>
    <script src="/content/shared/js/console.js"></script>
    <script src="/content/shared/js/prettify.js"></script>
    <script src="/content/shared/js/telerik-navigation.js"></script>
</head>
<body>
   
    <div id="header">
    <div class="centerWrap floatWrap">
        <h1><a href="/" id="logo">Kendo UI - the Art of Web Development</a></h1>
        <ul class="kendo-nav">
    <li><a href="#expand">Products <span>&#9660;</span></a>
        <ol class="submenu-box">
            <li><a href="http://www.kendoui.com/web.aspx">Kendo UI Web</a></li>
            <li><a href="http://www.kendoui.com/mobile.aspx">Kendo UI Mobile</a></li>
            <li><a href="http://www.kendoui.com/dataviz.aspx">Kendo UI DataViz</a></li>
            <li><a href="http://www.kendoui.com/server-wrappers.aspx">Server Side Wrappers</a></li>
        </ol>
    </li>
    <li class="active"><a href="http://demos.kendoui.com/">Demos</a></li>
    <li><a href="http://www.kendoui.com/purchase.aspx" onclick="_gaq.push(['_trackPageview', '/top-nav/purchase']);">Purchase</a></li>
    <li><a href="http://www.kendoui.com/download.aspx" class="get-kendoui" onclick="_gaq.push(['_trackPageview','/download-button']);">Download</a></li>
</ul>

    </div>
</div>

<div id="banner"></div>

<div class="suite-demos-nav">
    <ul class="centerWrap floatWrap">
        <li><a href="/">Overview</a><em></em></li>
        <li><a id="web" class="" href="/web/overview/index.html">Web Demos</a></li>
        <li><a id="mobile" class="" href="/mobile">Mobile Demos</a></li>
        <li class="active"><a id="dataviz" class="selected" href="/dataviz/overview/index.html">DataViz Demos</a></li>
        <li><a href="/themebuilder/web.html">Theme Builders</a></li>
    </ul>
</div>


    <div class="demos-nav widgetGrid">
        <div class="centerWrap floatWrap dataviz">
                <div class="narrowCol floatWrap chart">
                    <h2>chart</h2>
                    <ul>
                                <li >
                                    <a   href="/dataviz/area-charts/index.html" target="" >Area Charts </a>
                                </li>
                                <li >
                                    <a   href="/dataviz/bar-charts/index.html" target="" >Bar Charts </a>
                                </li>
                                <li >
                                    <a   href="/dataviz/bubble-charts/index.html" target="" >Bubble Charts </a>
                                </li>
                                <li >
                                    <a   href="/dataviz/bullet-charts/index.html" target="" >Bullet Charts </a>
                                </li>
                                <li >
                                    <a   href="/dataviz/line-charts/index.html" target="" >Line Charts </a>
                                </li>
                                <li >
                                    <a   href="/dataviz/donut-charts/index.html" target="" >Donut Charts </a>
                                </li>
</ul><ul>                                <li class="active">
                                    <a   href="/dataviz/pie-charts/index.html" target="" >Pie Charts </a>
                                </li>
                                <li >
                                    <a   href="/dataviz/scatter-charts/index.html" target="" >Scatter Charts </a>
                                </li>
                                <li >
                                    <a  class="new-widget" href="/dataviz/radar-charts/index.html" target="" >Radar Charts </a>
                                </li>
                                <li >
                                    <a  class="new-widget" href="/dataviz/polar-charts/index.html" target="" >Polar Charts </a>
                                </li>
                                <li >
                                    <a   href="/dataviz/sparklines/index.html" target="" >Sparklines </a>
                                </li>
                                <li >
                                    <a   href="/dataviz/api/index.html" target="" >API </a>
                                </li>
</ul><ul></ul>
                </div>
                <div class="narrowCol floatWrap gauges">
                    <h2>gauges</h2>
                    <ul>
                                <li >
                                    <a   href="/dataviz/radial-gauge/index.html" target="" >Radial Gauge </a>
                                </li>
                                <li >
                                    <a   href="/dataviz/linear-gauge/index.html" target="" >Linear Gauge </a>
                                </li>
</ul>
                </div>
                <div class="narrowCol floatWrap qrcodes">
                    <h2>Bar &amp; QR Codes</h2>
                    <ul>
                                <li >
                                    <a  class="new-widget" href="/dataviz/barcode/index.html" target="" >Barcode </a>
                                </li>
                                <li >
                                    <a  class="new-widget" href="/dataviz/qrcode/index.html" target="" >QR code </a>
                                </li>
</ul>
                </div>
                <div class="narrowCol floatWrap financial">
                    <h2>financial</h2>
                    <ul>
                                <li >
                                    <a   href="/dataviz/financial/index.html" target="" >Stock Chart </a>
                                </li>
</ul>
                </div>
                <div class="wideCol floatWrap dashboards">
                    <h2>Sample Dashboards</h2>
                    <ul>
                                <li >
                                    <a href="/dataviz/dashboards/stock-history.html">
                                        <img src="/content/dataviz/dashboards/stock.gif" alt="stock-history" />
                                    </a>
                                    <a   href="/dataviz/dashboards/stock-history.html" target="" >Stock History </a>
                                </li>
                                <li >
                                    <a href="/dataviz/dashboards/car-dashboard.html">
                                        <img src="/content/dataviz/dashboards/car.gif" alt="car-dashboard" />
                                    </a>
                                    <a   href="/dataviz/dashboards/car-dashboard.html" target="" >Car Dashboard </a>
                                </li>
                                <li >
                                    <a href="/dataviz/sparklines/index.html">
                                        <img src="/content/dataviz/dashboards/climate.gif" alt="climate-control" />
                                    </a>
                                    <a   href="/dataviz/sparklines/index.html" target="" >Climate </a>
                                </li>
</ul>
                </div>


        </div>
    </div>

    <div class="flowers-left"><div class="flowers-right">
        <div class='centerWrap floatWrap' id="mainWrap">
            <div id="themeWrap" style="">
                <span id="themeChooser" style=""></span>
                <a href="http://docs.kendoui.com/api/dataviz/chart" class="get-kendoui" style="display:inline-block">Documentation</a>
            </div>

            <div id="mainWrapInner" class="floatWrap clear">
<div id="examples-nav">
    <div id="nav-pager">
    <a class="prev k-link" href="/dataviz/donut-charts/mvvm.html" data-widget="/dataviz/donut-charts/mvvm.html">Prev</a>
    &nbsp;|&nbsp;
    <a class="next k-link" href="/dataviz/pie-charts/pie-labels.html" data-widget="/dataviz/scatter-charts/index.html">Next</a>
</div>

    <ul id="examples-list">
            <li class="active">
                <a  href="/dataviz/pie-charts/index.html">Basic usage</a>
            </li>
            <li class="">
                <a  href="/dataviz/pie-charts/pie-labels.html">Pie labels</a>
            </li>
            <li class="">
                <a  href="/dataviz/pie-charts/remote-data.html">Binding to remote data</a>
            </li>
            <li class="">
                <a  href="/dataviz/pie-charts/local-data.html">Binding to local data</a>
            </li>
            <li class="">
                <a  href="/dataviz/pie-charts/mvvm.html">MVVM</a>
            </li>
    </ul>


<a href="http://www.kendoui.com/download.aspx" class="get-kendoui">Get Kendo UI</a>
</div>

            
<div id="main">
    <h1 id="exampleTitle">
            <span class="exampleIcon chartPieIcon"></span>
            <strong>Pie Charts /</strong> Basic usage    </h1>

    <div id="exampleWrap">
        <script>preventFOUC()</script>

<div id="example" class="k-content">
    <div class="chart-wrapper">
        <div id="chart" style="background: center no-repeat url('../../content/shared/styles/world-map.png');"></div>
    </div>
    <script>
        function createChart() {
            $("#chart").kendoChart({
                title: {
                    position: "bottom",
                    text: "Share of Internet Population Growth, 2007 - 2012"
                },
                legend: {
                    visible: false
                },
                chartArea: {
                    background: ""
                },
                seriesDefaults: {
                    labels: {
                        visible: true,
                        background: "transparent",
                        template: "#= category #: #= value#%"
                    }
                },
                series: [{
                    type: "pie",
                    startAngle: 150,
                    data: [{
                        category: "Asia",
                        value: 53.8,
                        color: "#9de219"
                    },{
                        category: "Europe",
                        value: 16.1,
                        color: "#90cc38"
                    },{
                        category: "Latin America",
                        value: 11.3,
                        color: "#068c35"
                    },{
                        category: "Africa",
                        value: 9.6,
                        color: "#006634"
                    },{
                        category: "Middle East",
                        value: 5.2,
                        color: "#004d38"
                    },{
                        category: "North America",
                        value: 3.6,
                        color: "#033939"
                    }]
                }],
                tooltip: {
                    visible: true,
                    format: "{0}%"
                }
            });
        }

        $(document).ready(createChart);
        $(document).bind("kendo:skinChange", createChart);
    </script>
</div>
    </div>

        <div id="codeStrip">
                <a class="documentation-link k-link" href="http://docs.kendoui.com/api/dataviz/chart"><span class="documentation-icon"></span>Documentation</a>

            <ul>
                    <li>HTML</li>
                    <li>ASP.NET MVC</li>
                    <li>JSP</li>
                    <li>PHP</li>
            </ul>
               <div id="HTML">
               <ul>
                        <li>index.html</li>
               </ul> 
               </div>
               <script>
               var minHeightFlag = false;
               $("#HTML").kendoTabStrip({
                    animation: {
                        open: {
                            effects: "fadeIn"
                        }
                    },
                    contentUrls: [
                        "/source?path=~%2FViews%2Fdataviz%2Fpie-charts%2Findex.cshtml"
                    ],
                    contentLoad: function(e) {
                        prettyPrint();
                        if (!minHeightFlag) {
                            var cs = $("#codeStrip");
                            cs.css("min-height", cs.height());
                        }
                    }
               });
               </script>
               <div id="ASP-NET-MVC">
               <ul>
                        <li>index.aspx</li>
                        <li>index.cshtml</li>
                        <li>IndexController.cs</li>
               </ul> 
               </div>
               <script>
               var minHeightFlag = false;
               $("#ASP-NET-MVC").kendoTabStrip({
                    animation: {
                        open: {
                            effects: "fadeIn"
                        }
                    },
                    contentUrls: [
                        "/source?path=~%2Fsrc%2Faspnetmvc%2Fviews%2Faspx%2Fdataviz%2Fpie_charts%2Findex.aspx","/source?path=~%2Fsrc%2Faspnetmvc%2Fviews%2Frazor%2Fdataviz%2Fpie_charts%2Findex.cshtml","/source?path=~%2Fsrc%2Faspnetmvc%2Fcontrollers%2Fdataviz%2FPie_Charts%2FIndexController.cs"
                    ],
                    contentLoad: function(e) {
                        prettyPrint();
                        if (!minHeightFlag) {
                            var cs = $("#codeStrip");
                            cs.css("min-height", cs.height());
                        }
                    }
               });
               </script>
               <div id="JSP">
               <ul>
                        <li>index.jsp</li>
               </ul> 
               </div>
               <script>
               var minHeightFlag = false;
               $("#JSP").kendoTabStrip({
                    animation: {
                        open: {
                            effects: "fadeIn"
                        }
                    },
                    contentUrls: [
                        "/source?path=~%2Fsrc%2Fjsp%2Fviews%2Fdataviz%2Fpie-charts%2Findex.jsp"
                    ],
                    contentLoad: function(e) {
                        prettyPrint();
                        if (!minHeightFlag) {
                            var cs = $("#codeStrip");
                            cs.css("min-height", cs.height());
                        }
                    }
               });
               </script>
               <div id="PHP">
               <ul>
                        <li>index.php</li>
               </ul> 
               </div>
               <script>
               var minHeightFlag = false;
               $("#PHP").kendoTabStrip({
                    animation: {
                        open: {
                            effects: "fadeIn"
                        }
                    },
                    contentUrls: [
                        "/source?path=~%2Fsrc%2Fphp%2Fdataviz%2Fpie-charts%2Findex.php"
                    ],
                    contentLoad: function(e) {
                        prettyPrint();
                        if (!minHeightFlag) {
                            var cs = $("#codeStrip");
                            cs.css("min-height", cs.height());
                        }
                    }
               });
               </script>
        </div>
        <script>
            $("#codeStrip").kendoTabStrip({
                animation: {
                    open: {
                        effects: "fadeIn"
                    }
                },
                select: function(e) {
                    var tabstrip = $(e.contentElement).data("kendoTabStrip");
                    if (tabstrip.select().length == 0) {
                        tabstrip.select(0);
                    }
                }
            }).find("li:first").click();

        </script>
</div>

<script>
    setTimeout(function(){ prettyPrint(); }, 100);

    document.title = "Kendo UI HTML5 Pie Charts Example";

</script>


            </div>

        </div>
    </div></div>

    <div id="footer">
    <div class="centerWrap">
        <ul class="bottom-nav">
            <li><a href="http://www.kendoui.com/">Home</a></li>
            <li><a href="http://www.kendoui.com/web.aspx">Web</a></li>
            <li><a href="http://www.kendoui.com/mobile.aspx">Mobile</a></li>
            <li><a href="http://www.kendoui.com/dataviz.aspx">DataViz</a></li>
            <li><a href="http://www.kendoui.com/server-wrappers.aspx">Server Wrappers</a></li>
            <li><a href="http://www.kendoui.com/whitepapers.aspx">Whitepapers</a></li>
            <li><a href="http://www.kendoui.com/surveys.aspx">Surveys</a></li>
            <li><a href="http://www.kendoui.com/chrome.aspx">Chrome</a></li>
            <li><a href="http://www.icenium.com" target="_blank">Icenium</a></li>
            <li><a href="http://www.kendoui.com/contact.aspx">Contact Us</a></li>
        </ul>

        <p>Take your time to truly experience the power of Kendo UI.</p>
        <p><a href="http://www.kendoui.com/download.aspx">Download</a> your Kendo UI and jumpstart your development with the available <a href="http://www.kendoui.com/get-help.aspx">support resources</a>.</p>
        <p>If you have any questions, do not hesitate to contact us at <a href="mailto:clientservice@kendoui.com">clientservice@kendoui.com</a>.</p>

        <div id="social">
            <h2>Get Social!</h2>

            <ul>
                <li><a href="http://twitter.com/#!/KendoUI" class="icon tw" title="Follow us on Twitter">Follow us on Twitter</a></li>
                <li><a href="http://www.facebook.com/KendoUI" class="icon fb" title="Become a fan on Facebook">Become a fan on Facebook</a></li>
                <li><a href="https://plus.google.com/117798269023828336983/posts" class="icon gplus" title="Follow us on Google+">Follow us on Google+</a></li>
                <li><a href="http://www.kendoui.com/blogs/blogs.rss" class="icon rss" title="Subscribe to our RSS feed">Subscribe to our RSS feed</a></li>
            </ul>
        </div>

        <p id="copy">Copyright &copy; 2011 - 2013 Telerik Inc. All rights reserved.</p>
    </div>
</div>


    <script>

        if ("pushState" in history) {
            $(".demos-nav").on("click", "a", function(e) {
                var a = $(this),
                    li = a.parent();

                if (a.attr("target")) {
                    return;
                }

                e.preventDefault();

                if (li.hasClass("active")) {
                    return;
                }

                Application.loadWidget(a.attr("href"));
            });
        }

        $("#themeChooser").kendoThemeChooser();

        $("#deviceChooser").mobileOsChooser({
            container: "#mobile-application-container"
        });

            
                applyCurrentTheme();
            

    </script>
</body>
</html>

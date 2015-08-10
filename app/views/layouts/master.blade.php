<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- START @HEAD -->
@include('partials.head')
<!-- END @HEAD -->


<body style="display: block;" class="page-header-fixed page-sidebar-fixed page-footer-fixed">

    <div id="loading">
        <div class="loading-inner">
            <img src="img/loader/flat/3.gif" alt="..."/>
        </div>
    </div>

    <section id="wrapper">

        @include('partials.header')
        @include('partials.slidebar-left')

        <section id="page-content">
            <div class="header-content">
                <h2><i class="fa fa-home"></i> <span></span></h2>
            </div>

            @include('partials.body-content')

            <footer class="footer-content">
                2015 &copy; Admin. Created by <a href="javascript:void(0)" target="_blank">Nelug</a>, GM
            </footer>
        </section><!-- /#page-content -->
        @include('partials.slidebar-right')
    </section>

    <div id="back-top" class="animated pulse circle">
        <i class="fa fa-angle-up"></i>
    </div>
    <div class="imprimirContenedor" style="display:none;"></div>
    <script src="js/main.js"></script>
    <script src="calendar/picker.js"></script>
    <script src="calendar/picker.date.js"></script>
    <script src="calendar/translations/es_ES.js"></script>

    <script>
        $(document.body).delegate(":input", "keyup", function(e) {
            if(e.which == 13) {
                $(this).trigger("enter");
            }
        });

        $(document.body).delegate(":input", "keyup", function(e) {        
            if(e.which == 121) {
                $(this).trigger("f10");
            }
            e.preventDefault();
        });

        $(document).ready(function() {
            $.ui.autocomplete.prototype._renderItem = function (ul, item) {
                var term = this.term.split(' ').join('|');
                var re = new RegExp("(" + term + ")", "gi");
                var t = item.label.replace(re, "<b class='hiligth'>$1</b>");
                return $("<li></li>")
                .data("item.autocomplete", item)
                .append("<a>" + t + "</a>")
                .appendTo(ul);
            };
            $('#date-input').datepicker();
        });

    </script> 

</body>

</html>
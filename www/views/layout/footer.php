 <footer>
        <p>&copy; <?php echo date('Y'); ?> Company, Inc.</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/template/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="/template/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/template/js/ie10-viewport-bug-workaround.js"></script>
    <script>
        $(document).ready(function(){
            $('.product-delete').click(function(){
                var id = $(this).data("id");
                var el = $(this);
                $.post("/product/deleteAjax/" + id, {}, function(data){
                    var el_count = el.parent().find('.product-count span');
                    var count = parseInt(el_count.html());
                    el_count.html(count - 1);
                });
                return false;
            });
        });
    </script>
  </body>
</html>
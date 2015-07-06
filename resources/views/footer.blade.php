  <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript 
    <script src="/bower_components/raphael/raphael-min.js"></script>
    <script src="/bower_components/morrisjs/morris.min.js"></script>
    <script src="/js/morris-data.js"></script>
-->
    <!-- Custom Theme JavaScript -->
    <script src="/dist/js/sb-admin-2.js"></script>
    <script src="/js/moment.js"></script>
    <script src="/js/datetime.js"></script>

    @yield('script')
    <script type="text/javascript">
    $(document).ready(function(){

      $('.delete').click(function(){
        var con = confirm('Are You Sure')
        if(!con){
            return false
        }
      })
      $('.btn-search').click(function(){
        var q = $('.search').val();
        search(q)
      })
      $('.search').keypress(function(e){
        var q = $(this).val();
        if(e.keyCode == 13)
        search(q)
      })
    })

    var search = function(q){
        // alert(q)
        location.href = '/search?q='+q
    }

    </script>
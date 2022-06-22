

<!-- Bootstrap core JavaScript-->
<script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('/js/sb-admin-2.min.js')}}"></script>
{{-- 
<!-- Page level plugins -->
<script src="/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="/js/demo/chart-area-demo.js"></script>
<script src="/js/demo/chart-pie-demo.js"></script> --}}

<!--Data Table-->
<script src="{{asset('/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
{{-- <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script> --}}
<script>
$(document).ready( function () {
    $('#example1').DataTable();

    
});
</script>

<script>
$("#value").on({
 keydown: function(e) {
   if (e.which === 32)
     return false;
  },
  keyup: function(){
   this.value = this.value.toLowerCase();
  },
  change: function() {
    this.value = this.value.replace(/\s/g, "");
    
  }
});
</script>
{{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
{{-- <script src="https://cdn.tiny.cloud/1/ywkko48pu3coo2jkokgxg5bxs1vm2vx44i0dkfatamfax6is/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
{{-- <script src="/vendor/tiny/tiny.js"></script> --}}
<script src="{{asset('/vendor/select2-4.1.0-rc.0/dist/js/select2.min.js')}}"></script>

@stack('after-script')
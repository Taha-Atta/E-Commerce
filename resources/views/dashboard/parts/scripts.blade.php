    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('assets/dashboard') }}/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('assets/dashboard') }}/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets/dashboard') }}/vendors/js/charts/chartist-plugin-tooltip.min.js" type="text/javascript">
    </script>
    <script src="{{ asset('assets/dashboard') }}/vendors/js/charts/raphael-min.js" type="text/javascript"></script>
    <script src="{{ asset('assets/dashboard') }}/vendors/js/charts/morris.min.js" type="text/javascript"></script>
    <script src="{{ asset('assets/dashboard') }}/vendors/js/timeline/horizontal-timeline.js" type="text/javascript">
    </script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN MODERN JS-->
    <script src="{{ asset('assets/dashboard') }}/js/core/app-menu.js" type="text/javascript"></script>
    <script src="{{ asset('assets/dashboard') }}/js/core/app.js" type="text/javascript"></script>
    <script src="{{ asset('assets/dashboard') }}/js/scripts/customizer.js" type="text/javascript"></script>
    <!-- END MODERN JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('assets/dashboard') }}/js/scripts/pages/dashboard-ecommerce.js" type="text/javascript"></script>

     {{-- dataTable --}}
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>
    {{-- <script src="{{ asset('vendor/datatable/pdf/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendor/datatable/pdf/vfs_make.js') }}"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.8/af-2.7.0/b-3.2.0/b-colvis-3.2.0/b-html5-3.2.0/b-print-3.2.0/cr-2.0.4/date-1.5.4/fc-5.0.4/fh-4.0.1/kt-2.12.1/r-3.0.3/rg-1.5.1/rr-1.5.0/sc-2.4.3/sb-1.8.1/sp-2.3.3/sl-2.1.0/sr-1.4.1/datatables.min.js"></script>


    <!-- END PAGE LEVEL JS-->
     {{-- sweet alerts --}}
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <script>
     //  translations
     let title = "{{ __('dashboard.are_you_sure') }}";

     $(document).on('click', '.delete_confirm', function(e) {
         e.preventDefault();
         form = $(this).closest('form');

         const swalWithBootstrapButtons = Swal.mixin({
             customClass: {
                 confirmButton: "btn btn-success",
                 cancelButton: "btn btn-danger"
             },
             buttonsStyling: true
         });
         swalWithBootstrapButtons.fire({
             title: title,
             text: "You won't be able to revert this!",
             icon: "warning",
             showCancelButton: true,
             confirmButtonText: "Yes, delete it!",
             cancelButtonText: "No, cancel!",
             reverseButtons: true
         }).then((result) => {
             if (result.isConfirmed) {
                 form.submit();
                 swalWithBootstrapButtons.fire({
                     title: "Deleted!",
                     text: "Your file has been deleted.",
                     icon: "success"
                 });
             } else if (
                 /* Read more about handling dismissals below */
                 result.dismiss === Swal.DismissReason.cancel
             ) {
                 swalWithBootstrapButtons.fire({
                     title: "Cancelled",
                     text: "Your imaginary file is safe :)",
                     icon: "error"
                 });
             }
         });

     });
 </script>
 {{-- End sweet alerts --}}

  {{-- fileinput --}}
<script src="{{ asset('vendor/file-input/js/fileinput.min.js') }}"></script>
<script src="{{ asset('vendor/file-input/themes/fa5/theme.min.js') }}"></script>

@if(Config::get('app.locale') == 'ar')
<script src="{{ asset('vendor/file-input/js/locales/LANG.js')}}"></script>
<script src="{{ asset('vendor/file-input/js/locales/ar.js') }}"></script>
@endif
<script>
    var lang = "{{ app()->getLocale() }}";
    $(function() {
         $('#single-image').fileinput({
             theme: 'fa5',
             language:lang,
             allowedFileTypes: ['image'],
             maxFileCount: 1,
             enableResumableUpload: false,
             showUpload: false,

         });

     });
</script>
{{-- end fileinput --}}

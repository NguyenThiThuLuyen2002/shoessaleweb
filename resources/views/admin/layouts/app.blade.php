<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>@yield('title', 'THT - Trang quản trị')</title>

   <!-- Google Font: Source Sans Pro -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="/template/admin/plugins/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Tempusdominus Bootstrap 4 -->
   <link rel="stylesheet" href="/template/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="/template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="/template/admin/dist/css/adminlte.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="/template/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="/template/admin/plugins/daterangepicker/daterangepicker.css">
   <!-- summernote -->
   <link rel="stylesheet" href="/template/admin/plugins/summernote/summernote-bs4.min.css">
   @yield('style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">
      <!-- Navbar -->
      @include('admin.layouts.navbar')
      <!-- End Navbar -->

      <!-- Sidebar -->
      @include('admin.layouts.sidebar')
      <!-- End Sidebar -->

      <div class="content-wrapper">

         <!-- Main content -->
         <section class="content">
            <div class="container-fluid">

               @include('admin.layouts.alert')

               <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                     <!-- jquery validation -->
                     <div class="card card-primary mt-3">
                        <div class="card-header">
                           <h3 class="card-title">{{ $title }}</h3>
                        </div>
                        <div class=" mt-4">
                           @yield('content')</div>

                     </div>
                     <!-- /.card -->
                  </div>
                  <!--/.col (left) -->
                  <!-- right column -->
                  <div class="col-md-6">

                  </div>
                  <!--/.col (right) -->
               </div>
               <!-- /.row -->
            </div><!-- /.container-fluid -->
         </section>
         <!-- /.content -->
      </div>

      @include('admin.layouts.footer')

   </div>

   @include('admin.layouts.javascript')
</body>

</html>
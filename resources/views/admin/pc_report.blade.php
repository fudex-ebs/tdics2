@extends('layouts.admin_')
@section('page_css')
  <link href="/metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
  <!--RTL version:<link href="/metronic/assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
@endsection
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

  <!-- BEGIN: Subheader -->
  <div class="m-subheader ">
    <div class="d-flex align-items-center">
      <div class="mr-auto">
        <h3 class="m-subheader__title ">Dashboard</h3>
      </div>
    </div>
  </div>

  <!-- END: Subheader -->
  <div class="m-content">

    <!--Begin::Section-->
    <div class="row">
      <div class="col-xl-12">

        <!--begin:: Widgets/Top Products-->
        <div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
          <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
              <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                  Trends
                </h3>
              </div>
            </div>

          </div>
          <div class="m-portlet__body">

            
          </div>
        </div>

        <!--end:: Widgets/Top Products-->
      </div>


    </div>

    <!--End::Section-->

  </div>
</div>
</div>
@endsection
@section('page_js')
		<script src="/metronic/assets/app/js/dashboard.js" type="text/javascript"></script>
@endsection

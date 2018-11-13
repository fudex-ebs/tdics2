@extends('layouts.admin_')
@section('page_css')
  <link href="/metronic/assets/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

  <!-- BEGIN: Subheader -->
  <div class="m-subheader ">
    <div class="d-flex align-items-center">
      <div class="mr-auto">
        <h3 class="m-subheader__title ">role assessment questions </h3>
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
                  role assessment questions
                </h3>
              </div>
            </div>
            <div class="m-portlet__head-tools">
              <ul class="m-portlet__nav">
    						<li class="m-portlet__nav-item">
    							<a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
    								<span>
    									<i class="la la-plus"></i>
    									<span>Add question</span>
    								</span>
    							</a>
    						</li>
    					</ul>
    				</div>

          </div>
          <div class="m-portlet__body">
            @if($disc_questions->isEmpty())
                <p> لايوجد سوال</p>
            @else
            <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_55">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">question en</th>
                  <th scope="col">question ar</th>
                  <th scope="col">d en</th>
                  <th scope="col">d ar</th>
                  <th scope="col">i en</th>
                  <th scope="col">i ar</th>
                  <th scope="col">s en</th>
                  <th scope="col">s ar</th>
                  <th scope="col">c en</th>
                  <th scope="col">c ar</th>
                  <th scope="col">edit</th>
                </tr>
              </thead>
              <tbody>
                @foreach($disc_questions as $count => $question)
                <tr>

                  <th scope="row">{{$count + 1}}</th>
                  <td>{{$question->content_en}}</td>
                  <td>{{$question->content_ar}}</td>
                  <td>{{$question->option_d_en}}</td>
                  <td>{{$question->option_d_ar}}</td>
                  <td>{{$question->option_i_en}}</td>
                  <td>{{$question->option_i_ar}}</td>
                  <td>{{$question->option_s_en}}</td>
                  <td>{{$question->option_s_ar}}</td>
                  <td>{{$question->option_c_en}}</td>
                  <td>{{$question->option_c_ar}}</td>
                  <td>
                    <a href="{{route('ra_question.edit',$question->slug)}}"> <i class="fa fa-pencil-alt"></i> </a>
                    <a href="{{route('disc_question.delete',$question->slug)}}" style="color:#f4516c;"> <i class="fa fa-trash-alt"></i> </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @endif

          </div>
        </div>

        <!--end:: Widgets/Top Products-->
      </div>


    </div>

    <!--End::Section-->

  </div>
</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اضافة سوال</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('ra_question.store') }}" enctype="multipart/form-data">
        <div class="modal-body">

              <input type='hidden' name='_token' value="{!! csrf_token() !!}">
              <div class="row">
                <div class="form-group col-md-12">
                    <label>السوال</label>
                    <input type="text" name="content_ar" class="form-control" >
                </div>
                <div class="form-group col-md-12">
                    <label>question</label>
                    <input type="text" name="content_en" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label>خيار D </label>
                    <input type="text" name="option_d_ar" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label>خيار i </label>
                    <input type="text" name="option_i_ar" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label>خيار s </label>
                    <input type="text" name="option_s_ar" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label>خيار c </label>
                    <input type="text" name="option_c_ar" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label>option D </label>
                    <input type="text" name="option_d_en" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label>option i </label>
                    <input type="text" name="option_i_en" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label>option s </label>
                    <input type="text" name="option_s_en" class="form-control" >
                </div>
                <div class="form-group col-md-3">
                    <label>option c </label>
                    <input type="text" name="option_c_en" class="form-control" >
                </div>
              </div>


        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
        <input type="submit" class="btn btn-primary" value="حفظ">
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('page_js')
  <script src="/metronic/assets/vendors/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
  <script type="text/javascript">
  $(document).ready( function () {
      $('#m_table_55').DataTable({
        scrollY: "50vh",
        scrollX: !0,
      });
  } );
  </script>
@endsection

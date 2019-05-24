@extends('layout_home.master')
@section('title','รายงาน')
@section('PetControl')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>

    <section class="content-header">
      <h1>
        รายงาน
        <small>it all starts here</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <h3 align="center"><b>แก้ไขข้อมูลนักเรียน</b></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>

        <div class="box-body">

          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                <li>กรุณากรอกข้อมูลให้ครบช่อง {{$error}}</li>
                @endforeach
              </ul>
            </div>
          @endif

          {{-- <div class="container"> --}}
            <div class="row">
              <div class="col-md-12"> <br />
                <form method="post" action="{{ action('StudentController@update',$id) }}" enctype="multipart/form-data">
                  @csrf
                  @method('put')

                  <div class="form-inline form-group" align="center">
                    <label>รหัสนักเรียน : &nbsp;&nbsp;&nbsp;</label>
                    <input type="text" name="student_Number" class="form-control" style="width: 400px;" placeholder="ป้อนรหัส" value="{{$user->Number}}" />
                  </div>

                  <div class="form-inline form-group" align="center">
                    <label>บัตรประชาชน :&nbsp;</label>
                    <input type="text" name="student_Id_Card" class="form-control" style="width: 400px;" placeholder="ป้อนบัตรประชาชน" value="{{$user->Id_Card}}" />
                  </div>

                  <div class="form-inline form-group" align="center">
                    <label>คำนำหน้า : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" name="student_Pname" class="form-control" style="width: 400px;" placeholder="ป้อนคำนำหน้า" value="{{$user->Pname}}" />
                  </div>

                  <div class="form-inline form-group" align="center">
                    <label>ชื่อ : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" name="student_Fname" class="form-control" style="width: 400px;" placeholder="ป้อนชื่อ" value="{{$user->Fname}}" />
                  </div>

                  <div class="form-inline form-group" align="center">
                    <label>นามสกุล : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" name="student_Lname" class="form-control" style="width: 400px;" placeholder="ป้อนนามสกุล" value="{{$user->Lname}}" />
                  </div>

                  <div class="form-inline form-group" align="center">
                    <label>ชั้นศาสนา : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" name="student_Class_Room" class="form-control" style="width: 400px;" placeholder="ป้อนชั้นศาสนา" value="{{$user->Class_Room}}"/>
                  </div>

                  <br>
                  <div class="form-group" align="center">
                    <button type="submit" class="delete-modal btn btn-success">
                      <span class="glyphicon glyphicon-floppy-save"></span> อัพเดท
                    </button>
                    <a class="delete-modal btn btn-danger" href="{{ URL::previous() }}">
                      <span class="glyphicon glyphicon-remove"></span> ยกเลิก
                    </a>
                  </div>
                  <input type="hidden" name="_method" value="PATCH"/>
                </form>

              </div>
            </div>
          {{-- </div> --}}

        </div>

        <!-- /.box-body -->
        <div class="box-footer">
        </div>
      </div>

    </section>

    <script type="text/javascript">
      $(function(){
        $("#image-file").fileinput({
          theme:'fa',
        })
      })
    </script>

@endsection

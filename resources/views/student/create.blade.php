@extends('layout_home.master')
@section('title','เพิ่มข้อมูลนักเรียน')
@section('PetControl')

    <section class="content-header">
      <h1>
        รายงาน
        <small>it all starts here</small>
      </h1>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">

          <h3 align="center"><b>เพิ่มข้อมูลนักเรียน {{$title}}</b></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>

        <div class="box-body">

          {{-- เช็คการกรอกข้อมูล --}}
          @if (count($errors) > 0)
            <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>กรุณากรอกข้อมูลให้ครบช่อง ({{$error}}) </li>
                @endforeach
            </ul>
            </div>
          @endif

            <div class="row">
              <div class="col-md-12"> <br />
                <form action="{{ route('student.store') }}" method="post" id="formimage" enctype="multipart/form-data">
                  @csrf

                  <div class="form-inline form-group" align="center">
                    <label>รหัสนักเรียน : &nbsp;&nbsp;&nbsp;</label>
                    <input type="text" name="student_Number" class="form-control" style="width: 400px;" placeholder="ป้อนรหัส" />
                  </div>

                  <div class="form-inline form-group" align="center">
                    <label>บัตรประชาชน :&nbsp;</label>
                    <input type="text" name="student_Id_Card" class="form-control" style="width: 400px;" placeholder="ป้อนบัตรประชาชน" />
                  </div>

                  <div class="form-inline form-group" align="center">
                    <label>คำนำหน้า : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" name="student_Pname" class="form-control" style="width: 400px;" placeholder="ป้อนคำนำหน้า" />
                  </div>

                  <div class="form-inline form-group" align="center">
                    <label>ชื่อ : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" name="student_Fname" class="form-control" style="width: 400px;" placeholder="ป้อนชื่อ" />
                  </div>

                  <div class="form-inline form-group" align="center">
                    <label>นามสกุล : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" name="student_Lname" class="form-control" style="width: 400px;" placeholder="ป้อนนามสกุล" />
                  </div>

                  <div class="form-inline form-group" align="center">
                    <label>ชั้นศาสนา : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" name="student_Class_Room" class="form-control" style="width: 400px;" placeholder="ป้อนชั้นศาสนา" />
                  </div>

                  <input type="hidden" name="_token" value="{{csrf_token()}}" />


                  <div class="form-group">
                    <input type="hidden" readonly name="student_type" value="{{ $type }}" class="form-control" />
                  </div>

                  <br>
                  <div class="form-group" align="center">
                    {{-- <input type="submit" class="btn btn-primary" value="บันทึก" /> --}}
                    <button type="submit" class="delete-modal btn btn-success">
                      <span class="glyphicon glyphicon-floppy-save"></span> บันทึก
                    </button>
                    <a class="delete-modal btn btn-danger" href="{{ URL::previous() }}">
                      <span class="glyphicon glyphicon-remove"></span> ยกเลิก
                    </a>
                  </div>
                </form>

              </div>
            </div>

        </div>

        <div class="box-footer">

        </div>
      </div>

    </section>

@endsection

{{-- <script type="text/javascript">
  $(function(){
    $("#image-file").fileinput({
      theme:'fa',
    })
  })
</script> --}}

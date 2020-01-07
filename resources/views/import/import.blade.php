@extends('layout_home.master')
@section('title','Import ข้อมูลนักเรียน')
@section('PetControl')

  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <section class="content-header">
      <h1>
        นำเข้าข้อมูล
        <small>it all starts here</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          @if($type == 1)
            <h3 class="card-title" align="center"><b>Import ข้อมูลนักเรียน</b></h3>
          @elseif($type == 2)
          <h3 class="card-title" align="center"><b>Import ข้อมูลเช็คชื่อนักเรียน</b></h3>
          @endif
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>

        <div class="box-body">

          <!-- เช็คการกรอกข้อมูล -->
            @if (count($errors) > 0)
              <div class="alert alert-danger alert-dismissible" role="alert">
                <ul>
                  @foreach($errors->all() as $error)
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <li>กรุณากรอกเลือกไฟล์ ({{$error}})</li>
                  @endforeach
                </ul>
              </div>
            @endif

          <!-- เช็คบันทึกข้อมูลสำเร็จ -->
            @if(session()->has('success'))
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <strong>สำเร็จ!</strong> {{ session()->get('success') }}
              </div>
            @endif

            @if($type == 1)
              <div class="row">
                <div class="col-md-12">
                  <form action="{{ route('importDataStudent') }}" method="post" id="file" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                      <label>เลือกไฟล์ Excel</label>
                      <input type="file" name="file" id="file">
                    </div>
                    <br>
                    <div class="form-group">
                      <button type="submit" class="delete-modal btn btn-success">
                        <span class="glyphicon glyphicon-floppy-save"></span> บันทึก
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            @elseif($type == 2)
              <div class="row">
                <div class="col-md-12">
                  <form action="{{ route('importCheckStudent') }}" method="post" id="file" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <div class="form-group">
                      <label>เลือกไฟล์ Excel</label>
                      <input type="file" name="file" id="file">
                    </div>
                    <br>
                    <div class="form-group">
                      <button type="submit" class="delete-modal btn btn-success">
                        <span class="glyphicon glyphicon-floppy-save"></span> บันทึก
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            @endif
            <script type="text/javascript">
              $(function() {
                 $('#table').DataTable();
              });
            </script>

            <script type="text/javascript">
              $(document).ready(function(){
                $('.delete_form').on('submit',function(){
                  if (confirm("คุณต้องการลบข้อมูลหรือไม่")) {
                    return true;
                  }
                  else {
                    return false;
                  }
                  });
                });
            </script>
        </div>

        <div class="box-footer">
        </div>

      </div>
    </section>

@endsection

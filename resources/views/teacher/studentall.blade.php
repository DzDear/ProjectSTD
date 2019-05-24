@extends('layout_home.master')
@section('title','รายชื่อนักเรียน')
@section('PetControl')

  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

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
          <h3 align="center"><b>รายชื่อนักเรียน {{ $title }}</b></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>


          <div class="box-body">

            @if(session()->has('success'))
              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <strong>สำเร็จ!</strong> {{ session()->get('success') }}
              </div>
            @endif

            <div class="row">
              <div class="col-md-12">

                <div align="right" class="form-inline form-group">
                  <a href="{{ route('student.create',$type) }}" class="btn btn-success">
                  <span class="glyphicon glyphicon-plus"></span> เพิ่มข้อมูล
                  </a>
                </div>

              <!-- <form method="get" action="{{ url('ViewStudent') }}">
                <div align="right" class="form-inline form-group">
                  <label>ห้องเรียน : </label>
                  <select name="student_type" class="form-control" style="width: 170px;">
                    <option value="11">นักเรียน ชั้น ม.1/1</option>
                    <option value="12">นักเรียน ชั้น ม.1/2</option>
                    <option value="13">นักเรียน ชั้น ม.1/3</option>
                    <option value="14">นักเรียน ชั้น ม.1/4</option>
                    <option value="15">นักเรียน ชั้น ม.1/5</option>
                    <option value="16">นักเรียน ชั้น ม.1/6</option>
                    <option value="17">นักเรียน ชั้น ม.1/7</option>
                  </select>

                  <a href="{{ Route('ViewStudent',$type) }}" class="btn btn-success">
                  <span class="glyphicon glyphicon-plus"></span> ค้นหา
                  </a>
                </div>
              </form>-->

              <!-- <form method="get" action="{{ url('SeacrhStudent') }}">
                <div align="right" class="form-inline form-group">
                  <button type="submit" class="btn btn-primary">
                  <span class="glyphicon glyphicon-search"></span> Search
                  </button>
                </div>
              </form> -->

              <table class="table table-bordered" id="table">
                <thead class="thead-dark">
                  <br>
                  <tr>
                    <th class="text-center">เลขที่</th>
                    <th class="text-center">รหัสนักเรียน</th>
                    <th class="text-center">บัตรประชาชน</th>
                    <th class="text-center">คำนำหน้า</th>
                    <th class="text-center">ชื่อ</th>
                    <th class="text-center">นามสกุล</th>
                    <th class="text-center">ชั้นศาสนา</th>
                    <th class="text-center">สถานะ</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($data as $key => $row)
                    <tr>
                      <td class="text-center">{{$key+1}}</td>
                      <td class="text-center">{{$row->Number}}</td>
                      <td class="text-center">{{$row->Id_Card}}</td>
                      <td class="text-center">{{$row->Pname}}</td>
                      <td class="text-center" width='15%'>{{$row->Fname}}</td>
                      <td class="text-center" width='15%'>{{$row->Lname}}</td>
                      <td class="text-center">{{$row->Class_Room}}</td>

                    <!--  <td class="text-center" width='20%'>
                        <form method="get" action="#">
                          <div class="form-inline form-group">
                            <input type="radio" name="radioname" id="" value="1">
                            <label> มา</label>
                            <input type="radio" name="radioname" id="" value="2">
                            <label> ขาด</label>
                            <input type="radio" name="radioname" id="" value="3">
                            <label> ลาป่วย</label>
                            <input type="radio" name="radioname" id="" value="4">
                            <label> ลากิจ</label>
                            <input type="radio" name="radioname" id="" value="5">
                            <label> สาย</label>
                          </div>
                        </form>
                      </td> -->

                      <td class="text-center">
                        <a href="{{ action('StudentController@edit',[$row['id'],$row->Type]) }}" class="btn btn-warning btn-sm" title="แก้ไขรายการ">
                        <span class="glyphicon glyphicon-edit"></span>
                        </a>
                      <div class="form-inline form-group">
                        <form method="post" class="delete_form" action="{{ action('StudentController@destroy',$row['id']) }}">
                        {{csrf_field()}}
                          <input type="hidden" name="_method" value="DELETE" />
                          <button type="submit" class="delete-modal btn btn-danger btn-sm" title="ลบรายการ">
                            <span class="glyphicon glyphicon-trash"></span>
                          </button>
                        </form>
                      </div>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>

            </div>
          </div>

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

      </div>
    </section>

@endsection

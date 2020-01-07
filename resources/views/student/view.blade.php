@extends('layout_home.master')
@section('title','ระบบรายชื่อนักเรียน')
@section('PetControl')

  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

  <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <section class="content-header">
      <h1>
        ระบบรายชื่อนักเรียน
        <small>it all starts here</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 align="center"><b>รายชื่อนักเรียน</b></h3>
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
                <form method="get" action="{{ route('ViewStudent',1) }}">
                  <div align="right" class="form-inline">
                    <a href="{{ route('student.create',$type) }}" class="btn btn-success btn-app">
                      <span class="glyphicon glyphicon-plus"></span> เพิ่มข้อมูล
                    </a>
                    <button type="submit" class="btn btn-primary btn-app">
                      <span class="glyphicon glyphicon-search"></span> Search
                    </button>
                  </div>
                  <br>
                  <div align="right" class="form-inline">
                    <label>นักเรียนชั้นมัธยมที่ : </label>
                      <select name="student_type" class="form-control" style="width: 150px;">
                      <option value="1" {{ ($studentType == 1) ? 'selected' : '' }}>ชั้น ม.1</option>
                      <option value="2" {{ ($studentType == 2) ? 'selected' : '' }}>ชั้น ม.2</option>
                      <option value="3" {{ ($studentType == 3) ? 'selected' : '' }}>ชั้น ม.3</option>
                      <option value="4" {{ ($studentType == 4) ? 'selected' : '' }}>ชั้น ม.4</option>
                      <option value="5" {{ ($studentType == 5) ? 'selected' : '' }}>ชั้น ม.5</option>
                      <option value="6" {{ ($studentType == 6) ? 'selected' : '' }}>ชั้น ม.6</option>
                    </select>

                    <label>ห้องเรียน : </label>
                      <select name="student_room" class="form-control" style="width: 150px;">
                      <option value="1" {{ ($studentRoom == 1) ? 'selected' : '' }}>ห้อง 1</option>
                      <option value="2" {{ ($studentRoom == 2) ? 'selected' : '' }}>ห้อง 2</option>
                      <option value="3" {{ ($studentRoom == 3) ? 'selected' : '' }}>ห้อง 3</option>
                      <option value="4" {{ ($studentRoom == 4) ? 'selected' : '' }}>ห้อง 4</option>
                      <option value="5" {{ ($studentRoom == 5) ? 'selected' : '' }}>ห้อง 5</option>
                      <option value="6" {{ ($studentRoom == 6) ? 'selected' : '' }}>ห้อง 6</option>
                      <option value="7" {{ ($studentRoom == 7) ? 'selected' : '' }}>ห้อง 7</option>
                      <option value="8" {{ ($studentRoom == 8) ? 'selected' : '' }}>ห้อง 8</option>
                    </select>
                  </div>
                </form>

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
                          <td class="text-center">
                            <a href="{{ action('StudentController@edit',[$row->id]) }}" class="btn btn-warning btn-sm" title="แก้ไขรายการ">
                              <span class="glyphicon glyphicon-edit"></span> แก้ไข
                            </a>
                            <div class="form-inline form-group">
                              <form method="post" class="delete_form" action="{{ action('StudentController@destroy',$row->id) }}">
                              {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE" />
                                <button type="submit" class="delete-modal btn btn-danger btn-sm" title="ลบรายการ">
                                  <span class="glyphicon glyphicon-trash"></span> ลบ
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

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

            <div align="right" class="form-inline form-group">
              <!-- <button type="submit" class="btn btn-warning">
              <span class="glyphicon glyphicon-search"></span> บันทึก
              </button> -->
              <a href="{{ route('student.create',$type) }}" class="btn btn-success">
              <span class="glyphicon glyphicon-plus"></span> เพิ่มข้อมูล
              </a>
            </div>

            <div class="row">
              <div class="col-md-12">

               <form method="get" action="{{ action('StudentController@index',$type) }}">
                <div align="right" class="form-inline">
                  <label>ห้องเรียน : </label>
                  @if ($type == 11 or $type == 12 or $type == 13 or $type == 14 or $type == 15 or $type == 16 or $type == 17)
                  <select name="student_type" class="form-control" style="width: 170px;">
                    <option value="11" {{ ($student_type == 11) ? 'selected' : '' }}>นักเรียนห้อง ม.1/1</option>
                    <option value="12" {{ ($student_type == 12) ? 'selected' : '' }}>นักเรียนห้อง ม.1/2</option>
                    <option value="13" {{ ($student_type == 13) ? 'selected' : '' }}>นักเรียนห้อง ม.1/3</option>
                    <option value="14" {{ ($student_type == 14) ? 'selected' : '' }}>นักเรียนห้อง ม.1/4</option>
                    <option value="15" {{ ($student_type == 15) ? 'selected' : '' }}>นักเรียนห้อง ม.1/5</option>
                    <option value="16" {{ ($student_type == 16) ? 'selected' : '' }}>นักเรียนห้อง ม.1/6</option>
                    <option value="17" {{ ($student_type == 17) ? 'selected' : '' }}>นักเรียนห้อง ม.1/7</option>
                  </select>
                  @elseif($type == 21 or $type == 22 or $type == 23 or $type == 24 or $type == 25)
                  <select name="student_type" class="form-control" style="width: 170px;">
                    <option value="21" {{ ($student_type == 21) ? 'selected' : '' }}>นักเรียนห้อง ม.2/1</option>
                    <option value="22" {{ ($student_type == 22) ? 'selected' : '' }}>นักเรียนห้อง ม.2/2</option>
                    <option value="23" {{ ($student_type == 23) ? 'selected' : '' }}>นักเรียนห้อง ม.2/3</option>
                    <option value="24" {{ ($student_type == 24) ? 'selected' : '' }}>นักเรียนห้อง ม.2/4</option>
                    <option value="25" {{ ($student_type == 25) ? 'selected' : '' }}>นักเรียนห้อง ม.2/5</option>
                  </select>
                  @elseif($type == 31 or $type == 32 or $type == 33 or $type == 34 or $type == 35 or $type == 36)
                  <select name="student_type" class="form-control" style="width: 170px;">
                    <option value="31" {{ ($student_type == 31) ? 'selected' : '' }}>นักเรียนห้อง ม.3/1</option>
                    <option value="32" {{ ($student_type == 32) ? 'selected' : '' }}>นักเรียนห้อง ม.3/2</option>
                    <option value="33" {{ ($student_type == 33) ? 'selected' : '' }}>นักเรียนห้อง ม.3/3</option>
                    <option value="34" {{ ($student_type == 34) ? 'selected' : '' }}>นักเรียนห้อง ม.3/4</option>
                    <option value="35" {{ ($student_type == 35) ? 'selected' : '' }}>นักเรียนห้อง ม.3/5</option>
                    <option value="36" {{ ($student_type == 36) ? 'selected' : '' }}>นักเรียนห้อง ม.3/6</option>
                  </select>
                  @elseif($type == 41 or $type == 42 or $type == 43 or $type == 44 or $type == 45 or $type == 46)
                  <select name="student_type" class="form-control" style="width: 170px;">
                    <option value="41" {{ ($student_type == 41) ? 'selected' : '' }}>นักเรียนห้อง ม.4/1</option>
                    <option value="42" {{ ($student_type == 42) ? 'selected' : '' }}>นักเรียนห้อง ม.4/2</option>
                    <option value="43" {{ ($student_type == 43) ? 'selected' : '' }}>นักเรียนห้อง ม.4/3</option>
                    <option value="44" {{ ($student_type == 44) ? 'selected' : '' }}>นักเรียนห้อง ม.4/4</option>
                    <option value="45" {{ ($student_type == 45) ? 'selected' : '' }}>นักเรียนห้อง ม.4/5</option>
                    <option value="46" {{ ($student_type == 46) ? 'selected' : '' }}>นักเรียนห้อง ม.4/6</option>
                  </select>
                  @elseif($type == 51 or $type == 52 or $type == 53 or $type == 54 or $type == 55)
                  <select name="student_type" class="form-control" style="width: 170px;">
                    <option value="51" {{ ($student_type == 51) ? 'selected' : '' }}>นักเรียนห้อง ม.5/1</option>
                    <option value="52" {{ ($student_type == 52) ? 'selected' : '' }}>นักเรียนห้อง ม.5/2</option>
                    <option value="53" {{ ($student_type == 53) ? 'selected' : '' }}>นักเรียนห้อง ม.5/3</option>
                    <option value="54" {{ ($student_type == 54) ? 'selected' : '' }}>นักเรียนห้อง ม.5/4</option>
                    <option value="55" {{ ($student_type == 55) ? 'selected' : '' }}>นักเรียนห้อง ม.5/5</option>
                  </select>
                  @elseif($type == 61 or $type == 62 or $type == 63 or $type == 64)
                  <select name="student_type" class="form-control" style="width: 170px;">
                    <option value="61" {{ ($student_type == 61) ? 'selected' : '' }}>นักเรียนห้อง ม.6/1</option>
                    <option value="62" {{ ($student_type == 62) ? 'selected' : '' }}>นักเรียนห้อง ม.6/2</option>
                    <option value="63" {{ ($student_type == 63) ? 'selected' : '' }}>นักเรียนห้อง ม.6/3</option>
                    <option value="64" {{ ($student_type == 64) ? 'selected' : '' }}>นักเรียนห้อง ม.6/4</option>
                  </select>
                  @endif
                  <button type="submit" class="btn btn-primary">
                  <span class="glyphicon glyphicon-search"></span> Search
                  </button>
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
                    <th class="text-center">สถานะ</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>

                <tbody>
                  <form method="get" action="{{ action('StudentController@index',$type) }}">
                    <!-- <button type="submit" class="btn btn-warning">
                    <span class="glyphicon glyphicon-search"></span> บันทึก
                    </button> -->
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
                        <select name="student_type" class="form-control" style="width: 70px;">
                          <option value="ma">มา</option>
                          <option value="kad">ขาด</option>
                          <option value="say">สาย</option>
                          <option value="lap">ลาป่วย</option>
                          <option value="lak">ลากิจ</option>
                        </select>
                      </td>
                  </form>
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

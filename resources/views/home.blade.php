@extends('layout_home.master')
@section('title','Home')
@section('PetControl')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 table-responsive">
            <div class="card">
                <div class="card-header">
                  <!-- <b><h3>Dashboard</h3></b> -->
                </div>
                <br />

                <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                       <div id="chart_div"></div>
                    <br/>
                    <div id="btn-group" align="center">
                      <button class="button button-blue" id="none">No Format</button>
                      <button class="button button-blue" id="scientific">Scientific Notation</button>
                      <button class="button button-blue" id="decimal">Decimal</button>
                      <button class="button button-blue" id="short">Short</button>
                    </div>

                 <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                      var data = google.visualization.arrayToDataTable([
                        ['ชั้น', 'นักเรียนชาย', 'นักเรียนหญิง'],
                        ['ม.1', {{$Mclass1}}, {{$Wclass1}}],
                        ['ม.2', {{$Mclass2}}, {{$Wclass2}}],
                        ['ม.3', {{$Mclass3}}, {{$Wclass3}}],
                        ['ม.4', {{$Mclass4}}, {{$Wclass4}}],
                        ['ม.5', {{$Mclass5}}, {{$Wclass5}}],
                        ['ม.6', {{$Mclass6}}, {{$Wclass6}}]
                      ]);

                      var options = {
                        chart: {
                          title: 'กราฟข้อมูลนักเรียน',
                          subtitle: 'จำนวนนักเรียนทั้งหมด แยกเป็นชั้น: ม.1-ม.6',
                        },
                        bars: 'vertical',
                        vAxis: {format: 'decimal'},
                        height: 400,
                        colors: ['#1b9e77', '#d95f02', '#7570b3']
                      };

                      var chart = new google.charts.Bar(document.getElementById('chart_div'));

                      chart.draw(data, google.charts.Bar.convertOptions(options));

                      var btns = document.getElementById('btn-group');

                      btns.onclick = function (e) {

                        if (e.target.tagName === 'BUTTON') {
                          options.vAxis.format = e.target.id === 'none' ? '' : e.target.id;
                          chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                      }
                    }
                 </script> -->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div align="center">
                    </div>
                    <br>
                    <br>


                  <div class="col-lg-1 col-md-6"></div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><font size="6"> {{$data}} </font></div>
                                        <div>นักเรียนทั้งหมด</div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('DataStudent') }}">
                                <div class="panel-footer">
                                    <span class="pull-left">รายละเอียด</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-male fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><font size="6"> {{$stdMan}} </font></div>
                                        <div>นักเรียนชายทั้งหมด</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">ดูเพิ่มเติม</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-female fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><font size="6"> {{$stdWoman}} </font></div>
                                        <div>นักเรียนหญิงทั้งหมด</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">ดูเพิ่มเติม</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>


                    <!-- <div class="col-lg-3 col-md-6">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-gavel fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><font size="6"></font></div>
                                        <div>รถยนต์ขายแล้ว</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">ดูเพิ่มเติม</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div> -->
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

{{--*/ $pagetitle='Top 10 Listen' /*--}}
{{--*/ $pagesubtitle='die Systeme mit den meisten Aktivitäten' /*--}}
@extends('layouts.apptemplate')

@section('content')

 <div class='col-md-12'>
          <div class="col-md-3 border-right">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Top CPU</h3>
              </div>
              <div class="panel-body">
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 30%;">30% Complete</div>sdf
                </div>
                <p>Webapplication Franzi <span class="label label-warning pull-right">10</span></p>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 50%;">50% Complete</div>
                  <small class="label label-danger pull-right">5</small>
                </div>
                <p>Stecker Loo</p>
                <div class="progress">
                  <div class="progress-bar" role="progressbar" style="width: 60%;">60% Complete</div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-3  border-right">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title">Top 10 CPU</h3>
              </div>
              <div class="panel-body">
              	@foreach ($entry as $ent)
              		<div>{{  $ent->server	}}</div>
              		<div class="progress">
                <div class="progress-bar" role="progressbar" style="width: {{  round($ent->value)	}}%;"  >{{  $ent->value	}}</div>
                {{  $ent->value	}}</div>
                @endforeach
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
			<div class="box">
                <div class="box-header">
                  <h3 class="box-title">Top 10 CPU - last 6 hours</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-condensed">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th style="width: 150px">Task</th>
                      <th>Progress</th>
                      <th style="width: 40px">Label</th>
                    </tr>{{ $i=1 }}
                    @foreach ($entry as $ent)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>{{  $ent->server	}}</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: {{  round($ent->value)	}}%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-red">{{  round($ent->value)	}}%</span></td>
                    </tr>
                    <tr>
                    @endforeach
                      
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          </div>

        </div>
      

  
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                                <div class="col-md-4">
              <div class="box box-solid">
                <div class="box-header">
                  <h3 class="box-title text-blue">Sparkline line</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body text-center">
                  <div class="sparkline" data-type="line" data-spot-Radius="3" data-highlight-Spot-Color="#f39c12" data-highlight-Line-Color="#222" data-min-Spot-Color="#f56954" data-max-Spot-Color="#00a65a" data-spot-Color="#39CCCC" data-offset="90" data-width="100%" data-height="100px" data-line-Width="2" data-line-Color="#39CCCC" data-fill-Color="rgba(57, 204, 204, 0.08)">
                    6,4,7,8,4,3,2,2,5,6,7,4,1,5,7,9,9,8,7,6
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
                </div>
            </div>
        </div>
  

@endsection

@section('scripts')

    <!-- Sparkline -->
    <script src="{{ URL::asset('/assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- page script -->
      <script>
 $(function () {    
        //INITIALIZE SPARKLINE CHARTS
        $(".sparkline").each(function () {
          var $this = $(this);
          $this.sparkline('html', $this.data());
        });
        
        
        /* SPARKLINE DOCUMENTAION EXAMPLES http://omnipotent.net/jquery.sparkline/#s-about */
        
        

      });
   
        </script>
@endsection
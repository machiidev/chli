{{--*/ $pagetitle='Useradmin' /*--}}
{{--*/ $pagesubtitle='Administrate your users' /*--}}
@extends('layouts.apptemplate')

@section('content')

  
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
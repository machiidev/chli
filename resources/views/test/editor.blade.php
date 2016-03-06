{{--*/ $pagetitle='Editor Test' /*--}}
{{--*/ $pagesubtitle='RTE Test Seite' /*--}}
@extends('layouts.apptemplate')

@section('content')

 <div class='col-md-12'>
 
               <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">CK Editor <small>Advanced and full of features</small><button class="btn btn-block btn-success" id="esave" name="esave">Save</button></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button data-original-title="Collapse" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title=""><i class="fa fa-minus"></i></button>
                    <button data-original-title="Remove" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title=""><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div style="display: block;" class="box-body pad">
                  <form>
                    <textarea style="visibility: hidden; display: none;" id="editor1" name="editor1" rows="10" cols="80">
                        This is my textarea to be replaced with CKEditor.
                    </textarea>
                    </form>
                </div>
              </div><!-- /.box -->
 
 <div class="box box-info">
                <div class="box-header">
                  <h3 class="box-title">Ausgabe <small>Advanced and full of features</small></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button data-original-title="Collapse" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title=""><i class="fa fa-minus"></i></button>
                    <button data-original-title="Remove" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title=""><i class="fa fa-times"></i></button>
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div style="display: block;" class="box-body pad" id="editor" name="editor">
                
                    test
                   
                </div>
              </div><!-- /.box -->
         
 </div>
  

@endsection

@section('scripts')
 <!-- CK Editor 
    <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script> -->   
    <script src="{{ URL::asset('/assets/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
      $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        
      });
      
     $("#esave").click( function()
           { var text = CKEDITOR.instances['editor1'].getData();

             alert(text);
            
             $("#editor").html( text );
           }
        );
      
    </script>
@endsection
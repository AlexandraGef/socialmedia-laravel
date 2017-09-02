@extends ('templates.default')

@section('content')
   <div class="row">
       <div class="large-6 columns">
           <form role="form" action="#" method="post">
               <textarea placeholder="Co słychać ?" name="status" rows="2"></textarea>
               <button type="submit" class="button">Aktualizuj status</button>
           </form>
<hr>
       </div>
   </div>
    <div class="row">
        <div class="large-5 columns">

        </div>
    </div>

@stop
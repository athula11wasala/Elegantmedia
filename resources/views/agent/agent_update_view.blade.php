@include('layouts/header')
@include('layouts/menu')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
@include('layouts/message')
<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Agent FeedBack</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="bre  adcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Agent FeedBack <small></small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="forms-sample" method="post"  action="{{url("agent/add-feedback")}}" >
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ticket Id</label>
                                <input type="text" name="input_email" value="{{$ticket->ticket_id}}" disabled class="form-control" id="input_email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Customer</label>
                                <input type="email" name="input_email" value="{{$ticket->name}}" disabled class="form-control" id="input_email" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Inquiry</label>

                                <input type="text" name="input_inqry"  value="{{$ticket->inquiry}}" class="form-control" id="input_inqry" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Feed Back</label>
                                <input type="text" name="input_feed_back"  class="form-control" id="input_feed_back" placeholder="Feed Back">
                                <input type="hidden" name="hnd_ticket_id" value="{{$ticket->ticket_id}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Status</label>
                                {!! Form::select('drp_stauts', $drp_status, null, ['class' => 'form-control']) !!}
                            </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ url('/agent') }}" class="btn btn-primary">Back</a>
                        </div>
                    </form>
                </div>
            </div><!-- /.container-fluid -->

    </section>
    <!-- /.content -->
</div>
@include('layouts/footer')

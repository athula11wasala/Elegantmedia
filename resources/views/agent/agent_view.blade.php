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
                            <li class="breadcrumb-item active">Agent v1</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Customer Inquiry</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Ticket Id</th>
                                <th>Customer</th>
                                <th>Inquiry</th>
                                <th>Feed Back</th>
                                <th>status</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(!empty($data)){ foreach ($data as $rows){ ?>
                            <tr>
                                <td><?php  echo $rows->id ?></td>
                                <td><?php echo   $rows->name ?></td>
                                <td><?php echo   $rows->inquiry ?></td>
                                <td><?php echo  $rows->feedback ?></td>
                                <td><?php echo   $rows->status ?></td>
                                <?php if($rows->status == "pending"){ ?>
                                <td><a href="{{ url('agent/update', [$rows->id]) }}" class="btn btn-info" role="button">Reply</a></td>
                                <?php } else { ?>
                                <td></td> <?php } ?>

                            </tr>
                            <?php } } ?>

                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
        </section>
        <!-- /.content -->
    </div>
@include('layouts/footer')
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            "order": [[ 4, "desc" ]]
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
@extends('admin.layouts.header')
@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4>Invoice Management</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('invoice.index')}}">All Invoices</a></li>
            
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card card-navy border-dark">
            <div class="card-header">
              <h3 class="card-title">Pending Invoices</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="categorytable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Invoice no.</th>
                  <th>Auction no.</th>
                  {{-- <th>Category</th> --}}
                  <th>Lot .no</th>
                  <th>User</th>
                  <th>Created On</th>
                  <th>Amount</th>
                  <th>Payment Completed</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($invoices as $invoice)
                    <tr>
                      <td>{{$invoice->invoice_number}}</td>
                      <td>{{$invoice->auction->auction_number}}</td>
                      <td>{{$invoice->lot->lot_number}}</td>
                      <td>{{$invoice->user->name}}</td>
                      <td>{{$invoice->created_at}}</td>
                      <td>{{$invoice->total_amount}}</td>
                      <td><form id="status{{ $invoice->id }}" action="{{route('invoice_status',$invoice->id)}}" method="post" style="display: inline;">
                            @csrf
                            <label id="switch">
                              <input type="checkbox" class="form-control auction_status" name="status" {{$invoice->paid==1?'checked':''}} data-id="{{ $invoice->id }}" >
                              <span class="slider round"></span>
                            </label>
                            
                        </form>
                      </td>
                      
                      <td>
                        <a href="{{route('invoice.edit',$invoice->id)}}" class="p-2 btn btn-success btn-sm text-white"><i class="fas fa-pencil-alt"></i></a>
                        <a href="{{route('invoice.show',$invoice->id)}}" id="show_cat_{{$invoice->id}}" class="p-2 btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>
                        <form id="deletecat{{ $invoice->id }}" action="{{route('invoice.destroy',$invoice->id)}}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                           <a href="javascript:void(0)" data-id="{{ $invoice->id }}" class="delete-confirm btn btn-danger btn-sm p-2 rounded"><i class="fa fa-trash"></i></a>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
   
    <!-- /.container-fluid -->
  </section>
  <!-- /.content-wrapper -->
  @endsection
  <script>
   
  </script>
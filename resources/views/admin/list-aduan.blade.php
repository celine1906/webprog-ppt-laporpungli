@extends('adminlte::page')

@section('title','Dashboard')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">List Aduan</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Reason</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($aduans as $aduan)
                    <tr>
                      <td>{{ $aduan->id_aduan }}</td>
                      <td>{{ $aduan->user->name }}</td>
                      <td>{{ $aduan->tanggal_kejadian }}</td>
                      <td>{{ $aduan->status }}</td>
                      <td>{{ $aduan->pesan }}</td>
                      <td>
                        <a href="{{ route('admin.aduan.show', $aduan->id_aduan) }}" class="btn btn-primary">Detail</a>
                        {{-- <form action="{{ route('admin.updateStatus', $aduan->id_aduan) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <select name="status" required>
                            <option value="pending" @if($aduan->status == 'pending') selected @endif>Pending</option>
                            <option value="solved" @if($aduan->status == 'solved') selected @endif>Solved</option>
                          </select>
                          <textarea name="komentar" placeholder="Comment">{{ $aduan->komentar }}</textarea>
                          <input type="file" name="bukti_solved">
                          <button type="submit">Update</button>
                        </form> --}}
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
</div>
@stop

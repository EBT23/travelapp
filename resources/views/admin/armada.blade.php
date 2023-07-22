@extends('layouts.base', ['title' => 'Dashboard - Administrator - Laravel 9'])

@section('content')
@include('layouts.header', ['title' => 'Dashboard', 'action' => 'Dashboard'])
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @elseif (Session::has('errors'))
            <div class="alert alert-danger">
                {{ Session::get('errors') }}
            </div>
            @endif
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body col-lg">
                                <h4 class="card-title">FORM TAMBAH DATA AGEN</h4>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3  mt-3 mt-lg-0">
                                                <label class="form-label" for="jenis_mobil">Nomor Polisi</label>
                                                <input type="text" class="form-control" id="nopol" name="nopol" placeholder="Masukkan Nomor Polisi">
                                            </div>
                                            <div class="mb-3  mt-3 mt-lg-0">
                                                <label class="form-label" for="jenis_mobil">Jenis Mobil</label>
                                                <input type="text" class="form-control" id="jenis_mobil" name="jenis_mobil" placeholder="Masukkan Jenis Mobil">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3  mt-3 mt-lg-0">
                                                <label class="form-label" for="kapasitas">Kapasitas</label>
                                                <input type="text" class="form-control" id="kapasitas" name="kapasitas" placeholder="Masukan kapasitas">
                                            </div>
                                            <div class="mb-3  mt-3 mt-lg-0">
                                                <label class="form-label" for="fasilitas">Fasilitas</label>
                                                <input type="text" class="form-control" id="fasilitas" name="fasilitas" placeholder="Masukan fasilitas">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-success w-md">Tambah</i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title my-2">Data Agen</h4>


                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


    </div>


    @endsection

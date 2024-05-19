@extends('sarpras.sumber_dana.pendanaan')

@section('sbsnSelected', 'selected')
@section('phlnSelected', '')

@section('biayaTabel')
<div>
   <hr>
   <table id="dataTable" class="display">
      <thead id="tableHead">
          <tr>
              {{-- <th>UUID SBSN</th> --}}
              {{-- <th>Tahun Start</th> --}}
              {{-- <th>Tahun End</th> --}}
              <th>Jenis Kontrak</th>
              <th>Tanggal Mulai Kontrak</th>
              <th>Tanggal Selesai Kontrak</th>
              <th>Penanda Aset</th>
              {{-- <th>Perguruan Tinggi</th> --}}
              <th>Nama Proyek</th>
              <th>Nilai DPP</th>
              <th>No Registrasi</th>
              <th>Aksi</th>
          </tr>
      </thead>
      <tbody id="tableBody">
          @foreach($data_sbsn as $item)
              <tr>
                  {{-- <td>{{ $item['uuid_sbsn'] }}</td> --}}
                  {{-- <td>{{ $item['tahun_start'] }}</td> --}}
                  {{-- <td>{{ $item['tahun_end'] }}</td> --}}
                  <td>{{ $item['jenis_kontrak'] }}</td>
                  <td>{{ $item['tgl_mulai_kontrak'] }}</td>
                  <td>{{ $item['tgl_selesai_kontrak'] }}</td>
                  <td>{{ $item['penanda_aset'] }}</td>
                  {{-- <td>{{ $item['perguruan_tinggi'] }}</td> --}}
                  <td>{{ $item['nama_proyek'] }}</td>
                  <td>{{ $item['nilai_dpp'] }}</td>
                  <td>{{ $item['no_registrasi'] }}</td>
                  <td>
                     <button class="btn btn-primary" onclick="showDataPagu('{{ $item['uuid_sbsn'] }}')">Show Data Pagu</button>
                     <button class="btn btn-warning" onclick="editForm('{{ $item['uuid_sbsn'] }}')">Edit Data SBSN</button>
                 </td>
              </tr>
          @endforeach
      </tbody>
  </table>
  
</div>

<style>
   /* Optional CSS styling for better appearance */
   hr {
       border: 0;
       height: 1px;
       background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
       margin: 20px 0;
   }
</style>
@endsection
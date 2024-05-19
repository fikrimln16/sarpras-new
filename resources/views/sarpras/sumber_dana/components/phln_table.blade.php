@extends('sarpras.sumber_dana.pendanaan')

@section('sbsnSelected', '')
@section('phlnSelected', 'selected')

@section('biayaTabel')
<div>
   <table id="dataTable" class="display">
      <thead id="tableHead">
         <tr>
             {{-- <th>UUID SBSN</th> --}}
             <th>Nama Proyek</th>
             <th>Singkatan Proyek</th>
             <th>Jenis Kontrak</th>
             <th>Sign Date</th>
             <th>Closed Date</th>
             <th>Pemberi Pinjaman</th>
             <th>Pagu Loan</th>
             <!-- <th>Mata Uang Pagu Loan</th> -->
             <th>Pagu Goi</th>
             <!-- <th>Mata Uang Pagu Goi</th> -->
             <!-- <th>Mata Uang Valas</th> -->
             <!-- <th>Kode LOAN</th> -->
             {{-- <th>No Regis</th> --}}
             <th>Aksi</th>
         </tr>
     </thead>
      <tbody id="tableBody">
         @foreach($data_phln as $item)
              <tr>
                  {{-- <td>{{ $item['uuid_phln'] }}</td> --}}
                  <td>{{ $item['nama_proyek'] }}</td>
                  <td>{{ $item['singkatan_proyek'] }}</td>
                  <td>{{ $item['jenis_kontrak'] }}</td>
                  <td>{{ $item['sign_date'] }}</td>
                  <td>{{ $item['closed_date'] }}</td>
                  <td>{{ $item['pemberi_pinjaman'] }}</td>
                  <td>{{ $item['pagu_loan'] }}</td>
                  <!-- <td>{{ $item['mata_uang_pagu_loan'] }}</td> -->
                  <td>{{ $item['pagu_goi'] }}</td>
                  <!-- <td>{{ $item['mata_uang_pagu_goi'] }}</td> -->
                  <!-- <td>{{ $item['mata_uang_valas'] }}</td> -->
                  <!-- <td>{{ $item['kode_loan'] }}</td> -->
                  {{-- <td>{{ $item['no_registrasi'] }}</td> --}}
                  <td>
                     <button class="btn btn-primary" onclick="showDataPagu('{{ $item['uuid_phln'] }}')">Show Data Pagu</button>
                     <button class="btn btn-warning" onclick="editFormPHLN('{{ $item['uuid_phln'] }}')">Edit Data PHLN</button>
                 </td>
              </tr>
          @endforeach
      </tbody>
   </table>
</div>
@endsection
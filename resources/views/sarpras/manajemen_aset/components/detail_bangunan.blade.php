@extends('layout')

@section('content')
<div class="ibox float-e-margins">
    <div class="ibox-title">
        @sdid_icon() Detail bangunan
        <div class="fright">
            <a class="btn btn-sm btn-default noborder-radius fwbold">
                <i class="fa fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </div>
    <div class="ibox-content">
        <div class="form_generator_container">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td class="form-group col-md-4">
                            <label class="control-label">Nama Prasarana</label>
                        </td>
                        <td class="form-group" colspan="2">
                            Gedung Cacuk
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
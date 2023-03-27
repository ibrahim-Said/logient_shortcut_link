@extends('layouts.backend')
@section('main_content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <x-data-table :title="$DataTableTitle" :dataColumn="$dataTableColumn" :sspUrl="$sspUrl"></x-data-table>
            </div>
        </div>
    </section>
@endsection

@extends('layouts.backend')
@section('main_content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="contact-page-aside">
                            <ul class="list-style-none font-size-16">
                                <li class="box-label"><a href="{{route('shortcut-links.create')}}"  class="btn btn-info text-white mt-10">+ {{__("general.Create shortcut link")}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /. box -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <x-data-table :title="$DataTableTitle" :dataColumn="$dataTableColumn" :sspUrl="$sspUrl"></x-data-table>
            </div>
        </div>
    </section>
@endsection

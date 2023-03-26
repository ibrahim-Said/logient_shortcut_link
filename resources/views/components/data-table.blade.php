@push('styles')
<style>
.dataTables_length select{
    width: 100px;
    height: 29px;
    margin: 0 10px;
    border: 1px solid #eee;
}
.dataTables_filter input {
    border: 1px solid #d9d9d9;
    margin-left: 5px;
    border-radius: 5px;
    min-height: 26px;
}
</style>
@endpush
<div class="box box-solid bg-warning">
    {{-- <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
    </div> --}}
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table id="data-table-example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                <thead>
                    <tr class="bg-light">
                        @foreach ($dataColumn as $item)
                            <th>
                                {{ $item['column_label'] }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot class="bg-light">
                    <tr>
                        @foreach ($dataColumn as $item)
                            <th>
                                {{ $item['column_label'] }}
                            </th>
                        @endforeach
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
@push('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.fn.dataTable.ext.errMode = 'none';
        var json_data = @json($dataColumn);
        var sspUrl = '{{ $sspUrl }}';
        var sspColumns = [];
        json_data.forEach((item, index) => {
            sspColumns.push({
                data: item.column_name,
                name: item.column_name,
                orderable: item.column_orderable,
                searchable: item.column_searchable
            });
        });
        $(document).ready(function() {
            datatable=$('#data-table-example').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                pageLength: 50,
                // dom: '<"html5buttons"B>lTfgitp',
                "language": {
                    "url": "{{asset('Frensh.json')}}"
                },
                buttons: [],
                ajax: {
                    "url": sspUrl,
                    "dataType": "json",
                    "type": "post",
                    "data": function(d) {
                        var json_filterColumns = @json($filterColumns);
                        console.log(json_filterColumns);
                        json_filterColumns.forEach((item,index)=>{
                            d[item.column_name]=$('#'+item.column_name).val();
                         });

                    }
                },
                order: [
                    [1, 'asc']
                ],
                columns: sspColumns
            });

        });

        function getFilterData(){
            var returnDate=[];
            var json_filterColumns = @json($filterColumns);
            json_filterColumns.forEach((item,index)=>{
                returnDate[item.column_name]=$('#'+item.column_name).val();
            });
            return returnDate;
        }
    </script>
@endpush

@extends('layouts.backend')

@section('main_content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-body">
                    <form action="{{ route("shortcut-links.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="name">{{__('Name')}} <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($shortcutLink) ? $shortcutLink->name : '') }}">
                                @error('name')
                                    <span class="form-text m-b-none text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="hr-line-dashed"></div>

                        <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }} row">
                            <label class="col-sm-2 col-form-label" for="description">{{__('Link')}} <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" id="link" name="link" class="form-control" value="{{ old('link', isset($shortcutLink) ? $shortcutLink->link : '') }}">
                                @error('link')
                                    <span class="form-text m-b-none text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <a class="btn btn-white btn-sm" href="{{ route("shortcut-links.index") }}">Cancel</a>
                                <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /. box -->
        </div>
    </div>
</section>
@endsection
@push('scripts')
@endpush
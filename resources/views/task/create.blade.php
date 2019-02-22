@extends('home')

@section('title', 'Thêm mới công viêc')


@section('content')

    <div class="row">

        <div class="col-md-12">

            <h2>Thêm mới công việc</h2>

        </div>

        <div class="col-md-12">

            <form method="post" action="{{ route('tasks.store') }}" enctype="multipart/form-data">

                @csrf

                <div class="form-group">

                    <label >Tên công việc</label>

                    <input type="text" class="form-control" name="task_title" >
                    {{$errors->first('task_title')}}

                </div>

                <div class="form-group">

                    <label >Nội dung</label>

                    <textarea class="form-control" rows="3" name="content" ></textarea>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                    <li>{{$errors->first('content')}}</li>
                            </ul>
                        </div>
                    @endif

                </div>

                <div class="form-group">

                    <label for="exampleFormControlFile1">Ảnh</label>

                    <input type="file" name="image" class="form-control-file" >
                    {{$errors->first('image')}}


                </div>

                <div class="form-group">

                    <label for="exampleFormControlFile1">Ngày hết hạn</label>

                    <input type="date" name="created_at" class="form-control" >
                    {{$errors->first('created_at')}}


                </div>

                <button type="submit" class="btn btn-primary">Thêm mới</button>

                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>

            </form>

        </div>

    </div>


@endsection
@extends('home')

@section('title', 'Cập nhật công viêc')


@section('content')

    <div class="row">

        <div class="col-md-12">

            <h2>Cập nhật công việc</h2>

        </div>

        <div class="col-md-12">

            <form method="post" action="{{ route('tasks.update', $task->id) }}" enctype="multipart/form-data">

                @csrf

                <div class="form-group">

                    <label>Task_Title</label>

                    <input type="text" class="form-control" name="title" value="{{ $task->task_title }}" required>

                </div>

                <div class="form-group">

                    <label>Content</label>

                    <textarea class="form-control" rows="3" name="content"  required>{{ $task->content }}</textarea>

                </div>

                <div class="form-group">

                    <label>Ảnh</label>

                    <input type="file" name="image" class="form-control-file" >

                </div>

                <div class="form-group">

                    <label>Created</label>

                    <input type="date" name="due_date" class="form-control"  value="{{ $task->created_at }}" required>

                </div>

                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>

                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>

            </form>

        </div>

    </div>


@endsection
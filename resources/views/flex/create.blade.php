@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">建立 Flex 範本</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('flex.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">名稱</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right">介紹</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="description" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="demo_image" class="col-md-3 col-form-label text-md-right">預覽圖</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="demo_image" required/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shell" class="col-md-3 col-form-label text-md-right">Flex JSON</label>
                            <div class="col-md-6">
                                <textarea type="text" rows="10" class="form-control" name="shell" required>
                                </textarea>
                                <small>在這提供 Flex 的 JSON。請不要偷偷置入廣告或是放入違反法律風俗的內容，違者嚴處！</small>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bot_id" class="col-md-3 col-form-label text-md-right">Chatbot LINE id</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="bot_id">
                                <small>這個 Flex 有實際運用在 LINE chatbot ？如果有的話，歡迎宣傳！(開頭不需要加上 @ 喔)</small>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-3 offset-md-3">
                                <button type="submit" class="btn btn-primary">新增</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

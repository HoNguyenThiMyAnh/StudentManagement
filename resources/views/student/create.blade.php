<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                <h5 class="alert alert-success">{{session('status')}}</h5>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3>Create Student with Image
                            <a href="{{route('student.all')}}" 
                            class="btn btn-danger float-end">Back</a>   
                        </h3>
                     
                    </div>
                    <div class="card-body">
                <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="">Ho ten</label>
                        <input type="text" name="ten" id="" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Lop</label>
                        <input type="text" name="lop" id="" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Email</label>
                        <input type="text" name="email" id="" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Anh dai dien</label>
                        <input type="file" name="anhdaidien" id="" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary"> Luu sinh vien</button>
                    </div>
                </form>
                
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
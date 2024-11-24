<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Student List</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('student.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="first_name">ชื่อ</label>
                            <input type="text" name="first_name" placeholder="First Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="last_name">นามสกุล</label>
                            <input type="text" name="last_name" placeholder="Last Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">อายุ</label>
                            <input type="text" name="age" placeholder="Age" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="grade">เกรด</label>
                            <input type="text" name="grade" placeholder="Grade" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="class">ระดับการศึกษา</label>
                            <input type="text" name="class" placeholder="Class" class="form-control">
                        </div>
                        <button class="btn btn-success mt-3 mb-3">เพิ่มข้อมูลนักเรียน</button>
                        </form>
                    </div>     
                    <div class="col-md-6">
                        <form action="{{ route('student.search') }}" method="GET">
                            <div class="input-group">
                                <div class="form-group flex-grow-1">
                                    <label for="search">ค้นหาข้อมูลนักเรียน</label>
                                    <div class="input-group">
                                        <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search" class="form-control">
                                        <button class="btn btn-primary">ค้นหา</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ชื่อ</th>
                                    <th>นามสกุล</th>
                                    <th>อายุ</th>
                                    <th>เกรด</th>
                                    <th>ระดับการศึกษา</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->first_name }}</td>
                                    <td>{{ $student->last_name }}</td>
                                    <td>{{ $student->age }}</td>
                                    <td>{{ $student->grade }}</td>
                                    <td>{{ $student->class }}</td>
                                    <td><a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning btn-sm">แก้ไข</a></td>
                                    <td>
                                        <form action="{{ route('student.delete', $student->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">ลบ</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

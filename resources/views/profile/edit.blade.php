<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>  Edit </title>
    <!-- Add Bootstrap CSS for styling -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/main_1.css') }}" rel="stylesheet">

</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Simple Form</h2>
        <form action="{{ route('DataProject.profiles.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="form-group ">
                <input type="hidden" value="{{ $profile->id }}">
                <label for="Name">Name</label>
                <input value="{{$profile->user->name }}" type="text" class="form-control  " id="first_name" name="first_name" placeholder="Enter First Name"  >
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input value="{{$profile->user->email}}"  type="email" class="form-control" id="email" name="email" placeholder="Enter Email" >
            </div>
     
            <div class="form-group">
                <label for="Phone">Phone</label>
                <input value="{{$profile->phone }}"  type="Texy" class="form-control" id="Phone" name="Phone" placeholder="Enter Phone" >
            </div>

            <div class="form-group">
                <label for="address">address</label>
                <input value="{{$profile->address}}"  type="text" class="form-control" id="address" name="address" placeholder="Enter address" >
            </div>

            <button type="submit" class="btn" >Update </button>
            <br></br>
        </form>

           {{-- <a  href="{{ route('DataProject.profiles.index')}}" >العودة للصفحة الرئيسية   </a> --}}
    </div>

    <!-- Add Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

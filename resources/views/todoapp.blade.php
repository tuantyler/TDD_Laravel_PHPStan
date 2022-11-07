<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<script>
    function changeState(id){ 
        fetch("/changestate", {
            method: "POST",
            headers: {'Content-Type': 'application/json'}, 
            body: JSON.stringify({"id": id , "_token": "{{csrf_token()}}"})
        })
    }
    function deleteCompleted(){
        fetch("/deletecompleted", {
            method: "POST",
            headers: {'Content-Type': 'application/json'}, 
            body: JSON.stringify({"_token": "{{csrf_token()}}"})
        }).then(res => {
            window.location.reload()
        });
    }
</script>

<body>
    <div class="container">
        <form method="POST" action="{{ route('addtodo') }}">
            @csrf
            <div class="input-group mt-5">
                <input class="form-control" name="name"/>
                <input hidden value="0" name="completed"/>
                <button class="btn btn-primary">Add Todo</button>
            </div>  
        </form>

        @foreach ($todos as $todo)
            <div><input type="checkbox" onclick="changeState({{$todo->id}})"  {{$todo->completed ? "checked" : "" }}/> {{$todo->name}}</div>
        @endforeach
        <button class="btn btn-warning" onclick="deleteCompleted()">Delete Completed Todos</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
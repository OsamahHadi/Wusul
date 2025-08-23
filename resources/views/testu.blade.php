<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="http://127.0.0.1:8000/serviceProvider/work/update/{{$work->id}}" method="post" enctype="multipart/form-data">
  @csrf
    <input type="text" name="name" id="" value={{$work->title}}>
    {{-- <input type="text" name="description" id="" value={{$work->description}}> --}}
    <input type="file" name="image" id="">
                  <select name="service_cat_id" id="select1"
                                class="form-select select1 form-control mx-2"
                                aria-label=".form-select-lg example">

                            @foreach ($services as $service)
                                <option value="{{ $service->id }}" {{ $service->id == $work->service_id? 'selected':''}}>
                                    {{ $service->name }}
                                </option>
                            @endforeach
                        </select>
    <img src="{{ asset("{$work->path}$work->image ") }}" alt="{{ __('') }}">
    <input type="submit" value="OK">
  </form>
</body>
</html>

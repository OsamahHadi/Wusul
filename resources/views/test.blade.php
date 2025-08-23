<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="http://127.0.0.1:8000/serviceProvider/service/store" method="post" enctype="multipart/form-data">
  @csrf
    <input type="text" name="name" id="">

    <input type="text" name="description" id="">
              <select name="service_cat_id" id="select1"
                                class="form-select select1 form-control mx-2"
                                aria-label=".form-select-lg example">

                             @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach 
                        </select> 
    <input type="file" name="image" id="">

    <input type="submit" value="OK">
  </form>
</body>
</html>

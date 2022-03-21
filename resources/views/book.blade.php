<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel BOOK LISTING</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
    <div class="container">
    @if (count($books) > 0)
            <table class="table">

                <!-- Table Headings -->
                <thead>
                    <th scope="col">Book</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Abstract</th>
                </thead>

                <!-- Table Body -->
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <!-- Task Name -->
                            <td class="table-text">
                                <div>{{ $book->title }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $book->publisher }}</div>
                            </td>
                            
                            <td class="table-text">
                                <div>{{ $book->abstract }}</div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    @endif
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>

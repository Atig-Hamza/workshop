<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>

<body>
    <h1>Edit Article</h1>
    <form action="/articles.update/{{ $article->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $article->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea id="description" name="description" class="form-control"
                required>{{ $article->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Article</button>
    </form>
</body>

</html>
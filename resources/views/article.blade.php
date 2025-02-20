<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Article Manager</h1>

        <!-- Form to Add Article -->
        <h2>Add Article</h2>
        <form action="/articles.store" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Article</button>
        </form>

        <!-- Display Articles -->
        <h2>Articles</h2>
        <ul class="list-group">
            @foreach (\App\Models\Article::all() as $article)
                <li class="list-group-item">
                    <h3>{{ $article->title }}</h3>
                    <p>{{ $article->description }}</p>
                    <a href="/articles.edit" class="btn btn-secondary">Edit</a>
                    <form action="/articles.destroy" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</body>

</html>
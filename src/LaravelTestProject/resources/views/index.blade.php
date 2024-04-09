<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel基礎</title>
</head>
<body>
  <h1>こんにちは、{{ $name }}さん</h1>
  <ul>
    @foreach($languages as $language)
      <li>{{ $language }}</li>
    @endforeach
  </ul>
</body>
</html>
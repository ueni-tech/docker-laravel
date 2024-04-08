<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>ショッピングカート</h1>

  @if(isset($product))
  <table>
    <tr>
      <th>商品名</th>
      <td>{{ $product->product_name }}</td>
    </tr>
    <tr>
      <th>価格</th>
      <td>{{ $product->price }}円</td>
    </tr>
  </table>

  <form action="{{ route('cookies.destroy') }}" method="post">
    @csrf
    @method('delete')
    <button type="submit">カートを空にする</button>
  </form>
  @else
  <p>カートの中身は空です。</p>
  @endif
  <a href="{{ route('cookies.create') }}">商品選択ページ</a>
</body>
</html>
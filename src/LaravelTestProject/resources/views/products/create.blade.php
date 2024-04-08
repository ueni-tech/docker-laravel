<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>商品登録</h1>

  @if($errors->any())
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  <form action="{{ route('products.store') }}" method="post">
    @csrf
    <table>
      <tr>
        <th>商品名</th>
        <td>
          <input type="text" name="product_name">
        </td>
      </tr>
      <tr>
        <th>価格</th>
        <td>
          <input type="text" name="price">
        </td>
      </tr>
      <tr>
        <th>ベンダーコード</th>
        <td>
          <select name="vendor_code">
              <option selected value="">選択してください</option>
            @foreach($vendor_code as $code)
              <option value="{{ $code }}">{{ $code }}</option>
            @endforeach
          </select>
        </td>
      </tr>
    </table>
    <input type="submit" value="登録">
  </form>
</body>
</html>
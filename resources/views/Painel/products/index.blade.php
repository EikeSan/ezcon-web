<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>EzCon - Products</title>
  </head>
  <body>
      <h1>Listagem dos Produtos</h1>
      <table>
        <tr>
          <th>Nome</th>
          <th>Descrição</th>
        </tr>
        @foreach ($products as $product)
          <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
          </tr>
        @endforeach
      </table>
  </body>
</html>

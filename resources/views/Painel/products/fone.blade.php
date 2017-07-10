<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="{{route('produtos.fone')}}" method="post">
      {{csrf_field()}}
      <label for="phone">Telefone</label>
        <input type="tel" size="11" maxlength="11" min="10" name="phone" placeholder="8299999999" required/>
        <button type="submit" name="button">Enviar</button>
    </form>
  </body>
</html>

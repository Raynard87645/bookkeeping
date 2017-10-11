
<form method="POST" action="/users">
  {!! csrf_field() !!}
  <b>Name:  </b><input type="text" name="name"><br></br>
  <b>Email: </b><input type="email" name="email"><br></br>
  <b>Password: </b><input type="password" name="password"><br></br>
  <b>Address: </b><input type="text" name="address"><br></br>
  <b>Contact: </b><input type="number" name="number"><br></br>
  <input type="submit" value="Create">


</form>
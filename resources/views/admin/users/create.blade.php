<form action="/users" method="post">
    {{csrf_field()}}

    <label>name
        <input type="text" name="name">
    </label>
    <input type="submit" value="create">

</form>
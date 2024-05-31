<form method="POST" action="khanhtoan">
    @csrf 
    <div>
        <input type="text" name="username" placeholder="Enter username...">
        <input type="hidden" name="_method" value="PUT" >
    </div>
    <button type="submit">Submit</button>
</form>
<h1>Thêm chuyên mục</h1>

<form action="<?php echo route('categories.add') ?>" method="POST">
    
    <div>
        <input type="text" name="category_name" placeholder="Ten chuyen muc">
    </div>
    <!-- <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> -->
    <button type="submit">Submit</button>
</form>